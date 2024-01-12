<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		// load model
		$this->load->model('model_users');
		$this->load->model('model_barang_masuk');
		$this->load->model('model_barang_keluar');
		$this->load->model('model_product');

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
		redirect('history/history_masuk');
	}
	
	// START HISTORY MASUK

	public function history_masuk()
	{
		$data['title'] = "Inventory | History";
		$data['url_active'] = "history/history_masuk";
		$data['sidebar_active'] = "History";
		$data['sub_sidebar_active'] = "History Masuk";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// GET BARANG MASUK
		$data['all_barang_masuk'] = $this->model_barang_masuk->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('history/history_masuk');
		$this->load->view('layouts/main_footer');
	}

	public function barang_masuk_delete()
	{
		// data dari form
		$ajaxDeleteIdBarang = htmlspecialchars($this->input->post('ajaxDeleteIdBarang', true));
		$id_barang_masuk = $ajaxDeleteIdBarang;
		$ajaxDeleteIdBarcode = htmlspecialchars($this->input->post('ajaxDeleteIdBarcode', true));
		$barcode = $ajaxDeleteIdBarcode;
		$ajaxDeleteQtyBalance = htmlspecialchars($this->input->post('ajaxDeleteQtyBalance', true));
		$qty = $ajaxDeleteQtyBalance;
		
		// cek product
		$cek_product = $this->model_product->get_where_barcode($barcode);
		$id_product = $cek_product['id_product'];
		$current_stock = $cek_product['stock'];
		$stock = $current_stock - $qty;

		// update stock
		$this->model_product->update_where_id($id_product, $stock);

		// delete database
		$this->model_barang_masuk->delete_where_id($id_barang_masuk);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data deleted successfully.</div>');
		redirect('history/history_masuk');
	}

	// END HISTORY MASUK
	
	// START BARANG KELUAR

	public function history_keluar()
	{
		$data['title'] = "Inventory | History";
		$data['url_active'] = "history/history_keluar";
		$data['sidebar_active'] = "History";
		$data['sub_sidebar_active'] = "History Keluar";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// GET BARANG KELUAR
		$data['all_barang_keluar'] = $this->model_barang_keluar->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('history/history_keluar');
		$this->load->view('layouts/main_footer');
	}

	public function barang_keluar_delete()
	{
		// data dari form
		$ajaxDeleteIdBarang = htmlspecialchars($this->input->post('ajaxDeleteIdBarang', true));
		$id_barang_keluar = $ajaxDeleteIdBarang;
		$ajaxDeleteIdBarcode = htmlspecialchars($this->input->post('ajaxDeleteIdBarcode', true));
		$barcode = $ajaxDeleteIdBarcode;
		$ajaxDeleteQtyBalance = htmlspecialchars($this->input->post('ajaxDeleteQtyBalance', true));
		$qty = $ajaxDeleteQtyBalance;
		
		// cek product
		$cek_product = $this->model_product->get_where_barcode($barcode);
		$id_product = $cek_product['id_product'];
		$current_stock = $cek_product['stock'];
		$stock = $current_stock + $qty;

		// update stock
		$this->model_product->update_where_id($id_product, $stock);

		// delete database
		$this->model_barang_keluar->delete_where_id($id_barang_keluar);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data deleted successfully.</div>');
		redirect('history/history_keluar');
	}

	// END HISTORY KELUAR

}
