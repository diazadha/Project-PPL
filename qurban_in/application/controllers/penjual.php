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
        $data['hewan'] = $this->m_hewan->tampil_data();
        $this->load->view('adminpenjual/templates_adminpenjual/header', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/sidebar', $data);
        $this->load->view('adminpenjual/inputhewan');
        $this->load->view('adminpenjual/templates_adminpenjual/footer');
    }

    public function tambah_hewan()
    {
        $nama_hewan          = $this->input->post('nama_hewan');
        $harga               = $this->input->post('harga');
        $berat               = $this->input->post('berat');
        $stok                = $this->input->post('stok');
        $foto_hewan          = $_FILES['foto_hewan']['name'];
        $deskripsi           = $this->input->post('deskripsi');
        $kategori            = $this->input->post('kategori');
        $kelas               = $this->input->post('kelas');
        if ($foto_hewan = '') {
        } else {
            $config['upload_path']       = './foto_hewan';
            $config['allowed_types']     = 'jpg|jpeg|png|gif';
            $config['maintain_ratio']    = TRUE;

            $this->load->library('image_lib', $config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_hewan')) {
                echo "Gambar gagal diupload !";
            } else {
                $foto_hewan = $this->upload->data('file_name');
            }
            $data = array(
            'nama_hewan'     => $nama_hewan, 
            'harga'          => $harga,
            'berat'          => $berat,
            'stok'           => $stok,
            'foto_hewan'     => $foto_hewan,
            'deskripsi'      => $deskripsi,
            'kategori'       => $kategori,
            'kelas'          => $kelas
        );
        $this->m_hewan->tambah_hewan($data,'tb_hewan');
        redirect('penjual/inputhewan');
        }
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
    
    public function hapus($id)
    {
        $this->load->model('m_hewan');
         $detail = $this->m_hewan->dapat_data($id);
            $path = './foto_hewan/'.$detail->foto_hewan;
            unlink($path); 

            $this->m_hewan->hapus_data('tb_hewan',array('id_hewan'=>$id));
            redirect('penjual/inputhewan');
    } 
}
