<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tempatdistribusi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function register()
    {
        $this->form_validation->set_rules('nama_masjid', 'Mosque Name', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Address', 'required|trim');
        $this->form_validation->set_rules('tlp', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('nama_admin', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register Tempat Distribusi';
            $this->load->view('adminmasjid/register', $data);
        } else {
            $email = htmlspecialchars($this->input->post('email'));
            $data = [
                'nama_masjid' => htmlspecialchars($this->input->post('nama_masjid', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'tlp' => htmlspecialchars($this->input->post('tlp', true)),
                'nama_admin' => htmlspecialchars($this->input->post('nama_admin', true)),
                'email' => $email,
                'role_id' => 1,
                'is_active' => 0
            ];

            //token
            $token = base64_encode(random_bytes(32));
            $toko_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()

            ];

            $this->db->insert('register', $data);
            $this->db->insert('toko_token', $toko_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Congratulation! your account has been created. Please activate your account</div');
            redirect('marketplace');
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
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'tempatdistribusi/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
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

        $toko = $this->db->get_where('register', ['email' => $email])->row_array();

        if ($toko) {
            $toko_token = $this->db->get_where('toko_token', ['token' => $token])->row_array();

            if ($toko_token) {
                if (time() - $toko_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('register');

                    $this->db->delete('toko_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated!</div');
                    redirect('tempatdistribusi/inputhewan');
                } else {
                    $this->db->delete('toko', ['email' => $email]);
                    $this->db->delete('toko_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email. </div');
                    redirect('tempatdistribusi/register');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email. </div');
            redirect('tempatdistribusi/register');
        }
    }

    public function inputhewan()
    {
        $data['title'] = 'Data Hewan';
		$this->load->model('tempatdistribusi_model');
        $data['status'] = $this->tempatdistribusi_model->statushewan();
        $data['hewan'] = $this->tempatdistribusi_model->datahewan()->result();

        $this->load->view('adminmasjid/templates_adminmasjid/header', $data);
        $this->load->view('adminmasjid/templates_adminmasjid/sidebar', $data);
        $this->load->view('adminmasjid/inputhewan');
        $this->load->view('adminmasjid/templates_adminmasjid/footer');
    }

	 public function tambahhewan(){

        $this->form_validation->set_rules('nama_barang', 'Data', 'required');  
        $this->form_validation->set_rules('status', 'Data', 'required');  
        $data = [
            'namahewan' => htmlspecialchars($this->input->post('nama_barang', true)),
            'statusid' => htmlspecialchars($this->input->post('status', true)),
        ];
        echo "tempatdistribusi";
        $this->db->insert('hewan', $data);
        $this->load->view('adminmasjid/inputhewan', $data);
        redirect('tempatdistribusi/inputhewan');
    }
}
