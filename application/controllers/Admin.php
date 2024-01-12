<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		// load model
		$this->load->model('model_users');
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
		redirect('admin/accounts');
	}

	public function accounts()
	{
		$data['title'] = "Inventory | Admin";
		$data['url_active'] = "admin/accounts";
		$data['sidebar_active'] = "Admin";
		$data['sub_sidebar_active'] = "Accounts";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// GET USERS
		$data['all_user'] = $this->model_users->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('admin/accounts');
		$this->load->view('layouts/main_footer');
	}

	public function accounts_add()
	{
		$data['title'] = "Inventory | Admin";
		$data['url_active'] = "admin/accounts_add";
		$data['sidebar_active'] = "Admin";
		$data['sub_sidebar_active'] = "Accounts";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('admin/accounts_add');
		$this->load->view('layouts/main_footer');
	}

	public function accounts_submit()
	{
		// data dari form
		$name = htmlspecialchars($this->input->post('name', true));
		$email = htmlspecialchars($this->input->post('email', true));
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$id_roles = htmlspecialchars($this->input->post('id_roles', true));

		// cek user
		$cek_user = $this->model_users->get_where_email($email);

		if( $cek_user )
		{
			// failed
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! This email has already registered!</div>');
			redirect('admin/accounts');
		} else
		{
			// success
			$this->model_users->add_from_admin($name, $email, $password, $id_roles);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data added successfully.</div>');
			redirect('admin/accounts');
		}
	}

	public function accounts_edit($id_users)
	{
		$data['title'] = "Inventory | Admin";
		$data['url_active'] = "admin/accounts_edit/" . $id_users;
		$data['sidebar_active'] = "Admin";
		$data['sub_sidebar_active'] = "Accounts";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// get user edit
		$data['user_edit'] = $this->model_users->get_where_id($id_users);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('admin/accounts_edit');
		$this->load->view('layouts/main_footer');
	}

	public function accounts_update()
	{
		// data dari form
		$id_users = htmlspecialchars($this->input->post('id_users', true));
		$name = htmlspecialchars($this->input->post('name', true));
		$id_roles = htmlspecialchars($this->input->post('id_roles', true));

		// update data
		$this->model_users->update($id_users, $name, $id_roles);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data updated successfully.</div>');
		redirect('admin/accounts');
	}

	public function accounts_reset_password($id_users)
	{
		$data['title'] = "Inventory | Admin";
		$data['url_active'] = "admin/accounts_reset_password/" . $id_users;
		$data['sidebar_active'] = "Admin";
		$data['sub_sidebar_active'] = "Accounts";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// get user reset_password
		$data['user_reset_password'] = $this->model_users->get_where_id($id_users);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('admin/accounts_reset_password');
		$this->load->view('layouts/main_footer');
	}

	public function accounts_reset_password_update()
	{
		// data dari form
		$id_users = htmlspecialchars($this->input->post('id_users', true));
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

		// update password
		$this->model_users->reset_password_where_id($id_users, $password);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data updated successfully.</div>');
		redirect('admin/accounts');
	}

	public function accounts_delete()
	{
		// data dari form
		$ajaxDeleteIdUsers = htmlspecialchars($this->input->post('ajaxDeleteIdUsers', true));
		$id_users = $ajaxDeleteIdUsers;

		// cek join id users
		$cek_request_material = $this->model_request_material->get_where_id_users($id_users);
		$cek_barang_masuk = $this->model_barang_masuk->get_where_id_users($id_users);
		$cek_barang_keluar = $this->model_barang_keluar->get_where_id_users($id_users);

		if( $cek_request_material )
		{
			// failed request material
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Please check <b>Request/Request Material!</b></div>');
			redirect('request/request_material');
		} else
		{
			// success
			if( $cek_barang_masuk )
			{
				// failed barang masuk
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Please check <b>History/History Masuk!</b></div>');
				redirect('history/history_masuk');
			} else
			{
				// success
				if( $cek_barang_keluar )
				{
					// failed barang keluar
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Please check <b>History/History Keluar!</b></div>');
					redirect('history/history_keluar');
				} else
				{
					// delete database
					$this->model_users->delete_where_id($id_users);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data deleted successfully.</div>');
					redirect('admin/accounts');
				}
			}
		}
	}

}
