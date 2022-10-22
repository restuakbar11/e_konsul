<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Android extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_android');
    }

    public function index()
    {
        echo 'beasiswa api';
    }

    public function LoginApi()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $result = $this->M_android->LoginApi($email, $password);
        echo json_encode($result);
    }

}
