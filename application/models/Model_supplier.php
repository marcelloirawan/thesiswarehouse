<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_supplier extends CI_Model {
	
	static $table = "supplier";

	public function get_all()
	{
		$this->db->order_by('updated_at', 'DESC');
		return $this->db->get(self::$table)->result_array();
	}

	public function get_where_supplier($supplier)
	{
		$where = [
			'supplier' => $supplier,
		];
		return $this->db->get_where(self::$table, $where)->row_array();
	}

	public function add($supplier, $pic, $phone, $email, $address, $npwp)
	{
		$data = [
			'supplier' => $supplier,
			'pic' => $pic,
			'phone' => $phone,
			'email' => $email,
			'address' => $address,
			'npwp' => $npwp,
		];
		return $this->db->insert(self::$table, $data);
	}

	public function get_where_id($id_supplier)
	{
		$where = [
			'id_supplier' => $id_supplier,
		];
		return $this->db->get_where(self::$table, $where)->row_array();
	}

	public function update($id_supplier, $supplier, $pic, $phone, $email, $address, $npwp)
	{
		$data = [
			'supplier' => $supplier,
			'pic' => $pic,
			'phone' => $phone,
			'email' => $email,
			'address' => $address,
			'npwp' => $npwp,
		];
		$where = [
			'id_supplier' => $id_supplier,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update(self::$table);
	}

	public function delete_where_id($id_supplier)
	{
		$where = [
			'id_supplier' => $id_supplier,
		];
		$this->db->where($where);
		return $this->db->delete(self::$table);
	}

	public function count_all_supplier()
	{
		$this->db->count_all_results(self::$table);
        $this->db->from(self::$table);
        return $this->db->count_all_results();
	}

}
