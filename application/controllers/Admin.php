<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->library('form_validation');
        $this->load->library('pdf');
        
        $id = $this->session->userdata('id');
        $this->load->model('Auth_model');
        $this->load->model('Admin_model');
        $this->load->model('Konsultasi_model');
        $this->load->model('Pertemuan_model');
        $this->load->model('Petugas_model');
        $this->load->model('Masyarakat_model');
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
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    // konsul belum di respon
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

    // PROSES KONSULTASI
    public function proses_konsultasi()
    {
        $id = $this->uri->segment(3);
        $data['proses_konsul'] = $this->Konsultasi_model->proses_konsul($id);
        $data['title'] = "FORM JAWABAN KONSULTASI";
        $data['level'] = $this->session->userdata('level');

        $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('konsultasi/proses_konsultasi',$data);
            $this->load->view('templates/footer');
    }

    // JAWAB KONSUL
    public function jawab_konsul(){
        //echo "oke";
        $id = $this->input->post('id_konsul', TRUE);
        $jawaban_konsul = [
            'konsul_jawaban' => $this->input->post('jawaban', TRUE),
            'konsul_nomor' => $this->input->post('konsul_nomor', TRUE),
            'status' => '2'
        ];
        $this->Konsultasi_model->jawab_konsul($jawaban_konsul,$id);

        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Konsultasi berhasil terjawab.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/konsultasi_terima');
    }

    public function tolak_konsul(){
        //echo "oke";
        $id = $this->input->post('tolak_konsul', TRUE);
        $tolak_konsul = [
            'status' => '3'
        ];
        $this->Konsultasi_model->tolak_konsul($tolak_konsul,$id);

        $this->session->set_flashdata('message', '<div class="alert alert-danger  alert-dismissible fade show" role="alert"> Konsultas berhasil ditolak.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/proses_konsultasi');
        //echo "$id";
    }

    // PROSES PERTEMUAN
    public function proses_bertemu()
    {
        $id = $this->uri->segment(3);
        $data['proses_bertemu'] = $this->Pertemuan_model->proses_bertemu($id);
        $data['pegawai'] = $this->Admin_model->get_data_pegawai($id);
        $data['title'] = "FORM JAWABAN BERTEMU";
        $data['level'] = $this->session->userdata('level');
        // $this->form_validation->set_rules('bertemu_nomor', 'Nomor Register', 'trim|required');
        // $this->form_validation->set_rules('uraian_masalah', 'Uraian Masalah', 'trim|required');
        // $this->form_validation->set_rules('jawaban', 'Jawaban', 'trim|required');
        // $this->form_validation->set_rules('anggota1', 'Anggota', 'trim|required');
        // $this->form_validation->set_rules('opd1', 'Anggota', 'trim|required');
        // $this->form_validation->set_rules('ttd_irban', 'TTD Irban', 'trim|required');
        // $this->form_validation->set_rules('ttd_opd', 'TTD OPD', 'trim|required');
        // if ($this->form_validation->run() == false) {
        //     echo "gagal";
            
        // }else{
        //     //$this->jawab_bertemu();
        //     echo "done";
        // }

        $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('bertemu/proses_bertemu',$data);
            $this->load->view('templates/footer');
    }

        // JAWAB KONSUL
    public function jawab_bertemu(){
        //echo "oke";
        $id = $this->input->post('id_bertemu', TRUE);
        $jawaban_bertemu = [
            'bertemu_nomor' => $this->input->post('bertemu_nomor', TRUE),
            'bertemu_uraian' => $this->input->post('uraian_masalah', TRUE),
            'bertemu_jawaban' => $this->input->post('jawaban', TRUE),
            'anggota1' => $this->input->post('anggota1', TRUE),
            'anggota2' => $this->input->post('anggota2', TRUE),
            'anggota3' => $this->input->post('anggota3', TRUE),
            'opd1' => $this->input->post('opd1', TRUE),
            'opd2' => $this->input->post('opd2', TRUE),
            'opd3' => $this->input->post('opd3', TRUE),
            'ttd_irban' => $this->input->post('ttd_irban', TRUE),
            'ttd_opd' => $this->input->post('ttd_opd', TRUE),
            'status' => '2'
        ];
        $this->Pertemuan_model->jawab_bertemu($jawaban_bertemu,$id);

        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Pertemuan berhasil terjawab.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/bertemu_terima');
        //echo "done kakak";
    }

    // JAWAB BERTEMU
    public function terima_bertemu(){
        //echo "oke";
        $id = $this->uri->segment(3);
        $tolak_konsul = [
            'status' => '4'
        ];
        $this->Pertemuan_model->tolak_bertemu($tolak_konsul,$id);

        $this->session->set_flashdata('message', '<div class="alert alert-succes  alert-dismissible fade show" role="alert"> Pertemuan berhasil Diterima, silahkan proses pertemuan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/bertemu');
        //echo "done kakak";
    }

    // TOLAK BERTEMU
    public function tolak_bertemu(){
        //echo "oke";
        $id = $this->uri->segment(3);
        $tolak_konsul = [
            'status' => '3'
        ];
        $this->Pertemuan_model->tolak_bertemu($tolak_konsul,$id);

        $this->session->set_flashdata('message', '<div class="alert alert-danger  alert-dismissible fade show" role="alert"> Pertemuan berhasil ditolak.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/bertemu');
        //echo "done kakak";
    }

    // petugas
    

