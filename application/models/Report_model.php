<?php
class Report_model extends CI_Model
{

    public function getKonsultasi($id){

        $data = $this->db->query("SELECT * FROM tr_konsul a
                INNER JOIN m_irban b ON a.konsul_irban=b.irban_id 
                INNER JOIN m_instansi c ON a.konsul_instansi=c.Instansi_id
                INNER JOIN m_permasalahan d ON a.konsul_permasalahan=d.permasalahan_id
                WHERE konsul_id='$id'");
        return $data->result_array();
    }

    public function getBertemu($id){

        $data = $this->db->query("SELECT * FROM tr_bertemu a
                INNER JOIN m_irban b ON a.bertemu_irban=b.irban_id 
                INNER JOIN m_instansi c ON a.bertemu_instansi=c.Instansi_id
                INNER JOIN m_permasalahan d ON a.bertemu_permasalahan=d.permasalahan_id
                WHERE bertemu_id='$id'");
        return $data->result_array();
    }

    public function getAnggota1($id){

        $data = $this->db->query("SELECT b.pegawai_name,b.jabatan FROM tr_bertemu a
                INNER JOIN m_pegawai b ON a.anggota1=b.pegawai_id 
                WHERE bertemu_id='$id'");
        return $data->result_array();
    }

    public function getAnggota2($id){

        $data = $this->db->query("SELECT b.pegawai_name,b.jabatan FROM tr_bertemu a
                INNER JOIN m_pegawai b ON a.anggota2=b.pegawai_id 
                WHERE bertemu_id='$id'");
        return $data->result_array();
    }

    public function getAnggota3($id){

        $data = $this->db->query("SELECT b.pegawai_name,b.jabatan FROM tr_bertemu a
                INNER JOIN m_pegawai b ON a.anggota3=b.pegawai_id 
                WHERE bertemu_id='$id'");
        return $data->result_array();
    }

    public function getAnggota4($id){

        $data = $this->db->query("SELECT b.pegawai_name,b.jabatan FROM tr_bertemu a
                INNER JOIN m_pegawai b ON a.ttd_irban=b.pegawai_id 
                WHERE bertemu_id='$id'");
        return $data->result_array();
    }

    public function getHari($hari){
        switch  ($hari){
        case  "Monday":
        return  " Senin ";
        break;
        case  "Tuesday":
        return  " Selasa ";
        break;
        case  "Wednesday":
        return  " Rabu ";
        break;
        case  "Thursday":
        return  " Kamis ";
        break;
        case  "Friday":
        return  " Jum'at ";
        break;
        case  "Saturday":
        return  " Sabtu ";
        break;
        case  "Sunday":
        return  " Minggu ";
        break;
        }
    }

    function getTanggal($tgl){
        switch  ($tgl){
        case  "01":
        return  " Satu ";
        break;
        case  "02":
        return  " Dua ";
        break;
        case  "03":
        return  " Tiga ";
        break;
        case  "04":
        return  " Empat ";
        break;
        case  "05":
        return  " Lima ";
        break;
        case  "06":
        return  " Enam ";
        break;
        case  "07":
        return  " Tujuh ";
        break;
        case  "08":
        return  " Delapan ";
        break;
        case  "09":
        return  " Sembilan ";
        break;
        case  "10":
        return  " Sepuluh ";
        break;
        case  "11":
        return  " Sebelas ";
        break;
        case  "12":
        return  " Dua Belas ";
        break;
        case  "13":
        return  " Tiga Belas ";
        break;
        case  "14":
        return  " Empat Belas ";
        break;
        case  "15":
        return  " Lima Belas ";
        break;
        case  "16":
        return  " Enam Belas ";
        break;
        case  "17":
        return  " Tujuh Belas ";
        break;
        case  "18":
        return  " Delapan Belas ";
        break;
        case  "19":
        return  " Sembilan Belas ";
        break;
        case  "20":
        return  " Dua Puluh ";
        break;
        case  "21":
        return  " Dua Puluh Satu ";
        break;
        case  "22":
        return  " Dua Puluh Dua ";
        break;
        case  "23":
        return  " Dua Puluh Tiga ";
        break;
        case  "24":
        return  " Dua Puluh Empat ";
        break;
        case  "25":
        return  " Dua puluh Lima ";
        break;
        case  "26":
        return  " Dua Puluh Enam ";
        break;
        case  "27":
        return  " Dua Puluh Tujuh ";
        break;
        case  "28":
        return  " Dua Puluh Delapan ";
        break;
        case  "29":
        return  " Dua Puluh Sembilan ";
        break;
        case  "30":
        return  " Tiga Puluh ";
        break;
        case  "31":
        return  " Tiga puluhs Satu ";
        break;
        }
    }

    public function getBulan($bln){
        switch  ($bln){
        case  "01":
        return  " Januari ";
        break;
        case  "02":
        return  " Februari ";
        break;
        case  "03":
        return  " Maret ";
        break;
        case  "04":
        return  " April ";
        break;
        case  "05":
        return  " Mei ";
        break;
        case  "06":
        return  " Juni ";
        break;
        case  "07":
        return  " Juli ";
        break;
        case  "08":
        return  " Agustus ";
        break;
        case  "09":
        return  " September ";
        break;
        case  "10":
        return  " Oktober ";
        break;
        case  "11":
        return  " November ";
        break;
        case  "12":
        return  " Desember ";
        break;
        }
    }

    public function getTahun($x){
   
        $x = abs($x);
        $angka = array (""," satu ", " dua ", " tiga ", " empat ", " lima ", " enam ", " tujuh ", " delapan ", " sembilan ", " sepuluh ", " sebelas ");
        $temp = "";
        
        if($x < 12){
           $temp = " ".$angka[$x];
          }else if($x<20){
           $temp = $this->getTahun($x - 10)."belas";
          }else if ($x<100){
           $temp = $this->getTahun($x/10)."puluh". $this->getTahun($x%10);
          }else if($x<200){
           $temp = " seratus".$this->getTahun($x-100);
          }else if($x<1000){
           $temp = $this->getTahun($x/100)."ratus".$this->getTahun($x%100);  
          }else if($x<2000){
           $temp = " seribu".$this->getTahun($x-1000);
          }else if($x<1000000){
           $temp = $this->getTahun($x/1000)."ribu".$this->getTahun($x%1000);  
          } 
         
        return $temp;
    }

    function getOpd($id_opd){
   
        $this->db->select('Instansi_name');
        $this->db->where('Instansi_id', $id_opd);
        $q = $this->db->get('m_instansi');
        $data  = $q->result_array();
        $instansi = $data[0];
        return $instansi;
    }
}
