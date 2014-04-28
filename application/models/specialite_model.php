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




    function getChoisit($cin)
    {
       $q = $this->db->where('cin',$cin)->from('choix_candidats')
            ->join('specialite','choix_candidats.code_specialite = specialite.code_specialite')->order_by("priorite", "asc")->get();
        
        if($q->num_rows > 0)
            return $q->result();
        return false;
    }







    function getNonChoisi($cin){

             
       $res= $this->db      
       ->where('cin',$cin)->from('specialite')
            ->join('choix_candidats',' specialite.code_specialite !=choix_candidats.code_specialite','full')->get();
       
        return $res->result();
    }
    function getById($id){
        $query="select code_specialite from specialite where id = ?";
        $res=$this->db->query($query, array($id));
    
        return $res->result_array();
    }



    function deletePred($cin){
         $this->db->delete('choix_candidats', array('cin' => $cin)); 
    }

    function DoChoix($code_specialite,$p,$cin){
       

        $data = array(
           'cin' => $cin ,
           'code_specialite'=>$code_specialite,
           'priorite'=>$p
        );

        $this->db->insert('choix_candidats', $data); 
    }


} 