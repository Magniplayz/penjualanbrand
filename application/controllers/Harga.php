<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Harga extends CI_Controller
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
        $data['title'] = "Harga - TRAVERN";
        $data['karyawan'] = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        $data['harga'] = $this->db->get('harga')->result_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/03_Sidebar');
        $this->load->view('Harga/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function add()
    {
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $data = [
                'id_harga' => 'h-' . substr(str_shuffle(str_repeat($x = '0123456789', ceil(3 / strlen($x)))), 1, 3),
                'ukuran_produk' => $_POST['ukuran'],
                'harga_produk' => $_POST['harga']
            ];
            $add = $this->db->insert('harga', $data);
            if ($add) {
                redirect('Harga');
            } else {
                echo "Gagal Input Harga";
            }
        } else {
            $data['title'] = "Tambah Harga - TRAVERN";
            $data['karyawan'] = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/03_Sidebar');
            $this->load->view('Harga/Input');
            $this->load->view('Templates/07_Footer');
            $this->load->view('Templates/09_JS');
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
