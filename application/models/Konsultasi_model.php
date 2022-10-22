<?php
class Konsultasi_model extends CI_Model
{
    public function data_konsul($status){
        $where = "status=$status AND isActive='Y'";
        $this->db->select('*');
        $this->db->from('tr_konsul a');
        $this->db->join('m_instansi b', 'b.Instansi_id=a.konsul_instansi', 'left');
        $this->db->join('m_permasalahan c', 'c.permasalahan_id=a.konsul_permasalahan', 'left');
        $this->db->join('m_irban d', 'd.irban_id=a.konsul_irban', 'left');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }

    public function data_konsultasi(){
        $this->db->select('*');
        $this->db->from('tr_konsul a');
        $this->db->join('m_instansi b', 'b.Instansi_id=a.konsul_instansi', 'left');
        $this->db->join('m_permasalahan c', 'c.permasalahan_id=a.konsul_permasalahan', 'left');
        $this->db->where('IsActive', 'Y');
        return $this->db->get()->result_array();
    }

    public function proses_konsul($id){
        //return $this->db->get_where('tr_konsul', ['konsul_id' => $id])->row_array();
        $this->db->select('*');
        $this->db->from('tr_konsul a');
        $this->db->join('m_instansi b', 'b.Instansi_id=a.konsul_instansi', 'left');
        $this->db->join('m_permasalahan c', 'c.permasalahan_id=a.konsul_permasalahan', 'left');
        $this->db->join('m_irban d', 'd.irban_id=a.konsul_irban', 'left');
        $this->db->where('konsul_id', $id);
        return $this->db->get()->row_array();
    }

    public function nomor_konsul(){
        //return $this->db->get_where('tr_konsul', ['konsul_id' => $id])->row_array();
        $this->db->select('LPAD(MAX(LEFT(no_urut,4))+1,4,"0000") AS u');
        $this->db->from('tr_konsul');
        return $this->db->get()->row_array();
    }

    public function jawab_konsul($data,$id){
        $this->db->where('konsul_id', $id);
        $this->db->update('tr_konsul', $data);
    }

    public function tolak_konsul($data,$id){
        $this->db->where('konsul_id', $id);
        $this->db->update('tr_konsul', $data);
    }


    
}
