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
