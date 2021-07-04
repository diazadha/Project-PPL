<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_akun extends CI_Controller
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
        $data['title'] = 'Akun Saya';
        $this->load->view('marketplace/templates_marketplace/header', $data);
        $this->load->view('user_akun/index');
        $this->load->view('marketplace/templates_marketplace/footer');
    }
    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('user_akun/login');
            $this->load->view('marketplace/templates_marketplace/footer');
        } else {
            $this->_gologin();
        }
    }

    private function _gologin()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($pass, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'namadepan' => $user['nama_depan']
                    ];
                    $this->session->set_userdata($data);
                    redirect('marketplace');
                } else {
                    $this->session->set_flashdata('message', 'Wrong Password!');
                    redirect('user_akun/login');
                }
            } else {
                $this->session->set_flashdata('message2', 'Akun Anda Belum Diaktivasi');
                redirect('user_akun/login');
            }
        } else {
            $this->session->set_flashdata('message', 'Akun belum terdaftar, Silahkan melakukan pendaftaran!');
            redirect('user_akun/login');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('namadepan', 'Name', 'required|trim');
        $this->form_validation->set_rules('namabelakang', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah pernah digunakan!'
        ]);
        // $this->form_validation->set_rules('nohp', 'Name', 'required|trim');
        $this->form_validation->set_rules('nohp', 'Mobile Number ', 'required'); //{10} for 10 digits number
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password telalu pendek minimal 6 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration Page';
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('user_akun/register');
            $this->load->view('marketplace/templates_marketplace/footer');
        } else {
            $data = [
                'nama_depan' => htmlspecialchars($this->input->post('namadepan', true)),
                'nama_belakang' => htmlspecialchars($this->input->post('namabelakang', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'nohp' => htmlspecialchars($this->input->post('nohp', true)),
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'image' => 'default.jpg',
                'date_created' => time(),
                'is_active' => 0,
                'id_toko' => 0,
                'id_tempatdistribusi' => 0
            ];

            //Prepare for token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $this->input->post('email', true),
                'token' => $token,
                'date_created' => time()
            ];


            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message1', 'Akun Sudah Berhasil Dibuat, Silahkan Cek Email Untuk Melakukan Aktivasi Akun!');
            redirect('user_akun/login');
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
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Click this link to verfiy your account : <a href="' . base_url() . 'user_akun/verivikasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        }


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verivikasi()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message1', 'Akun Sudah Berhasil Diaktivasi, Silahkan Login!');
                    redirect('user_akun/login');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', 'Aktivasi Akun Gagal! Token Expired');
                    redirect('user_akun/login');
                }
            } else {
                $this->session->set_flashdata('message', 'Aktivasi Akun Gagal! Token salah');
                redirect('user_akun/login');
            }
        } else {
            $this->session->set_flashdata('message', 'Aktivasi Akun Gagal! Email yang digunakan salah');
            redirect('user_akun/login');
        }
    }

    public function detail()
    {
        $data['title'] = 'Detail Pesanan';
        $this->load->view('marketplace/templates_marketplace/header', $data);
        $this->load->view('user_akun/detailpesanan');
        $this->load->view('marketplace/templates_marketplace/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('namadepan');
        // $this->session->set_flashdata('message', 'Logout Berhasil');
        redirect('marketplace');
    }
}
