<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_barang_keluar extends CI_Model {
	
	static $table = "barang_keluar";

	public function get_all()
	{
		$query = "SELECT `barang_keluar` . *,
					`product` . `product` AS `join_product`,
					`product` . `barcode` AS `join_barcode`,
					`product` . `uom` AS `join_uom`,
					`users` . `name` AS `join_name`,
					`customer` . `nama` AS `join_customer`
					FROM `barang_keluar`
					JOIN `product`
					ON `barang_keluar` . `id_product` = `product` . `id_product`
					JOIN `customer`
					ON `barang_keluar` . `id_customer` = `customer` . `id_customer`
					JOIN `users`
					ON `barang_keluar` . `id_users` = `users` . `id_users`
					ORDER BY `barang_keluar` . `updated_at` DESC
					";
		return $this->db->query($query)->result_array();
	}

	public function add($id_product, $id_customer, $id_users, $qty, $remark)
	{
		$data = [
			'id_product' => $id_product,
			'id_customer' => $id_customer,
			'id_users' => $id_users,
			'qty' => $qty,
			'remark' => $remark,
		];
		return $this->db->insert(self::$table, $data);
	}

	public function get_where_id_users($id_users)
	{
		$where = [
			'id_users' => $id_users,
		];
		return $this->db->get_where(self::$table, $where)->row_array();
	}

	public function get_where_id_customer($id_customer)
	{
		$where = [
			'id_customer' => $id_customer,
		];
		return $this->db->get_where(self::$table, $where)->row_array();
	}

	public function delete_where_id($id_barang_keluar)
	{
		$where = [
			'id_barang_keluar' => $id_barang_keluar,
		];
		$this->db->where($where);
		return $this->db->delete(self::$table);
	}

	public function get_where_id_product($id_product)
	{
		$where = [
			'id_product' => $id_product,
		];
		return $this->db->get_where(self::$table, $where)->row_array();
	}

	public function january_barang_keluar($january, $year)
	{
		$query = "SELECT *
					FROM `barang_keluar`
					WHERE MONTH(`created_at`) = '$january'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function february_barang_keluar($february, $year)
	{
		$query = "SELECT *
					FROM `barang_keluar`
					WHERE MONTH(`created_at`) = '$february'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function march_barang_keluar($march, $year)
	{
		$query = "SELECT *
					FROM `barang_keluar`
					WHERE MONTH(`created_at`) = '$march'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function april_barang_keluar($april, $year)
	{
		$query = "SELECT *
					FROM `barang_keluar`
					WHERE MONTH(`created_at`) = '$april'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function may_barang_keluar($may, $year)
	{
		$query = "SELECT *
					FROM `barang_keluar`
					WHERE MONTH(`created_at`) = '$may'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function june_barang_keluar($june, $year)
	{
		$query = "SELECT *
					FROM `barang_keluar`
					WHERE MONTH(`created_at`) = '$june'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function july_barang_keluar($july, $year)
	{
		$query = "SELECT *
					FROM `barang_keluar`
					WHERE MONTH(`created_at`) = '$july'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function august_barang_keluar($august, $year)
	{
		$query = "SELECT *
					FROM `barang_keluar`
					WHERE MONTH(`created_at`) = '$august'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function september_barang_keluar($september, $year)
	{
		$query = "SELECT *
					FROM `barang_keluar`
					WHERE MONTH(`created_at`) = '$september'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function october_barang_keluar($october, $year)
	{
		$query = "SELECT *
					FROM `barang_keluar`
					WHERE MONTH(`created_at`) = '$october'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function november_barang_keluar($november, $year)
	{
		$query = "SELECT *
					FROM `barang_keluar`
					WHERE MONTH(`created_at`) = '$november'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function december_barang_keluar($december, $year)
	{
		$query = "SELECT *
					FROM `barang_keluar`
					WHERE MONTH(`created_at`) = '$december'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

}
