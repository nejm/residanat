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

    function verifyLogin($login)
    {
        $q = $this->db
            ->where("login",$login)
            ->limit(1)
            ->get("admin");
        if($q->num_rows > 0)
        {
            return 1;
        }
        return 0;
    }

    function addUser($data)
    {
        $insert=array(
            'nom'       => $data['nom'],
            'prenom'    => $data['prenom'],
            'login'     => $data['login'],
            'pass'      => $data['pass'],
            'mail'      => $data['mail'],
            'privilege' => $data['privilege']
        );
        $this->db->insert('article',$insert);
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