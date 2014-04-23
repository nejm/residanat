<?php
/**
 * Created by PhpStorm.
 * User: Nejm
 * Date: 15/04/14
 * Time: 19:48
 */

class Errors extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view("header");
        $this->load->view("errors_View/e404");
    }
} 