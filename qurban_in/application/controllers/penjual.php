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
                    $this->db->set('is_active', 1);
                    $this->db->where('id_toko', $id_toko);
                    $this->db->update('toko');
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->db->set('id_toko', $id_toko);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated!</div');
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
        // $data['hewan'] = $this->m_hewan->tampil_data();
        $data['toko'] = $this->m_hewan->getalldata()->result();
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
            'id_toko'       => $this->input->post('id_toko')
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
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['hewan'] = $this->db->get_where('tb_hewan', ['id_hewan' => $id])->row_array();
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
}
