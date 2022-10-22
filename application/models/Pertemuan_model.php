<?php
class Pertemuan_model extends CI_Model
{
    public function data_bertemu($status){
        if ($status == 1) {
            $where = "status in('1','4') AND isActive='Y'";
        }else{
            $where = "status=$status AND isActive='Y'";
        }
        $this->db->select('*');
        $this->db->from('tr_bertemu a');
        $this->db->join('m_instansi b', 'b.Instansi_id=a.bertemu_instansi', 'left');
        $this->db->join('m_permasalahan c', 'c.permasalahan_id=a.bertemu_permasalahan', 'left');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }

    public function data_pertemuan(){
        $this->db->select('*');
        $this->db->from('tr_bertemu a');
        $this->db->join('m_instansi b', 'b.Instansi_id=a.bertemu_instansi', 'left');
        $this->db->join('m_permasalahan c', 'c.permasalahan_id=a.bertemu_permasalahan', 'left');
        $this->db->where('isActive', 'Y');
        return $this->db->get()->result_array();
    }

    public function proses_bertemu($id){
        //return $this->db->get_where('tr_konsul', ['konsul_id' => $id])->row_array();
        $this->db->select('*');
        $this->db->from('tr_bertemu a');
        $this->db->join('m_instansi b', 'b.Instansi_id=a.bertemu_instansi', 'left');
        $this->db->join('m_permasalahan c', 'c.permasalahan_id=a.bertemu_permasalahan', 'left');
        $this->db->join('m_irban d', 'd.irban_id=a.bertemu_irban', 'left');
        $this->db->where('bertemu_id', $id);
        return $this->db->get()->row_array();
    }

    public function jawab_bertemu($data,$id){
        $this->db->where('bertemu_id', $id);
        $this->db->update('tr_bertemu', $data);
    }

    public function tolak_bertemu($data,$id){
        $this->db->where('bertemu_id', $id);
        $this->db->update('tr_bertemu', $data);
    }

    public function nomor_pertemuan(){
        //return $this->db->get_where('tr_konsul', ['konsul_id' => $id])->row_array();
        $this->db->select('LPAD(MAX(LEFT(no_urut,4))+1,4,"0000") AS u');
        $this->db->from('tr_bertemu');
        return $this->db->get()->row_array();
    }

    public function getAnggota1($id){
        $this->db->select('b.pegawai_name,b.jabatan');
        $this->db->from('tr_bertemu a');
        $this->db->join('m_pegawai b', 'b.pegawai_id=a.anggota1', 'inner');
        $this->db->where('bertemu_id', $id);
        return $this->db->get()->row_array();
    }

    public function getAnggota2($id){
        $this->db->select('b.pegawai_name,b.jabatan');
        $this->db->from('tr_bertemu a');
        $this->db->join('m_pegawai b', 'b.pegawai_id=a.anggota2', 'inner');
        $this->db->where('bertemu_id', $id);
        return $this->db->get()->row_array();
    }

    public function getAnggota3($id){
        $this->db->select('b.pegawai_name,b.jabatan');
        $this->db->from('tr_bertemu a');
        $this->db->join('m_pegawai b', 'b.pegawai_id=a.anggota3', 'inner');
        $this->db->where('bertemu_id', $id);
        return $this->db->get()->row_array();
    }

     public function getOpd1($id){
        $this->db->select('b.pegawai_name,b.jabatan');
        $this->db->from('tr_bertemu a');
        $this->db->join('m_pegawai b', 'b.pegawai_id=a.opd1', 'inner');
        $this->db->where('bertemu_id', $id);
        return $this->db->get()->row_array();
    }

    public function getOpd2($id){
        $this->db->select('b.pegawai_name,b.jabatan');
        $this->db->from('tr_bertemu a');
        $this->db->join('m_pegawai b', 'b.pegawai_id=a.opd2', 'inner');
        $this->db->where('bertemu_id', $id);
        return $this->db->get()->row_array();
    }

    public function getOpd3($id){
        $this->db->select('b.pegawai_name,b.jabatan');
        $this->db->from('tr_bertemu a');
        $this->db->join('m_pegawai b', 'b.pegawai_id=a.opd3', 'inner');
        $this->db->where('bertemu_id', $id);
        return $this->db->get()->row_array();
    }

    
}
