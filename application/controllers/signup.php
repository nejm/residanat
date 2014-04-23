<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SignUp extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
         $this->load->model('register_model');
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
		$this->form_validation->set_rules('tel','teliphone','required');
		$this->form_validation->set_message('required', 'il faut saisir le %s');





		if ($this->form_validation->run() !== FALSE)
		{

			$pass=$this->randomPassword();
			if($this->send($pass)){
				 $this
                    ->register_model
                    ->register(
                    	$this->input->post('Num_convocation'),
                        $this->input->post('Num_cin'),                        
                        $this->input->post('email'),
                        $this->input->post('tel'),
                        $pass
                        );

			}
          
			
		}	
		else
			{
				$this->load->view('header');
				$this->load->view('register');
				$this->load->view('footer');
			}
   }


	//random password generation

	 function randomPassword() {
	    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
	}

		//send  password

		function send($msgBody){
			$this->load->library('email');
			$this->email->from('haddadaseif@gmail.com', 'Residanat administration');
			$this->email->to( $this->input->post('email')); 
			$this->email->subject('Email Test');
			$this->email->message($msgBody);	

			var_dump($this->email);
			if($this->email->send()){
			 	$data['msg']="email sent successfully";
			}
			
			else
				$data['msg']="fail";


			$this->load->view('residant/email',$data)	;
			echo $this->email->print_debugger();
			return $this->email->send();
		}

}
