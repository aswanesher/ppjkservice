<?php

if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Laporan_po extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_po_model');
        $this->load->library('encrypt');
        $this->load->model('opsi_website');
        $this->load->model('permission_model');
        $this->load->library('Excel');
    }

    public function index()
    {
        $usr=$this->session->userdata('logged_in');
        $mod=$this->permission_model->get_data_module('laporan_po');
        $per=$this->permission_model->get_data_akses($mod->module_id,$usr['group']);

        if($this->session->userdata('logged_in')) {
            if(!empty($per->is_view)&&($per->is_view=='true')) {
                /* this is for searching */
                $query1=$this->input->post('query1');

                $param = array(
                    'query1' => $query1
                );

                $data['query1'] = $query1;

                $datas=$this->opsi_website->getdata();

                $data['jumlah']= $this->laporan_po_model->jumlah();

                // Config page
                $config['base_url'] = base_url().'/laporan_po/index';
                $config['total_rows'] = $data['jumlah'];
                $config['per_page'] = 20;

                $dari = $this->uri->segment('3');
                $data['laporan_po']=$this->laporan_po_model->get_dataall($param,$config['per_page'],$dari);

                $config['full_tag_open'] = '<ul class=pagination>';
                $config['full_tag_close'] = '</ul>';
                $config['first_link'] = false;
                $config['last_link'] = false;
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['prev_link'] = '&laquo';
                $config['prev_tag_open'] = '<li class=prev>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class=active><a href=#>';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';

                $this->pagination->initialize($config);

                $data['judul']=$datas->website_title;
                $data['company']=$datas->company_name;
                $data['judul_panel']='Pengaturan laporan_po';
                $data['tambah']=$per->is_add;
                $data['edit']=$per->is_edit;
                $data['hapus']=$per->is_delete;

                $view = 'templates/backend/laporan_po_modul/laporan_po_data';
                show($view, $data);
            } else if(empty($per->is_view)) {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('backend_panel/dashboard', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('backend_panel/dashboard', 'refresh');
            }
        } else {
            redirect('backend_panel', 'refresh');
        }
    }

    public function laporan_po_add()
    {
        $usr=$this->session->userdata('logged_in');
        $mod=$this->permission_model->get_data_module('laporan_po');
        $per=$this->permission_model->get_data_akses($mod->module_id,$usr['group']);

        if($this->session->userdata('logged_in')) {
            if(!empty($per->is_add)&&($per->is_add=='true')) {
                $datas=$this->opsi_website->getdata();

                $data['judul']=$datas->website_title;
                $data['company']=$datas->company_name;
                $data['judul_panel']='Tambah PO';

                $view = 'templates/backend/laporan_po_modul/laporan_po_add';
                show($view, $data);
            } else if(empty($per->is_add)) {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('laporan_po', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('laporan_po', 'refresh');
            }
        } else {
            redirect('backend_panel', 'refresh');
        }
    }

    public function laporan_po_save()
    {
        if($this->session->userdata('logged_in')) {
            /* PUT YOUR OWN PROCESS HERE */
            $fileName = time().$_FILES['file']['name'];
         
            $config['upload_path'] = './uploads/'; //buat folder dengan nama assets di root folder
            $config['file_name'] = $fileName;
            $config['allowed_types'] = 'xls|xlsx|csv';
            $config['max_size'] = 10000;
             
            $this->load->library('upload');
            $this->upload->initialize($config);
             
            if(! $this->upload->do_upload('file') )
            $this->upload->display_errors();
                 
            $media = $this->upload->data('file');
            $inputFileName = './uploads/'.$media['file_name'];
             
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
             
            for ($row = 2; $row <= $highestRow; $row++){  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                                                 
                //Sesuaikan sama nama kolom tabel di database                                
                 $data = array(
                    //"PR_no"=> $rowData[0][0],
                    "PR_date"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][1])),
                    "PO_no"=> $rowData[0][2],
                    "PO_date"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][3])),
                    "Customer"=> $rowData[0][4],
                    "VendorCode"=> $rowData[0][5],
                    "VendorName"=> $rowData[0][6],
                    "Qty"=> $rowData[0][7],
                    "Currency"=> $rowData[0][8],
                    "Rate"=> $rowData[0][9],
                    "Total_po_price"=> $rowData[0][10],
                    "Vendor_type"=> $rowData[0][11],
                    "Etd"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][12])),
                    "Eta_port1"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][13])),
                    "Eta_ns1"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][14])),
                    "Po_status"=> $rowData[0][15],
                    "Item_code"=> $rowData[0][16],
                    "Item_desc"=> $rowData[0][17],
                    "Item_qty"=> $rowData[0][18],
                    "Item_price"=> $rowData[0][19],
                    "Subtotal"=> $rowData[0][20],
                    "Bl_no"=> $rowData[0][21],
                    "Bl_date"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][22])),
                    "Total_bl_price"=> $rowData[0][23],
                    "Bl_status"=> $rowData[0][24],
                    "Atd"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][25])),
                    "Eta_port2"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][26])),
                    "Eta_ns2"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][27])),
                    "Ata_port"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][28])),
                    "Eta_ns3"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][29])),
                    "Eta_ns4"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][30])),
                    "Ata_ns"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][31])),
                    "Invoice_no"=> $rowData[0][32],
                    "Lc_no"=> $rowData[0][33],
                    "Estimated_lc_due_date"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][34])),
                    "Actual_lc_due_date"=> date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($rowData[0][35])),
                    "Bm"=> $rowData[0][36],
                    "Bm_amount"=> $rowData[0][37],
                    "Pph"=> $rowData[0][38],
                    "Pph_amount"=> $rowData[0][39],
                    "Insurance"=> $rowData[0][40],
                    "Insurance_amount"=> $rowData[0][41],
                    "Estimasi_pib_mount"=> $rowData[0][42],
                    "Actual_pib_paid"=> $rowData[0][43],
                    "Status_pib"=> $rowData[0][44],
                    "Penjaluran"=> $rowData[0][45],
                    "Payment_to_vendor"=> $rowData[0][46]
                );
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->laporan_po_model->save_data($data);
                delete_files($media['file_path']);        
            }
            $this->session->set_flashdata('success', 'Data berhasil diimport!');
            redirect('laporan_po', 'refresh');
        } else {
            redirect('backend_panel', 'refresh');
        }
    }

    private function converttgl($date)
    {
        //$date = '09/25/11';
        $date = DateTime::createFromFormat('m/d/y', $date);
        $date = $date->format('Y-m-d');
        return $date;
    }

    public function laporan_po_edit($id)
    {
        $usr=$this->session->userdata('logged_in');
        $mod=$this->permission_model->get_data_module('laporan_po');
        $per=$this->permission_model->get_data_akses($mod->module_id,$usr['group']);

        if($this->session->userdata('logged_in')) {
            if(!empty($per->is_edit)&&($per->is_edit=='true')) {
                $datas=$this->opsi_website->getdata();

                $dt=$this->laporan_po_model->get_data_edit($id);

                /* DEFINE YOUR OWN DATA HERE */

                $data['judul']=$datas->website_title;
                $data['company']=$datas->company_name;
                $data['judul_panel']='Ubah laporan_po';

                $view = 'templates/backend/laporan_po_modul/laporan_po_edit';
                show($view, $data);
            } else if(empty($per->is_edit)) {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('laporan_po', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('laporan_po', 'refresh');
            }
        } else {
            redirect('backend_panel', 'refresh');
        }
    }

    public function laporan_po_update()
    {
        if($this->session->userdata('logged_in')) {
            /* PUT YOUR OWN PROCESS HERE */
        } else {
            redirect('backend_panel', 'refresh');
        }
    }

    public function laporan_po_delete($id)
    {
        $usr=$this->session->userdata('logged_in');
        $mod=$this->permission_model->get_data_module('laporan_po');
        $per=$this->permission_model->get_data_akses($mod->module_id,$usr['group']);

        if($this->session->userdata('logged_in')) {
            if(!empty($per->is_delete)&&($per->is_delete=='true')) {
                /* PUT YOUR OWN PROCESS HERE */
            } else if(empty($per->is_delete)) {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('laporan_po', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('laporan_po', 'refresh');
            }
        } else {
            redirect('backend_panel', 'refresh');
        }
    }


}

/* End of file laporan_po.php */
/* Location: ./application/controllers/laporan_po.php */
/* Please DO NOT modify this information : */
/* Generated by Codeigniter CRUD Generator 2016-09-14 15:04:45 */

?>