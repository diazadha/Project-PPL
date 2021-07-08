<?php
defined('BASEPATH') or exit('No direct script access allowed');

class marketplace extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');
        $data['title'] = 'Home';
        $data['tampil_hewan'] = $this->marketplace_model->tampil_hewan()->result();
        $this->load->view('marketplace/templates_marketplace/header', $data);
        $this->load->view('marketplace/index', $data);
        $this->load->view('marketplace/templates_marketplace/footer');
    }

    public function detail_produk($id_hewan)
    {
        $data['title'] = 'Home';
        $data['tampil_hewan'] = $this->marketplace_model->tampil_detail_hewan($id_hewan)->result();
        $this->load->view('marketplace/templates_marketplace/header', $data);
        $this->load->view('marketplace/detailproduk', $data);
        $this->load->view('marketplace/templates_marketplace/footer');
    }

    public function detail_toko()
    {
        $data['title'] = 'Toko';
        $this->load->view('marketplace/templates_marketplace/header', $data);
        $this->load->view('marketplace/detailtoko');
        $this->load->view('marketplace/templates_marketplace/footer');
    }

    public function toko()
    {
        $data['title'] = 'Toko';
        $this->load->view('marketplace/templates_marketplace/header', $data);
        $this->load->view('marketplace/toko');
        $this->load->view('marketplace/templates_marketplace/footer');
    }

    public function cart()
    {
        $data['title'] = 'Keranjang';
        $this->load->view('marketplace/templates_marketplace/header', $data);
        $this->load->view('marketplace/cart');
        $this->load->view('marketplace/templates_marketplace/footer');
    }

    public function checkout()
    {
        $data['title'] = 'Pemesanan';
        $this->load->view('marketplace/templates_marketplace/header', $data);
        $this->load->view('marketplace/checkout');
        $this->load->view('marketplace/footer_checkout');
    }
}
