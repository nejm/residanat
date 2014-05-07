<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Resultat extends CI_Controller{
    function __construct(){
        parent::__construct();
        session_start();
        $this->load->view("header");
        $this->load->model("resultat_model");
    }

    
    public function index(){
        if(isset($_SESSION['cin']))
        {
            $data=[];
            $data['resultat']=$this->resultat_model->get($_SESSION['cin']);
            
            $this->load->view("menu");
            $this->load->view("featureResultat",$data);
            $this->load->view("footer");
        }
        else{
            redirect('index');
        }
    }
 }
 ?>