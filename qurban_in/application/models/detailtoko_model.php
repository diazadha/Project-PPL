<?php
defined('BASEPATH') or exit('No direct script access allowed');

class detailtoko_model extends CI_Model
{
    public function tampil_toko()
    {
        $this->db->select('*');
        $this->db->from('toko');
        return $this->db->get();
    }

    public function tampil_detail_toko($id_toko)
    {
        $this->db->select('*');
        $this->db->from('toko');
        $this->db->where('id_toko', $id_toko);
        return $this->db->get();
    }
}