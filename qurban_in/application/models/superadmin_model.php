<?php
defined('BASEPATH') or exit('No direct script access allowed');

class superadmin_model extends CI_Model
{
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

    public function data_pesanan_hewan($id_invoice)
    {
        $query = "SELECT tb_hewan.nama_hewan, toko.nama_toko, toko.id_toko, orders.qty * tb_hewan.harga as total_harga, orders.*, tb_hewan.harga
        FROM invoice, user, tb_hewan, toko, orders
        WHERE invoice.id_user = user.id_user and invoice.id_invoice = orders.id_invoice AND orders.id_hewan = tb_hewan.id_hewan
        AND toko.id_toko = tb_hewan.id_toko
        AND invoice.id_invoice = $id_invoice";
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

    public function verifikasi_toko($id_toko)
    {
        $query = "SELECT * 
        FROM toko
        WHERE toko.id_toko = $id_toko";
        return $this->db->query($query);
    }

    public function verifikasi_tempat_distribusi($id_distribusi)
    {
        $query = "SELECT * 
        FROM mitra_distribusi
        WHERE mitra_distribusi.id_tempatdistribusi = $id_distribusi";
        return $this->db->query($query);
    }
}
