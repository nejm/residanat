<?php

class Index extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->view("header");
        
        session_start();
    }

    function index()
    {
       // $this->load->view("pages_Content");
        $data=[];
        $this->load->model('article_model');
         
        $data['article']=$this->article_model->getById(12);
        $this->load->view("menu");
        $this->load->view("features",$data);
        $this->load->view("footer");
    }

    function info_specialite()
    {
         $data=[];
         $this->load->model("article_model");
         $data['article']=$this->article_model->getById(15);
         $this->load->view("menu");
         $this->load->view("features",$data);
         $this->load->view("footer");

    }
    function college()
    {
         $this->load->view("menu");
        $this->load->view("college");
        $this->load->view("footer");
    }

    function textes_reglementaire(){

         $data=[];
         $this->load->model("article_model");
         $data['article']=$this->article_model->getById(13);
         $this->load->view("menu");
         $this->load->view("features",$data);
         $this->load->view("footer");
    }
} 