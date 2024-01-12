<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		// load model
		$this->load->model('model_users');
	}

	public function index()
	{
		// cek login
		if( $this->session->userdata('email') )
		{
			// login
			redirect('dashboard/dashboard');
		}

		$data['title'] = "Inventory | Login";

		$this->load->view('layouts/auth_header', $data);
		$this->load->view('auth/login');
		$this->load->view('layouts/auth_footer');
	}

	public function cek_login()
	{
		// data dari form
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// cek email
		$user = $this->model_users->get_where_email($email);

		// var_dump($user);die;

		if( $user )
		{
			// validasi password
			if( password_verify($password, $user['password']) )
			{
				// simpan session
				$data = [
					'email' => $user['email'],
					'id_roles' => $user['id_roles'],
				];
				$this->session->set_userdata($data);
				
				// success
				if( $user['id_roles'] == 1 )
				{
					// admin
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Login successfully.</div>');
					redirect('dashboard/dashboard');
				} else
				{
					// staff
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Login successfully.</div>');
					redirect('dashboard/dashboard');
				}
			} else
			{
				// failed, wrong password
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Wrong password!</div>');
				redirect('');
			}
		} else
		{
			// failed, email ditemukan
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Email not registered!</div>');
			redirect('');
		}
	}

	public function register()
	{
		// cek login
		if( $this->session->userdata('email') )
		{
			// login
			redirect('dashboard/dashboard');
		}

		$this->form_validation->set_rules('name', 'name', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|trim');
		$this->form_validation->set_rules('password1', 'password', 'required|trim');
		$this->form_validation->set_rules('password2', 'password', 'required|trim');

		if ($this->form_validation->run() == false)
		{
			// gagal
			$this->load->view('layouts/auth_header');
			$this->load->view('auth/register');
			$this->load->view('layouts/auth_footer');
		} else
		{
			// berhasil
			$name = htmlspecialchars($this->input->post('name', true));
			$email = htmlspecialchars($this->input->post('email', true));
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

			// add data
			$this->model_users->add($name, $email, $password);

			// redirect
			redirect('');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_roles');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout successfully.</div>');
		redirect('');
	}
}
