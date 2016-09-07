<?php

if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->library('encrypt');
        $this->load->model('opsi_website');	
		$this->load->database();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'pagination'));  
		$this->load->model('permission_model');
    }

    public function index($p="",$a="")
    {
		$usr=$this->session->userdata('logged_in');
        $mod=$this->permission_model->get_data_module('produk');
        $per=$this->permission_model->get_data_akses($mod->module_id,$usr['group']);

        if($this->session->userdata('logged_in')) {
        	if(!empty($per->is_view)&&($per->is_view=='true')) {
	            /* this is for searching */
	            $query1=$this->input->post('query1');
	            $status=$this->input->post('status');
	            $kategori=$this->input->post('kategori');

	            $param = array(
	                'query1' => $query1,
	                'status' => $status,
	                'kategori' => $kategori
	            );

	            $data['query1'] = $query1;
	            $data['status'] = $status;
	            $data['kategori'] = $kategori;
	            $data['kategorinya']= $this->produk_model->get_kategori();

	            $datas=$this->opsi_website->getdata();

	            $data['jumlah']= $this->produk_model->jumlah($param);

	            // Config page
	            $config['base_url'] = base_url().'/produk/index';
	            $config['total_rows'] = $data['jumlah'];
	            $config['per_page'] = 20;

	            $dari = $this->uri->segment('3');
	            $data['produk']=$this->produk_model->get_dataall($param,$config['per_page'],$dari);

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
                if($p==="x1" || $a==="x1") {
                    $data['pesan'] = 'Gagal Menghapus Data';
                }
	            $data['judul']=$datas->website_title;
	            $data['company']=$datas->company_name;
	            $data['judul_panel']='Pengaturan produk';

	            $view = 'templates/backend/produk_modul/produk_data';
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
	public function sub_kategori($id=''){
		if($id!="") {
			$subkat= $this->produk_model->get_subkategori($id);	
			echo'<select class="form-control" name="subkategori" id="form-field-select-1" class="col-xs-10 col-sm-5">
			<option value="">-- Pilih Sub Kategori --</option>';
			foreach($subkat as $dt){
				if($subkategori==$dt->id_prod_category) { 
					echo "selected"; 
				} else {
					echo "";
				}
				echo '<option value="'.$dt->id_prod_category.'" '.$a.'>'.$dt->category.'</option>';
			}
			echo' </select>';
		} else {
			echo'<select class="form-control" name="subkategori" id="form-field-select-1" class="col-xs-10 col-sm-5">
			<option value="">-- Pilih Sub Kategori --</option>';
			echo' </select>';
		}
	}
    public function produk_add($p="")
    {	
    	$usr=$this->session->userdata('logged_in');
        $mod=$this->permission_model->get_data_module('produk');
        $per=$this->permission_model->get_data_akses($mod->module_id,$usr['group']);

        if($this->session->userdata('logged_in')) {
        	if(!empty($per->is_add)&&($per->is_add=='true')) {
	            $datas=$this->opsi_website->getdata();

	            $user_data = $this->session->userdata('logged_in');
	            //var_dump($user_data);
	            $sess=$user_data['user'];

	            session_start();
	            $_SESSION['ses_kcfinder']=array();
	            $_SESSION['ses_kcfinder']['disabled'] = false;
	            //$_SESSION['ses_kcfinder']['uploadURL'] = "../../uploads";

	            $data['judul']=$datas->website_title;
	            $data['company']=$datas->company_name;
	            $data['judul_panel']='Tambah produk';
                if($p=="x1") {
                    $data['pesan'] = 'Gagal Menambah Data';
                }				
				$data['kat']= $this->produk_model->get_kategori();
				$data['subkat']= $this->produk_model->get_subkategori("");				
				$data['dtlabel']= $this->produk_model->get_label();	
	            $view = 'templates/backend/produk_modul/produk_add';
	            show($view, $data);
	        } else if(empty($per->is_add)) {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('produk', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('produk', 'refresh');
            }    
        } else {
            redirect('backend_panel', 'refresh');
        }
    }

    public function produk_save()
    {
        if($this->session->userdata('logged_in')) {
			$r=$this->produk_model->cekid_produk();
			$idnya = $r->id_produk+1;

			$user_data = $this->session->userdata('logged_in');
            $sess=$user_data['id'];

            $thumbs=str_replace("/images/", "/.thumbs/images/", $this->input->post('gambar_produk'));
            $thumb=str_replace("/kaosnyabagus/", "", $thumbs);

            $img=str_replace("/kaosnyabagus/", "", $this->input->post('gambar_produk'));
            $seo_url=str_replace(" ", "-", $this->input->post('nama_produk'));
            //$seo_url=str_replace(" ", "-", $this->input->post('nama_produk'));
            //$plink = strtolower($seo_url);
            $seo = $this->opsi_website->removeSpesial($this->input->post('nama_produk'));
            if($this->produk_model->get_seo($seo)) {
                $seo = $seo."-".$this->produk_model->jumlah();
            }
           	$data=array(
           			'id_produk'=>$idnya,
					'author'=>$sess,
					'kode_produk'=>$this->input->post('kode_produk'),
					'nama_produk'=>$this->input->post('nama_produk'),
					'kategori'=>$this->input->post('kategori'),
					'subkategori'=>$this->input->post('subkategori'),
					'keterangan'=>$this->input->post('keterangan'),
					'deskripsi'=>$this->input->post('deskripsi'),
					'bestseller'=>$this->input->post('bestseller'),
					'featured'=>$this->input->post('featured'),
					'meta_title'=>$this->input->post('meta_title'),
					'meta_keywords'=>$this->input->post('meta_keywords'),
					'meta_desc'=>$this->input->post('meta_desc'),
					'seo_url'=>$seo,
					'gambar_produk'=>$img,
					'thumb'=>$thumb,
					'status'=>$this->input->post('status'),
					'id_label'=>$this->input->post('id_label'),
					'created_at'=>date("Y-m-d h:i:s")
				);

           	$data_detail=array(
           			'id_produk'=>$idnya,
           			'harga'=>$this->input->post('harga'),
           			'diskon'=>$this->input->post('diskon'),
           			'ukuran'=>$this->input->post('ukuran'),
           			'berat'=>$this->input->post('berat'),
           			'qty'=>$this->input->post('qty'),
           		);

			if($this->produk_model->save_data($data)) {				
			$this->produk_model->save_data_detail($data_detail);
			redirect('produk','refresh'); 
                        }
                        else {
                            redirect('produk/produk_add/x1','refresh');
                        }
        } else {
            redirect('backend_panel', 'refresh');
        }
    }

    public function produk_edit($id,$p="")
    {
    	$usr=$this->session->userdata('logged_in');
        $mod=$this->permission_model->get_data_module('produk');
        $per=$this->permission_model->get_data_akses($mod->module_id,$usr['group']);

        if($this->session->userdata('logged_in')) {
        	if(!empty($per->is_edit)&&($per->is_edit=='true')) {
	            $datas=$this->opsi_website->getdata();

	            $user_data = $this->session->userdata('logged_in');
	            //var_dump($user_data);
	            $sess=$user_data['user'];

	            session_start();
	            $_SESSION['ses_kcfinder']=array();
	            $_SESSION['ses_kcfinder']['disabled'] = false;
	            //$_SESSION['ses_kcfinder']['uploadURL'] = "../../uploads";

	            $dt = $this->produk_model->get_data_edit($id);
	            $dt2 = $this->produk_model->get_data_detail_edit($id);
	            /* DEFINE YOUR OWN DATA HERE */			
				$data['id'] = $id;
				$data['author'] = $dt->author;
				$data['kode_produk'] = $dt->kode_produk;
				$data['nama_produk'] = $dt->nama_produk;		
				$data['kategori'] = $dt->kategori;
				$data['subkategori'] = $dt->subkategori;
				$data['keterangan'] = $dt->keterangan;
				$data['deskripsi'] = $dt->deskripsi;
				$data['bestseller'] = $dt->bestseller;
				$data['featured'] = $dt->featured;
				$data['meta_title'] = $dt->meta_title;
				$data['meta_keywords'] = $dt->meta_keywords;
				$data['meta_desc'] = $dt->meta_desc;
				$data['seo_url'] = $dt->seo_url;	
				$data['status'] = $dt->status;
	            $data['id_label']=$dt->id_label;
	            $data['gambar_produk']=$dt->gambar_produk;
	            $data['thumb']=$dt->thumb;			

	            $data['harga']=$dt2->harga;
	            $data['diskon']=$dt2->diskon;
	            $data['ukuran']=$dt2->ukuran;
	            $data['berat']=$dt2->berat;
	            $data['qty']=$dt2->qty;
				
				$data['kat']= $this->produk_model->get_kategori();
				$data['subkat']= $this->produk_model->get_subkategori("");				
				$data['dtlabel']= $this->produk_model->get_label();	
				$data['judul']=$datas->website_title;
	            $data['company']=$datas->company_name;
	            $data['judul_panel']='Ubah produk';
                if($p=="x1") {
                    $data['pesan'] = 'Gagal Merubah Data';
                }
	            $view = 'templates/backend/produk_modul/produk_edit';
	            show($view, $data);
	        } else if(empty($per->is_edit)) {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('produk', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('produk', 'refresh');
            }
        } else {
            redirect('backend_panel', 'refresh');
        }
    }

    public function produk_update()
    {
        if($this->session->userdata('logged_in')) {			
			$user_data = $this->session->userdata('logged_in');
            $sess=$user_data['id'];

            $thumbs=str_replace("/images/", "/.thumbs/images/", $this->input->post('gambar_produk'));
            $thumb=str_replace("/kaosnyabagus/", "", $thumbs);

            $img=str_replace("/kaosnyabagus/", "", $this->input->post('gambar_produk'));

            $seo_url=str_replace(" ", "-", $this->input->post('nama_produk'));
            //$seo_url=str_replace(" ", "-", $this->input->post('nama_produk'));
            //$plink = strtolower($seo_url);
            $seo = $this->opsi_website->removeSpesial($this->input->post('nama_produk'));
            if($seo != $this->input->post('seo_url')) {
            if($this->produk_model->get_seo($seo)) {
                $seo = $seo."-".$this->produk_model->jumlah();
            }}
           	$data=array(
					'author'=>$sess,
					'kode_produk'=>$this->input->post('kode_produk'),
					'nama_produk'=>$this->input->post('nama_produk'),
					'kategori'=>$this->input->post('kategori'),
					'subkategori'=>$this->input->post('subkategori'),
					'keterangan'=>$this->input->post('keterangan'),
					'deskripsi'=>$this->input->post('deskripsi'),
					'bestseller'=>$this->input->post('bestseller'),
					'featured'=>$this->input->post('featured'),
					'meta_title'=>$this->input->post('meta_title'),
					'meta_keywords'=>$this->input->post('meta_keywords'),
					'meta_desc'=>$this->input->post('meta_desc'),
					'seo_url'=>$seo,
					'gambar_produk'=>$img,
					'thumb'=>$thumb,
					'status'=>$this->input->post('status'),
					'id_label'=>$this->input->post('id_label'),
					'created_at'=>date("Y-m-d h:i:s")
				);

           	$data_detail=array(
           			'harga'=>$this->input->post('harga'),
           			'diskon'=>$this->input->post('diskon'),
           			'ukuran'=>$this->input->post('ukuran'),
           			'berat'=>$this->input->post('berat'),
           			'qty'=>$this->input->post('qty'),
           		);

			if($this->produk_model->update_data($this->input->post('id_produk'), $data)) {				
			$this->produk_model->update_data_detail($this->input->post('id_produk'), $data_detail);
			redirect('produk','refresh');
                        }
                        else {
                            redirect('produk/produk_edit/'.$this->input->post('id_produk').'/x1','refresh');
                        }
        } else {
            redirect('backend_panel', 'refresh');
        }
    }

    public function produk_delete($id)
    {
    	$usr=$this->session->userdata('logged_in');
        $mod=$this->permission_model->get_data_module('produk');
        $per=$this->permission_model->get_data_akses($mod->module_id,$usr['group']);

        if($this->session->userdata('logged_in')) {
        	if(!empty($per->is_delete)&&($per->is_delete=='true')) {
	           	$this->load->model('produk_model');
				if($this->produk_model->hapus($id)) {
				redirect('produk', 'refresh');
                                }
                                else {
                                    redirect('produk/index/x1','refresh');
                                }
			} else if(empty($per->is_delete)) {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('produk', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses!');
                redirect('produk', 'refresh');
            }	
        } else {
            redirect('backend_panel', 'refresh');
        }
    }


}

/* End of file produk.php */
/* Location: ./application/controllers/produk.php */
/* Please DO NOT modify this information : */
/* Generated by Codeigniter CRUD Generator 2016-03-21 13:55:00 */

?>