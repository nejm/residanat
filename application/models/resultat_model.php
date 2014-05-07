<?php
/**
 * Created by PhpStorm.
 * User: Nejm
 * Date: 10/04/14
 * Time: 14:33
 */

class Resultat_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get($cin)
    {
        $q = $this->db->where('cin',$cin)->get('resultats_concours');
        if($q->num_rows > 0)
            return $q->result();
        return false;
    }

} 