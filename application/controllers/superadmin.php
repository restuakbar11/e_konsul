<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        $this->load->model('Konsultasi_model');
        $this->load->model('opd_model');
        $this->load->model('Pertemuan_model');
        $this->load->model('Auth_model');
    }

    public function index()
    {
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
        $this->load->view('superadmin/index', $data);
        $this->load->view('templates/footer');
    }

    public function form_konsultasi(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Form Konsultasi";
        $data['instansi'] = $this->Admin_model->get_data_instansi();
        $data['irban'] = $this->Admin_model->get_data_irban();
        $data['permasalahan'] = $this->Admin_model->get_data_permasalahan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/form_konsultasi', $data);
        $this->load->view('templates/footer');
    }

    public function konsul()
    {
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Form Konsultasi";
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('instansi', 'Instansi', 'trim|required');
        $this->form_validation->set_rules('irban', 'Irban', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('nohp', 'Nohp', 'trim|required');
        $this->form_validation->set_rules('permasalahan', 'Permasalahan', 'trim|required');
        $this->form_validation->set_rules('uraian', 'Uraian', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header');
            $this->load->view('templates/auth_footer');
            $this->load->view('superadmin/form_konsultasi', $data);
        } else {
            $this->aksi_konsul();
            //echo "oke ya";
        }
    }

    private function aksi_konsul()
    {
        $data = [
            'konsul_name' => $this->input->post('nama', TRUE),
            'konsul_nip' => $this->input->post('nip', TRUE),
            'konsul_instansi' => $this->input->post('instansi', TRUE),
            'konsul_irban' => $this->input->post('irban', TRUE),
            'konsul_email' => $this->input->post('email', TRUE),
            'konsul_hp' => $this->input->post('nohp', TRUE),
            'konsul_permasalahan' => $this->input->post('permasalahan', TRUE),
            'konsul_uraian' => $this->input->post('uraian', TRUE)
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

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/form_konsultasi', $data);
            $this->load->view('templates/footer');
    }

    public function konsultasi(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Konsultasi Belum di respon";
        $data['konsul_blmRespon'] = $this->Konsultasi_model->data_konsul($status='1');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('konsultasi/data_konsultasi', $data);
        $this->load->view('templates/footer');
    }

    public function konsultasi_tolak(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Konsultasi yang ditolak";
        $data['konsul_tolak'] = $this->Konsultasi_model->data_konsul($status='3');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('konsultasi/konsultasi_tolak', $data);
        $this->load->view('templates/footer');
    }

    public function konsultasi_terima(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Konsultasi yang diterima";
        $data['konsul_terima'] = $this->Konsultasi_model->data_konsul($status='2');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('konsultasi/konsultasi_terima', $data);
        $this->load->view('templates/footer');
    }

    public function konsultasi_semua(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Keseluruhan Konsultasi";
        $data['konsul_semua'] = $this->Konsultasi_model->data_konsultasi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('konsultasi/konsultasi_semua', $data);
        $this->load->view('templates/footer');
    }

    //PERTEMUAN
    public function bertemu(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pertemuan Belum di respon";
        $data['bertemu_proses'] = $this->Pertemuan_model->data_bertemu($status='1');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('bertemu/bertemu_proses', $data);
        $this->load->view('templates/footer');
    }

    public function bertemu_tolak(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pertemuan yang ditolak";
        $data['bertemu_tolak'] = $this->Pertemuan_model->data_bertemu($status='3');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('bertemu/bertemu_tolak', $data);
        $this->load->view('templates/footer');
    }

    public function bertemu_terima(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Pertemuan yang diterima";
        $data['bertemu_terima'] = $this->Pertemuan_model->data_bertemu($status='2');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('bertemu/bertemu_terima', $data);
        $this->load->view('templates/footer');
    }

    public function bertemu_semua(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Keseluruhan Pertemuan";
        $data['bertemu_semua'] = $this->Pertemuan_model->data_pertemuan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('bertemu/bertemu_semua', $data);
        $this->load->view('templates/footer');
    }

    public function form_pertemuan()
    {
        
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Form Pertemuan";
        $data['instansi'] = $this->Admin_model->get_data_instansi();
        $data['irban'] = $this->Admin_model->get_data_irban();
        $data['permasalahan'] = $this->Admin_model->get_data_permasalahan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/form_pertemuan', $data);
        $this->load->view('templates/footer');
    }

    public function proses_konsultasi()
    {
        $id = $this->uri->segment(3);
        $data['proses_konsul'] = $this->Konsultasi_model->proses_konsul($id);
        $data['title'] = "FORM JAWABAN KONSULTASI";
        $data['level'] = $this->session->userdata('level');
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'trim|required');
        if ($this->form_validation->run() == false) {
            echo "gagal";
            
        }else{
            $this->jawab_konsul();
            //echo "done";
        }

        $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('konsultasi/proses_konsultasi',$data);
            $this->load->view('templates/footer');
    }

    private function jawab_konsul(){
        //echo "oke";
        $id = $this->input->post('id_konsul', TRUE);
        $jawaban_konsul = [
            'konsul_jawaban' => $this->input->post('jawaban', TRUE),
            'status' => '2'
        ];
        $this->Konsultasi_model->jawab_konsul($jawaban_konsul,$id);

        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Konsultasi berhasil terjawab.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        //redirect('admin/data_petugas');
    }

    public function proses_bertemu()
    {
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Form Pertemuan";
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('instansi', 'Instansi', 'trim|required');
        $this->form_validation->set_rules('permasalahan', 'Permasalahan', 'trim|required');
        $this->form_validation->set_rules('irban', 'Irban', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header');
            $this->load->view('templates/auth_footer');
            $this->load->view('superadmin/form_pertemuan', $data);
        } else {
            $this->aksi_bertemu();
            //echo "oke ya";
        }
    }

    private function aksi_bertemu()
    {
        $data = [
            'bertemu_name' => $this->input->post('nama', TRUE),
            'bertemu_nip' => $this->input->post('nip', TRUE),
            'bertemu_instansi' => $this->input->post('instansi', TRUE),
            'bertemu_permasalahan' => $this->input->post('permasalahan', TRUE),
            'bertemu_irban' => $this->input->post('irban', TRUE),
            'bertemu_tanggal' => $this->input->post('tanggal', TRUE)
        ];
        
        $this->opd_model->tambah_bertemu($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Jadwal pertemuan anda berhasil terkirim, silahkan tunggu 1x24 jam.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');

        redirect('superadmin/form_pertemuan');
    }

    public function data_permasalahan(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Master Permasalahan";
        $data['m_permasalahan'] = $this->Admin_model->data_permasalahan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/master_permasalahan', $data);
        $this->load->view('templates/footer');
    }

    public function form_permasalahan()
    {
        
        $id = $this->uri->segment(3);
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Form Master Permasalahan";
        $data['m_permasalahan'] = $this->Admin_model->get_data_permasalahan_by_id($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/form_permasalahan', $data);
        $this->load->view('templates/footer');
    }

    public function master_permasalahan()
    {
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Form Master Permasalahan";
        $this->form_validation->set_rules('permasalahan', 'Permasalahan', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/form_permasalahan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->aksi_permasalahan();
            //echo "oke ya";
        }
    }

    private function aksi_permasalahan()
    {
        $permasalahan = $this->input->post('permasalahan',TRUE);
        $data = [
            'permasalahan_name' => $permasalahan
        ];
        
        $this->Admin_model->tambah_permasalahan($data);
        //echo "$test";
        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Master Permasalahan Berhasil Tersimpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        //echo "oke";
        redirect('superadmin/data_permasalahan');
    }

    public function edit_permasalahan()
    {
        $id = $this->uri->segment(3);
        $data['m_permasalahan'] = $this->Admin_model->get_data_permasalahan_by_id($id);
        $data['title'] = "FORM EDIT MASTER PERMASALAHAN";
        $data['level'] = $this->session->userdata('level');
        $this->form_validation->set_rules('permasalahan', 'permasalahan', 'trim|required');
        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/ubah_permasalahan',$data);
            $this->load->view('templates/footer');
            //echo "gagal";
            
        }else{
            $this->edit_masalah();
           // echo "done";
        }

    }

    private function edit_masalah(){
        $id = $this->input->post('id',TRUE);
        $data = [
            'permasalahan_name' => $this->input->post('permasalahan', TRUE),
        ];
        $this->Admin_model->ubah_permasalahan($data,$id);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button></div>');
        redirect('superadmin/data_permasalahan');
    }

    public function hapus_permasalahan()
    {
        $id = $this->uri->segment(3);
        $this->Admin_model->hapus_permasalahan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        
        redirect('superadmin/data_permasalahan');
    }

    public function data_user(){
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Data Master User";
        $data['m_user'] = $this->Admin_model->data_user();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/master_user', $data);
        $this->load->view('templates/footer');
    }

    public function form_tambah_user()
    {
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Form Tambah User Inspektorat";
        $data['irban'] = $this->Admin_model->get_data_irban();
        $this->form_validation->set_rules('pegawai', 'Pegawai', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('irban', 'Irban', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/form_tambah_user', $data);
            $this->load->view('templates/footer');
        } else {
            $this->aksi_tambah_user();
            //echo "oke ya";
        }
    }

    private function aksi_tambah_user()
    {
        $pegawai = $this->input->post('pegawai',TRUE);
        $email = $this->input->post('email',TRUE);
        $password = $this->input->post('password',TRUE);
        $irban = $this->input->post('irban',TRUE);
        // TAMBAH USER
        $data = [
            'email' => $this->input->post('email',TRUE),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'level' => 'admin',
            'irban' => $this->input->post('irban',TRUE)
        ];
        
        $this->Auth_model->tambah_user($data);

        $dataMasyarakat = [
            'nip' => $this->input->post('nip', TRUE),
            'nama' => $this->input->post('pegawai', TRUE),
            'telp' => $this->input->post('telp', TRUE),
            'id_login' => $this->Auth_model->get_user_terakhir()->ID_LOGIN,
            'instansi' => '0'
        ];
        $this->opd_model->tambah_masyarakat($dataMasyarakat);
        //echo "$test";
        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Tambah user berhasil.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        //echo "oke mantap";
        redirect('superadmin/form_tambah_user');
    }

    public function edit_user()
    {
        $id = $this->uri->segment(3);
        $data['m_login'] = $this->Admin_model->get_data_login_by_id($id);
        $data['m_opd'] = $this->Admin_model->get_data_opd_by_id($id);
        $data['title'] = "FORM EDIT MASTER USER";
        $data['level'] = $this->session->userdata('level');
        $this->form_validation->set_rules('nip', 'Nip', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telp', 'trim|required');
        $this->form_validation->set_rules('pegawai', 'Pegawai', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/ubah_tambah_user',$data);
            $this->load->view('templates/footer');
            //echo "gagal";
            
        }else{
            $this->edit_aksi_user();
           //echo "done";
        }

    }

    private function edit_aksi_user(){
        $id = $this->input->post('id',TRUE);
        $pegawai = $this->input->post('pegawai',TRUE);
        $email = $this->input->post('email',TRUE);
        $password = $this->input->post('password',TRUE);
        // EDIT USER
        $data = [
            'email' => $this->input->post('email',TRUE),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        ];
        
        $this->Admin_model->ubah_login($data,$id);

        $dataUser = [
            'nip' => $this->input->post('nip', TRUE),
            'nama' => $this->input->post('pegawai', TRUE),
            'telp' => $this->input->post('telp', TRUE)
        ];
        $this->Admin_model->ubah_user($dataUser, $id);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button></div>');
       //echo "mantap";
       redirect('superadmin/data_user');
    }

}
