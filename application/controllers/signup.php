<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SignUp extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        session_start();
    }



  
   function index(){
   		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'signUp form';

		$this->form_validation->set_rules('youremail', 'youremail', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() === FALSE)
		{

			$this->load->view('header');
			$this->load->view('signUp');
			$this->load->view('footer');
		}
		
	}



   }