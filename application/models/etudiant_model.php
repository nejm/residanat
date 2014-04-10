<?php
/**
 * Created by PhpStorm.
 * User: Nejm
 * Date: 09/04/14
 * Time: 21:38
 */

class Etudiant_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $q = $this->db->get("candidats");
        return $q->result();
    }

    function getByCin($cin)
    {
        $q = $this->db->where('cin',$cin)->limit(1)->get("candidats");
        return $q->row();
    }

    function getNbr()
    {
        return $this->db->count_all_results('candidats');;
    }

    public function getEtudiant($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("candidats");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
}