<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        if(isset($_SESSION['cin'])) {
            redirect('resultat');
            return;
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','User Name','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run() !== false)
        {
            $this->load->model('login_model');
            $res = $this
                    ->login_model
                    ->validate(
                        $this->input->post('username'),
                        $this->input->post('password')
                        );
            if($res !== false)
            {
                $_SESSION['cin']=$this->input->post('username');
                redirect('resultat');
            }
        }
        $this->load->view('login_view');
    }

    public function logout()
    {
        session_destroy();
    }

}
?>