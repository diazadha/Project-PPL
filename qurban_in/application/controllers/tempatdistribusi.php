<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tempatdistribusi extends CI_Controller
{
    public function register()
    {
        $data['title'] = 'Register Tempat Distribusi';
        $this->load->view('adminmasjid/register', $data);
    }

    public function inputhewan()
    {
        $data['title'] = 'Data Hewan';
        $this->load->view('adminmasjid/templates_adminmasjid/header', $data);
        $this->load->view('adminmasjid/templates_adminmasjid/sidebar', $data);
        $this->load->view('adminmasjid/inputhewan');
        $this->load->view('adminmasjid/templates_adminmasjid/footer');
    }
}
