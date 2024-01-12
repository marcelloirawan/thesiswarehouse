<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

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
		$this->load->model('model_request_material');
		$this->load->model('model_barang_masuk');
		$this->load->model('model_barang_keluar');

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
		redirect('master/supplier');
	}
	
	// START SUPPLIER

	public function supplier()
	{
		$data['title'] = "Inventory | Master";
		$data['url_active'] = "master/supplier";
		$data['sidebar_active'] = "Master";
		$data['sub_sidebar_active'] = "Supplier";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// GET SUPPLIER
		$data['all_supplier'] = $this->model_supplier->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('master/supplier');
		$this->load->view('layouts/main_footer');
	}

	public function supplier_add()
	{
		$data['title'] = "Inventory | Master";
		$data['url_active'] = "master/supplier_add";
		$data['sidebar_active'] = "Master";
		$data['sub_sidebar_active'] = "Supplier";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('master/supplier_add');
		$this->load->view('layouts/main_footer');
	}

	public function supplier_submit()
	{
		// data dari form
		$supplier = htmlspecialchars($this->input->post('supplier', true));
		$pic = htmlspecialchars($this->input->post('pic', true));
		$phone = htmlspecialchars($this->input->post('phone', true));
		$email = htmlspecialchars($this->input->post('email', true));
		$address = htmlspecialchars($this->input->post('address', true));
		$npwp = htmlspecialchars($this->input->post('npwp', true));

		// cek supplier
		$cek_supplier = $this->model_supplier->get_where_supplier($supplier);

		if( $cek_supplier )
		{
			// failed
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! This data has already registered!</div>');
			redirect('master/supplier');
		} else
		{
			// success
			$this->model_supplier->add($supplier, $pic, $phone, $email, $address, $npwp);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data added successfully.</div>');
			redirect('master/supplier');
		}
	}

	public function supplier_edit($id_supplier)
	{
		$data['title'] = "Inventory | Master";
		$data['url_active'] = "master/supplier_edit/" . $id_supplier;
		$data['sidebar_active'] = "Master";
		$data['sub_sidebar_active'] = "Supplier";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// get supplier edit
		$data['supplier_edit'] = $this->model_supplier->get_where_id($id_supplier);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('master/supplier_edit');
		$this->load->view('layouts/main_footer');
	}

	public function supplier_update()
	{
		// data dari form
		$id_supplier = htmlspecialchars($this->input->post('id_supplier', true));
		$supplier = htmlspecialchars($this->input->post('supplier', true));
		$pic = htmlspecialchars($this->input->post('pic', true));
		$phone = htmlspecialchars($this->input->post('phone', true));
		$email = htmlspecialchars($this->input->post('email', true));
		$address = htmlspecialchars($this->input->post('address', true));
		$npwp = htmlspecialchars($this->input->post('npwp', true));

		// update database
		$this->model_supplier->update($id_supplier, $supplier, $pic, $phone, $email, $address, $npwp);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data updated successfully.</div>');
		redirect('master/supplier');
	}

	public function supplier_delete()
	{
		// data dari form
		$ajaxDeleteIdSupplier = htmlspecialchars($this->input->post('ajaxDeleteIdSupplier', true));
		$id_supplier = $ajaxDeleteIdSupplier;

		// cek join id supplier
		$cek_request_material = $this->model_request_material->get_where_id_supplier($id_supplier);
		$cek_barang_masuk = $this->model_barang_masuk->get_where_id_supplier($id_supplier);

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
				// delete database
				$this->model_supplier->delete_where_id($id_supplier);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data deleted successfully.</div>');
				redirect('master/supplier');
			}
		}
	}

	// END SUPPLIER

	// START CUSTOMER

	public function customer()
	{
		$data['title'] = "Inventory | Master";
		$data['url_active'] = "master/customer";
		$data['sidebar_active'] = "Master";
		$data['sub_sidebar_active'] = "Customer";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// GET CUSTOMER
		$data['all_customer'] = $this->model_customer->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('master/customer');
		$this->load->view('layouts/main_footer');
	}

	public function customer_add()
	{
		$data['title'] = "Inventory | Master";
		$data['url_active'] = "master/customer_add";
		$data['sidebar_active'] = "Master";
		$data['sub_sidebar_active'] = "Customer";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('master/customer_add');
		$this->load->view('layouts/main_footer');
	}

	public function customer_submit()
	{
		// data dari form
		$nama = htmlspecialchars($this->input->post('nama', true));
		$pic = htmlspecialchars($this->input->post('pic', true));
		$phone = htmlspecialchars($this->input->post('phone', true));
		$email = htmlspecialchars($this->input->post('email', true));
		$address = htmlspecialchars($this->input->post('address', true));
		$npwp = htmlspecialchars($this->input->post('npwp', true));

		// cek customer
		$cek_customer = $this->model_customer->get_where_nama($nama);

		if( $cek_customer )
		{
			// failed
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! This data has already registered!</div>');
			redirect('master/customer');
		} else
		{
			// success
			$this->model_customer->add($nama, $pic, $phone, $email, $address, $npwp);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data added successfully.</div>');
			redirect('master/customer');
		}
	}

	public function customer_edit($id_customer)
	{
		$data['title'] = "Inventory | Master";
		$data['url_active'] = "master/customer_edit/" . $id_customer;
		$data['sidebar_active'] = "Master";
		$data['sub_sidebar_active'] = "Customer";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// get customer edit
		$data['customer_edit'] = $this->model_customer->get_where_id($id_customer);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('master/customer_edit');
		$this->load->view('layouts/main_footer');
	}

	public function customer_update()
	{
		// data dari form
		$id_customer = htmlspecialchars($this->input->post('id_customer', true));
		$nama = htmlspecialchars($this->input->post('nama', true));
		$pic = htmlspecialchars($this->input->post('pic', true));
		$phone = htmlspecialchars($this->input->post('phone', true));
		$email = htmlspecialchars($this->input->post('email', true));
		$address = htmlspecialchars($this->input->post('address', true));
		$npwp = htmlspecialchars($this->input->post('npwp', true));

		// update
		$this->model_customer->update($id_customer, $nama, $pic, $phone, $email, $address, $npwp);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data updated successfully.</div>');
		redirect('master/customer');
	}

	public function customer_delete()
	{
		// data dari form
		$ajaxDeleteIdCustomer = htmlspecialchars($this->input->post('ajaxDeleteIdCustomer', true));
		$id_customer = $ajaxDeleteIdCustomer;

		// cek join id customer
		$cek_barang_keluar = $this->model_barang_keluar->get_where_id_customer($id_customer);

		if( $cek_barang_keluar )
		{
			// failed barang keluar
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Please check <b>History/History Keluar!</b></div>');
			redirect('history/history_keluar');
		} else
		{
			// delete database
			$this->model_customer->delete_where_id($id_customer);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data deleted successfully.</div>');
			redirect('master/customer');
		}
	}

	// END CUSTOMER

	// CATEGORY

	public function category()
	{
		$data['title'] = "Inventory | Master";
		$data['url_active'] = "master/category";
		$data['sidebar_active'] = "Master";
		$data['sub_sidebar_active'] = "Category";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// GET CATEGORY
		$data['all_category'] = $this->model_category->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('master/category');
		$this->load->view('layouts/main_footer');
	}

	public function category_add()
	{
		$data['title'] = "Inventory | Master";
		$data['url_active'] = "master/category_add";
		$data['sidebar_active'] = "Master";
		$data['sub_sidebar_active'] = "Category";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('master/category_add');
		$this->load->view('layouts/main_footer');
	}

	public function category_submit()
	{
		// data dari form
		$category = htmlspecialchars($this->input->post('category', true));
		$remark = htmlspecialchars($this->input->post('remark', true));

		// cek category
		$cek_category = $this->model_category->get_where_category($category);

		if( $cek_category )
		{
			// failed
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! This data has already registered!</div>');
			redirect('master/category');
		} else
		{
			// success
			$this->model_category->add($category, $remark);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data added successfully.</div>');
			redirect('master/category');
		}
	}

	public function category_edit($id_category)
	{
		$data['title'] = "Inventory | Master";
		$data['url_active'] = "master/category_edit/" . $id_category;
		$data['sidebar_active'] = "Master";
		$data['sub_sidebar_active'] = "Category";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// get category edit
		$data['category_edit'] = $this->model_category->get_where_id($id_category);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('master/category_edit');
		$this->load->view('layouts/main_footer');
	}

	public function category_update()
	{
		// data dari form
		$id_category = htmlspecialchars($this->input->post('id_category', true));
		$category = htmlspecialchars($this->input->post('category', true));
		$remark = htmlspecialchars($this->input->post('remark', true));

		// update
		$this->model_category->update($id_category, $category, $remark);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data updated successfully.</div>');
		redirect('master/category');
	}

	public function category_delete()
	{
		// data dari form
		$ajaxDeleteIdCategory = htmlspecialchars($this->input->post('ajaxDeleteIdCategory', true));
		$id_category = $ajaxDeleteIdCategory;

		// cek join id category
		$cek_product = $this->model_product->get_where_id_category($id_category);

		if( $cek_product )
		{
			// failed
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Please check <b>Master/Product!</b></div>');
			redirect('master/product');
		} else
		{
			// delete database
			$this->model_category->delete_where_id($id_category);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data deleted successfully.</div>');
			redirect('master/category');
		}
	}

	// END CATEGORY

	// PRODUCT

	public function product()
	{
		$data['title'] = "Inventory | Master";
		$data['url_active'] = "master/product";
		$data['sidebar_active'] = "Master";
		$data['sub_sidebar_active'] = "Product";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// GET PRODUCT
		$data['all_product'] = $this->model_product->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('master/product');
		$this->load->view('layouts/main_footer');
	}

	public function product_add()
	{
		$data['title'] = "Inventory | Master";
		$data['url_active'] = "master/product_add";
		$data['sidebar_active'] = "Master";
		$data['sub_sidebar_active'] = "Product";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// GET CATEGORY
		$data['all_category'] = $this->model_category->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('master/product_add');
		$this->load->view('layouts/main_footer');
	}

	public function product_submit()
	{
		// var_dump($this->input->post());die;

		// data dari form
		$barcode = htmlspecialchars($this->input->post('barcode', true));
		$id_category = htmlspecialchars($this->input->post('id_category', true));
		$product = htmlspecialchars($this->input->post('product', true));
		$uom = htmlspecialchars($this->input->post('uom', true));
		$remark = htmlspecialchars($this->input->post('remark', true));

		// cek product
		$cek_product = $this->model_product->get_where_category_product($id_category, $product);
		$cek_barcode = $this->model_product->get_where_barcode($barcode);

		if( $cek_barcode )
		{
			// failed
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! This data has already registered!</div>');
			redirect('master/product');
		} else
		{
			if( $cek_product )
			{
				// failed
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! This data has already registered!</div>');
				redirect('master/product');
			} else
			{
				// upload image
				$upload_image = $_FILES['image'];
				if( $upload_image )
				{
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['max_size'] = '10048';
					$config['upload_path'] = './assets/img/product/';
					$this->load->library('upload', $config);
					
					if( $this->upload->do_upload('image') )
					{
						$new_image = $this->upload->data('file_name');
						// $this->db->set('image', $new_image);
					} else
					{
						$new_image = "";
						// echo $this->upload->display_errors();
					}
				}
				// end upload image

				// generate barcode
				$barcode_name = $barcode . ".png";
				$this->load->library('ciqrcode');

				$config['cacheable']	= true; //boolean, the default is true
				$config['cachedir']		= './assets/img/barcode/'; //string, the default is application/cache/
				$config['errorlog']		= './assets/img/barcode/'; //string, the default is application/logs/
				$config['imagedir']		= './assets/img/barcode/'; //string, the default is application/logs/
				$config['quality']		= true; //boolean, the default is true
				$config['size']			= '1024'; //interger, the default is 1024
				$config['black']		= array(224,255,255); // array, default is array(255,255,255)
				$config['white']		= array(70,130,180); // array, default is array(0,0,0)
				$this->ciqrcode->initialize($config);

				$params['data'] = $barcode;
				$params['level'] = 'H';
				$params['size'] = 10;
				$params['savename'] = FCPATH . $config['imagedir'] . $barcode_name;
				$this->ciqrcode->generate($params);
				// end generate barcode
	
				// success
				$this->model_product->add($id_category, $barcode, $new_image, $product, $uom, $remark);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data added successfully.</div>');
				redirect('master/product');
			}
		}
	}

	public function product_edit($id_product)
	{
		$data['title'] = "Inventory | Master";
		$data['url_active'] = "master/product_edit/" . $id_product;
		$data['sidebar_active'] = "Master";
		$data['sub_sidebar_active'] = "Product";

		$email = $this->session->userdata('email');
		$data['user'] = $this->model_users->get_where_email($email);

		// GET PRODUCT
		$data['product_edit'] = $this->model_product->get_where_id($id_product);

		// GET CATEGORY
		$data['all_category'] = $this->model_category->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_topbar');
		$this->load->view('master/product_edit');
		$this->load->view('layouts/main_footer');
	}

	public function product_update()
	{
		// data dari form
		$id_product = htmlspecialchars($this->input->post('id_product', true));
		$id_category = htmlspecialchars($this->input->post('id_category', true));
		$product = htmlspecialchars($this->input->post('product', true));
		$uom = htmlspecialchars($this->input->post('uom', true));
		$remark = htmlspecialchars($this->input->post('remark', true));

		// cek data
		$cek_product = $this->model_product->get_where_id($id_product);

		// upload image
		$upload_image = $_FILES['image'];
		if( $upload_image )
		{
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '10048';
			$config['upload_path'] = './assets/img/product/';
			$this->load->library('upload', $config);
			
			if( $this->upload->do_upload('image') )
			{
				$new_image = $this->upload->data('file_name');
			} else
			{
				// failed
				$new_image = $cek_product['image'];
			}
		} else
		{
			// failed
			$new_image = $cek_product['image'];
		}
		// end upload image

		// update data
		$this->model_product->update($id_product, $id_category, $product, $uom, $remark, $new_image);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data updated successfully.</div>');
		redirect('master/product');
	}

	public function product_delete()
	{
		// var_dump($this->input->post());die;

		// data dari form
		$ajaxDeleteIdProduct = htmlspecialchars($this->input->post('ajaxDeleteIdProduct', true));
		$id_product = $ajaxDeleteIdProduct;

		// cek join id product
		$cek_request_material = $this->model_request_material->get_where_id_product($id_product);
		$cek_barang_masuk = $this->model_barang_masuk->get_where_id_product($id_product);
		$cek_barang_keluar = $this->model_barang_keluar->get_where_id_product($id_product);

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
					$this->model_product->delete_where_id($id_product);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data deleted successfully.</div>');
					redirect('master/product');
				}
			}
		}
	}

	// END PRODUCT

}
