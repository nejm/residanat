<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nejm
 * Date: 06/04/14
 * Time: 11:39
 */

class Admin extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $data=[];
        if(isset($_SESSION['id'])) {
            redirect("admin/dashboard");
            return;
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('login','Nom d\'utilisateur','trim|required');
        $this->form_validation->set_rules('pass','Mot de passe','trim|required');

        if($this->form_validation->run() !== false)
        {
            $this->load->model('admin_model');
            $res = $this
                        ->admin_model
                        ->verify(
                                $this->input->post('login'),
                                $this->input->post('pass')
                                );
            if($res !== false)
            {
                $_SESSION['id']=$this->input->post('username');
                redirect('admin/dashboard');
            }else
            {
                $data['msg']="<div class='alert alert-danger'>
                <a class='close'' data-dismiss='alert'>×</a>
                <strong>Error !</strong>
                Login ou mot de passe invalide</div>";
            }
        }

        $this->load->view("login",$data);
    }

    function dashboard()
    {
        $this->load->view("dashboard");
    }

    function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->set_flashdata('success', 'Vous êtes désormais déconnecté(e).');
        session_destroy();
        redirect(base_url('admin'), 'refresh');
    }

} 