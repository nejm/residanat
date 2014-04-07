<?php  
	/**
	* 
	*/
	class User extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function show() {
		    $this->load->model('user_model');
		    $users = $this->user_model->get_user(04832905,120);
		    $data['cin'] = $users['cin'];
		    $data['insc'] = $users['insc'];
		    $this->load->view('user', $data);
		}

		public function login()
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules( 'username', 'username', 'required' );
			$this->form_validation->set_rules( 'password', 'password', 'required' );
			$this->form_validation->set_error_delimiters( '<em>','</em>' );

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('login');
			}
			else
			{
				$this->show(1);
			}
		}
	}
?>