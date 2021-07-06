<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penjual extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function register()
    {
        $this->form_validation->set_rules('namatoko', 'namatoko', 'required|trim');
        $this->form_validation->set_rules('alamattoko', 'alamattoko', 'required|trim');
        $this->form_validation->set_rules('notlp', 'notlp', 'required|trim');
	if ($this->form_validation->run() == false) {
		$data['title'] = 'Register Mitra Penjual';
       		$this->load->view('adminpenjual/register', $data);
	}else{
            $data = [
                'namatoko' => htmlspecialchars($this->input->post('namatoko', true)),
                'alamat' => htmlspecialchars($this->input->post('alamattoko', true)),
                'notlp' => htmlspecialchars($this->input->post('notlp', true)),
            ];
            echo "penjual";
            $this->db->insert('register', $data);
            $this->load->view('adminpenjual/register', $data);
	}
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
            $this->m_hewan->tambah_hewan($data, 'tb_hewan');
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
	public function upload()
    {

        $gambar    = $_FILES['foto_bukti']['name'];
        
            $config['upload_path'] = './uploads/barang';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal di upload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        
        
        $data  = array(
            'gambar'   => $gambar,
            
            
        );
        $this->db->insert('transaksi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Product Added!</div>');
        redirect('penjual/detail_pesanan');
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
        $path = './foto_hewan/' . $detail->foto_hewan;
        unlink($path);

        $this->m_hewan->hapus_data('tb_hewan', array('id_hewan' => $id));
        redirect('penjual/inputhewan');
    }
}
