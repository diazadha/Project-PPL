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
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register Mitra Penjual';
            $this->load->view('adminpenjual/register', $data);
        } else {
            $email = htmlspecialchars($this->input->post('email'));
            $data = [
                'nama_toko' => htmlspecialchars(ucwords($this->input->post('namatoko', true))),
                'alamat' => htmlspecialchars(ucwords($this->input->post('alamattoko', true))),
                'kota' => htmlspecialchars(ucwords($this->input->post('kota', true))),
                'provinsi' => htmlspecialchars(ucwords($this->input->post('provinsi', true))),
                'notelp' => htmlspecialchars($this->input->post('notlp', true)),
                'is_active' => 0
            ];
            //token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()

            ];

            $this->db->insert('toko', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', 'Mitra Toko Sudah Berhasil Dibuat, Silahkan Cek Email Untuk Melakukan Aktivasi!');
            redirect('penjual/register');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'qurban.in24@gmail.com',
            'smtp_pass' => 'Qurbanin2403',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('qurban.in24@gmail.com', 'Qurban.In');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Partner Verification');
            $this->email->message('Click this link to join as a partner : <a href="' . base_url() . 'penjual/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $toko = $this->m_hewan->max_id_toko()->row();
        $id_toko = $toko->id_toko;
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->db->set('id_toko', $id_toko);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    redirect('penjual/inputhewan');
                } else {
                    $this->db->delete('toko', ['id_toko' => $id_toko]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message1', 'Expired!');
                    redirect('penjual/register');
                }
            } else {
                $this->session->set_flashdata('message1', 'Token tidak valid');
                redirect('penjual/register');
            }
        } else {
            $this->session->set_flashdata('message1', 'Email tidak valid');
            redirect('penjual/register');
        }
    }


    public function inputhewan()
    {
        $data['title'] = 'Data Hewan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['toko'] = $this->m_hewan->getalldata()->result();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['profil'] = $this->db->get_where('toko', ['id_toko' => $data['user']['id_toko']])->row_array();
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
        $kategori                = $this->input->post('kategori');
        $foto_hewan          = $_FILES['foto_hewan']['name'];
        $deskripsi           = $this->input->post('deskripsi');
        $jenis            = $this->input->post('jenis');
        $nomor_hewan              = $this->input->post('nomor_hewan');
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
                'id_kategori'    => $kategori,
                'foto_hewan'     => $foto_hewan,
                'deskripsi'      => $deskripsi,
                'jenis'          => $jenis,
                'kode_hewan'     => $nomor_hewan,
                'id_toko'        => $this->input->post('id_toko'),
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
        $kategori            = $this->input->post('kategori');
        $jenis       = $this->input->post('jenis');
        $deskripsi       = $this->input->post('deskripsi');
        $kode_hewan           = $this->input->post('kode_hewan');
        $data = array(
            'nama_hewan'     => $nama_hewan,
            'harga'          => $harga,
            'berat'          => $berat,
            'id_kategori'           => $kategori,
            'jenis'       => $jenis,
            'deskripsi'      => $deskripsi,
            'kode_hewan'          => $kode_hewan,
            'id_toko'       => $this->input->post('id_toko')
        );
        $this->db->where('id_hewan', $id);
        $this->db->update('tb_hewan', $data);
        $this->session->set_flashdata('message1', 'Data Hewan Berhasil Dirubah!');
        redirect('penjual/detailhewan/' . $id . '/' . $kategori);
    }

    public function update_foto()
    {
        $id               = $this->input->post('id_hewan');
        $id_kategori = $this->input->post('id_kategori');
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
            $this->db->where('id_hewan', $id);
            $this->db->update('tb_hewan', $data);
            $this->session->set_flashdata('message1', 'Foto Hewan Berhasil Dirubah!');
            redirect('penjual/detailhewan/' . $id . '/' . $id_kategori);
        }
    }

    public function detailhewan($id_hewan, $id_kategori)
    {
        $data['title'] = 'Data Hewan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['hewan'] = $this->m_hewan->data_hewan($id_hewan)->row_array();
        $data['kategori'] = $this->m_hewan->get_kategori_bydetail($id_kategori)->result_array();
        $data['profil'] = $this->db->get_where('toko', ['id_toko' => $data['user']['id_toko']])->row_array();

        $this->load->view('adminpenjual/templates_adminpenjual/header', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/sidebar', $data);
        $this->load->view('adminpenjual/detail', $data);
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
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['profil'] = $this->db->get_where('toko', ['id_toko' => $data['user']['id_toko']])->row_array();
        $data['invoice'] = $this->detailtoko_model->invoice($data['user']['id_toko'])->result_array();

        $this->load->view('adminpenjual/templates_adminpenjual/header', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/sidebar', $data);
        $this->load->view('adminpenjual/pesanan_adminpenjual', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/footer');
    }

    public function detail_pesanan($id_invoice)
    {
        $data['title'] = 'Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['profil'] = $this->db->get_where('toko', ['id_toko' => $data['user']['id_toko']])->row_array();
        $data['pemesan'] = $this->detailtoko_model->get_pemesan($id_invoice)->row_array();
        $data['distribusi'] = $this->detailtoko_model->get_distribusi($id_invoice)->row_array();
        $data['tampil_pesanan'] = $this->detailtoko_model->data_pesanan_hewan($id_invoice, $data['user']['id_toko'])->result_array();
        $data['cek_bayar'] = $this->detailtoko_model->cek_status_bayar($id_invoice)->row_array();
        $data['cek_foto'] = $this->detailtoko_model->cek_foto($id_invoice)->row_array();
        $data['status_pesanan'] = $this->detailtoko_model->cek_proses_pesanan($id_invoice, $data['user']['id_toko'])->row_array();
        $data['cek_row'] = $this->detailtoko_model->data_pesanan($id_invoice)->result_array();
        $data['id_invoice'] = $id_invoice;

        $this->load->view('adminpenjual/templates_adminpenjual/header', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/sidebar', $data);
        $this->load->view('adminpenjual/detail_pesanan');
        $this->load->view('adminpenjual/templates_adminpenjual/footer');
    }

    public function update_proses_pesanan()
    {
        $proses_pesanan       = $this->input->post('proses_pesanan');
        $id_invoice           = $this->input->post('id_invoice');
        $id_toko           = $this->input->post('id_toko');

        $this->db->set('status_pesanan', $proses_pesanan);
        $this->db->where('id_invoice', $id_invoice);
        $this->db->where('id_toko', $id_toko);
        $this->db->update('status_transaksi');
        redirect('penjual/detail_pesanan/' . $id_invoice);
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

    public function biodata_toko()
    {
        $data['title'] = 'Biodata Toko';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['profil'] = $this->db->get_where('toko', ['id_toko' => $data['user']['id_toko']])->row_array();

        $this->load->view('adminpenjual/templates_adminpenjual/header', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/sidebar', $data);
        $this->load->view('adminpenjual/biodata_toko', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/footer');
    }

    public function update_toko()
    {
        $id              = $this->input->post('id_toko');
        $nama            = $this->input->post('nama_toko');
        $alamat          = $this->input->post('alamat');
        $kota            = $this->input->post('kota');
        $provinsi        = $this->input->post('provinsi');
        $notlp           = $this->input->post('notlp');
        $data = array(
            'nama_toko'    => $nama,
            'alamat'       => $alamat,
            'kota'         => $kota,
            'provinsi'     => $provinsi,
            'notelp'       => $notlp
        );

        $this->db->where('id_toko', $id);
        $this->db->update('toko', $data);
        $this->session->set_flashdata('message1', 'Data Biodata Toko Berhasil Dirubah!');
        redirect('penjual/biodata_toko');
    }

    public function update_foto_toko()
    {
        $id_toko            = $this->input->post('id_toko');
        $foto_toko          = $_FILES['foto_toko']['name'];
        if ($foto_toko = '') {
        } else {
            $config['upload_path']       = './uploads/toko';
            $config['allowed_types']     = 'jpg|jpeg|png|gif';
            $config['maintain_ratio']    = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_toko')) {
                echo "Gambar gagal diupload !";
            } else {
                $foto_toko = $this->upload->data('file_name');
            }
            $data = array(
                'foto_toko' => $foto_toko
            );
            $this->db->where('id_toko', $id_toko);
            $this->db->update('toko', $data);
            $this->session->set_flashdata('message1', 'Foto toko Berhasil Dirubah!');
            redirect('penjual/biodata_toko');
        }
    }

    public function upload_dokumen()
    {
        $data['title'] = 'Upload Dokumen';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['profil'] = $this->db->get_where('toko', ['id_toko' => $data['user']['id_toko']])->row_array();

        $this->load->view('adminpenjual/templates_adminpenjual/header', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/sidebar', $data);
        $this->load->view('adminpenjual/upload_dokumen', $data);
        $this->load->view('adminpenjual/templates_adminpenjual/footer');
    }


    public function update_foto_kandang()
    {
        $id_tempat            = $this->input->post('id_tempat');
        $foto_kandang          = $_FILES['foto_kandang']['name'];
        if ($foto_kandang = '') {
        } else {
            $config['upload_path']       = './uploads/dokumen_toko';
            $config['allowed_types']     = 'jpg|jpeg|png|gif';
            $config['maintain_ratio']    = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_kandang')) {
                echo "Gambar gagal diupload !";
            } else {
                $foto_kandang = $this->upload->data('file_name');
            }
            $data = array(
                'foto_kandang' => $foto_kandang,
            );
            $this->db->where('id_toko', $id_tempat);
            $this->db->update('toko', $data);
            $this->session->set_flashdata('message1', 'Foto Berhasil Diupload!');
            redirect('penjual/upload_dokumen');
        }
    }

    public function update_foto_ktp()
    {
        $id_tempat           = $this->input->post('id_tempat');
        $foto_ktp          = $_FILES['foto_ktp']['name'];
        if ($foto_ktp = '') {
        } else {
            $config['upload_path']       = './uploads/ktp';
            $config['allowed_types']     = 'jpg|jpeg|png|gif';
            $config['maintain_ratio']    = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_ktp')) {
                echo "Gambar gagal diupload !";
            } else {
                $foto_ktp = $this->upload->data('file_name');
            }
            $data = array(
                'foto_ktp' => $foto_ktp,
            );

            $this->db->where('id_toko', $id_tempat);
            $this->db->update('toko', $data);
            $this->session->set_flashdata('message1', 'Foto Berhasil Diupload!');
            redirect('penjual/upload_dokumen');
        }
    }
    public function update_foto_orang_ktp()
    {
        $id_tempat            = $this->input->post('id_tempat');
        $foto_orangktp        = $_FILES['foto_orangktp']['name'];
        if ($foto_orangktp = '') {
        } else {
            $config['upload_path']       = './uploads/ktp_wajah';
            $config['allowed_types']     = 'jpg|jpeg|png|gif';
            $config['maintain_ratio']    = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_orangktp')) {
                echo "Gambar gagal diupload !";
            } else {
                $foto_orangktp = $this->upload->data('file_name');
            }
            $data = array(
                'foto_orangktp' => $foto_orangktp,
            );

            $this->db->where('id_toko', $id_tempat);
            $this->db->update('toko', $data);
            $this->session->set_flashdata('message1', 'Foto Berhasil Diupload!');
            redirect('penjual/upload_dokumen');
        }
    }
}
