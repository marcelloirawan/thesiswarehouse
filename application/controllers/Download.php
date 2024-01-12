<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		// load model
		$this->load->model('model_users');
		$this->load->model('model_product');
		$this->load->model('model_barang_masuk');
		$this->load->model('model_barang_keluar');
		$this->load->model('model_request_material');

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
		redirect('download/download_product');
	}

	public function download_product()
	{
		$data['title'] = "Report All Product";

		// get
		$data['all_product'] = $this->model_product->get_all();

		$this->load->view('download/download_product', $data);
	}

	public function download_history_masuk()
	{
		$data['title'] = "Report History Masuk";

		// get
		$data['all_barang_masuk'] = $this->model_barang_masuk->get_all();

		$this->load->view('download/download_history_masuk', $data);
	}

	public function download_history_keluar()
	{
		$data['title'] = "Report History Keluar";

		// get
		$data['all_barang_keluar'] = $this->model_barang_keluar->get_all();

		$this->load->view('download/download_history_keluar', $data);
	}

	public function download_request_material()
	{
		$data['title'] = "Report Request Material";

		// get
		$data['all_request_material'] = $this->model_request_material->get_all();

		$this->load->view('download/download_request_material', $data);
	}
	
}
