<?php

if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Profile_model extends CI_Model
{
    public $table = 'kb_user_detail';

    function __construct()
    {
        parent::__construct();
    }

    function get_data()
    {
        $this->db->select('*');
        $this->db->from('kb_user_detail');

        $query = $this->db->get();
        return $query->result();
    }

    function get_dataall($param,$sampai,$dari)
    {
        $this->db->select('*');
        if($param['query1']!='') {
            $this->db->like('name',$param['query1']);
        }

        $query = $this->db->get('kb_user_detail',$sampai,$dari);
        return $query->result();
    }

    function jumlah(){
        return $this->db->get('kb_user_detail')->num_rows();
    }

    function get_data_edit($id)
    {
        $this->db->select('*');
        $this->db->from('kb_user_detail');
        $this->db->where('ID', $id);

        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function save_data($data)
    {
        $query = $this->db->insert('kb_user_detail', $data);
        return $query;
    }

    function update_data($id,$data)
    {
        $this->db->where('ID', $id);
        return $this->db->update('kb_user_detail', $data);
    }
    
    function update_data_pass($id,$data)
    {
        $this->db->where('ID', $id);
        return $this->db->update('kb_users', $data);
    }

    function hapus($id)
    {
        $this->db->where('ID', $id);
        return $this->db->delete('kb_user_detail');
    }

}

/* End of file profile_model.php */
/* Location: ./application/models/profile_model.php */
/* Please DO NOT modify this information : */
/* Generated by Codeigniter CRUD Generator 2016-05-20 13:22:01 */
?>