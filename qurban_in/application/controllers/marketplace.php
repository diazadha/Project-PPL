<?php
defined('BASEPATH') or exit('No direct script access allowed');

class marketplace extends CI_Controller
{
    public function index()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $this->load->library('session');
            $data['title'] = 'Home';
            $data['tampil_hewan'] = $this->marketplace_model->tampil_hewan($user['id_toko'])->result();
            $id_user = $user['id_user'];
            $data['total_cart'] = $this->marketplace_model->total_cart($id_user)->row_array();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/index', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        } else {
            $this->load->library('session');
            $data['title'] = 'Home';
            $data['tampil_hewan'] = $this->marketplace_model->tampil_hewan_semua()->result();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/index', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        }
    }

    public function search()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $this->load->library('session');
            $keyword = $this->input->post('key');
            $data['title'] = 'Home';
            $data['tampil_hewan'] = $this->marketplace_model->search($keyword, $user['id_toko'])->result();
            $data['total_cart'] = $this->marketplace_model->total_cart($user['id_user'])->row_array();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/index', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        } else {
            $this->load->library('session');
            $keyword = $this->input->post('key');
            $data['title'] = 'Home';
            $data['tampil_hewan'] = $this->marketplace_model->search_belomlogin($keyword)->result();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/index', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        }
    }

    public function filter_harga()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $data['title'] = 'Home';
            $dari = $this->input->get('from');
            $sampai = $this->input->get('until');
            $data['tampil_hewan'] = $this->marketplace_model->filter_hewan_harga($dari, $sampai, $user['id_toko'])->result();
            $data['total_cart'] = $this->marketplace_model->total_cart($user['id_user'])->row_array();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/index', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        } else {
            $data['title'] = 'Home';
            $dari = $this->input->get('from');
            $sampai = $this->input->get('until');
            $data['tampil_hewan'] = $this->marketplace_model->filter_hewan_harga_belomlogin($dari, $sampai)->result();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/index', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        }
    }

    public function filter_berat()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $data['title'] = 'Home';
            $dari = $this->input->get('from');
            $sampai = $this->input->get('until');
            $data['tampil_hewan'] = $this->marketplace_model->filter_hewan_berat($dari, $sampai, $user['id_toko'])->result();
            $data['total_cart'] = $this->marketplace_model->total_cart($user['id_user'])->row_array();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/index', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        } else {
            $data['title'] = 'Home';
            $dari = $this->input->get('from');
            $sampai = $this->input->get('until');
            $data['tampil_hewan'] = $this->marketplace_model->filter_hewan_berat_belomlogin($dari, $sampai)->result();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/index', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        }
    }

    public function filter_harga_diatas()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $data['title'] = 'Home';
            $value = $this->input->get('val');
            $data['tampil_hewan'] = $this->marketplace_model->filter_hewan_harga_diatas($value, $user['id_toko'])->result();
            $data['total_cart'] = $this->marketplace_model->total_cart($user['id_user'])->row_array();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/index', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        } else {
            $data['title'] = 'Home';
            $value = $this->input->get('val');
            $data['tampil_hewan'] = $this->marketplace_model->filter_hewan_harga_diatas_belomlogin($value)->result();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/index', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        }
    }

    public function filter_berat_diatas()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $data['title'] = 'Home';
            $value = $this->input->get('val');
            $data['tampil_hewan'] = $this->marketplace_model->filter_hewan_berat_diatas($value, $user['id_toko'])->result();
            $data['total_cart'] = $this->marketplace_model->total_cart($user['id_user'])->row_array();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/index', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        } else {
            $data['title'] = 'Home';
            $value = $this->input->get('val');
            $data['tampil_hewan'] = $this->marketplace_model->filter_hewan_berat_diatas_belomlogin($value)->result();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/index', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        }
    }

    public function detail_produk($id_hewan)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $data['title'] = 'Home';
            $data['tampil_hewan'] = $this->marketplace_model->tampil_detail_hewan($id_hewan)->row();
            $data['total_cart'] = $this->marketplace_model->total_cart($user['id_user'])->row_array();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/detailproduk', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        } else {
            $data['title'] = 'Home';
            $data['tampil_hewan'] = $this->marketplace_model->tampil_detail_hewan($id_hewan)->row();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/detailproduk', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        }
    }

    public function detail_toko($id_toko)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $data['title'] = 'Toko';
            $data['detail_toko'] = $this->detailtoko_model->tampil_detail_toko($id_toko)->result();
            $data['total_cart'] = $this->marketplace_model->total_cart($user['id_user'])->row_array();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/detailtoko');
            $this->load->view('marketplace/templates_marketplace/footer');
        } else {
            $data['title'] = 'Toko';
            $data['detail_toko'] = $this->detailtoko_model->tampil_detail_toko($id_toko)->result();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/detailtoko');
            $this->load->view('marketplace/templates_marketplace/footer');
        }
    }

    public function toko()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $data['title'] = 'Toko';
            $data['tampil_toko'] = $this->detailtoko_model->tampil_toko()->result();
            $data['total_cart'] = $this->marketplace_model->total_cart($user['id_user'])->row_array();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/toko');
            $this->load->view('marketplace/templates_marketplace/footer');
        } else {
            $data['title'] = 'Toko';
            $data['tampil_toko'] = $this->detailtoko_model->tampil_toko()->result();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/toko');
            $this->load->view('marketplace/templates_marketplace/footer');
        }
    }

    public function tambah_ke_keranjang($id_hewan)
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', 'Daftar terlebih dahulu sebelum melakukan tambah ke keranjang');
            redirect('user_akun/register');
        } else {
            $hewan = $this->marketplace_model->find_hewan_byid($id_hewan)->row();
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $keranjang = $this->marketplace_model->cek_keranjang($id_hewan, $user['id_user'])->row_array();
            if ($keranjang) {
                echo " <script>
                alert('Hewan sudah ada di keranjang!');
                document.location.href = '..' 
                </script>
                ";
            } else {
                $data = array(
                    'id_hewan'      => $id_hewan,
                    'qty'     => 1,
                    'id_user' => $user['id_user'],
                    'id_toko' => $hewan->id_toko,
                );
                $this->db->insert('keranjang', $data);
                echo " <script>
                document.location.href = '..' 
                </script>
                ";
            }
        }
    }

    public function hapus_item_keranjang($id_keranjang)
    {
        $this->db->delete('keranjang',  ['id_keranjang' => $id_keranjang]);
        redirect('marketplace/cart');
    }

    public function cart()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $data['title'] = 'Keranjang';
            $data['total_cart'] = $this->marketplace_model->total_cart($user['id_user'])->row_array();
            $data['tampil_keranjang'] = $this->marketplace_model->tampil_keranjang($user['id_user'])->result_array();
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/keranjang', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        } else {
            $data['title'] = 'Keranjang';
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/keranjang_unregister', $data);
            $this->load->view('marketplace/templates_marketplace/footer');
        }
    }

    public function updatekeranjang()
    {
        $id_keranjang = $_POST['id_keranjang'];
        $qty = $_POST['qty'];
        $query = "UPDATE keranjang SET qty = $qty WHERE id_keranjang = $id_keranjang";

        echo json_encode($this->marketplace_model->getharga($id_keranjang)->row_array());
        return $this->db->query($query);
    }

    public function checkout()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $data['title'] = 'Pemesanan';
            $data['total_cart'] = $this->marketplace_model->total_cart($user['id_user'])->row_array();
            $data['tampil_keranjang'] = $this->marketplace_model->tampil_keranjang($user['id_user'])->result_array();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['grand_total'] = $this->input->post('grand');
            $data['tampil_distribusi'] = $this->marketplace_model->tampil_tempat_distribusi_semua($user['id_tempatdistribusi'])->result_array();

            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/checkout', $data);
            $this->load->view('marketplace/footer_checkout');
        } else {
            $data['title'] = 'Pemesanan';
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/checkout');
            $this->load->view('marketplace/footer_checkout');
        }
    }

    public function filter_distribusi_provinsi()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user) {
            $data['title'] = 'Pemesanan';
            $data['total_cart'] = $this->marketplace_model->total_cart($user['id_user'])->row_array();
            $data['tampil_keranjang'] = $this->marketplace_model->tampil_keranjang($user['id_user'])->result_array();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['grand_total'] = $this->input->get('grand');
            $provinsi = $this->input->get('provinsi');
            $data['tampil_distribusi'] = $this->marketplace_model->tampil_tempat_distribusi_filter($user['id_tempatdistribusi'], $provinsi)->result_array();

            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/checkout', $data);
            $this->load->view('marketplace/footer_checkout');
        } else {
            $data['title'] = 'Pemesanan';
            $this->load->view('marketplace/templates_marketplace/header', $data);
            $this->load->view('marketplace/checkout');
            $this->load->view('marketplace/footer_checkout');
        }
    }

    public function get_tempat_distribusi()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_distribusi = $_POST['id_distribusi'];
        echo json_encode($this->marketplace_model->tampil_tempat_distribusi_byid($id_distribusi, $user['id_tempatdistribusi'])->row_array());
    }

    public function pesanan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $email = $_POST['email'];
        $nohp = $_POST['nohp'];
        $id_tempatdistribusi = $_POST['id_tempatdistribusi'];
        $data_invoice = [
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'email' => $email,
            'order_date' => date('Y-m-d H:i:s'),
            'nohp' => $nohp,
            'id_tempatdistribusi' => $id_tempatdistribusi,
            'id_user' => $user['id_user'],
        ];
        $this->db->insert('invoice', $data_invoice);


        $keranjang = $this->db->get_where('keranjang', ['id_user' => $user['id_user']])->result_array();
        $invoice = $this->marketplace_model->max_id_invoice()->row_array();


        foreach ($keranjang as $items) {
            $data_orders = [
                'id_invoice' => $invoice['id_invoice'],
                'id_hewan' => $items['id_hewan'],
                'qty' => $items['qty'],
            ];
            $this->db->insert('orders', $data_orders);

            $data_status_transaksi = [
                'id_invoice' => $invoice['id_invoice'],
                'status_bayar' => 0,
                'foto_bukti_bayar' => 0,
                'status_pesanan' => 0,
                'foto_bukti_sampai' => 0,
                'foto_bukti_sembelih' => 0,
                'foto_bukti_distribusi' => 0,
                'id_toko' => $items['id_toko'],
            ];
            $this->db->insert('status_transaksi', $data_status_transaksi);

            $this->db->delete('keranjang', ['id_keranjang' => $items['id_keranjang']]);
        }
        echo json_encode($this->marketplace_model->max_id_invoice()->row_array());
    }
}
