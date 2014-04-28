<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginSpecialite extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        session_start();

    }

   function index()
    {
        $this->load->view('header');
        $this->load->view('loginSpecialite');
        $this->load->view('footer');
      if(isset($_SESSION['cinSpec'])) {
            redirect('specialite');
            return;
        }

    }

    


     public function residant()
     {

         if(isset($_SESSION['cinSpec'])) {
            redirect('specialite');
            return;
        }
       
         $data=[];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cin','CIN','trim|required');
        $this->form_validation->set_rules('password','mot de passe','trim|required');
        $this->form_validation->set_message('required','il faut saisir %s');
        



        if($this->form_validation->run() !== false)
        {
    

             $res = $this
                    ->login_model
                    ->validateResidant(
                        $this->input->post('cin'),
                        $this->input->post('password')
                        );

            if($res !== false)
            {
                $_SESSION['cinSpec']=$this->input->post('cin');
                redirect('specialite');
               
            }else{
                 $data['err_message'] ='votre mot de passe ou votre cin est incorrect';
                 $this->load->view('header');
                 $this->load->view('errors_View/login',$data);
                 $this->load->view('footer');
                
            }
        }
        else{
                 $data['err_message']=validation_errors();
                 $this->load->view('header');
                 $this->load->view('errors_View/login',$data);
                 $this->load->view('footer');
        }
               
        
    }

    public function logout()
    {
        unset($_SESSION['cinSpec']);
        redirect('index');
    }

}
?>
