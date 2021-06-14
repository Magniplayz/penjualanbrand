<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_karyawan') == null) {
            redirect('Auth');
        }
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Transaksi - TRAVERN";
        $data['karyawan'] = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        //Ambil data transaksi
        $this->db->select("MAX(transaksi.no_antrean) AS no_antrean, MIN(tanggal_transaksi) AS tgl, SUM(jumlah) AS jumlah, SUM(harga_produk*jumlah) AS harga, MAX(bayar.id_bayar) AS id_bayar, MAX(id_status) AS id_status, MAX(status) AS status");
        $this->db->from('transaksi');
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $this->db->join('bayar', 'transaksi.no_antrean = bayar.no_antrean', 'left');
        $this->db->join('status', 'transaksi.no_antrean = status.no_antrean', 'left');
        $this->db->group_by('transaksi.no_antrean');
        $data['transaksi'] = $this->db->get()->result_array();

        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/03_Sidebar');
        $this->load->view('Transaksi/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function bayar($no_antrean)
    {
        $data['title'] = "Tambah Pembayaran - TRAVERN";
        $data['karyawan'] = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        //Ambil data transaksi
        $this->db->select("MAX(no_antrean) AS no_antrean, MIN(tanggal_transaksi) AS tgl, SUM(jumlah) AS jumlah, SUM(harga_produk*jumlah) AS harga");
        $this->db->from('transaksi');
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $this->db->where('no_antrean', $no_antrean);
        $this->db->group_by('no_antrean');
        $data['transaksi'] = $this->db->get()->row_array();

        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/03_Sidebar');
        $this->load->view('Transaksi/Bayar');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function add_pembayaran($no_antrean)
    {
        $_POST = $this->input->post();
        $data = [
            'id_bayar' => 'b-' . substr(str_shuffle(str_repeat($x = '0123456789', ceil(3 / strlen($x)))), 1, 3),
            'uang_pembeli' => $_POST['bayar'],
            'total_harga' => $_POST['harga'],
            'tanggal_bayar' => $_POST['tgl_bayar'],
            'id_karyawan' => $this->session->userdata('id_karyawan'),
            'no_antrean' => $no_antrean
        ];
        $add = $this->db->insert('bayar', $data);
        if ($add) {
            $data = [
                'id_karyawan' => $this->session->userdata('id_karyawan'),
                'no_antrean' => $no_antrean,
                'status' => 'Sudah Dikonfirmasi'
            ];
            $status = $this->db->insert('status', $data);
            if ($status) {
                redirect('Transaksi');
            } else {
                echo "Gagal Mengubah Status";
            }
        } else {
            echo "Gagal Tambah Bayar";
        }
    }

    public function kirim($no_antrean)
    {
        $data = [
            'status' => 'Sedang Dikirim'
        ];
        $this->db->set($data);
        $this->db->where('no_antrean', $no_antrean);
        $kirim = $this->db->update('status');
        if ($kirim) {
            redirect('Transaksi');
        } else {
            echo "Gagal Mengirim";
        }
    }

    public function cetak($no_antrean)
    {
        $data['title'] = "Cetak Invoice Order " . $no_antrean;

        $data['antrean'] = $no_antrean;
        //Ambil data transaksi
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $this->db->where('no_antrean', $no_antrean);
        $data['transaksi'] = $this->db->get('transaksi')->result_array();
        //Ambil data bayar
        $data['bayar'] = $this->db->get_where('bayar', ['no_antrean' => $no_antrean])->row_array();
        //Ambil data status
        $data['status'] = $this->db->get_where('status', ['no_antrean' => $no_antrean])->row_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Transaksi/Cetak');
        $this->load->view('Templates/09_JS');
    }
}
