<?php
/**
 * Created by PhpStorm.
 * User: Nejm
 * Date: 10/04/14
 * Time: 14:33
 */

class Choix_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get($cin)
    {
        $q = $this->db->where('cin',$cin)->from('choix_candidats')
            ->join('specialite','choix_candidats.code_specialite = specialite.id')->order_by("priorite", "asc")->get();
        if($q->num_rows > 0)
            return $q->result();
        return false;
    }

} 