<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }


    public function validate($cin,$insc)
    {
       // $query = $this->db->get('candidats');
        $q = $this->db->get_where('candidats', array('cin' => $cin,'num'=>$insc));
       /* $q = $this
                ->db
                ->where('cin',$cin)
                ->where('num',$insc)
                ->limit(1)
                ->get('condidats');*/
        // Let's check if there are any results

        if($q->num_rows > 0)
        {
            return $q->row();
        }
        return false;
    }

    public function validateResidant($cin,$pass){
         $q = $this->db->get_where('candidats', array('cin' => $cin,'mot_de_passe'=>$pass));
      
        if($q->num_rows > 0)
        {
            return $q->row();
        }
        return false;

    }

}
?>