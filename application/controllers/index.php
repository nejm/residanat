<?php

class Index extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->view("header");
        $this->load->view("menu");
    }

    function index()
    {
        $this->load->view("accueil");
        $this->load->view("footer");
    }
    function textes_reglementaires()
    {
        $this->load->view("register");
    }
    function specialite()
    {
        $data=[];
        $this->load->model("spec_model");
        $data['spec']=$this->spec_model->getAll();
        $this->load->view("specialite",$data);
        $this->load->view("footer");

    }
    function college()
    {
        $this->load->view("college");
        $this->load->view("footer");
    }
} 