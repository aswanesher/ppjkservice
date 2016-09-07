<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->model('opsi_website');
		$this->load->model('menu_model');
		$this->load->model('post_model');
		$this->load->model('widgets_model');
		$this->load->model('media_model');
		$this->load->model('produk_model');
		$this->load->model('halaman_model');
		$this->load->model('users_model');
		$this->load->model('testimonial_model');
	}

	////////// INDEX FUNCTION ///////////
	public function index()
	{
		$datas=$this->opsi_website->getdata();

		$data['judul']=$datas->website_title;
		$data['company']=$datas->company_name;
		$data['website_desc']=$datas->website_desc;
		$data['meta_desc']=$datas->meta_desc;
		$data['meta_keywords']=$datas->meta_keywords;
		$data['address']=$datas->contact_address;
		$data['bbm']=$datas->bbm_pin;
		$data['whatsapp']=$datas->whatsapp_no;
		$data['telegram']=$datas->telegram_no;
		$data['contact_email']=$datas->contact_email;
		$data['phone']=$datas->contact_phone;
		$data['cellphone']=$datas->contact_cellphone;
		$data['fb']=$datas->sosmed_fb;
		$data['twitter']=$datas->sosmed_twitter;
		$data['ig']=$datas->sosmed_instagram;
		$data['gplus']=$datas->sosmed_gplus;
		$data['linkedin']=$datas->sosmed_linkedin;
		$data['wlogo']=$datas->logo;
		$data['theme_name']=$datas->template;
		$data['wfavicon']=$datas->favicon;
		$data['analytics']=$datas->google_analytics;
		$data['pixel']=$datas->facebook_pixel;
		$data['gmap']=$datas->gmap_iframe;
		$data['judul_panel']="Dashboard";

		$menu=$this->menu_model->get_data_frontend();
		$data['menu']=$menu;

		// Get Slider Widget
		$slider=$this->widgets_model->get_data_filter('slider_w');
		$data['slider_widget']=$slider;
		$data['slider']=$this->media_model->get_data_filter($slider->konten_text_id);
		// End Slider Widget

		// Get Bank Widget
		$bank=$this->widgets_model->get_data_filter('bank_w');
		if(!empty($bank)) {
			$data['bank_widget']=$bank;
			$data['bank']=$this->media_model->get_data_filter($bank->konten_text_id);
			$data['bank_caption']=$bank->konten_text_widget;
		}
		// End Bank Widget

		// Get Delivery Widget
		$delivery=$this->widgets_model->get_data_filter('delivery_w');
		if(!empty($delivery)) {
			$data['delivery_widget']=$delivery;
			$data['delivery']=$this->media_model->get_data_filter($delivery->konten_text_id);
			$data['delivery_caption']=$delivery->konten_text_widget;
		}
		// End Delivery Widget

		// Get Delivery Widget
		$customw=$this->widgets_model->get_data_filter('custom_w');
		if(!empty($customw)) {
			$data['custom_widget']=$customw;
			$data['custom_caption']=$customw->konten_text_widget;
		}
		// End Delivery Widget

		// Get Produk Widget
		$produk=$this->widgets_model->get_data_filter('product_w');
		$data['produk_widget']=$produk;
		if(!empty($produk)) {
			$data['prod_caption']=$produk->konten_text_widget;
			$data['prod_url']=$produk->url;
			$data['prod_list_url']='p/katalog-produk';
		}
		$dtproduk=$this->produk_model->get_data_widget();
		$data['produk_widget_list']=$dtproduk;
		// End Produk Widget

		// Get Post Widget
		$post=$this->widgets_model->get_data_filter('post_w');
		if(!empty($post)) {
			$dtpost=$this->post_model->get_data_widget($post->konten_text_id);
			$data['artikel_widget']=$post;
			if(empty($dtpost->post_title)) {
				$isi="";
			} else {
				$isi=$dtpost->post_title;
			}
			$data['post_title']=$isi;
			if(empty($dtpost->post_content)) {
				$isi2="";
			} else {
				$isi2=$dtpost->post_content;
			}

			$data['post_content']=$isi2;
		}
		// End Post Widget

		// Get Custom Widget
		$custom=$this->widgets_model->get_data_filter('custom_w');
		if(!empty($custom)) {
			//$dtcustom=$this->post_model->get_data_widget($custom->konten_text_id);
			$data['custom_widget']=$custom;
			//$data['custom_title']=$dtcustom->konten_text_widget;
			$data['custom_content']=$custom->konten_text_widget;
		}
		// End Custom Widget

		// Get Page Widget
		$pages=$this->widgets_model->get_data_filter('page_w');
		if(!empty($pages)) {
			$dtpages=$this->halaman_model->get_data_widget($pages->konten_text_id);

			$data['page_widget']=$pages;
			//$data['section_title']=$dtpages->post_title;
			if(empty($dtpages->post_title)) {
				$isi="";
			} else {
				$isi=$dtpages->post_title;
			}
			$data['section_title']=$isi;

			if(empty($dtpages->post_content)) {
				$isi2="";
			} else {
				$isi2=$dtpages->post_content;
			}
			
			$data['page_content']=$isi2;

			if(empty($dtpages->post_image)) {
				$isi3="";
			} else {
				$isi3=$dtpost->post_image;
			}
			$data['page_img']=$isi3;
			//$data['page_content']=$dtpages->post_content;
		}
		// End Page Widget

		// Get User Widget
		$team=$this->widgets_model->get_data_filter('team_w');
		if(!empty($team)) {
			$dtuser=$this->users_model->get_data_widget_team($team->konten_text_id);
			$data['team_widget']=$team;
			$data['users']=$dtuser;
		}
		// End User Widget

		// Get Testi Widget
		$testi=$this->widgets_model->get_data_filter('testimonial_w');
		if(!empty($testi)) {
			$data['testimonial_widget']=$testi;
			$data['testimonial_caption']=$testi->konten_text_widget;
			$data['testimonial']=$this->testimonial_model->get_data_widget();
		}
		// End Testi Widget

		// Get Pricing Widget
		$pricing=$this->widgets_model->get_data_filter('pricing_w');
		if(!empty($pricing)) {
			$dtpricing=$this->post_model->get_data_widget_pricing($pricing->konten_text_id);
			$data['pricing_caption']=$pricing->konten_text_widget;
			$data['pricing_widget']=$pricing;
			$data['pricing']=$dtpricing;
		}
		// End Pricing Widget

		// Get Running Text Widget
		$runningtext=$this->widgets_model->get_data_filter('runningtext_w');
		if(!empty($runningtext)) {
			$dtrunningtext=$this->post_model->get_data_widget_pricing($runningtext->konten_text_id);
			//$data['runningtext_caption']=$pricing->konten_text_widget;
			$data['runningtext_widget']=$runningtext;
			$data['runningtext']=$dtrunningtext;
		}
		// End Running Text Widget

		// Get Blog Widget
		$blogw=$this->widgets_model->get_data_filter('blog_w');
		if(!empty($blogw)) {
			$dtblog=$this->post_model->get_data_widget_blog($blogw->konten_text_id);
			$data['blog_caption']=$blogw->konten_text_widget;
			$data['blog_widget']=$blogw;
			$data['blogw']=$dtblog;
		}
		// End Blog Widget

		$data['page_title']=$datas->website_desc;
		$basetemp = "templates/frontend/".$datas->template."/";
		$data['temp'] = $basetemp;
		$view = "templates/frontend/".$datas->template."/";
		$data['hal'] = "home";
		show_frontend($basetemp, $view, $data);
	}

	

}

?>
