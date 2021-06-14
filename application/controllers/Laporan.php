<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        $data['title'] = "Laporan Penjualan - TRAVERN";
        $data['karyawan'] = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        //Ambil data transaksi
        $this->db->select("MAX(transaksi.no_antrean) AS no_antrean, MIN(tanggal_transaksi) AS tgl, SUM(jumlah) AS jumlah, SUM(harga_produk*jumlah) AS harga, MAX(bayar.id_bayar) AS id_bayar, MAX(id_status) AS id_status, MAX(status) AS status, MAX(nama_pembeli) AS nama_pembeli");
        $this->db->from('transaksi');
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $this->db->join('bayar', 'transaksi.no_antrean = bayar.no_antrean');
        $this->db->join('status', 'transaksi.no_antrean = status.no_antrean');
        $this->db->join('pembeli', 'transaksi.id_pembeli = pembeli.id_pembeli');
        $this->db->group_by('transaksi.no_antrean');
        $data['transaksi'] = $this->db->get()->result_array();

        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/03_Sidebar');
        $this->load->view('Laporan/Penjualan');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function stok()
    {
        $data['title'] = "Laporan Stok - TRAVERN";
        $data['karyawan'] = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        //Ambil data stok
        $this->db->select("MAX(nama_produk) AS nama_produk, MAX(ukuran_produk) AS ukuran, MAX(harga_produk) AS harga, SUM(produk_masuk.jumlah - produk_keluar.jumlah) AS stok");
        $this->db->from('produk');
        $this->db->join('produk_masuk', 'produk.id_produk = produk_masuk.id_produk');
        $this->db->join('produk_keluar', 'produk.id_produk = produk_keluar.id_produk');
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $this->db->group_by('produk.id_produk');
        $data['produk'] = $this->db->get()->result_array();

        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/03_Sidebar');
        $this->load->view('Laporan/Stok');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function cetak_penjualan()
    {
        $data['title'] = "Cetak Laporan Penjualan";

        //Ambil data transaksi
        $this->db->select("MAX(transaksi.no_antrean) AS no_antrean, MIN(tanggal_transaksi) AS tgl, SUM(jumlah) AS jumlah, SUM(harga_produk*jumlah) AS harga, MAX(bayar.id_bayar) AS id_bayar, MAX(id_status) AS id_status, MAX(status) AS status, MAX(nama_pembeli) AS nama_pembeli");
        $this->db->from('transaksi');
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $this->db->join('bayar', 'transaksi.no_antrean = bayar.no_antrean');
        $this->db->join('status', 'transaksi.no_antrean = status.no_antrean');
        $this->db->join('pembeli', 'transaksi.id_pembeli = pembeli.id_pembeli');
        $this->db->group_by('transaksi.no_antrean');
        $data['transaksi'] = $this->db->get()->result_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Laporan/CetakPenjualan');
        $this->load->view('Templates/09_JS');
    }

    public function cetak_stok()
    {
        $data['title'] = "Cetak Laporan Stok";

        //Ambil data stok
        $this->db->select("MAX(nama_produk) AS nama_produk, MAX(ukuran_produk) AS ukuran, MAX(harga_produk) AS harga, SUM(produk_masuk.jumlah - produk_keluar.jumlah) AS stok");
        $this->db->from('produk');
        $this->db->join('produk_masuk', 'produk.id_produk = produk_masuk.id_produk');
        $this->db->join('produk_keluar', 'produk.id_produk = produk_keluar.id_produk');
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $this->db->order_by('nama_produk');
        $this->db->group_by('produk.id_produk');
        $data['produk'] = $this->db->get()->result_array();

        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Laporan/CetakStok');
        $this->load->view('Templates/09_JS');
    }
}
