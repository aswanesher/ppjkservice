<?php

if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Halaman_model extends CI_Model
{
    public $table = 'kb_posts';

    function __construct()
    {
        parent::__construct();
    }

    function get_data()
    {
        $this->db->select('*');
        $this->db->from('kb_posts');
        $this->db->where('post_type', 'page');

        $query = $this->db->get();
        return $query->result();
    }

    function get_dataall($param,$sampai,$dari)
    {
        $this->db->select('*');
        if($param['query1']!='') {
            $this->db->like('post_title',$param['query1']);
        }
        if($param['status']!='') {
            $this->db->where('post_status',$param['status']);
        }
        $this->db->where('post_type', 'page');

        $query = $this->db->get('kb_posts',$sampai,$dari);
        return $query->result();
    }

    function jumlah($param){
        if($param['query1']!='') {
            $this->db->like('post_title',$param['query1']);
        }
        if($param['status']!='') {
            $this->db->where('post_status',$param['status']);
        }
        $this->db->where('post_type', 'page');
        return $this->db->get('kb_posts')->num_rows();
    }

    function get_data_edit($id)
    {
        $this->db->select('*');
        $this->db->from('kb_posts');
        $this->db->where('id_post', $id);

        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    
    function ceklink($link) {
        $this->db->select("permalink");
        $this->db->from("kb_posts");
        $this->db->where('permalink',$link);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    
    function get_data_link($id)
    {
        $this->db->select('permalink');
        $this->db->from('kb_posts');
        $this->db->where('id_post', $id);

        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function get_data_frontend($data)
    {
        $this->db->select('*');
        $this->db->from('kb_posts');
        $this->db->where('permalink', $data);

        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function get_data_widget($id)
    {
        $this->db->select('*');
        $this->db->from('kb_posts');
        $this->db->where('id_post', $id);

        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function save_data($data)
    {
        $query = $this->db->insert('kb_posts', $data);
        return $query;
    }

    function update_data($id,$data)
    {
        $this->db->where('id_post', $id);
        return $this->db->update('kb_posts', $data);
    }

    function hapus($id)
    {
        $this->db->where('id_post', $id);
       return $this->db->delete('kb_posts');
    }

}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */
/* Please DO NOT modify this information : */
/* Generated by Codeigniter CRUD Generator 2016-03-24 05:13:11 */
?>