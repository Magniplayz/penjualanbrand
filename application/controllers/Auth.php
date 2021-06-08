<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        //Class untuk memanggil library
        parent::__construct();
        $this->load->library("form_validation");
    }

    public function index()
    {
        //Validasi
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $this->db->where('email_pembeli', $email);
            $this->db->where('pass_pembeli', $pass);
            $login = $this->db->get('pembeli')->row_array();
            if ($login) {
                //Data yang akan masuk session
                $data = [
                    'id_pembeli' => $login['id_pembeli']
                ];
                $this->session->set_userdata($data);
                redirect('Home');
            } else {
                echo "Gagal Login";
            }
        } else {
            $data['title'] = "Login";
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Auth/LoginPembeli');
            $this->load->view('Templates/09_JS');
        }
    }

    public function register()
    {
        //Validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pembeli.email_pembeli]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required', 'numeric');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            //Proses Simpan Pembeli
            $_POST = $this->input->post();
            $data = [
                'id_pembeli' => 'u-' . substr(str_shuffle(str_repeat($x = '0123456789', ceil(5 / strlen($x)))), 1, 5),
                'nama_pembeli' => $_POST['nama'],
                'email_pembeli' => $_POST['email'],
                'alamat_pembeli' => $_POST['alamat'],
                'nohp_pembeli' => $_POST['no_hp'],
                'pin_pembeli' => substr(str_shuffle(str_repeat($x = '0123456789', ceil(4 / strlen($x)))), 1, 4),
                'pass_pembeli' => $_POST['pass']
            ];
            $register = $this->db->insert('pembeli', $data);
            if ($register) {
                redirect('Auth');
            } else {
                echo 'Gagal';
            }
        } else {
            //Jika Validasi Error, maka kembali ke tampilan
            $data['title'] = "Register";
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Auth/Register');
            $this->load->view('Templates/09_JS');
        }
    }
}
