<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_customer extends CI_Model {
	
	static $table = "customer";

	public function get_all()
	{
		$this->db->order_by('updated_at', 'DESC');
		return $this->db->get(self::$table)->result_array();
	}

	public function get_where_nama($nama)
	{
		$where = [
			'nama' => $nama,
		];
		return $this->db->get_where(self::$table, $where)->row_array();
	}

	public function add($nama, $pic, $phone, $email, $address, $npwp)
	{
		$data = [
			'nama' => $nama,
			'pic' => $pic,
			'phone' => $phone,
			'email' => $email,
			'address' => $address,
			'npwp' => $npwp,
		];
		return $this->db->insert(self::$table, $data);
	}

	public function get_where_id($id_customer)
	{
		$where = [
			'id_customer' => $id_customer,
		];
		return $this->db->get_where(self::$table, $where)->row_array();
	}

	public function update($id_customer, $nama, $pic, $phone, $email, $address, $npwp)
	{
		$data = [
			'nama' => $nama,
			'pic' => $pic,
			'phone' => $phone,
			'email' => $email,
			'address' => $address,
			'npwp' => $npwp,
		];
		$where = [
			'id_customer' => $id_customer,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update(self::$table);
	}

	public function delete_where_id($id_customer)
	{
		$where = [
			'id_customer' => $id_customer,
		];
		$this->db->where($where);
		return $this->db->delete(self::$table);
	}

	public function count_all_customer()
	{
		$this->db->count_all_results(self::$table);
        $this->db->from(self::$table);
        return $this->db->count_all_results();
	}

}
