<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nejm
 * Date: 28/03/14
 * Time: 19:59
 */

class Spec_model extends CI_Model{
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
} 