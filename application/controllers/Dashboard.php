<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		// load model
		$this->load->model('model_users');
		$this->load->model('model_supplier');
		$this->load->model('model_customer');
		$this->load->model('model_category');
		$this->load->model('model_product');
		$this->load->model('model_barang_masuk');
		$this->load->model('model_barang_keluar');

		// cek login
		if( !$this->session->userdata('email') )
		{
			// login
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please login!</div>');
			redirect('');
		}
	}

	public function index()
	{
		redirect('dashboard/dashboard');
	}

	public function dashboard()
	{
		$data['title'] = "Inventory | Dashboard";
		$data['url_active'] = "dashboard/dashboard";
		$data['sidebar_active'] = "Dashboard";
		$data['sub_sidebar_active'] = "";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// count supplier
		$data['count_all_supplier'] = $this->model_supplier->count_all_supplier();

		// count customer
		$data['count_all_customer'] = $this->model_customer->count_all_customer();

		// count category
		$data['count_all_category'] = $this->model_category->count_all_category();

		// count product
		$data['count_all_product'] = $this->model_product->count_all_product();

		// timezone
		date_default_timezone_set('Asia/Jakarta'); // set timezone
		$day = date('d');
		$month = date('m');
		$year = date('Y');
		$data['current_year'] = $year;
		// month
		$january = 1;
		$february = 2;
		$march = 3;
		$april = 4;
		$may = 5;
		$june = 6;
		$july = 7;
		$august = 8;
		$september = 9;
		$october = 10;
		$november = 11;
		$december = 12;

		// january_barang_masuk
		$data['january_barang_masuk'] = $this->model_barang_masuk->january_barang_masuk($january, $year);
		$data['count_january_barang_masuk'] = count($data['january_barang_masuk']);

		// february_barang_masuk
		$data['february_barang_masuk'] = $this->model_barang_masuk->february_barang_masuk($february, $year);
		$data['count_february_barang_masuk'] = count($data['february_barang_masuk']);

		// march_barang_masuk
		$data['march_barang_masuk'] = $this->model_barang_masuk->march_barang_masuk($march, $year);
		$data['count_march_barang_masuk'] = count($data['march_barang_masuk']);

		// april_barang_masuk
		$data['april_barang_masuk'] = $this->model_barang_masuk->april_barang_masuk($april, $year);
		$data['count_april_barang_masuk'] = count($data['april_barang_masuk']);

		// may_barang_masuk
		$data['may_barang_masuk'] = $this->model_barang_masuk->may_barang_masuk($may, $year);
		$data['count_may_barang_masuk'] = count($data['may_barang_masuk']);

		// june_barang_masuk
		$data['june_barang_masuk'] = $this->model_barang_masuk->june_barang_masuk($june, $year);
		$data['count_june_barang_masuk'] = count($data['june_barang_masuk']);

		// july_barang_masuk
		$data['july_barang_masuk'] = $this->model_barang_masuk->july_barang_masuk($july, $year);
		$data['count_july_barang_masuk'] = count($data['july_barang_masuk']);

		// august_barang_masuk
		$data['august_barang_masuk'] = $this->model_barang_masuk->august_barang_masuk($august, $year);
		$data['count_august_barang_masuk'] = count($data['august_barang_masuk']);

		// september_barang_masuk
		$data['september_barang_masuk'] = $this->model_barang_masuk->september_barang_masuk($september, $year);
		$data['count_september_barang_masuk'] = count($data['september_barang_masuk']);

		// october_barang_masuk
		$data['october_barang_masuk'] = $this->model_barang_masuk->october_barang_masuk($october, $year);
		$data['count_october_barang_masuk'] = count($data['october_barang_masuk']);

		// november_barang_masuk
		$data['november_barang_masuk'] = $this->model_barang_masuk->november_barang_masuk($november, $year);
		$data['count_november_barang_masuk'] = count($data['november_barang_masuk']);

		// december_barang_masuk
		$data['december_barang_masuk'] = $this->model_barang_masuk->december_barang_masuk($december, $year);
		$data['count_december_barang_masuk'] = count($data['december_barang_masuk']);

		// 

		// january_barang_keluar
		$data['january_barang_keluar'] = $this->model_barang_keluar->january_barang_keluar($january, $year);
		$data['count_january_barang_keluar'] = count($data['january_barang_keluar']);

		// february_barang_keluar
		$data['february_barang_keluar'] = $this->model_barang_keluar->february_barang_keluar($february, $year);
		$data['count_february_barang_keluar'] = count($data['february_barang_keluar']);

		// march_barang_keluar
		$data['march_barang_keluar'] = $this->model_barang_keluar->march_barang_keluar($march, $year);
		$data['count_march_barang_keluar'] = count($data['march_barang_keluar']);

		// april_barang_keluar
		$data['april_barang_keluar'] = $this->model_barang_keluar->april_barang_keluar($april, $year);
		$data['count_april_barang_keluar'] = count($data['april_barang_keluar']);

		// may_barang_keluar
		$data['may_barang_keluar'] = $this->model_barang_keluar->may_barang_keluar($may, $year);
		$data['count_may_barang_keluar'] = count($data['may_barang_keluar']);

		// june_barang_keluar
		$data['june_barang_keluar'] = $this->model_barang_keluar->june_barang_keluar($june, $year);
		$data['count_june_barang_keluar'] = count($data['june_barang_keluar']);

		// july_barang_keluar
		$data['july_barang_keluar'] = $this->model_barang_keluar->july_barang_keluar($july, $year);
		$data['count_july_barang_keluar'] = count($data['july_barang_keluar']);

		// august_barang_keluar
		$data['august_barang_keluar'] = $this->model_barang_keluar->august_barang_keluar($august, $year);
		$data['count_august_barang_keluar'] = count($data['august_barang_keluar']);

		// september_barang_keluar
		$data['september_barang_keluar'] = $this->model_barang_keluar->september_barang_keluar($september, $year);
		$data['count_september_barang_keluar'] = count($data['september_barang_keluar']);

		// october_barang_keluar
		$data['october_barang_keluar'] = $this->model_barang_keluar->october_barang_keluar($october, $year);
		$data['count_october_barang_keluar'] = count($data['october_barang_keluar']);

		// november_barang_keluar
		$data['november_barang_keluar'] = $this->model_barang_keluar->november_barang_keluar($november, $year);
		$data['count_november_barang_keluar'] = count($data['november_barang_keluar']);

		// december_barang_keluar
		$data['december_barang_keluar'] = $this->model_barang_keluar->december_barang_keluar($december, $year);
		$data['count_december_barang_keluar'] = count($data['december_barang_keluar']);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('dashboard/dashboard');
		$this->load->view('layouts/main_footer');
	}
}
