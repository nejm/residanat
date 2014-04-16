<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }


    public function register($num,$cin,$email,$tel,$pass)
    {
    	$data = array(
		   'num' => $num ,
		   'cin' => $cin ,
		   'mail' => $email,
		   'tel'=>$tel,
		   'mot_de_passe'=>$pass,
           'nationalite' => 'Tunisienne'
		);

		$this->db->insert('candidats', $data); 

    }
}