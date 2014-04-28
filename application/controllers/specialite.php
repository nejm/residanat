<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Specialite extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('specialite_model');
        session_start();
    }

    
     function index(){
     	 if(!isset($_SESSION['cinSpec']))
        {
           redirect('loginSpecialite');
        }
       

     	$data=[];
    	$res=$this->specialite_model->getNonChoisi($_SESSION['cinSpec']);
    	$resChoisi=$this->specialite_model->getChoisit($_SESSION['cinSpec']);
    	$data['spec']=$res;
    	$data['specChoisi']=$resChoisi;
    	//var_dump($res);
    	$this->load->view("specialite",$data);
    }

    function send($variable){

    }

    function getData(){
     $this->specialite_model->deletePred($_SESSION['cinSpec']);
     $length =count($_POST['idlist']);
     for ($i=0; $i <$length ; $i++) { 
     	$res[$i]=$this->specialite_model->getById($_POST['idlist'][$i]);

     	 foreach ($res[$i] as $row)
		    {
		       $this->specialite_model->DoChoix($row['code_specialite'],$i+1,$_SESSION['cinSpec']);//
		       
		    }
     
     }

    }
      
   
}