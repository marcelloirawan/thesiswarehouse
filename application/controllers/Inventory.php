<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		// load model
		$this->load->model('model_users');
		$this->load->model('model_barang_masuk');
		$this->load->model('model_barang_keluar');
		$this->load->model('model_product');
		$this->load->model('model_supplier');
		$this->load->model('model_customer');

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
		redirect('inventory/barang_masuk');
	}
	
	// START BARANG MASUK

	// public function barang_masuk()
	// {
	// 	$data['title'] = "Inventory";
	// 	$data['url_active'] = "inventory/barang_masuk";
	// 	$data['sidebar_active'] = "Inventory";
	// 	$data['sub_sidebar_active'] = "Barang Masuk";

	// 	$email = $this->session->userdata('email');
	// 	$data['user'] = $this->model_users->get_where_email($email);

	// 	// GET BARANG MASUK
	// 	$data['all_barang_masuk'] = $this->model_barang_masuk->get_all();

	// 	$this->load->view('layouts/main_header', $data);
	// 	$this->load->view('layouts/main_sidebar');
	// 	$this->load->view('layouts/main_topbar');
	// 	$this->load->view('inventory/barang_masuk');
	// 	$this->load->view('layouts/main_footer');
	// }

	public function barang_masuk()
	{
		$data['title'] = "Inventory";
		$data['url_active'] = "inventory/barang_masuk";
		$data['sidebar_active'] = "Inventory";
		$data['sub_sidebar_active'] = "Barang Masuk";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// GET SUPPLIER
		$data['all_supplier'] = $this->model_supplier->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('inventory/barang_masuk_add');
		$this->load->view('layouts/main_footer');
	}

	public function barang_masuk_submit()
	{
		// data dari form
		$barcode = htmlspecialchars($this->input->post('barcode', true));
		$id_supplier = htmlspecialchars($this->input->post('id_supplier', true));
		$qty = htmlspecialchars($this->input->post('qty', true));
		$remark = htmlspecialchars($this->input->post('remark', true));

		// cek barcode
		$cek_barcode = $this->model_product->get_where_barcode($barcode);

		if( $cek_barcode )
		{
			// success
			$id_product = $cek_barcode['id_product'];
			$stock_current = $cek_barcode['stock'];
			$stock = $stock_current + $qty;

			// get user
			$email = $this->session->userdata('email');
			$data['user'] = $this->model_users->get_where_email($email);
			$id_users = $data['user']['id_users'];

			// add database
			$this->model_barang_masuk->add($id_product, $id_supplier, $id_users, $qty, $remark);

			// update stock
			$this->model_product->update_where_id($id_product, $stock);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data added successfully.</div>');
			redirect('inventory/barang_masuk');
		} else
		{
			// failed
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Barcode not found!</div>');
			redirect('inventory/barang_masuk');
		}
	}

	// END BARANG MASUK
	
	// START BARANG KELUAR

	// public function barang_keluar()
	// {
	// 	$data['title'] = "Inventory";
	// 	$data['url_active'] = "inventory/barang_keluar";
	// 	$data['sidebar_active'] = "Inventory";
	// 	$data['sub_sidebar_active'] = "Barang Keluar";

	// 	$email = $this->session->userdata('email');
	// 	$data['user'] = $this->model_users->get_where_email($email);

	// 	// GET BARANG KELUAR
	// 	$data['all_barang_keluar'] = $this->model_barang_keluar->get_all();

	// 	$this->load->view('layouts/main_header', $data);
	// 	$this->load->view('layouts/main_sidebar');
	// 	$this->load->view('layouts/main_topbar');
	// 	$this->load->view('inventory/barang_keluar');
	// 	$this->load->view('layouts/main_footer');
	// }

	public function barang_keluar()
	{
		$data['title'] = "Inventory";
		$data['url_active'] = "inventory/barang_keluar";
		$data['sidebar_active'] = "Inventory";
		$data['sub_sidebar_active'] = "Barang Keluar";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// GET CUSTOMER
		$data['all_customer'] = $this->model_customer->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('inventory/barang_keluar_add');
		$this->load->view('layouts/main_footer');
	}

	public function barang_keluar_submit()
	{
		// data dari form
		$barcode = htmlspecialchars($this->input->post('barcode', true));
		$id_customer = htmlspecialchars($this->input->post('id_customer', true));
		$qty = htmlspecialchars($this->input->post('qty', true));
		$remark = htmlspecialchars($this->input->post('remark', true));

		// cek barcode
		$cek_barcode = $this->model_product->get_where_barcode($barcode);

		if( $cek_barcode )
		{
			// success
			$id_product = $cek_barcode['id_product'];
			$stock_current = $cek_barcode['stock'];
			$stock = $stock_current - $qty;

			// get user
			$email = $this->session->userdata('email');
			$data['user'] = $this->model_users->get_where_email($email);
			$id_users = $data['user']['id_users'];

			if( $stock_current < $qty )
			{
				// failed
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Stock not available!</div>');
				redirect('inventory/barang_keluar');
			} else
			{
				// add database
				$this->model_barang_keluar->add($id_product, $id_customer, $id_users, $qty, $remark);
	
				// update stock
				$this->model_product->update_where_id($id_product, $stock);
	
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data added successfully.</div>');
				redirect('inventory/barang_keluar');
			}
		} else
		{
			// failed
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Barcode not found!</div>');
			redirect('inventory/barang_keluar');
		}
	}

	// END BARANG KELUAR

}
