<?php
/**
 * Created by PhpStorm.
 * User: Nejm
 * Date: 05/05/14
 * Time: 11:48
 */

class Menu_model extends CI_Model {

    function __construc()
    {
        parent::__construct();
    }

    function getAll()
    {
        $q = $this->db
             ->get("menu");
        return $q->result();
    }
} 