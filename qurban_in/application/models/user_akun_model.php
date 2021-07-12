<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_akun_model extends CI_Model
{
    public function get_riwayat($id_user)
    {
        $query = " SELECT invoice.* 
                    FROM invoice, mitra_distribusi, user
                    WHERE invoice.id_tempatdistribusi = mitra_distribusi.id_tempatdistribusi and invoice.id_user = user.id_user AND user.id_user = $id_user";
        return $this->db->query($query);
    }
}
