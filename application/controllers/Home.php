<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('Templates/01_Header');
        $this->load->view('Templates/02_Navbar');
        $this->load->view('Home/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }
}
