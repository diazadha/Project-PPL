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

    public function getalldata()
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

    public function gethewanbyid($id_hewan)
    {
        $query = "SELECT *
                    FROM `hewan_tempatdistribusi`,`status_hewan`
                    WHERE hewan_tempatdistribusi.id_status = status_hewan.id_status
                     AND hewan_tempatdistribusi.id_hewan = $id_hewan";
        return $this->db->query($query)->result_array();
        // $this->db->select('*');
        // $this->db->from('hewan_tempatdistribusi');
        // $this->db->join('status_hewan', 'hewan_tempatdistribusi.id_status = status_hewan.id_status');
        // $this->db->join('mitra_distribusi', 'hewan_tempatdistribusi.id_tempatdistribusi = mitra_distribusi.id_tempatdistribusi');
        // $this->db->join('user', 'user.id_tempatdistribusi = mitra_distribusi.id_tempatdistribusi');
        // $this->db->where('user.email', $this->session->userdata('email'));
        // $this->db->where('hewan_tempatdistribusi.id_hewan', $id_hewan);
        // return $this->db->get();
        // $query = "SELECT * FROM  hewan_tempatdistribusi WHERE hewan_tempatdistribusi.id_hewan = $id_hewan";
        // return $this->db->query($query)->row_array();
    }

    public function max_id_distribusi()
    {
        $this->db->select_max('id_tempatdistribusi');
        $this->db->from('mitra_distribusi');
        return $this->db->get();
    }

    public function invoice($id_distribusi)
    {
        $query = "SELECT invoice.*
        FROM invoice, mitra_distribusi
        WHERE invoice.id_tempatdistribusi = mitra_distribusi.id_tempatdistribusi
        AND invoice.id_tempatdistribusi = $id_distribusi";
        return $this->db->query($query);
    }

    public function get_pemesan($id_invoice)
    {
        $query = "SELECT invoice.* 
        FROM invoice, user
        WHERE invoice.id_user = user.id_user and invoice.id_invoice = $id_invoice";
        return $this->db->query($query);
    }

    public function get_distribusi($id_invoice)
    {
        $query = "SELECT invoice.*, mitra_distribusi.*
        FROM invoice, user, mitra_distribusi
        WHERE invoice.id_user = user.id_user and  mitra_distribusi.id_tempatdistribusi = invoice.id_tempatdistribusi AND invoice.id_invoice = $id_invoice";
        return $this->db->query($query);
    }

    public function data_pesanan($id_invoice)
    {
        $query = "SELECT toko.nama_toko, toko.id_toko, status_transaksi.*
        FROM invoice, user, tb_hewan, toko, orders, status_transaksi
        WHERE invoice.id_user = user.id_user and invoice.id_invoice = orders.id_invoice AND orders.id_hewan = tb_hewan.id_hewan
        AND toko.id_toko = tb_hewan.id_toko AND status_transaksi.id_invoice = invoice.id_invoice AND toko.id_toko = status_transaksi.id_toko
        AND invoice.id_invoice = $id_invoice
        GROUP by status_transaksi.id_toko";
        return $this->db->query($query);
    }

    public function cek_foto($id_invoice)
    {
        $query = "SELECT DISTINCT(status_transaksi.id_invoice), status_transaksi.foto_bukti_bayar
        FROM invoice, status_transaksi
        WHERE status_transaksi.id_invoice = invoice.id_invoice
        AND status_transaksi.id_invoice = $id_invoice";
        return $this->db->query($query);
    }

    public function cek_status_bayar($id_invoice)
    {
        $query = "SELECT DISTINCT(status_transaksi.id_invoice), status_transaksi.status_bayar
        FROM invoice, status_transaksi
        WHERE status_transaksi.id_invoice = invoice.id_invoice
        AND status_transaksi.id_invoice = $id_invoice";
        return $this->db->query($query);
    }

    public function data_pesanan_hewan($id_invoice)
    {
        $query = "SELECT tb_hewan.nama_hewan, toko.nama_toko, toko.id_toko, orders.qty * tb_hewan.harga as total_harga, orders.*, tb_hewan.harga
        FROM invoice, user, tb_hewan, toko, orders
        WHERE invoice.id_user = user.id_user and invoice.id_invoice = orders.id_invoice AND orders.id_hewan = tb_hewan.id_hewan
        AND toko.id_toko = tb_hewan.id_toko
        AND invoice.id_invoice = $id_invoice";
        return $this->db->query($query);
    }
}
