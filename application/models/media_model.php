<?php
/**
 * Created by PhpStorm.
 * User: Nejm
 * Date: 10/04/14
 * Time: 10:50
 */

class Media_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('directory');
    }

    function getAll()
    {
        $map = directory_map("assets/img");
        $i=-1;
        foreach ($map as $x)
        {
            $i++;
            $data[$i]=array(
                            'nom'  => $x,
                            'url'  => "<img src='".base_url()."assets/img/".$map[$i]."' with=50px height=50px>",
                            'real' => base_url()."assets/img/".$map[$i]
            );
        }

        return $data;
    }

} 