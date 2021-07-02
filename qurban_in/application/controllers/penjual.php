<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penjual extends CI_Controller
{
    public function register()
    {
        $data['title'] = 'Register Mitra Penjual';
        $this->load->view('adminpenjual/register', $data);
    }

    public function inputhewan()
    {
        $data['title'] = 'Data Hewan';
        $this->load->view('adminpenjual/templates_adminpenjual/header', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/sidebar', $data);
        $this->load->view('adminpenjual/inputhewan');
        $this->load->view('adminpenjual/templates_adminpenjual/footer');
    }

    public function detailhewan()
    {
        $data['title'] = 'Data Hewan';
        $this->load->view('adminpenjual/templates_adminpenjual/header', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/sidebar', $data);
        $this->load->view('adminpenjual/detail');
        $this->load->view('adminpenjual/templates_adminpenjual/footer');
    }

    public function datapesanan()
    {
        $data['title'] = 'Pesanan';
        $this->load->view('adminpenjual/templates_adminpenjual/header', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/sidebar', $data);
        $this->load->view('adminpenjual/pesanan_adminpenjual');
        $this->load->view('adminpenjual/templates_adminpenjual/footer');
    }

    public function detail_pesanan()
    {
        $data['title'] = 'Pesanan';
        $this->load->view('adminpenjual/templates_adminpenjual/header', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/sidebar', $data);
        $this->load->view('adminpenjual/detail_pesanan');
        $this->load->view('adminpenjual/templates_adminpenjual/footer');
    }
}
