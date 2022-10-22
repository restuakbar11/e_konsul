<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class report extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
        $this->load->model('Report_model');
    }

    public function r_konsultasi(){
        $id_konsul = $this->uri->segment(3);
        $data = $this->Report_model->getKonsultasi($id_konsul);

        foreach ($data as $konsultasi) {
            $restu['no_urut'] = $konsultasi['no_urut'];
            $restu['nomor'] = $konsultasi['konsul_nomor'];
            $restu['day'] = date('l', strtotime($konsultasi['konsul_tanggal']));
            $restu['tgl'] = date('d',strtotime($konsultasi['konsul_tanggal']));
            $restu['bln'] = date('m',strtotime($konsultasi['konsul_tanggal']));
            $restu['thn'] = date('Y',strtotime($konsultasi['konsul_tanggal']));
            $restu['hari'] = $this->Report_model->getHari($restu['day']);
            $restu['tanggal'] = $this->Report_model->getTanggal($restu['tgl']);
            $restu['bulan'] = $this->Report_model->getBulan($restu['bln']);
            $restu['tahun'] = $this->Report_model->getTahun($restu['thn']);
            $restu['irban'] = $konsultasi['irban_name'];
            $restu['opd'] = $konsultasi['Instansi_name'];
            $restu['permasalahan_name'] = $konsultasi['permasalahan_name'];
            $restu['jawaban'] = $konsultasi['konsul_jawaban'];
            $restu['nama_konsul'] = $konsultasi['konsul_name'];
        }
        $this->load->view('report/laporan_konsultasi', $restu);
       // echo "$id_konsul";
    }

    public function r_bertemu()
    {
        $id_bertemu = $this->uri->segment(3);
        $data = $this->Report_model->getBertemu($id_bertemu);
        $data2 = $this->Report_model->getAnggota1($id_bertemu);
        // INSPEKTORAT ANGGOTA
        foreach ($data2 as $anggota1) {
            $restu['anggota1'] = $anggota1['pegawai_name'];
            $restu['jabatan1'] = $anggota1['jabatan'];
        }

        $data3 = $this->Report_model->getAnggota2($id_bertemu);
        foreach ($data3 as $anggota2) {
            $restu['anggota2'] = $anggota2['pegawai_name'];
            $restu['jabatan2'] = $anggota2['jabatan'];
        }

        $data4 = $this->Report_model->getAnggota3($id_bertemu);
        foreach ($data4 as $anggota3) {
            $restu['anggota3'] = $anggota3['pegawai_name'];
            $restu['jabatan3'] = $anggota3['jabatan'];
        }

        $data5 = $this->Report_model->getAnggota4($id_bertemu);
        foreach ($data5 as $ttd_irban) {
            $restu['ttd_irban'] = $ttd_irban['pegawai_name'];
        }
       

        foreach ($data as $bertemu) {
            $restu['nomor_urut'] = $bertemu['no_urut'];
            $restu['nomor'] = $bertemu['bertemu_nomor'];
            $restu['day'] = date('l', strtotime($bertemu['bertemu_tanggal']));
            $restu['tgl'] = date('d',strtotime($bertemu['bertemu_tanggal']));
            $restu['bln'] = date('m',strtotime($bertemu['bertemu_tanggal']));
            $restu['thn'] = date('Y',strtotime($bertemu['bertemu_tanggal']));
            $restu['hari'] = $this->Report_model->getHari($restu['day']);
            $restu['tanggal'] = $this->Report_model->getTanggal($restu['tgl']);
            $restu['bulan'] = $this->Report_model->getBulan($restu['bln']);
            $restu['tahun'] = $this->Report_model->getTahun($restu['thn']);
            $restu['irban'] = $bertemu['irban_name'];
            $restu['opd'] = $bertemu['Instansi_name'];
            $restu['permasalahan_name'] = $bertemu['permasalahan_name'];
            $restu['jawaban'] = $bertemu['bertemu_jawaban'];
            $restu['nama_bertemu'] = $bertemu['bertemu_name'];
            $restu['opd1'] = $bertemu['opd1'];
            $restu['opd2'] = $bertemu['opd2'];
            $restu['opd3'] = $bertemu['opd3'];
            $restu['uraian_masalah'] = $bertemu['bertemu_uraian'];
            $restu['ttd_opd'] = $bertemu['ttd_opd'];
        }
        $this->load->view('report/laporan_bertemu', $restu);
    }

    public function coba(){
    $pdf = new FPDF('P', 'mm','Letter');
    $pdf->AddPage();
    $pdf->AliasNbPages();
    $pdf->SetMargins(1,1,1);
    $pdf->SetFont('times','B',12);

    $pdf->Cell(0,0.9,'Laporan Barang',0,0,'C');
   
    $pdf->Ln();   
    $tgl=date('Y-m-d');
    $pdf->SetFont('times','B',8);

    $pdf->SetFont('times','B',10);
    $pdf->Row(array("NO", "NAMA", "SATUAN", "STOK"));
   
    $pdf->SetFont('times','',10);
    $pdf->Row(array("1", "Buku Tulis Matematika Kualitas ABCD Kiki 80 gram 1 Lusin ", "Lusin", "100"));
    $pdf->Output();
    }


}