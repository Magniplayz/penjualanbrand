<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends CI_Controller
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
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $data = [
                'id_produk' => $_POST['id_produk'],
                'jumlah' => $_POST['jumlah'],
                'tanggal_masuk' => $_POST['tgl']
            ];
            $add = $this->db->insert('produk_masuk', $data);
            if ($add) {
                redirect('Stok');
            } else {
                echo "Gagal Input Stok";
            }
        } else {
            $data['title'] = "Stok - TRAVERN";
            $data['karyawan'] = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
            $this->db->join('harga', 'produk.id_harga = harga.id_harga');
            $this->db->join('viewstok', 'produk.id_produk = viewstok.id_produk');
            $data['stok'] = $this->db->get('produk')->result_array();
            $this->db->join('harga', 'produk.id_harga = harga.id_harga');
            $data['produk'] = $this->db->get('produk')->result_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/03_Sidebar');
            $this->load->view('Stok/Index');
            $this->load->view('Templates/07_Footer');
            $this->load->view('Templates/09_JS');
        }
    }

    public function add()
    {
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $data = [
                'id_produk' => $_POST['id_produk'],
                'jumlah' => $_POST['jumlah'],
                'tanggal_masuk' => $_POST['tgl']
            ];
            $add = $this->db->insert('produk_masuk', $data);
            if ($add) {
                redirect('Stok');
            } else {
                echo "Gagal Input Stok";
            }
        } else {
            redirect('Stok');
        }
    }

    public function delete($id_harga)
    {
        $delete = $this->db->delete('harga', ['id_harga' => $id_harga]);
        if ($delete) {
            redirect('Harga');
        } else {
            echo 'Gagal Hapus Harga';
        }
    }
}
