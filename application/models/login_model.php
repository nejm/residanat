<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate($cin,$insc)
    {
        $q = $this
                ->db
                ->where('cin',$cin)
                ->where('insc',$insc)
                ->limit(1)
                ->get('user');
        // Let's check if there are any results
        if($q->num_rows > 0)
        {
            return $q->row();
        }
        return false;
    }
}
?>