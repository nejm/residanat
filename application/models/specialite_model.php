<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nejm
 * Date: 28/03/14
 * Time: 19:59
 */

class Specialite_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getAll()
    {
        $q = $this
            ->db
            ->get('specialite');
        return $q->result();
    }


    function getSum()
    {
        return $this->db->select_sum('nbr_place')->get('specialite')->row();

    }



    function getNonChoisi($cin){
        $query="select libelle from specialite where code_specialite not in (select code_specialite from choix_candidats where cin =?)";
        $res=$this->db->query($query,array($cin));
        return $res->result();
    }
    function getById($id){
        $query="select code_specialite from specialite where id = ?";
        $res=$this->db->query($query, array($id));
    
        return $res->result_array();
    }

    function DoChoix($code_specialite,$p){
        $data = array(
           'cin' => '0694224' ,
           'code_specialite'=>$code_specialite,
           'priorite'=>$p
        );

        $this->db->insert('choix_candidats', $data); 
    }
} 