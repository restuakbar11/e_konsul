<?php
class Admin_model extends CI_Model
{
    public function get_data_kategori(){
        $query = $this->db->get('kategori')->result_array();
        return $query;
    }

    public function get_data_instansi(){
        $query = $this->db->get('m_instansi')->result_array();
        return $query;
    }

    public function get_data_irban(){
        $query = $this->db->get('m_irban')->result_array();
        return $query;
    }

    public function get_data_permasalahan(){
        $query = $this->db->get('m_permasalahan')->result_array();
        return $query;
    }

    public function get_data_pegawai(){
        $query = $this->db->get('m_pegawai')->result_array();
        return $query;
    }

    public function data_permasalahan(){
        $this->db->select('*');
        $this->db->from('m_permasalahan');
        return $this->db->get()->result_array();
    }

    public function data_user(){
        $this->db->select('*');
        $this->db->from('login a');
        $this->db->join('opd b', 'b.id_login=a.id_login', 'inner');
        return $this->db->get()->result_array();
    }

    public function get_data_permasalahan_by_id($id){
        return $this->db->get_where('m_permasalahan', ['permasalahan_id' => $id])->row_array();
    }

    public function get_data_login_by_id($id){
        return $this->db->get_where('login', ['id_login' => $id])->row_array();
    }

    public function get_data_opd_by_id($id){
        return $this->db->get_where('opd', ['id_login' => $id])->row_array();
    }

    public function tambah_permasalahan($data)
    {
        $this->db->insert('m_permasalahan', $data);
    }

    public function hapus_permasalahan($id){
        $this->db->where('permasalahan_id', $id);
        $this->db->delete('m_permasalahan');
    }

    public function ubah_permasalahan($data,$id){
        $this->db->where('permasalahan_id', $id);
        $this->db->update('m_permasalahan', $data);
    }

    public function ubah_login($data,$id){
        $this->db->where('id_login', $id);
        $this->db->update('login', $data);
    }

    public function ubah_user($data,$id){
        $this->db->where('id_login', $id);
        $this->db->update('opd', $data);
    }

    public function get_data_kategori_by_id($id){
        return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
    }

    public function ubah_kategori($data,$id){
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
    }

    public function hapus_kategori($id){
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }

    public function approved($id){
        $data = [
            'status' => 'approved'
        ];
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $data);
    }

    public function jumlah($status){
        
        $where = "status=$status AND isActive='Y'";
        return $this->db->where($where)->from("tr_konsul")->count_all_results();
    }

    public function semua_konsul(){
        $where = "isActive='Y'";
        return $this->db->where($where)->from("tr_konsul")->count_all_results();
    }

    public function jumlah_b($status){
        if ($status=='1') {
            $where = "status in('1','4') AND isActive='Y'";
        }else{
            $where = "status=$status AND isActive='Y'";
        }
        return $this->db->where($where)->from("tr_bertemu")->count_all_results();
    }

    public function semua_bertemu(){
        $where = "isActive='Y'";
        return $this->db->where($where)->from("tr_bertemu")->count_all_results();
    }
}
