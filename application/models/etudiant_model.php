<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
        return $this->db->count_all_results('candidats');
    }

    function getMadeChoice()
    {
        $q = $this->db->where('deja_choisit',1)->get('candidats');
        if($q->num_rows > 0)
            return $q->result();
        return false;
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

    function ajout($data)
    {
        $insert=array(
            'num'  => $data['conv'],
            'cin'=> $data['cin'],
            'nom'  => $data['nom'],
            'nationalite'   => $data['nationalite']
        );
        $this->db->insert('article',$insert);

    }

}