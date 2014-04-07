<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Resultat extends CI_Controller{
    function __construct(){
        parent::__construct();
        session_start();
    }
    
    public function index(){
        if(isset($_SESSION['cin']))
        {
            $this->load->view("welcome_message");
        }
        else{
            redirect('login');
        }
    }
 }
 ?>