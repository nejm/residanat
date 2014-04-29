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

    function getByName($name)
    {
        $q = $this->db->like('nom',$name)->get('candidats');
        if($q->num_rows > 0)
            return $q->result();
        return false;
    }

    function search($name,$moymin,$moymax)
    {
        $q = $this->db
            ->like('nom',$name)
            ->where('moyenne >= ',$moymin)
            ->where('moyenne <= ',$moymax)
            ->get('candidats');
        if($q->num_rows > 0)
            return $q->result();
        return false;
    }

    function getNbr()
    {
        return $this->db->count_all_results('candidats');
    }
    function getNbrMadeChoice()
    {
        return $this->db->where('deja_choisit',1)->count_all_results('candidats');
    }

    function getMadeChoice()
    {
        $q = $this->db->where('deja_choisit',1)->get('candidats');
        if($q->num_rows > 0)
            return $q->result();
        return false;
    }

    public function getEtudiant($limit, $start)
    {
        $query = $this
                        ->db
                        ->limit($limit, $start)
                        ->get("candidats");

        if ($query->num_rows > 0) {
            return $query->result();
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

    function getByMoy($min,$max)
    {
        return $this->db->where('moyenne > ',$min)->where('moyenne < ',$max)->count_all_results('candidats');
    }
    function searchByName($name)
    {
        $q = $this->db->like('nom',$name)->get('candidats');
        if($q->num_rows > 0)
            return $q->result();
        return false;
    }

}