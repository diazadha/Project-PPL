<?php
defined('BASEPATH') or exit('No direct script access allowed');

class marketplace_model extends CI_Model
{
    public function tampil_hewan()
    {
        $this->db->select('*');
        $this->db->from('tb_hewan');
        $this->db->join('toko', 'toko.id_toko=tb_hewan.id_toko');
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

    public function find_hewan_byid($id_hewan)
    {
        $this->db->select('*');
        $this->db->from('tb_hewan');
        $this->db->join('toko', 'toko.id_toko=tb_hewan.id_toko');
        $this->db->where('tb_hewan.id_hewan', $id_hewan);
        return $this->db->get();
    }

    public function filter_hewan_harga($dari, $sampai)
    {
        $this->db->select('*');
        $this->db->from('tb_hewan');
        $this->db->join('toko', 'toko.id_toko=tb_hewan.id_toko');
        $this->db->where("tb_hewan.harga BETWEEN '$dari' AND '$sampai'");
        return $this->db->get();
    }

    public function filter_hewan_berat($dari, $sampai)
    {
        $this->db->select('*');
        $this->db->from('tb_hewan');
        $this->db->join('toko', 'toko.id_toko=tb_hewan.id_toko');
        $this->db->where("tb_hewan.berat BETWEEN '$dari' AND '$sampai'");
        return $this->db->get();
    }

    public function filter_hewan_berat_diatas($value)
    {
        $this->db->select('*');
        $this->db->from('tb_hewan');
        $this->db->join('toko', 'toko.id_toko=tb_hewan.id_toko');
        $this->db->where('tb_hewan.berat>=', $value);
        return $this->db->get();
    }

    public function filter_hewan_harga_diatas($value)
    {
        $this->db->select('*');
        $this->db->from('tb_hewan');
        $this->db->join('toko', 'toko.id_toko=tb_hewan.id_toko');
        $this->db->where('tb_hewan.harga>=', $value);
        return $this->db->get();
    }

    public function search($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_hewan');
        $this->db->join('toko', 'toko.id_toko=tb_hewan.id_toko');
        $this->db->like('tb_hewan.nama_hewan', $keyword);
        return $this->db->get();
    }

    public function total_cart($id_user)
    {
        $query = "SELECT count(qty) AS total_cart
                    FROM keranjang, user, toko, tb_hewan
                     WHERE user.id_user=keranjang.id_user AND toko.id_toko=keranjang.id_toko AND keranjang.id_hewan = tb_hewan.id_hewan AND user.id_user = $id_user";
        return $this->db->query($query);
    }

    public function tampil_keranjang($id_user)
    {
        $query = "SELECT nama_hewan, nama_toko, qty, harga, qty * harga as total_harga, foto_hewan, id_keranjang
        FROM keranjang, user, toko, tb_hewan
        WHERE user.id_user=keranjang.id_user AND toko.id_toko=keranjang.id_toko AND keranjang.id_hewan = tb_hewan.id_hewan AND user.id_user=$id_user";
        return $this->db->query($query);
    }

    public function cek_keranjang($id_hewan, $id_user)
    {
        $query = "SELECT *
        FROM keranjang, user, toko, tb_hewan
        WHERE user.id_user=keranjang.id_user AND toko.id_toko=keranjang.id_toko AND keranjang.id_hewan = tb_hewan.id_hewan AND keranjang.id_user=$id_user AND keranjang.id_hewan=$id_hewan";
        return $this->db->query($query);
    }
}
