<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        session_start();

    }

    public function index()
    {
         $this->load->view('login_view');

    }

     public function user(){

 
       /* if(isset($_SESSION['cin'])) {
         // redirect('resultat');

            return;
        }*/
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cin','CIN','trim|required');
        $this->form_validation->set_rules('Num_inscription','numero d\'inscription','trim|required');


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
               
            }
        }
        
    }

    public function logout()
    {
        session_destroy();
    }

}
?>