<?php
/**
 * Created by PhpStorm.
 * User: Nejm
 * Date: 08/04/14
 * Time: 13:39
 */

class Article_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
       $q = $this->db->get("article");
        if ($q->num_rows >0)
            return $q->result();
        return false;
    }

    function getByMenu($id)
    {
        $q = $this->db
                    ->where("menu",$id)
                    ->get("article");
        if ($q->num_rows >0)
            return $q->result();
        return false;
    }

    function getById($id)
    {
        $q = $this->db
            ->where('id',$id)
            ->get("article");
        if ($q->num_rows >0)
            return $q->result();
        return false;
    }


    function ajout($data)
    {
        //if (is_null($data['pb'])) $data['pb']=0;
        $insert=array(
            'titre'  => $data['titre'],
            'contenu'=> $data['contenu'],
            'alias'  => $data['alias'],
            'etat'   => $data['etat'],
            'par'    => $data['par'],
            'menu'   => $data['menu']
        );
        $this->db->insert('article',$insert);

    }

    function modifier($data)
    {
        $update=array(
            'titre'  => $data['titre'],
            'contenu'=> $data['contenu'],
            'alias'  => $data['alias'],
            'etat'   => $data['etat'],
            'par'    => $data['par'],
            'menu'   => $data['menu']
        );
        $this->db->where('id', $data['id']);
        $this->db->update('article', $update);

    }

    function deleteById($id)
    {
        $this->db->where('id',$id)->delete("article");

    }
} 