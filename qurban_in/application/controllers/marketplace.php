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

    public function search()
    {
        $this->load->library('session');
        $keyword = $this->input->post('key');
        $data['title'] = 'Home';
        $data['tampil_hewan'] = $this->marketplace_model->search($keyword)->result();
        $this->load->view('marketplace/templates_marketplace/header', $data);
        $this->load->view('marketplace/index', $data);
        $this->load->view('marketplace/templates_marketplace/footer');
    }

    public function filter_harga()
    {
        // $this->load->library('session');
        $data['title'] = 'Home';
        $dari = $this->input->get('from');
        $sampai = $this->input->get('until');
        $data['tampil_hewan'] = $this->marketplace_model->filter_hewan_harga($dari, $sampai)->result();
        $this->load->view('marketplace/templates_marketplace/header', $data);
        $this->load->view('marketplace/index', $data);
        $this->load->view('marketplace/templates_marketplace/footer');
    }

    public function filter_berat()
    {
        // $this->load->library('session');
        $data['title'] = 'Home';
        $dari = $this->input->get('from');
        $sampai = $this->input->get('until');
        $data['tampil_hewan'] = $this->marketplace_model->filter_hewan_berat($dari, $sampai)->result();
        $this->load->view('marketplace/templates_marketplace/header', $data);
        $this->load->view('marketplace/index', $data);
        $this->load->view('marketplace/templates_marketplace/footer');
    }

    public function filter_harga_diatas()
    {
        // $this->load->library('session');
        $data['title'] = 'Home';
        $value = $this->input->get('val');
        $data['tampil_hewan'] = $this->marketplace_model->filter_hewan_harga_diatas($value)->result();
        $this->load->view('marketplace/templates_marketplace/header', $data);
        $this->load->view('marketplace/index', $data);
        $this->load->view('marketplace/templates_marketplace/footer');
    }

    public function filter_berat_diatas()
    {
        // $this->load->library('session');
        $data['title'] = 'Home';
        $value = $this->input->get('val');
        $data['tampil_hewan'] = $this->marketplace_model->filter_hewan_berat_diatas($value)->result();
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
        $this->load->view('marketplace/keranjang');
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
