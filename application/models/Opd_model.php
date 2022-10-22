<?php
class Opd_model extends CI_Model
{
    public function get_data_masyarakat(){
        $this->db->select('*');
        $this->db->from('opd');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function tambah_masyarakat($data)
    {
        $this->db->insert('opd', $data);
    }

    public function tambah_konsul($data)
    {
        $this->db->insert('tr_konsul', $data);
    }

    public function tambah_bertemu($data)
    {
        $this->db->insert('tr_bertemu', $data);
    }

    public function hapus_masyarakat($nik){
        $this->db->where('nik', $nik);
        $this->db->delete('opd');
    }

    public function get_nik($id){
        $this->db->select("nik");
        $this->db->from('opd');
        $this->db->where('id_login', $id);
        return $this->db->get()->row_array();
    }
    
    public function simpan_pengaduan($data)
    {
        $this->db->insert('pengaduan', $data);
    }

    public function get_data_pengaduan($id){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
        $this->db->where('nik', $id);
        return $this->db->get()->result_array();
    }

    
    public function get_detail_data_pengaduan($id){
        $this->db->select('*');
        $this->db->from('pengaduan a'); 
        $this->db->join('kategori b', 'b.id_kategori=a.id_kategori', 'left');
        $this->db->join('tanggapan c', 'c.id_pengaduan=a.id_pengaduan', 'left');
        $this->db->where('c.id_pengaduan', $id);
        return $this->db->get()->row_array();
    }
}
