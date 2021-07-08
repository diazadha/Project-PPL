<?php
defined('BASEPATH') or exit('No direct script access allowed');

class marketplace_model extends CI_Model
{
    public function tampil_hewan()
    {
        $this->db->select('*');
        $this->db->from('tb_hewan');
        return $this->db->get();
    }

    public function tampil_detail_hewan($id_hewan)
    {
        $this->db->select('*');
        $this->db->from('tb_hewan');
        $this->db->join('toko', 'toko.id_toko=tb_hewan.id_toko');
        $this->db->where('tb_hewan.id_hewan', $id_hewan);
        return $this->db->get();
    }
}
