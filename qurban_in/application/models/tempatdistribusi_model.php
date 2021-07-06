<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tempatdistribusi_model extends CI_Model
{
    public function statushewan()
    {
        $queryName =    "SELECT *
                        FROM status_hewan";
        return $this->db->query($queryName)->result_array();
    }

    public function datahewan()
    {

        //$queryName =    "SELECT hewan.*, status_hewan . nama_status 
        //   FROM status_hewan, hewan
        // WHERE status_hewan . statusid = hewan . statusid";

        // return $this->db->query($queryName)->result_array();
        $this->db->select('*');
        $this->db->from('hewan_tempatdistribusi');
        $this->db->join('status_hewan', 'hewan_tempatdistribusi.id_status = status_hewan.id_status');
        $this->db->join('mitra_distribusi', 'hewan_tempatdistribusi.id_tempatdistribusi = mitra_distribusi.id_tempatdistribusi');
        $this->db->join('user', 'user.id_tempatdistribusi = mitra_distribusi.id_tempatdistribusi');
        $this->db->where('user.email', $this->session->userdata('email'));
        return $this->db->get();
    }

    public function max_id_distribusi()
    {
        $this->db->select_max('id_tempatdistribusi');
        $this->db->from('mitra_distribusi');
        return $this->db->get();
    }
}
