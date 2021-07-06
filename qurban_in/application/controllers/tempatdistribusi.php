<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tempatdistribusi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->session->keep_flashdata('message');
    }
    public function register()
    {
        $this->form_validation->set_rules('nama_tempat', 'Mosque Name', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Address', 'required|trim');
        $this->form_validation->set_rules('tlp', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register Tempat Distribusi';
            $this->load->view('adminmasjid/register', $data);
        } else {
            $email = htmlspecialchars($this->input->post('email'));
            $data = [
                'nama_tempat' => htmlspecialchars($this->input->post('nama_tempat', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'notelp' => htmlspecialchars($this->input->post('tlp', true)),
                'is_active' => 0
            ];

            //token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()

            ];

            $this->db->insert('mitra_distribusi', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', 'Mitra Distribusi Sudah Berhasil Dibuat, Silahkan Cek Email Untuk Melakukan Aktivasi!');
            redirect('tempatdistribusi/register');
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
            $this->email->message('Click this link to join as a partner : <a href="' . base_url() . 'tempatdistribusi/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
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

        $tempat = $this->tempatdistribusi_model->max_id_distribusi()->row();
        $id_tempatdistribusi = $tempat->id_tempatdistribusi;
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('id_tempatdistribusi', $id_tempatdistribusi);
                    $this->db->update('mitra_distribusi');
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->db->set('id_tempatdistribusi', $id_tempatdistribusi);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated!</div');
                    redirect('tempatdistribusi/inputhewan');
                } else {
                    $this->db->delete('mitra_distribusi', ['id_tempatdistribusi' => $id_tempatdistribusi]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message1', 'Expired!');
                    redirect('tempatdistribusi/register');
                }
            } else {
                $this->session->set_flashdata('message1', 'Token tidak valid');
                redirect('tempatdistribusi/register');
            }
        } else {
            $this->session->set_flashdata('message1', 'Email tidak valid');
            redirect('tempatdistribusi/register');
        }
    }

    public function inputhewan()
    {
        $data['title'] = 'Data Hewan';
        $this->load->model('tempatdistribusi_model');
        $data['status'] = $this->tempatdistribusi_model->statushewan();
        $data['distribusi'] = $this->tempatdistribusi_model->getalldata()->result();

        $this->load->view('adminmasjid/templates_adminmasjid/header', $data);
        $this->load->view('adminmasjid/templates_adminmasjid/sidebar', $data);
        $this->load->view('adminmasjid/inputhewan', $data);
        $this->load->view('adminmasjid/templates_adminmasjid/footer');
    }

    public function tambahhewan()
    {

        $this->form_validation->set_rules('nama_hewan', 'Data', 'required');
        $this->form_validation->set_rules('status', 'Data', 'required');
        $data = [
            'nama_hewan' => htmlspecialchars($this->input->post('nama_hewan', true)),
            'id_status' => htmlspecialchars($this->input->post('status', true)),
            'id_tempatdistribusi' => htmlspecialchars($this->input->post('id_tempatdistribusi', true)),
        ];
        $this->db->insert('hewan_tempatdistribusi', $data);
        redirect('tempatdistribusi/inputhewan');
    }

    public function updatehewan($id_hewan)
    {

        $this->form_validation->set_rules('nama_hewan', 'Data', 'required');
        $this->form_validation->set_rules('status', 'Data', 'required');
        $data = [
            'nama_hewan' => htmlspecialchars($this->input->post('nama_hewan', true)),
            'id_status' => htmlspecialchars($this->input->post('status', true)),
            'id_tempatdistribusi' => htmlspecialchars($this->input->post('id_tempatdistribusi', true)),
        ];
        $this->db->where('id_hewan', $id_hewan);
        $this->db->update('hewan_tempatdistribusi', $data);
        redirect('tempatdistribusi/inputhewan');
    }
}
