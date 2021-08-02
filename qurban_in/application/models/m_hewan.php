<?php

class m_hewan extends CI_model
{
    public function tambah_hewan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tampil_data()
    {
        $result = $this->db->get('tb_hewan');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }
    public function find($id)
    {
        $result = $this->db->where('id_hewan', $id)
            ->limit(1)
            ->get('tb_hewan');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function max_id_toko()
    {
        $this->db->select_max('id_toko');
        $this->db->from('toko');
        return $this->db->get();
    }

    public function getalldata()
    {
        $this->db->select('*');
        $this->db->from('tb_hewan');
        $this->db->join('toko', 'toko.id_toko = tb_hewan.id_toko');
        $this->db->join('user', 'user.id_toko = toko.id_toko');
        $this->db->join('kategori', 'kategori.id_kategori = tb_hewan.id_kategori');
        $this->db->where('user.email', $this->session->userdata('email'));
        return $this->db->get();
    }

    public function data_hewan($id_hewan)
    {
        $this->db->select('*');
        $this->db->from('tb_hewan');
        $this->db->join('kategori', 'kategori.id_kategori = tb_hewan.id_kategori');
        $this->db->where('tb_hewan.id_hewan', $id_hewan);
        return $this->db->get();
    }

    public function get_kategori_bydetail($id)
    {
        $query = "SELECT * 
        FROM kategori 
        WHERE kategori.id_kategori != $id";
        return $this->db->query($query);
    }

    public function hapus_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_hewan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function dapat_data($id_hewan = null)
    {
        $query = $this->db->get_where('tb_hewan', array('id_hewan' => $id_hewan))->row();
        return $query;
    }
}