public function print_data_masyarakat()
{
    $header = array('NIK', 'Nama', 'Telp');
    $data = $this->Masyarakat_model->get_data_masyarakat();

    $pdf = new FPDF('l','mm','A5');
    $pdf->SetFont('Arial','',14);
    $pdf->AddPage();
    // Colors, line width and bold font
    $pdf->SetFillColor(255,0,0);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(128,0,0);
    $pdf->SetLineWidth(.3);
    $pdf->SetFont('','B');
    // Header
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,7,'PENGADUAN MASYARAKAT',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,7,'DAFTAR MASYARAKAT',0,1,'C');
    $pdf->SetFont('Arial','',12);
    $w = array(40, 100, 40);
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $pdf->Ln();
    // Color and font restoration
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    
    // Data
    $fill = false;
    foreach($data as $row)
    {
        $pdf->Cell($w[0],6,$row['nik'],'LR',0,'L',$fill);
        $pdf->Cell($w[1],6,$row['nama'],'LR',0,'L',$fill);
        $pdf->Cell($w[2],6,$row['telp'],'LR',0,'R',$fill);
        $pdf->Ln();
        $fill = !$fill;
    }
    // Closing line
    $pdf->Cell(array_sum($w),0,'','T');
    $pdf->Output();
}

public function print_data_petugas()
{
    $header = array('No.', 'Nama', 'Telp');
    $data = $this->Petugas_model->get_data_petugas();

    $pdf = new FPDF('l','mm','A5');
    $pdf->SetFont('Arial','',14);
    $pdf->AddPage();
    // Colors, line width and bold font
    $pdf->SetFillColor(255,0,0);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(128,0,0);
    $pdf->SetLineWidth(.3);
    $pdf->SetFont('','B');
    // Header
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,7,'PENGADUAN MASYARAKAT',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,7,'DAFTAR PETUGAS',0,1,'C');
    $pdf->SetFont('Arial','',12);
    $w = array(10, 100, 40);
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $pdf->Ln();
    // Color and font restoration
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    
    // Data
    $fill = false;
    $no=1;
    foreach($data as $row)
    {
        $pdf->Cell($w[0],6,$no++,'LR',0,'C',$fill);
        $pdf->Cell($w[1],6,$row['nama_petugas'],'LR',0,'L',$fill);
        $pdf->Cell($w[2],6,$row['telp'],'LR',0,'R',$fill);
        $pdf->Ln();
        $fill = !$fill;
    }
    // Closing line
    $pdf->Cell(array_sum($w),0,'','T');
    $pdf->Output();
}

public function print_data_pengaduan()
{
    $header = array('No.', 'Kategori', 'Pengaduan','Tanggal','Status');
    $data = $this->Admin_model->get_data_pengaduan(); 

    $pdf = new FPDF('l','mm','A5');
    $pdf->SetFont('Arial','',14);
    $pdf->AddPage();
    // Colors, line width and bold font
    $pdf->SetFillColor(255,0,0);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(128,0,0);
    $pdf->SetLineWidth(.3);
    $pdf->SetFont('','B');
    // Header
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,7,'PENGADUAN MASYARAKAT',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,7,'DAFTAR PENGADUAN',0,1,'C');
    $pdf->SetFont('Arial','',12);
    $w = array(10, 30, 90, 30, 30);
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $pdf->Ln();
    // Color and font restoration
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    
    // Data
    $fill = false;
    $no=1;
    foreach($data as $row)
    {
        $pdf->Cell($w[0],6,$no++,'LR',0,'C',$fill);
        $pdf->Cell($w[1],6,$row['nama_kategori'],'LR',0,'L',$fill);
        $pdf->Cell($w[2],6,$row['isi_pengaduan'],'LR',0,'L',$fill);
        $pdf->Cell($w[3],6,$row['tanggal_pengaduan'],'LR',0,'R',$fill);
        $pdf->Cell($w[4],6,$row['status'],'LR',0,'L',$fill);
        $pdf->Ln();
        $fill = !$fill;
    }
    // Closing line
    $pdf->Cell(array_sum($w),0,'','T');
    $pdf->Output();
}


}
