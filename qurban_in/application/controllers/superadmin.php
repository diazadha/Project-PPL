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
        // $this->form_validation->set_rules('nohp', 'Name', 'required|trim');
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
        // $this->session->set_flashdata('message', 'Logout Berhasil');
        redirect('superadmin');
    }
}
