<?php

if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Media_model extends CI_Model
{
    public $table = 'kb_media';

    function __construct()
    {
        parent::__construct();
    }

    function get_data()
    {
        $this->db->select('*');
        $this->db->from('kb_media');

        $query = $this->db->get();
        return $query->result();
    }

    function get_data_filter($type)
    {
        $this->db->select('*');
        $this->db->from('kb_media');
        $this->db->where('kategori', $type);

        $query = $this->db->get();
        return $query->result();
    }

    function get_dataall($param,$sampai,$dari)
    {
        $this->db->select('kb_media.*, kb_media_type.category');
        if($param['query1']!='') {
            $this->db->like('nama',$param['query1']);
        }
        if($param['kateg'] != '') {
            $this->db->where('kb_media_type.id_media_cat',$param['kateg']);
        }
        $this->db->join("kb_media_type","kb_media.kategori=kb_media_type.id_media_cat","left");
        $query = $this->db->get('kb_media',$sampai,$dari);
        return $query->result();
    }

    function jumlah($param){
        if($param['query1']!='') {
            $this->db->like('nama',$param['query1']);
        }
        if($param['kateg'] != '') {
            $this->db->where('kb_media_type.id_media_cat',$param['kateg']);
        }
        $this->db->join("kb_media_type","kb_media.kategori=kb_media_type.id_media_cat","left");
        return $this->db->get('kb_media')->num_rows();
    }

    function get_data_edit($id)
    {
        $this->db->select('*');
        $this->db->from('kb_media');
        $this->db->where('id_image', $id);

        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function save_data($data)
    {
        $query = $this->db->insert('kb_media', $data);
        return $query;
    }

    function update_data($id,$data)
    {
        $this->db->where('id_image', $id);
        return $this->db->update('kb_media', $data);
    }

    function hapus($id)
    {
        $this->db->where('id_image', $id);
        return $this->db->delete('kb_media');
    }

}

/* End of file media_model.php */
/* Location: ./application/models/media_model.php */
/* Please DO NOT modify this information : */
/* Generated by Codeigniter CRUD Generator 2016-05-09 08:24:03 */
?>