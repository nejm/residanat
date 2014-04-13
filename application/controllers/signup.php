<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SignUp extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        session_start();
    }



  
   function index(){
   			$this->load->view('header');
			$this->load->view('register');
			$this->load->view('footer');
	}



	

	function valider(){


   		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'signUp form';

		$this->form_validation->set_rules('Num_convocation', 'Numero de convocation', 'required');
		$this->form_validation->set_rules('Num_cin', 'Numéro de cin', 'required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_message('required', 'il faut saisir le %s');

		if ($this->form_validation->run() == FALSE)
		{

			$this->load->view('header');
			$this->load->view('register');
			$this->load->view('footer');
		}	
		else
			{
				$this->show(1);
			}

   }
}