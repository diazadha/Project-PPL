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
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register Tempat Distribusi';
            $this->load->view('adminmasjid/register', $data);
        } else {
            $email = htmlspecialchars($this->input->post('email'));
            $data = [
                'nama_tempat' => htmlspecialchars(ucwords($this->input->post('nama_tempat', true))),
                'alamat' => htmlspecialchars(ucwords($this->input->post('alamat', true))),
                'notelp' => htmlspecialchars(ucwords($this->input->post('tlp', true))),
                'kota' => htmlspecialchars(ucwords($this->input->post('kota', true))),
                'provinsi' => htmlspecialchars(ucwords($this->input->post('provinsi', true))),
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
                    // $this->db->set('is_active', 1);
                    // $this->db->where('id_tempatdistribusi', $id_tempatdistribusi);
                    // $this->db->update('mitra_distribusi');
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
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['status'] = $this->tempatdistribusi_model->statushewan();
        $data['profil'] = $this->db->get_where('mitra_distribusi', ['id_tempatdistribusi' => $data['user']['id_tempatdistribusi']])->row_array();
        $data['distribusi'] = $this->tempatdistribusi_model->getalldata()->result();

        $this->load->view('adminmasjid/templates_adminmasjid/header', $data);
        $this->load->view('adminmasjid/templates_adminmasjid/sidebar', $data);
        $this->load->view('adminmasjid/inputhewan', $data);
        $this->load->view('adminmasjid/templates_adminmasjid/footer');
    }

    public function data_distribusi()
    {
        $data['title'] = 'Data Distribusi';
        $this->load->model('tempatdistribusi_model');
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // $data['status'] = $this->tempatdistribusi_model->statushewan();
        $data['profil'] = $this->db->get_where('mitra_distribusi', ['id_tempatdistribusi' => $data['user']['id_tempatdistribusi']])->row_array();
        // $data['distribusi'] = $this->tempatdistribusi_model->getalldata()->result();
        $data['invoice'] = $this->tempatdistribusi_model->invoice($data['user']['id_tempatdistribusi'])->result_array();

        $this->load->view('adminmasjid/templates_adminmasjid/header', $data);
        $this->load->view('adminmasjid/templates_adminmasjid/sidebar', $data);
        $this->load->view('adminmasjid/data_distribusi', $data);
        $this->load->view('adminmasjid/templates_adminmasjid/footer');
    }

    public function detail_pesanan($id_invoice)
    {
        $data['title'] = 'Data Distribusi';
        $this->load->model('tempatdistribusi_model');
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // $data['status'] = $this->tempatdistribusi_model->statushewan();
        $data['profil'] = $this->db->get_where('mitra_distribusi', ['id_tempatdistribusi' => $data['user']['id_tempatdistribusi']])->row_array();
        $data['tampil_pesanan'] = $this->tempatdistribusi_model->data_pesanan_hewan($id_invoice)->result_array();
        $data['pemesan'] = $this->tempatdistribusi_model->get_pemesan($id_invoice)->row_array();
        $data['distribusi'] = $this->tempatdistribusi_model->get_distribusi($id_invoice)->row_array();
        $data['cek_row'] = $this->tempatdistribusi_model->data_pesanan($id_invoice)->result_array();
        $data['cek_foto'] = $this->tempatdistribusi_model->cek_foto($id_invoice)->row_array();
        $data['cek_bayar'] = $this->tempatdistribusi_model->cek_status_bayar($id_invoice)->row_array();
        $data['id_invoice'] = $id_invoice;

        if (count($data['cek_row']) == 1) {
            // $data['id_toko'] = $data['cek_row']['id_toko'];
            $this->load->view('adminmasjid/templates_adminmasjid/header', $data);
            $this->load->view('adminmasjid/templates_adminmasjid/sidebar', $data);
            $this->load->view('adminmasjid/detail_pesanan', $data);
            $this->load->view('adminmasjid/templates_adminmasjid/footer');
        } else {
            // $data['id_toko'] = $data['cek_row']['id_toko'];
            $this->load->view('adminmasjid/templates_adminmasjid/header', $data);
            $this->load->view('adminmasjid/templates_adminmasjid/sidebar', $data);
            $this->load->view('adminmasjid/detailpesanan_more1store', $data);
            $this->load->view('adminmasjid/templates_adminmasjid/footer');
        }
    }

    public function update_foto_sampai()
    {
        $foto_bukti         = $_FILES['bukti_sampai']['name'];
        $id_invoice           = $this->input->post('id_invoice');
        $id_toko           = $this->input->post('id_toko_buktisampai');
        // var_dump($id_toko);
        // die;
        if ($foto_bukti = '') {
        } else {
            $config['upload_path']       = './uploads/bukti';
            $config['allowed_types']     = 'jpg|jpeg|png|gif';
            $config['maintain_ratio']    = TRUE;

            $this->load->library('image_lib', $config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti_sampai')) {
                echo "Gambar gagal diupload !";
            } else {
                $foto_bukti = $this->upload->data('file_name');
            }

            $this->db->set('foto_bukti_sampai', $foto_bukti);
            $this->db->where('id_invoice', $id_invoice);
            $this->db->where('id_toko', $id_toko);
            $this->db->update('status_transaksi');
            redirect('tempatdistribusi/detail_pesanan/' . $id_invoice);
        }
    }

    public function update_foto_sembelih()
    {
        $foto_bukti         = $_FILES['bukti_sampai']['name'];
        $id_invoice           = $this->input->post('id_invoice');
        $id_toko           = $this->input->post('id_toko_sembelih');
        // var_dump($id_toko);
        // die;
        if ($foto_bukti = '') {
        } else {
            $config['upload_path']       = './uploads/bukti';
            $config['allowed_types']     = 'jpg|jpeg|png|gif';
            $config['maintain_ratio']    = TRUE;

            $this->load->library('image_lib', $config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti_sampai')) {
                echo "Gambar gagal diupload !";
            } else {
                $foto_bukti = $this->upload->data('file_name');
            }

            $this->db->set('foto_bukti_sembelih', $foto_bukti);
            $this->db->where('id_invoice', $id_invoice);
            $this->db->where('id_toko', $id_toko);
            $this->db->update('status_transaksi');
            redirect('tempatdistribusi/detail_pesanan/' . $id_invoice);
        }
    }

    public function update_foto_distribusi()
    {
        $foto_bukti         = $_FILES['bukti_sampai']['name'];
        $id_invoice           = $this->input->post('id_invoice');
        $id_toko           = $this->input->post('id_toko_distribusi');
        // var_dump($id_toko);
        // die;
        if ($foto_bukti = '') {
        } else {
            $config['upload_path']       = './uploads/bukti';
            $config['allowed_types']     = 'jpg|jpeg|png|gif';
            $config['maintain_ratio']    = TRUE;

            $this->load->library('image_lib', $config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti_sampai')) {
                echo "Gambar gagal diupload !";
            } else {
                $foto_bukti = $this->upload->data('file_name');
            }

            $this->db->set('foto_bukti_distribusi', $foto_bukti);
            $this->db->where('id_invoice', $id_invoice);
            $this->db->where('id_toko', $id_toko);
            $this->db->update('status_transaksi');
            redirect('tempatdistribusi/detail_pesanan/' . $id_invoice);
        }
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
        $this->session->set_flashdata('message1', 'Data Hewan Berhasil Ditambahkan!');
        $this->db->insert('hewan_tempatdistribusi', $data);
        redirect('tempatdistribusi/inputhewan');
    }

    public function updatehewan()
    {

        $this->form_validation->set_rules('nama_hewan', 'Data', 'required');
        $this->form_validation->set_rules('status', 'Data', 'required');
        $data = [
            'nama_hewan' => htmlspecialchars($this->input->post('nama_hewan', true)),
            'id_status' => htmlspecialchars($this->input->post('status', true)),
            'id_tempatdistribusi' => htmlspecialchars($this->input->post('id_tempatdistribusi', true)),
        ];
        $this->session->set_flashdata('message1', 'Data Hewan Berhasil Dirubah!');
        $this->db->where('id_hewan', $this->input->post('id_hewan'));
        $this->db->update('hewan_tempatdistribusi', $data);
        redirect('tempatdistribusi/inputhewan');
    }

    public function getubah()
    {
        $id_hewan = $_POST['id_hewan'];
        echo json_encode($this->tempatdistribusi_model->gethewanbyid($id_hewan));
    }

    public function upload_dokumen()
    {
        $data['title'] = 'Upload Dokumen';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['profil'] = $this->db->get_where('mitra_distribusi', ['id_tempatdistribusi' => $data['user']['id_tempatdistribusi']])->row_array();

        $this->load->view('adminmasjid/templates_adminmasjid/header', $data);
        $this->load->view('adminmasjid/templates_adminmasjid/sidebar', $data);
        $this->load->view('adminmasjid/upload_dokumen', $data);
        $this->load->view('adminmasjid/templates_adminmasjid/footer');
    }

    public function update_foto_tempat_distribusi()
    {
        $id_tempat            = $this->input->post('id_tempat');
        $foto_tempat_distribusi         = $_FILES['foto_tempat_distribusi']['name'];
        if ($foto_tempat_distribusi = '') {
        } else {
            $config['upload_path']       = './uploads/dokumentempat';
            $config['allowed_types']     = 'jpg|jpeg|png|gif';
            $config['maintain_ratio']    = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_tempat_distribusi')) {
                echo "Gambar gagal diupload !";
            } else {
                $foto_tempat_distribusi = $this->upload->data('file_name');
            }
            $data = array(
                'foto_tempat_distribusi' => $foto_tempat_distribusi,
            );

            // $where = array('id_masjid' => $id);
            $this->db->where('id_tempatdistribusi', $id_tempat);
            $this->db->update('mitra_distribusi', $data);
            // $this->m_masjid->update_data($where, $data, 'tb_masjid');
            $this->session->set_flashdata('message1', 'Upload Berhasil!');
            redirect('tempatdistribusi/upload_dokumen');
        }
    }

    public function update_foto_ktp()
    {
        $id_tempat           = $this->input->post('id_tempat');
        $foto_ktp          = $_FILES['foto_ktp']['name'];
        if ($foto_ktp = '') {
        } else {
            $config['upload_path']       = './uploads/ktp_tempat';
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

            // $where = array('id_ktp' => $id);
            $this->db->where('id_tempatdistribusi', $id_tempat);
            $this->db->update('mitra_distribusi', $data);
            // $this->m_ktp->update_data($where, $data, 'tb_ktp');
            $this->session->set_flashdata('message1', 'Upload Berhasil!');
            redirect('tempatdistribusi/upload_dokumen');
        }
    }

    public function update_foto_ktp_wajah()
    {
        $id_tempat            = $this->input->post('id_tempat');
        $foto_ktp_wajah         = $_FILES['foto_ktp_wajah']['name'];
        if ($foto_ktp_wajah = '') {
        } else {
            $config['upload_path']       = './uploads/ktp_wajah_tempat';
            $config['allowed_types']     = 'jpg|jpeg|png|gif';
            $config['maintain_ratio']    = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_ktp_wajah')) {
                echo "Gambar gagal diupload !";
            } else {
                $foto_ktp_wajah = $this->upload->data('file_name');
            }
            $data = array(
                'foto_ktp_wajah' => $foto_ktp_wajah,
            );

            // $where = array('id_ktp_wajah' => $id);
            $this->db->where('id_tempatdistribusi', $id_tempat);
            $this->db->update('mitra_distribusi', $data);
            // $this->m_ktp_wajah->update_data($where, $data, 'tb_ktp_wajah');
            $this->session->set_flashdata('message1', 'Upload Berhasil!');
            redirect('tempatdistribusi/upload_dokumen');
        }
    }

    public function update()
    {
        $id               = $this->input->post('id_tempatdistribusi');
        $nama_tempat      = $this->input->post('nama_tempat');
        $alamat           = $this->input->post('alamat');
        $kota         = $this->input->post('kota');
        $provinsi          = $this->input->post('provinsi');
        $notelp      = $this->input->post('notelp');


        $data = array(
            'nama_tempat'     => $nama_tempat,
            'alamat'          => $alamat,
            'kota'          => $kota,
            'provinsi'           => $provinsi,
            'notelp'       => $notelp,
            'id_tempatdistribusi'       => $id
        );

        // $where = array('id_hewan' => $id);
        $this->db->where('id_tempatdistribusi', $id);
        $this->db->update('mitra_distribusi', $data);
        // $this->m_hewan->update_data($where, $data, 'tb_hewan');
        $this->session->set_flashdata('message1', 'Data Berhasil Dirubah!');
        redirect('tempatdistribusi/biodata');
    }

    public function biodata()
    {
        $data['title'] = 'Biodata Tempat Distribusi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // $data['hewan'] = $this->m_hewan->tampil_data();
        // $data['mitra_distribusi'] = $this->m_hewan->getalldata()->result();
        $data['profil'] = $this->db->get_where('mitra_distribusi', ['id_tempatdistribusi' => $data['user']['id_tempatdistribusi']])->row_array();
        $this->load->view('adminmasjid/templates_adminmasjid/header', $data);
        $this->load->view('adminmasjid/templates_adminmasjid/sidebar', $data);
        $this->load->view('adminmasjid/biodata', $data);
        $this->load->view('adminmasjid/templates_adminmasjid/footer');
    }
    public function update_foto()
    {

        $id               = $this->input->post('id_tempatdistribusi');
        $foto_tempat          = $_FILES['foto_tempat']['name'];
        if ($foto_tempat = '') {
        } else {
            $config['upload_path']       = './uploads/foto';
            $config['allowed_types']     = 'jpg|jpeg|png|gif';
            $config['maintain_ratio']    = TRUE;

            $this->load->library('image_lib', $config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_tempat')) {
                echo "Gambar gagal diupload !";
            } else {
                $foto_tempat = $this->upload->data('file_name');
            }
            $data = array(
                'foto_tempat' => $foto_tempat
            );

            // $where = array('id_hewan' => $id);
            $this->db->where('foto_tempat', $id);
            $this->db->update('mitra_distribusi', $data);
            // $this->m_hewan->update_data($where, $data, 'tb_hewan');
            $this->session->set_flashdata('message1', 'Foto Berhasil Dirubah!');
            redirect('tempatdistribusi/biodata');
        }
    }
    public function update_foto_tempat()
    {

        $id_tempatdistribusi = $this->input->post('id_tempatdistribusi');
        $gambar    = $_FILES['foto_tempat']['name'];
        $config['upload_path'] = './uploads/tempatdistribusi';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_tempat')) {
            echo "Gambar gagal di upload!";
        } else {
            $gambar = $this->upload->data('file_name');
        }
        $data  = array(
            'foto_tempat'   => $gambar,
        );
        $this->db->where('id_tempatdistribusi', $id_tempatdistribusi);
        $this->db->update('mitra_distribusi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Product Added!</div>');
        redirect('tempatdistribusi/biodata');
    }
}
