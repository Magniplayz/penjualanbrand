<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_pembeli') == null) {
            redirect('Auth');
        }
    }

    public function index()
    {
        $data['title'] = "Checkout - TRAVERN";
        $data['pembeli'] = $this->db->get_where('pembeli', ['id_pembeli' => $this->session->userdata('id_pembeli')])->row_array();
        //Ambil data keranjang
        $this->db->join('produk', 'keranjang.id_produk = produk.id_produk');
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $data['keranjang'] = $this->db->get_where('keranjang', ['id_pembeli' => $this->session->userdata('id_pembeli')])->result_array();
        //Ambil data checkout (group)
        $this->db->select("MAX(transaksi.no_antrean) AS no_antrean, MIN(tanggal_transaksi) AS tgl, SUM(jumlah) AS jumlah, SUM(harga_produk*jumlah) AS harga, MAX(bayar.id_bayar) AS id_bayar, MAX(id_status) AS id_status, MAX(status) AS status");
        $this->db->from('transaksi');
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $this->db->join('bayar', 'transaksi.no_antrean = bayar.no_antrean', 'left');
        $this->db->join('status', 'transaksi.no_antrean = status.no_antrean', 'left');
        $this->db->where('id_pembeli', $this->session->userdata('id_pembeli'));
        $this->db->group_by('transaksi.no_antrean');
        $data['checkout'] = $this->db->get()->result_array();

        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Navbar');
        $this->load->view('Checkout/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function add()
    {
        $id_pembeli = $this->session->userdata('id_pembeli');
        $antrean = substr(str_shuffle(str_repeat($x = '0123456789', ceil(5 / strlen($x)))), 1, 5);
        //Pindah data keranjang ke transaksi
        $add = $this->db->query(" INSERT INTO transaksi(id_produk,jumlah,id_pembeli,no_antrean) SELECT id_produk, jumlah, id_pembeli, $antrean AS no_antrean FROM keranjang WHERE id_pembeli = '$id_pembeli'");
        if ($add) {
            $keluar = $this->db->query(" INSERT INTO produk_keluar(id_produk,jumlah) SELECT id_produk, jumlah FROM keranjang WHERE id_pembeli = '$id_pembeli'");
            if ($keluar) {
                $del = $this->db->delete('keranjang', ['id_pembeli' => $id_pembeli]);
                if ($del) {
                    redirect('Checkout');
                } else {
                    echo "Gagal Hapus Keranjang";
                }
            } else {
                echo "Gagal Mengurangi Stok";
            }
            redirect('Checkout');
        } else {
            echo "Gagal Checkout";
        }
    }

    public function cetak($no_antrean)
    {
        $data['title'] = "Cetak Invoice Order " . $no_antrean;
        $data['pembeli'] = $this->db->get_where('pembeli', ['id_pembeli' => $this->session->userdata('id_pembeli')])->row_array();
        $data['antrean'] = $no_antrean;
        //Ambil data keranjang
        $this->db->join('produk', 'keranjang.id_produk = produk.id_produk');
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $data['keranjang'] = $this->db->get_where('keranjang', ['id_pembeli' => $this->session->userdata('id_pembeli')])->result_array();
        //Ambil data checkout (group)
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $this->db->where('no_antrean', $no_antrean);
        $data['transaksi'] = $this->db->get('transaksi')->result_array();
        //Ambil data bayar
        $data['bayar'] = $this->db->get_where('bayar', ['no_antrean' => $no_antrean])->row_array();
        //Ambil data status
        $data['status'] = $this->db->get_where('status', ['no_antrean' => $no_antrean])->row_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Checkout/Cetak');
        $this->load->view('Templates/09_JS');
    }

    public function selesai($no_antrean)
    {
        $data = [
            'status' => 'Selesai'
        ];

        $this->db->set($data);
        $this->db->where('no_antrean', $no_antrean);
        $selesai = $this->db->update('status');
        if ($selesai) {
            redirect('Checkout');
        } else {
            echo "Gagal Menyelesaikan Pesanan";
        }
    }
}
