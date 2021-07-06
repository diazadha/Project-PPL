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
        $this->db->from('hewan');
        $this->db->join('status_hewan', 'hewan.statusid = status_hewan.statusid');
        return $this->db->get();
    }
   
}
