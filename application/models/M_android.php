<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_android extends CI_Model
{

    function LoginApi($email, $password)
    {
        $where = "email='$email' AND password='$password'";
        $this->db->select('*');
        $this->db->from('api_restu');
        $this->db->where($where);
        return $this->db->get()->result_array();

        //return $this->db->where($where)->from("api_restu")->count_all_results();
    }
}