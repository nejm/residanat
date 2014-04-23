<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        session_start();

    }

   function index()
    {
       if(isset($_SESSION['cin'])) {
            redirect('resultat');
            return;
        }
    }

     public function user()
     {
         if(isset($_SESSION['cin'])) {
            redirect('resultat');
            return;
        }
       
         $data=[];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cin','CIN','trim|required');
        $this->form_validation->set_rules('Num_inscription','numero d\'inscription','trim|required');
        $this->form_validation->set_message('required','il faut saisir %s');
        



        if($this->form_validation->run() !== false)
        {
    

             $res = $this
                    ->login_model
                    ->validate(
                        $this->input->post('cin'),
                        $this->input->post('Num_inscription')
                        );
            if($res !== false)
            {
                $_SESSION['cin']=$this->input->post('cin');
                redirect('resultat');
               
            }else{
                 $data['err_message'] ='votre numero de convocation ou votre cin est incorrect';
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


     public function residant()
     {
         if(isset($_SESSION['cin'])) {
            redirect('resultat');
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
                $_SESSION['cin']=$this->input->post('cin');
                redirect('resultat');
               
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
        unset($_SESSION['cin']);
    }

}
?>
