<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
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
        $data['title'] = "Karyawan - TRAVERN";
        $data['karyawan'] = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        $data['data_karyawan'] = $this->db->get('karyawan')->result_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/03_Sidebar');
        $this->load->view('Karyawan/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|numeric');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $data = [
                'id_karyawan' => 'k-' . substr(str_shuffle(str_repeat($x = '0123456789', ceil(5 / strlen($x)))), 1, 5),
                'nama_karyawan' => $_POST['nama'],
                'email_karyawan' => $_POST['email'],
                'pin_karyawan' => substr(str_shuffle(str_repeat($x = '0123456789', ceil(4 / strlen($x)))), 1, 4),
                'nohp_karyawan' => $_POST['no_hp'],
                'pass_karyawan' => $_POST['pass']
            ];
            $add = $this->db->insert('karyawan', $data);
            if ($add) {
                redirect('Karyawan');
            } else {
                echo "Gagal Input Karyawan";
            }
        } else {
            $data['title'] = "Tambah Karyawan - TRAVERN";
            $data['karyawan'] = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/03_Sidebar');
            $this->load->view('Karyawan/Input');
            $this->load->view('Templates/07_Footer');
            $this->load->view('Templates/09_JS');
        }
    }

    public function edit($id_karyawan)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|numeric');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $data = [
                'nama_karyawan' => $_POST['nama'],
                'email_karyawan' => $_POST['email'],
                'pin_karyawan' => substr(str_shuffle(str_repeat($x = '0123456789', ceil(4 / strlen($x)))), 1, 4),
                'nohp_karyawan' => $_POST['no_hp'],
                'pass_karyawan' => $_POST['pass']
            ];
            $this->db->set($data);
            $this->db->where('id_karyawan', $id_karyawan);
            $add = $this->db->update('karyawan');
            if ($add) {
                redirect('Karyawan');
            } else {
                echo "Gagal Update Karyawan";
            }
        } else {
            $data['title'] = "Ubah Karyawan - TRAVERN";
            $data['karyawan'] = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
            $data['data_karyawan'] = $this->db->get_where('karyawan', ['id_karyawan' => $id_karyawan])->row_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/03_Sidebar');
            $this->load->view('Karyawan/Edit');
            $this->load->view('Templates/07_Footer');
            $this->load->view('Templates/09_JS');
        }
    }

    public function delete($id_karyawan)
    {
        $delete = $this->db->delete('karyawan', ['id_karyawan' => $id_karyawan]);
        if ($delete) {
            redirect('Karyawan');
        } else {
            echo 'Gagal Hapus Karyawan';
        }
    }
}
