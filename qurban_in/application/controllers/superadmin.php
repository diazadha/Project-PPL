<?php
defined('BASEPATH') or exit('No direct script access allowed');

class superadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->session->keep_flashdata('message');
    }

    public function index()
    {
        $data['superadmin'] = $this->db->get_where('super_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['superadmin']) {
            $data['title'] = 'Kategori';
            $data['kategori'] = $this->db->get('kategori')->result_array();
            $this->load->view('superadmin/templates_superadmin/header', $data);
            $this->load->view('superadmin/templates_superadmin/sidebar', $data);
            $this->load->view('superadmin/kategori', $data);
            $this->load->view('superadmin/templates_superadmin/footer');
        } else {
            redirect('superadmin/login');
        }
    }

    public function data_toko()
    {
        $data['superadmin'] = $this->db->get_where('super_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['superadmin']) {
            $data['title'] = 'Data Toko';
            $data['toko'] = $this->db->get('toko')->result_array();
            $this->load->view('superadmin/templates_superadmin/header', $data);
            $this->load->view('superadmin/templates_superadmin/sidebar', $data);
            $this->load->view('superadmin/data_toko', $data);
            $this->load->view('superadmin/templates_superadmin/footer');
        } else {
            redirect('superadmin/login');
        }
    }

    public function verifikasi_toko($id_toko)
    {
        $data['superadmin'] = $this->db->get_where('super_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['superadmin']) {
            $data['title'] = 'Data Toko';
            $data['profil'] = $this->superadmin_model->verifikasi_toko($id_toko)->row_array();
            $this->load->view('superadmin/templates_superadmin/header', $data);
            $this->load->view('superadmin/templates_superadmin/sidebar', $data);
            $this->load->view('superadmin/verifikasi_toko', $data);
            $this->load->view('superadmin/templates_superadmin/footer');
        } else {
            redirect('superadmin/login');
        }
    }

    public function update_verifikasi_toko()
    {
        $id_toko = $this->input->post('id_toko');
        $aktif = $this->input->post('aktif');

        $this->db->set('is_active', $aktif);
        $this->db->where('id_toko', $id_toko);
        $this->db->update('toko');
        redirect('superadmin/verifikasi_toko/' . $id_toko);
    }

    public function data_tempat_distribusi()
    {
        $data['superadmin'] = $this->db->get_where('super_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['superadmin']) {
            $data['title'] = 'Data Tempat Distribusi';
            $data['distribusi'] = $this->db->get('mitra_distribusi')->result_array();
            $this->load->view('superadmin/templates_superadmin/header', $data);
            $this->load->view('superadmin/templates_superadmin/sidebar', $data);
            $this->load->view('superadmin/data_tempat_distribusi', $data);
            $this->load->view('superadmin/templates_superadmin/footer');
        } else {
            redirect('superadmin/login');
        }
    }

    public function verifikasi_tempat_distribusi($id_distribusi)
    {
        $data['superadmin'] = $this->db->get_where('super_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['superadmin']) {
            $data['title'] = 'Data Tempat Distribusi';
            $data['profil'] = $this->superadmin_model->verifikasi_tempat_distribusi($id_distribusi)->row_array();
            $this->load->view('superadmin/templates_superadmin/header', $data);
            $this->load->view('superadmin/templates_superadmin/sidebar', $data);
            $this->load->view('superadmin/verifikasi_tempat_distribusi', $data);
            $this->load->view('superadmin/templates_superadmin/footer');
        } else {
            redirect('superadmin/login');
        }
    }

    public function update_verifikasi_tempat_distribusi()
    {
        $id_distribusi = $this->input->post('id_distribusi');
        $aktif = $this->input->post('aktif');

        $this->db->set('is_active', $aktif);
        $this->db->where('id_tempatdistribusi', $id_distribusi);
        $this->db->update('mitra_distribusi');
        redirect('superadmin/verifikasi_tempat_distribusi/' . $id_distribusi);
    }

    public function datapesanan()
    {
        $data['superadmin'] = $this->db->get_where('super_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['superadmin']) {
            $data['title'] = 'Data Pesanan';
            $data['invoice'] = $this->db->get('invoice')->result_array();
            $this->load->view('superadmin/templates_superadmin/header', $data);
            $this->load->view('superadmin/templates_superadmin/sidebar', $data);
            $this->load->view('superadmin/datapesanan', $data);
            $this->load->view('superadmin/templates_superadmin/footer');
        } else {
            redirect('superadmin/login');
        }
    }

    public function detail_pesanan($id_invoice)
    {
        $data['superadmin'] = $this->db->get_where('super_admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['superadmin']) {
            $data['title'] = 'Data Pesanan';
            $data['tampil_pesanan'] = $this->superadmin_model->data_pesanan_hewan($id_invoice)->result_array();
            $data['pemesan'] = $this->superadmin_model->get_pemesan($id_invoice)->row_array();
            $data['distribusi'] = $this->superadmin_model->get_distribusi($id_invoice)->row_array();
            $data['cek_row'] = $this->superadmin_model->data_pesanan($id_invoice)->result_array();
            $data['cek_foto'] = $this->superadmin_model->cek_foto($id_invoice)->row_array();
            $data['cek_bayar'] = $this->superadmin_model->cek_status_bayar($id_invoice)->row_array();
            $data['id_invoice'] = $id_invoice;

            if (count($data['cek_row']) == 1) {
                $this->load->view('superadmin/templates_superadmin/header', $data);
                $this->load->view('superadmin/templates_superadmin/sidebar', $data);
                $this->load->view('superadmin/detail_pesanan', $data);
                $this->load->view('superadmin/templates_superadmin/footer');
            } else {
                $this->load->view('superadmin/templates_superadmin/header', $data);
                $this->load->view('superadmin/templates_superadmin/sidebar', $data);
                $this->load->view('superadmin/detail_pesanan_more1store', $data);
                $this->load->view('superadmin/templates_superadmin/footer');
            }
        } else {
            redirect('superadmin/login');
        }
    }

    public function update_status_bayar()
    {
        $status_bayar       = $this->input->post('status_bayar');
        $id_invoice           = $this->input->post('id_invoice');

        $this->db->set('status_bayar', $status_bayar);
        $this->db->where('id_invoice', $id_invoice);
        $this->db->update('status_transaksi');
        redirect('superadmin/detail_pesanan/' . $id_invoice);
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('superadmin/login', $data);
        } else {
            $this->_gologin();
        }
    }

    private function _gologin()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $superadmin = $this->db->get_where('super_admin', ['email' => $email])->row_array();
        if ($superadmin) {
            if (password_verify($pass, $superadmin['password'])) {
                $data = [
                    'email' => $superadmin['email'],
                    'namadepan' => $superadmin['nama_depan']
                ];
                $this->session->set_userdata($data);
                redirect('superadmin');
            } else {
                $this->session->set_flashdata('message1', 'Wrong Password!');
                redirect('superadmin/login');
            }
        } else {
            $this->session->set_flashdata('message1', 'Akun belum terdaftar, Silahkan melakukan pendaftaran!');
            redirect('superadmin/login');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('namadepan', 'Name', 'required|trim');
        $this->form_validation->set_rules('namabelakang', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[super_admin.email]', [
            'is_unique' => 'Email sudah pernah digunakan!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password telalu pendek minimal 6 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration Page';
            $this->load->view('superadmin/register', $data);
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'nama_depan' => htmlspecialchars(ucwords($this->input->post('namadepan', true))),
                'nama_belakang' => htmlspecialchars(ucwords($this->input->post('namabelakang', true))),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'image' => 'default.jpg',
                'date_created' => date('Y-m-d H:i:s'),
            ];

            $this->db->insert('super_admin', $data);

            $this->session->set_flashdata('message', 'Akun Sudah Berhasil Dibuat, Silahkan Login!');
            redirect('superadmin/login');
        }
    }

    public function tambahkategori()
    {

        $this->form_validation->set_rules('kategori', 'Data', 'required');
        $data = [
            'kategori' => htmlspecialchars($this->input->post('kategori', true)),
        ];
        $this->session->set_flashdata('message1', 'Kategori Berhasil Ditambahkan!');
        $this->db->insert('kategori', $data);
        redirect('superadmin');
    }

    public function delete_kategori($id_kategori)
    {

        $this->form_validation->set_rules('kategori', 'Data', 'required');
        $this->db->delete('kategori', ['id_kategori' => $id_kategori]);
        $this->session->set_flashdata('message1', 'Kategori Berhasil Dihapus!');
        redirect('superadmin');
    }

    public function updatekategori()
    {

        $this->form_validation->set_rules('kategori', 'Data', 'required');
        $this->db->set('kategori', $this->input->post('kategori'));
        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        $this->db->update('kategori');
        $this->session->set_flashdata('message1', 'Kategori Berhasil Dirubah!');
        redirect('superadmin');
    }

    public function getubah()
    {
        $id_kategori = $_POST['id_kategori'];
        echo json_encode($this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array());
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('namadepan');
        redirect('superadmin');
    }
}
