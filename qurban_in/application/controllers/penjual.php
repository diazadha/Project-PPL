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
        // $data['hewan'] = $this->m_hewan->tampil_data();
        $data['hewan1'] = $this->db->get('tb_hewan')->result();
        $this->load->view('adminpenjual/templates_adminpenjual/header', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/sidebar', $data);
        $this->load->view('adminpenjual/inputhewan', $data);
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
        $jenis            = $this->input->post('jenis');
        $kelas               = $this->input->post('kelas');
        if ($foto_hewan = '') {
        } else {
            $config['upload_path']       = './uploads/hewan';
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
                'jenis'       => $jenis,
                'kelas'          => $kelas,
                'id_toko'        => 0
            );
            $this->m_hewan->tambah_hewan($data, 'tb_hewan');
            $this->session->set_flashdata('message1', 'Data Hewan Berhasil Ditambahkan!');
            redirect('penjual/inputhewan');
        }
    }


    public function update()
    {
        $id               = $this->input->post('id_hewan');
        $nama_hewan      = $this->input->post('nama_hewan');
        $harga           = $this->input->post('harga');
        $berat           = $this->input->post('berat');
        $stok            = $this->input->post('stok');
        $jenis       = $this->input->post('jenis');
        $deskripsi       = $this->input->post('deskripsi');
        $kelas           = $this->input->post('kelas');
        $data = array(
            'nama_hewan'     => $nama_hewan,
            'harga'          => $harga,
            'berat'          => $berat,
            'stok'           => $stok,
            'jenis'       => $jenis,
            'deskripsi'      => $deskripsi,
            'kelas'          => $kelas,
            'id_toko'       => 0
        );

        // $where = array('id_hewan' => $id);
        $this->db->where('id_hewan', $id);
        $this->db->update('tb_hewan', $data);
        // $this->m_hewan->update_data($where, $data, 'tb_hewan');
        $this->session->set_flashdata('message1', 'Data Hewan Berhasil Dirubah!');
        redirect('penjual/inputhewan');
    }

    public function update_foto()
    {
        $id               = $this->input->post('id_hewan');
        $foto_hewan          = $_FILES['foto_hewan']['name'];
        if ($foto_hewan = '') {
        } else {
            $config['upload_path']       = './uploads/hewan';
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
                'foto_hewan' => $foto_hewan
            );

            // $where = array('id_hewan' => $id);
            $this->db->where('id_hewan', $id);
            $this->db->update('tb_hewan', $data);
            // $this->m_hewan->update_data($where, $data, 'tb_hewan');
            $this->session->set_flashdata('message1', 'Foto Hewan Berhasil Dirubah!');
            redirect('penjual/inputhewan');
        }
    }

    public function detailhewan($id)
    {
        // $where = array('id_hewan' => $id);
        $data['title'] = 'Data Hewan';
        // $data['hewan'] = $this->m_hewan->detail_hewan($where, 'tb_hewan')->result();
        $data['hewan'] = $this->db->get_where('tb_hewan', ['id_hewan' => $id])->result();

        $this->load->view('adminpenjual/templates_adminpenjual/header', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/sidebar', $data);
        $this->load->view('adminpenjual/detail', $data);
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
        $path = './uploads/hewan' . $detail->foto_hewan;
        unlink($path);

        $this->m_hewan->hapus_data('tb_hewan', array('id_hewan' => $id));
        redirect('penjual/inputhewan');
    }
}
