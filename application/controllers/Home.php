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
        $data['title'] = "Beranda";
        $data['pembeli'] = $this->db->get_where('pembeli', ['id_pembeli' => $this->session->userdata('id_pembeli')])->row_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Navbar');
        $this->load->view('Home/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }
}
