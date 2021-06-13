<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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
        $data['title'] = "Produk - TRAVERN";
        $data['karyawan'] = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        $this->db->join('harga', 'produk.id_harga = harga.id_harga');
        $data['produk'] = $this->db->get('produk')->result_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/03_Sidebar');
        $this->load->view('Produk/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $data = [
                'id_produk' => 'p-' . substr(str_shuffle(str_repeat($x = '0123456789', ceil(5 / strlen($x)))), 1, 5),
                'nama_produk' => $_POST['nama'],
                'id_harga' => $_POST['id_harga'],
                'foto_produk' => $this->_uploadImage($_POST['nama'] . date("dmY-His"))
            ];
            $add = $this->db->insert('produk', $data);
            if ($add) {
                redirect('Produk');
            } else {
                echo "Gagal Input Produk";
            }
        } else {
            $data['title'] = "Tambah Produk - TRAVERN";
            $data['karyawan'] = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
            $data['harga'] = $this->db->get('harga')->result_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/03_Sidebar');
            $this->load->view('Produk/Input');
            $this->load->view('Templates/07_Footer');
            $this->load->view('Templates/09_JS');
        }
    }

    public function edit($id_produk)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $img = "";
            if (!empty($_FILES["image"]["name"])) {
                $img = $this->_uploadImage($_POST['nama'] . date("dmY-His"));
            } else {
                $img = $_POST["old_image"];
            }
            $data = [
                'nama_produk' => $_POST['nama'],
                'id_harga' => $_POST['id_harga'],
                'foto_produk' => $img
            ];
            $this->db->set($data);
            $this->db->where('id_produk', $id_produk);
            $add = $this->db->update('produk');
            if ($add) {
                redirect('Produk');
            } else {
                echo "Gagal Update Produk";
            }
        } else {
            $data['title'] = "Ubah Produk - TRAVERN";
            $data['karyawan'] = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
            $data['harga'] = $this->db->get('harga')->result_array();
            $data['produk'] = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/03_Sidebar');
            $this->load->view('Produk/Edit');
            $this->load->view('Templates/07_Footer');
            $this->load->view('Templates/09_JS');
        }
    }

    public function delete($id_produk)
    {
        $delete = $this->db->delete('produk', ['id_produk' => $id_produk]);
        if ($delete) {
            redirect('Produk');
        } else {
            echo 'Gagal Hapus Produk';
        }
    }

    private function _uploadImage($file_name)
    {
        $config['upload_path']          = './upload/produk/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }
}
