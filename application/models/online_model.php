<?php
/**
 * Created by PhpStorm.
 * User: Nejm
 * Date: 25/04/14
 * Time: 13:41
 */

class Online_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function add($nom,$ip)
    {
            $this->db->insert('online',array(
                'nom' => $nom,
                'ip' => $ip
            ));
    }
    function del($id)
    {
            $this->db->delete('online', array('id' => $id));
    }
} 