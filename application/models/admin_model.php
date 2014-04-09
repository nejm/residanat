<?php

class Admin_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    function verify($login,$pass)
    {
        $q = $this->db
                     ->where("login",$login)
                     ->where("pass",SHA1($pass))
                     ->limit(1)
                     ->get("admin");
        if($q->num_rows > 0)
        {
            return $q->row();
        }
        return false;
    }

    function getName($id)
    {
        $q = $this->db
            ->where("id",$id)
            ->limit(1)
            ->get("admin");

        if($q->num_rows > 0)
        {
            return $q->row();
        }
        return false;
    }
} 