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

		$this->form_validation->set_rules('Numéro de convocation', 'Numéro de convocation', 'required');
		$this->form_validation->set_rules('Numéro cin', 'Numéro cin', 'required');
		$this->form_validation->set_rules('email','email','required');

		if ($this->form_validation->run() === FALSE)
		{

			$this->load->view('header');
			$this->load->view('register');
			$this->load->view('footer');
		}	
	}

	function valider(){

	}



   }