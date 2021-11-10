<?php

/**
 *
 */
class Client_model extends CI_Model
{
    public function view_sekolah()
    {
        return $this->db->get_where("data_sekolah",['id_sekolah'=>1])->row();
    }

    public function view_where($id)
    {
        return $this->db->get_where("daftar_buku",$id);
    }
}


 ?>
