<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Webcam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Live";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('webcam/index', $data);
        $this->load->view('templates/footer');
    }

}
