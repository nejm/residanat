<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etudiant_model extends CI_Model {

    private  $table = "resultats_concours";

    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $q = $this->db->get($this->table);
        return $q->result();
    }

    function getByCin($cin)
    {
        $q = $this->db->where('cin',$cin)->limit(1)->get($this->table);
        return $q->row();
    }

    function getByCinMadeChoice($cin)
    {
        $q = $this->db
                  ->where('cin',$cin)
                  ->where('deja_choisit',1)
                  ->limit(1)
                  ->get('candidats');
        return $q->row();
    }

    function getByName($name)
    {
        $q = $this->db->like('nom',$name)->get($this->table);
        if($q->num_rows > 0)
            return $q->result();
        return false;
    }

    function search($name,$moymin=0,$moymax=20)
    {
        $q = $this->db
            ->like('nom',$name)
            ->where('moyenne >= ',$moymin)
            ->where('moyenne <= ',$moymax)
            ->get($this->table);
        if($q->num_rows > 0)
            return $q->result();
        return false;
    }

    function getNbr()
    {
        return $this->db->count_all_results($this->table);
    }

    function getNbrAdmis()
    {
        return $this->db->where("resultat","Admis(e)")->count_all_results($this->table);
    }

    function getByFac($fac)
    {
        return $this->db->where("fac",$fac)->count_all_results($this->table);
    }

    function getMaxMoy()
    {
        $query = $this->db->select_max("moyenne")->get($this->table);
        return $query->row();
    }

    function getMinMoy()
    {
        $query = $this->db->select_min("moyenne")->get($this->table);
        return $query->row();
    }

    function getNbrMadeChoice()
    {
        return $this->db->where('deja_choisit',1)->count_all_results('candidats');
    }

    function getMadeChoice($limit, $start)
    {
        $query = $this
            ->db
            ->where('deja_choisit',1)
            ->limit($limit, $start)
            ->get('candidats');

        if ($query->num_rows > 0) {
            return $query->result();
        }
        return false;
    }

    /*function getMadeChoice()
    {
        $q = $this->db->where('deja_choisit',1)->get('candidats');
        if($q->num_rows > 0)
            return $q->result();
        return false;
    }*/

    public function getEtudiant($limit, $start)
    {
        $query = $this
                        ->db
                        ->limit($limit, $start)
                        ->get($this->table);

        if ($query->num_rows > 0) {
            return $query->result();
        }
        return false;
    }

    function getByMoy($min,$max)
    {
        return $this->db
                    ->where('moyenne >= ',$min)
                    ->where('moyenne <= ',$max)
                    ->count_all_results($this->table);
    }


    function searchByName($name)
    {
        $q = $this->db->like('nom',$name)->get($this->table);
        if($q->num_rows > 0)
            return $q->result();
        return false;
    }

}