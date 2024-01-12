<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		// load model
		$this->load->model('model_users');
		$this->load->model('model_request_material');
		$this->load->model('model_supplier');
		$this->load->model('model_product');

		// cek login
		if( !$this->session->userdata('email') )
		{
			// login
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please login!</div>');
			redirect('');
		}

		// cek role
		if( $this->session->userdata('id_roles') != 1 )
		{
			// access blocked
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Access blocked!</div>');
			redirect('dashboard/dashboard');
		}
	}

	public function index()
	{
		redirect('request/request_material');
	}
	
	// START REQUEST MATERIAL

	public function request_material()
	{
		$data['title'] = "Inventory | Request";
		$data['url_active'] = "request/request_material";
		$data['sidebar_active'] = "Request";
		$data['sub_sidebar_active'] = "Request Material";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// GET REQUEST MATERIAL
		$data['all_request_material'] = $this->model_request_material->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('request/request_material');
		$this->load->view('layouts/main_footer');
	}

	public function request_material_add()
	{
		$data['title'] = "Inventory | Request";
		$data['url_active'] = "request/request_material_add";
		$data['sidebar_active'] = "Request";
		$data['sub_sidebar_active'] = "Request Material";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// GET SUPPLIER
		$data['all_supplier'] = $this->model_supplier->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('request/request_material_add');
		$this->load->view('layouts/main_footer');
	}

	public function request_material_submit()
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

			// get user
			$email = $this->session->userdata('email');
			$data['user'] = $this->model_users->get_where_email($email);
			$id_users = $data['user']['id_users'];

			// add database
			$this->model_request_material->add($id_product, $id_supplier, $id_users, $qty, $remark);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data added successfully.</div>');
			redirect('request/request_material');
		} else
		{
			// failed
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Barcode not found!</div>');
			redirect('request/request_material_add');
		}
	}

	public function request_material_edit($id_request_material)
	{
		$data['title'] = "Inventory | Request";
		$data['url_active'] = "request/request_material_edit/" . $id_request_material;
		$data['sidebar_active'] = "Request";
		$data['sub_sidebar_active'] = "Request Material";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// get request material
		$data['row_edit'] = $this->model_request_material->get_where_id($id_request_material);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('request/request_material_edit');
		$this->load->view('layouts/main_footer');
	}

	public function request_material_update()
	{
		// data dari form
		$id_request_material = htmlspecialchars($this->input->post('id_request_material', true));
		$qty = htmlspecialchars($this->input->post('qty', true));
		$remark = htmlspecialchars($this->input->post('remark', true));

		// update
		$this->model_request_material->update_where_id($id_request_material, $qty, $remark);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data updated successfully.</div>');
		redirect('request/request_material');
	}

	public function request_material_delete()
	{
		// var_dump($this->input->post());die;

		// data dari form
		$ajaxDeleteIdRequestMaterial = htmlspecialchars($this->input->post('ajaxDeleteIdRequestMaterial', true));
		$id_request_material = $ajaxDeleteIdRequestMaterial;

		// delete database
		$this->model_request_material->delete_where_id($id_request_material);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data deleted successfully.</div>');
		redirect('request/request_material');
	}

	// END REQUEST MATERIAL

}
