<?php
defined('BASEPATH') or exit('No direct script access allowed');

class marketplace extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');
        $data['title'] = 'Home';
        $this->load->view('marketplace/templates_marketplace/header', $data);
        $this->load->view('marketplace/index');
        $this->load->view('marketplace/templates_marketplace/footer');
    }

    public function detail_produk()
    {
        $data['title'] = 'Home';
        $this->load->view('marketplace/templates_marketplace/header', $data);
        $this->load->view('marketplace/detailproduk');
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
