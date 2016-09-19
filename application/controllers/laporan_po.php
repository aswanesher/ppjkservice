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
                $query2=$this->input->post('query2');
                //$query3=$this->input->post('query_status');

                $param = array(
                    'query1' => $query1,
                    'query2' => $query2
                    //'query3' => $query3
                );

                $data['query1'] = $query1;
                $data['query2'] = $query2;
                //$data['query3'] = $query3;

                $datas=$this->opsi_website->getdata();

                $dari = $this->uri->segment('3');

                if($usr['group']==1) {
                    $data['jumlah']= $this->laporan_po_model->jumlah();
                } else {
                    $data['jumlah']= $this->laporan_po_model->jumlah_user($usr['user']);
                }

                // Config page
                $config['base_url'] = base_url().'/laporan_po/index';
                $config['total_rows'] = $data['jumlah'];
                $config['per_page'] = 20;

                if($usr['group']==1) {
                    $data['laporan_po']=$this->laporan_po_model->get_dataall($param,$config['per_page'],$dari);
                } else {
                    $data['laporan_po']=$this->laporan_po_model->get_dataall_user($param,$config['per_page'],$dari,$usr['user']);
                }

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
                $data['judul_panel']='Laporan PO';
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
                    "Ppn"=> $rowData[0][40],
                    "Ppn_amount"=> $rowData[0][41],
                    "Insurance"=> $rowData[0][42],
                    "Insurance_amount"=> $rowData[0][43],
                    "Estimasi_pib_mount"=> $rowData[0][44],
                    "Actual_pib_paid"=> $rowData[0][45],
                    "Status_pib"=> $rowData[0][46],
                    "Penjaluran"=> $rowData[0][47],
                    "Payment_to_vendor"=> $rowData[0][48]
                );
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->laporan_po_model->save_data($data);
                //delete_files($media['file_path']);        
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
                $data['pr_no'] = $dt->PR_no;
                $data['pr_date'] = $dt->PR_date;
                $data['po_no'] = $dt->PO_no;
                $data['po_date'] = $dt->PO_date;
                $data['customer'] = $dt->Customer;
                $data['vendorcode'] = $dt->VendorCode;
                $data['vendorname'] = $dt->VendorName;
                $data['qty'] = $dt->Qty;
                $data['currency'] = $dt->Currency;
                $data['rate'] = $dt->Rate;
                $data['total_po_price'] = $dt->Total_po_price;
                $data['vendor_type'] = $dt->Vendor_type;
                $data['etd'] = $dt->Etd;
                $data['eta_port1'] = $dt->Eta_port1;
                $data['eta_ns1'] = $dt->Eta_ns1;
                $data['po_status'] = $dt->Po_status;
                $data['item_code'] = $dt->Item_code;
                $data['item_desc'] = $dt->Item_desc;
                $data['item_qty'] = $dt->Item_qty;
                $data['item_price'] = $dt->Item_price;
                $data['subtotal'] = $dt->Subtotal;
                $data['bl_no'] = $dt->Bl_no;
                $data['bl_date'] = $dt->Bl_date;
                $data['total_bl_price'] = $dt->Total_bl_price;
                $data['bl_status'] = $dt->Bl_status;
                $data['atd'] = $dt->Atd;
                $data['eta_port2'] = $dt->Eta_port2;
                $data['eta_ns2'] = $dt->Eta_ns2;
                $data['ata_port'] = $dt->Ata_port;
                $data['eta_ns3'] = $dt->Eta_ns3;
                $data['eta_ns4'] = $dt->Eta_ns4;
                $data['ata_ns'] = $dt->Ata_ns;
                $data['invoice_no'] = $dt->Invoice_no;
                $data['lc_no'] = $dt->Lc_no;
                $data['estimated_lc_due_date'] = $dt->Estimated_lc_due_date;
                $data['actual_lc_due_date'] = $dt->Actual_lc_due_date;
                $data['bm'] = $dt->Bm;
                $data['bm_amount'] = $dt->Bm_amount;
                $data['pph'] = $dt->Pph;
                $data['pph_amount'] = $dt->Pph_amount;
                $data['ppn'] = $dt->Ppn;
                $data['ppn_amount'] = $dt->Ppn_amount;
                $data['insurance'] = $dt->Insurance;
                $data['insurance_amount'] = $dt->Insurance_amount;
                $data['estimasi_pib_mount'] = $dt->Estimasi_pib_mount;
                $data['actual_pib_paid'] = $dt->Actual_pib_paid;
                $data['status_pib'] = $dt->Status_pib;
                $data['penjaluran'] = $dt->Penjaluran;
                $data['payment_to_vendor'] = $dt->Payment_to_vendor;

                $data['judul']=$datas->website_title;
                $data['company']=$datas->company_name;
                $data['judul_panel']='Ubah Laporan PO';

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
            $id_po = $this->input->post('PR_no');
            $data=array(          
                'PR_date'=>$this->input->post('PR_date'),
                'PO_no'=>$this->input->post('PO_no'),
                'PO_date'=>$this->input->post('PO_date'),
                'Customer'=>$this->input->post('Customer'),
                'VendorCode'=>$this->input->post('VendorCode'),
                'VendorName'=>$this->input->post('VendorName'),
                'Qty'=>$this->input->post('Qty'),
                'Currency'=>$this->input->post('Currency'),
                'Rate'=>$this->input->post('Rate'),
                'Total_po_price'=>$this->input->post('Total_po_price'),
                'Vendor_type'=>$this->input->post('Vendor_type'),
                'Etd'=>$this->input->post('Etd'),
                'Eta_port1'=>$this->input->post('Eta_port1'),
                'Eta_ns1'=>$this->input->post('Eta_ns1'),
                'Po_status'=>$this->input->post('Po_status'),
                'Item_code'=>$this->input->post('Item_code'),
                'Item_desc'=>$this->input->post('Item_desc'),
                'Item_qty'=>$this->input->post('Item_qty'),
                'Item_price'=>$this->input->post('Item_price'),
                'Subtotal'=>$this->input->post('Subtotal'),
                'Bl_no'=>$this->input->post('Bl_no'),
                'Bl_date'=>$this->input->post('Bl_date'),
                'Total_bl_price'=>$this->input->post('Total_bl_price'),
                'Bl_status'=>$this->input->post('Bl_status'),
                'Atd'=>$this->input->post('Atd'),
                'Eta_port2'=>$this->input->post('Eta_port2'),
                'Eta_ns2'=>$this->input->post('Eta_ns2'),
                'Ata_port'=>$this->input->post('Ata_port'),
                'Eta_ns3'=>$this->input->post('Eta_ns3'),
                'Eta_ns4'=>$this->input->post('Eta_ns4'),
                'Ata_ns'=>$this->input->post('Ata_ns'),
                'Invoice_no'=>$this->input->post('Invoice_no'),
                'Lc_no'=>$this->input->post('Lc_no'),
                'Estimated_lc_due_date'=>$this->input->post('Estimated_lc_due_date'),
                'Actual_lc_due_date'=>$this->input->post('Actual_lc_due_date'),
                'Bm'=>$this->input->post('Bm'),
                'Bm_amount'=>$this->input->post('Bm_amount'),
                'Pph'=>$this->input->post('Pph'),
                'Pph_amount'=>$this->input->post('Pph_amount'),
                'Ppn'=>$this->input->post('Ppn'),
                'Ppn_amount'=>$this->input->post('Ppn_amount'),
                'Insurance'=>$this->input->post('Insurance'),
                'Insurance_amount'=>$this->input->post('Insurance_amount'),
                'Estimasi_pib_mount'=>$this->input->post('Estimasi_pib_mount'),
                'Actual_pib_paid'=>$this->input->post('Actual_pib_paid'),
                'Status_pib'=>$this->input->post('Status_pib'),
                'Penjaluran'=>$this->input->post('Penjaluran'),
                'Payment_to_vendor'=>$this->input->post('Payment_to_vendor')
            );
            $result=$this->laporan_po_model->update_data($id_po,$data);
            if($result!=FALSE) {            
                $this->session->set_flashdata('success', 'Data berhasil diubah!');
                redirect('laporan_po', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diubah!');
                redirect('laporan_po', 'refresh');
            }
        } else {
            redirect('backend_panel', 'refresh');
        }
    }

    public function laporan_po_detail($id)
    {
        $usr=$this->session->userdata('logged_in');
        $mod=$this->permission_model->get_data_module('laporan_po');
        $per=$this->permission_model->get_data_akses($mod->module_id,$usr['group']);

        if($this->session->userdata('logged_in')) {
            //if(!empty($per->is_edit)&&($per->is_edit=='true')) {
                $datas=$this->opsi_website->getdata();

                $dt=$this->laporan_po_model->get_data_edit($id);

                /* DEFINE YOUR OWN DATA HERE */
                $data['pr_no'] = $dt->PR_no;
                $data['pr_date'] = $dt->PR_date;
                $data['po_no'] = $dt->PO_no;
                $data['po_date'] = $dt->PO_date;
                $data['customer'] = $dt->Customer;
                $data['vendorcode'] = $dt->VendorCode;
                $data['vendorname'] = $dt->VendorName;
                $data['qty'] = $dt->Qty;
                $data['currency'] = $dt->Currency;
                $data['rate'] = $dt->Rate;
                $data['total_po_price'] = $dt->Total_po_price;
                $data['vendor_type'] = $dt->Vendor_type;
                $data['etd'] = $dt->Etd;
                $data['eta_port1'] = $dt->Eta_port1;
                $data['eta_ns1'] = $dt->Eta_ns1;
                $data['po_status'] = $dt->Po_status;
                $data['item_code'] = $dt->Item_code;
                $data['item_desc'] = $dt->Item_desc;
                $data['item_qty'] = $dt->Item_qty;
                $data['item_price'] = $dt->Item_price;
                $data['subtotal'] = $dt->Subtotal;
                $data['bl_no'] = $dt->Bl_no;
                $data['bl_date'] = $dt->Bl_date;
                $data['total_bl_price'] = $dt->Total_bl_price;
                $data['bl_status'] = $dt->Bl_status;
                $data['atd'] = $dt->Atd;
                $data['eta_port2'] = $dt->Eta_port2;
                $data['eta_ns2'] = $dt->Eta_ns2;
                $data['ata_port'] = $dt->Ata_port;
                $data['eta_ns3'] = $dt->Eta_ns3;
                $data['eta_ns4'] = $dt->Eta_ns4;
                $data['ata_ns'] = $dt->Ata_ns;
                $data['invoice_no'] = $dt->Invoice_no;
                $data['lc_no'] = $dt->Lc_no;
                $data['estimated_lc_due_date'] = $dt->Estimated_lc_due_date;
                $data['actual_lc_due_date'] = $dt->Actual_lc_due_date;
                $data['bm'] = $dt->Bm;
                $data['bm_amount'] = $dt->Bm_amount;
                $data['pph'] = $dt->Pph;
                $data['pph_amount'] = $dt->Pph_amount;
                $data['ppn'] = $dt->Ppn;
                $data['ppn_amount'] = $dt->Ppn_amount;
                $data['insurance'] = $dt->Insurance;
                $data['insurance_amount'] = $dt->Insurance_amount;
                $data['estimasi_pib_mount'] = $dt->Estimasi_pib_mount;
                $data['actual_pib_paid'] = $dt->Actual_pib_paid;
                $data['status_pib'] = $dt->Status_pib;
                $data['penjaluran'] = $dt->Penjaluran;
                $data['payment_to_vendor'] = $dt->Payment_to_vendor;

                $data['judul']=$datas->website_title;
                $data['company']=$datas->company_name;
                $data['judul_panel']='Detail Laporan';

                $view = 'templates/backend/laporan_po_modul/laporan_po_detail';
                show($view, $data);
            /*} else if(empty($per->is_edit)) {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('laporan_po', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('laporan_po', 'refresh');
            }*/
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
                $result=$this->laporan_po_model->hapus($id);
                if($result!=FALSE) {            
                    $this->session->set_flashdata('success', 'Data berhasil dihapus!');
                    redirect('laporan_po', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Data gagal dihapus!');
                    redirect('laporan_po', 'refresh');
                }
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

    function export() {
        $obj = new PHPExcel();
        $obj->getProperties()->setTitle("Export")->setDescription("none");
        $obj->setActiveSheetIndex(0);
        
        $data = $this->laporan_po_model->get_data_export();
        $field = $data->list_fields();
        $col=0;
        //foreach ($field as $f) {
            //$fieldata=ucfirst(str_replace("_", " ", $f));
            //echo $fieldata;
            $obj->getActiveSheet()->setCellValueByColumnAndRow(0,1,"PR No.");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(1,1,"PR Date");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(2,1,"PO No.");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(3,1,"PO Date");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(4,1,"Customer");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(5,1,"Vendor Code");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(6,1,"Vendor Name");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(7,1,"PO Qty");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(8,1,"Currency");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(9,1,"Rate");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(10,1,"Total PO Price");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(11,1,"Vendor Type");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(12,1,"ETD");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(13,1,"ETA Port 1");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(14,1,"ETA NS 1");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(15,1,"PO Status");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(16,1,"Item Code");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(17,1,"Item Desc");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(18,1,"Item Qty");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(19,1,"Item Price");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(20,1,"Subtotal");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(21,1,"BL No.");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(22,1,"BL Date");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(23,1,"Total BL Price");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(24,1,"BL Status");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(25,1,"ATD");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(26,1,"ETA Port 2");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(27,1,"ETA NS 2");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(28,1,"ATA Port");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(29,1,"ETA NS 3");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(30,1,"ETA NS 4");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(31,1,"ATA NS");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(32,1,"Invoice No.");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(33,1,"LC No.");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(34,1,"Estimated LC Due Date");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(35,1,"Actual LC Due Date");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(36,1,"BM");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(37,1,"Bm Amount");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(38,1,"Pph");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(39,1,"Pph Amount");
            //$obj->getActiveSheet()->setCellValueByColumnAndRow(40,1,"Ppn");
            //$obj->getActiveSheet()->setCellValueByColumnAndRow(41,1,"Ppn Amount");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(40,1,"Insurance");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(41,1,"Insurance Amount");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(42,1,"Estimasi PIB");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(43,1,"Actual PIB Paid");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(44,1,"Status PIB");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(45,1,"Penjaluran");
            $obj->getActiveSheet()->setCellValueByColumnAndRow(46,1,"Payment to Vendor Status");
            //$col++;
        //}
        $row =2;
        foreach ($data->result() as $fields) {
            $col=0;
            foreach ($field as $value) {
                $obj->getActiveSheet()->setCellValueByColumnAndRow($col,$row,$fields->$value);
                $col++;
            }
            $row++;
        }
        $obj->setActiveSheetIndex(0);
        $objw = PHPExcel_IOFactory::createWriter($obj,'Excel5');
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan_PO_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
        
        $objw->save('php://output');
        redirect('user','refresh');
    }


}

/* End of file laporan_po.php */
/* Location: ./application/controllers/laporan_po.php */
/* Please DO NOT modify this information : */
/* Generated by Codeigniter CRUD Generator 2016-09-14 15:04:45 */

?>