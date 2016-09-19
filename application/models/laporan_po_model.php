<?php

if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Laporan_po_model extends CI_Model
{
    public $table = 'kb_po';

    function __construct()
    {
        parent::__construct();
    }

    function get_data()
    {
        $this->db->select('*');
        $this->db->from('kb_po');

        $query = $this->db->get();
        return $query->result();
    }

    function get_dataall($param,$sampai,$dari)
    {
        $this->db->select('*');
        if($param['query1']!='') {
            $this->db->like('VendorName',$param['query1']);
        }
        if($param['query2']!='') {
            $this->db->where('PO_no',$param['query2']);
        }
        /*if($param['query3']!='') {
            $this->db->where('Po_status',$param['query3']);
        }*/

        $query = $this->db->get('kb_po',$sampai,$dari);
        return $query->result();
    }

    function get_dataall_user($param,$sampai,$dari,$user)
    {
        $this->db->select('*');
        if($param['query1']!='') {
            $this->db->like('VendorName',$param['query1']);
        }
        if($param['query2']!='') {
            $this->db->where('PO_no',$param['query2']);
        }
        /*if($param['query3']!='') {
            $this->db->where('Po_status',$param['query3']);
        }*/
        $this->db->where('Customer',$user);

        $query = $this->db->get('kb_po',$sampai,$dari);
        return $query->result();
    }

    function jumlah(){
        return $this->db->get('kb_po')->num_rows();
    }

    function jumlah_user($user){
        $this->db->where('Customer',$user);
        return $this->db->get('kb_po')->num_rows();
    }

    function get_data_edit($id)
    {
        $this->db->select('*');
        $this->db->from('kb_po');
        $this->db->where('PR_no', $id);

        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function save_data($data)
    {
        $query = $this->db->insert('kb_po', $data);
        return $query;
    }

    function update_data($id,$data)
    {
        $this->db->where('PR_no', $id);
        return $this->db->update('kb_po', $data);
    }

    function hapus($id)
    {
        $this->db->where('PR_no', $id);
        return $this->db->delete('kb_po');
    }

    function get_data_export()
    {
        $this->db->select('*');
        $this->db->from('kb_po');
        $this->db->order_by('PR_no','asc');

        $query = $this->db->get();
        return $query;
    } 

}

/* End of file laporan_po_model.php */
/* Location: ./application/models/laporan_po_model.php */
/* Please DO NOT modify this information : */
/* Generated by Codeigniter CRUD Generator 2016-09-14 15:04:45 */
?>