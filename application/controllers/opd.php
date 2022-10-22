<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        $this->load->model('opd_model');
        $this->load->model('Konsultasi_model');
        $this->load->model('Pertemuan_model');
    }

    public function index()
    {
        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $data['waktu'] = $hari."/".$bulan."/".$tahun;
        $data['nomor_konsul'] = $this->Konsultasi_model->nomor_konsul();
        
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Form Konsultasi";
        $data['instansi'] = $this->Admin_model->get_data_instansi();
        $data['irban'] = $this->Admin_model->get_data_irban();
        $data['permasalahan'] = $this->Admin_model->get_data_permasalahan();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('opd/index', $data);
            $this->load->view('templates/footer');
    }

    public function beranda(){
        $data['title'] = "Dashboard";
        $data['level'] = $this->session->userdata('level');
        $data['proses'] = $this->Admin_model->jumlah($status='1');
        $data['terima'] = $this->Admin_model->jumlah($status='2');
        $data['tolak'] = $this->Admin_model->jumlah($status='3');
        $data['semua'] = $this->Admin_model->semua_konsul();
        // bertemu
        $data['proses_bertemu'] = $this->Admin_model->jumlah_b($status='1');
        $data['terima_bertemu'] = $this->Admin_model->jumlah_b($status='2');
        $data['tolak_bertemu'] = $this->Admin_model->jumlah_b($status='3');
        $data['semua_bertemu'] = $this->Admin_model->semua_bertemu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('opd/beranda', $data);
        $this->load->view('templates/footer');
    }

    public function konsultasi_respon(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Konsultasi Belum di respon";
        $data['konsul_blmRespon'] = $this->Konsultasi_model->data_konsul($status='1');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('opd/belom_respon', $data);
        $this->load->view('templates/footer');
    }

    public function konsultasi_tolak(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Konsultasi yang ditolak";
        $data['konsul_tolak'] = $this->Konsultasi_model->data_konsul($status='3');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('opd/konsultasi_tolak', $data);
        $this->load->view('templates/footer');
    }

    public function konsultasi_terima(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Konsultasi yang diterima";
        $data['konsul_terima'] = $this->Konsultasi_model->data_konsul($status='2');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('opd/konsultasi_terima', $data);
        $this->load->view('templates/footer');
    }

    public function konsultasi_semua(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Keseluruhan Konsultasi";
        $data['konsul_semua'] = $this->Konsultasi_model->data_konsultasi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('opd/konsultasi_semua', $data);
        $this->load->view('templates/footer');
    }

    public function lihat_jawaban()
    {
        $id = $this->uri->segment(3);
        $data['proses_konsul'] = $this->Konsultasi_model->proses_konsul($id);
        $data['title'] = "HASIL JAWABAN KONSULTASI";
        $data['level'] = $this->session->userdata('level');
        $data['proses_konsul'] = $this->Konsultasi_model->proses_konsul($id);
       

        $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('opd/lihat_jawaban',$data);
            $this->load->view('templates/footer');
    }

    public function lihat_pertemuan()
    {
        $id = $this->uri->segment(3);
        $data['proses_bertemu'] = $this->Pertemuan_model->proses_bertemu($id);
        $data['anggota1'] = $this->Pertemuan_model->getAnggota1($id);
        $data['anggota2'] = $this->Pertemuan_model->getAnggota2($id);
        $data['anggota3'] = $this->Pertemuan_model->getAnggota3($id);
        $data['title'] = "HASIL JAWABAN PERTEMUAN";
        $data['level'] = $this->session->userdata('level');
       

        $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('opd/lihat_pertemuan',$data);
            $this->load->view('templates/footer');
    }

    public function konsul()
    {
        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $data['waktu'] = $hari."/".$bulan."/".$tahun;
        $data['nomor_konsul'] = $this->Konsultasi_model->nomor_konsul();
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Form Konsultasi";
        $data['instansi'] = $this->Admin_model->get_data_instansi();
        $data['irban'] = $this->Admin_model->get_data_irban();
        $data['permasalahan'] = $this->Admin_model->get_data_permasalahan();
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('instansi', 'Instansi', 'trim|required');
        $this->form_validation->set_rules('irban', 'Irban', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('nohp', 'Nohp', 'trim|required');
        $this->form_validation->set_rules('permasalahan', 'Permasalahan', 'trim|required');
        $this->form_validation->set_rules('uraian', 'Uraian', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('opd/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->aksi_konsul();
            //echo "oke ya";
        }
    }

    private function aksi_konsul()
    {   
        $tanggal_sekarang = date('Y-m-d');
        $no_urut = $this->input->post('no_urut', TRUE);
        $data = [
            'no_urut' => $this->input->post('no_urut', TRUE),
            'konsul_name' => $this->input->post('nama', TRUE),
            'konsul_nip' => $this->input->post('nip', TRUE),
            'konsul_instansi' => $this->input->post('instansi', TRUE),
            'konsul_irban' => $this->input->post('irban', TRUE),
            'konsul_email' => $this->input->post('email', TRUE),
            'konsul_hp' => $this->input->post('nohp', TRUE),
            'konsul_permasalahan' => $this->input->post('permasalahan', TRUE),
            'konsul_uraian' => $this->input->post('uraian', TRUE),
            'konsul_tanggal' => $tanggal_sekarang
        ];
        
        $this->opd_model->tambah_konsul($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Konsultasi anda berhasil terkirim, silahkan tunggu 1x24 jam.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');

            $data['level'] = $this->session->userdata('level');
            $data['title'] = "Form Konsultasi";
            $data['instansi'] = $this->Admin_model->get_data_instansi();
            $data['irban'] = $this->Admin_model->get_data_irban();
            $data['permasalahan'] = $this->Admin_model->get_data_permasalahan();
            $hari = date('d');
            $bulan = date('m');
            $tahun = date('Y');
            $data['waktu'] = $hari."/".$bulan."/".$tahun;
            $data['nomor_konsul'] = $this->Konsultasi_model->nomor_konsul();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('opd/index', $data);
            $this->load->view('templates/footer');
    }

    public function pertemuan()
    {
        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $data['waktu'] = $hari."/".$bulan."/".$tahun;
        $data['nomor_pertemuan'] = $this->Pertemuan_model->nomor_pertemuan();
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Form Pertemuan";
        $data['instansi'] = $this->Admin_model->get_data_instansi();
        $data['irban'] = $this->Admin_model->get_data_irban();
        $data['permasalahan'] = $this->Admin_model->get_data_permasalahan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('opd/pertemuan', $data);
        $this->load->view('templates/footer');
    }

    public function bertemu()
    {

        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $data['waktu'] = $hari."/".$bulan."/".$tahun;
        $data['nomor_pertemuan'] = $this->Pertemuan_model->nomor_pertemuan();
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Form Pertemuan";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('opd/pertemuan', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_bertemu()
    {
        $bertemu_created = date('Y-m-d');
        $no_urut = $this->input->post('no_urut', TRUE);
        $data = [
            'no_urut' => $no_urut,
            'bertemu_name' => $this->input->post('nama', TRUE),
            'bertemu_nip' => $this->input->post('nip', TRUE),
            'bertemu_instansi' => $this->input->post('instansi', TRUE),
            'bertemu_permasalahan' => $this->input->post('permasalahan', TRUE),
            'bertemu_irban' => $this->input->post('irban', TRUE),
            'bertemu_tanggal' => $this->input->post('tanggal', TRUE),
            'bertemu_create' => $bertemu_created
        ];
        
        $this->opd_model->tambah_bertemu($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Jadwal pertemuan anda berhasil terkirim, silahkan tunggu 1x24 jam.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        //echo "oke";
        redirect('opd/pertemuan');
    }

    public function bertemu_respon(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pertemuan Belum di respon";
        $data['bertemu_proses'] = $this->Pertemuan_model->data_bertemu($status='1');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('opd/bertemu_respon', $data);
        $this->load->view('templates/footer');
    }

    public function bertemu_terima(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pertemuan yang diterima";
        $data['bertemu_terima'] = $this->Pertemuan_model->data_bertemu($status='2');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('opd/bertemu_terima', $data);
        $this->load->view('templates/footer');
    }
    public function bertemu_tolak(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pertemuan yang ditolak";
        $data['bertemu_tolak'] = $this->Pertemuan_model->data_bertemu($status='3');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('opd/bertemu_tolak', $data);
        $this->load->view('templates/footer');
    }

    public function bertemu_semua(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Keseluruhan Pertemuan";
        $data['bertemu_semua'] = $this->Pertemuan_model->data_pertemuan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('opd/bertemu_semua', $data);
        $this->load->view('templates/footer');
    }

}
