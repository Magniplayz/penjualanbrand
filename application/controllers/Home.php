<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
        $data['title'] = "Home - TRAVERN";
        $data['pembeli'] = $this->db->get_where('pembeli', ['id_pembeli' => $this->session->userdata('id_pembeli')])->row_array();
        //Ambil data produk
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $data['produk'] = $this->db->get('produk')->result_array();
        //Ambil data keranjang
        $this->db->join('produk', 'keranjang.id_produk = produk.id_produk');
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $data['keranjang'] = $this->db->get_where('keranjang', ['id_pembeli' => $this->session->userdata('id_pembeli')])->result_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Navbar');
        $this->load->view('Home/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function detail_produk($id_produk)
    {
        $data['title'] = "$id_produk - TRAVERN";
        $data['pembeli'] = $this->db->get_where('pembeli', ['id_pembeli' => $this->session->userdata('id_pembeli')])->row_array();
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $this->db->where('id_produk', $id_produk);
        $data['produk'] = $this->db->get('produk')->row_array();
        //Ambil total masuk
        $this->db->select('SUM(jumlah) AS jumlah');
        $data['produk_masuk'] = $this->db->get_where('produk_masuk', ['id_produk' => $id_produk])->row_array();
        //Ambil total keluar
        $this->db->select('SUM(jumlah) AS jumlah');
        $data['produk_keluar'] = $this->db->get_where('produk_keluar', ['id_produk' => $id_produk])->row_array();

        //Ambil data keranjang
        $this->db->join('produk', 'keranjang.id_produk = produk.id_produk');
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $data['keranjang'] = $this->db->get_where('keranjang', ['id_pembeli' => $this->session->userdata('id_pembeli')])->result_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Navbar');
        $this->load->view('Home/DetailProduk');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function addKeranjang($id_produk)
    {
        $id_pembeli = $this->session->userdata('id_pembeli');
        $tgl = date("d-m-Y");
        $_POST = $this->input->post();
        $data = [
            'noinvoice' => 'INV/' . $id_pembeli . '/' . $tgl,
            'id_pembeli' => $id_pembeli,
            'id_produk' => $id_produk,
            'jumlah' => $_POST['jumlah']
        ];
        $add = $this->db->insert('keranjang', $data);
        if ($add) {
            redirect('');
        } else {
            echo "Gagal Menambah Keranjang";
        }
    }

    public function delKrjg($id_keranjang)
    {
        $delete = $this->db->delete('keranjang', ['id_keranjang' => $id_keranjang]);
        if ($delete) {
            redirect('');
        } else {
            echo "Gagal Menghapus Keranjang";
        }
    }
}
