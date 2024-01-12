<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_barang_masuk extends CI_Model {
	
	static $table = "barang_masuk";

	public function get_all()
	{
		$query = "SELECT `barang_masuk` . *,
					`product` . `product` AS `join_product`,
					`product` . `barcode` AS `join_barcode`,
					`product` . `uom` AS `join_uom`,
					`users` . `name` AS `join_name`,
					`supplier` . `supplier` AS `join_supplier`
					FROM `barang_masuk`
					JOIN `product`
					ON `barang_masuk` . `id_product` = `product` . `id_product`
					JOIN `supplier`
					ON `barang_masuk` . `id_supplier` = `supplier` . `id_supplier`
					JOIN `users`
					ON `barang_masuk` . `id_users` = `users` . `id_users`
					ORDER BY `barang_masuk` . `updated_at` DESC
					";
		return $this->db->query($query)->result_array();
	}

	public function add($id_product, $id_supplier, $id_users, $qty, $remark)
	{
		$data = [
			'id_product' => $id_product,
			'id_supplier' => $id_supplier,
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

	public function get_where_id_supplier($id_supplier)
	{
		$where = [
			'id_supplier' => $id_supplier,
		];
		return $this->db->get_where(self::$table, $where)->row_array();
	}

	public function delete_where_id($id_barang_masuk)
	{
		$where = [
			'id_barang_masuk' => $id_barang_masuk,
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

	public function january_barang_masuk($january, $year)
	{
		$query = "SELECT *
					FROM `barang_masuk`
					WHERE MONTH(`created_at`) = '$january'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function february_barang_masuk($february, $year)
	{
		$query = "SELECT *
					FROM `barang_masuk`
					WHERE MONTH(`created_at`) = '$february'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function march_barang_masuk($march, $year)
	{
		$query = "SELECT *
					FROM `barang_masuk`
					WHERE MONTH(`created_at`) = '$march'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function april_barang_masuk($april, $year)
	{
		$query = "SELECT *
					FROM `barang_masuk`
					WHERE MONTH(`created_at`) = '$april'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function may_barang_masuk($may, $year)
	{
		$query = "SELECT *
					FROM `barang_masuk`
					WHERE MONTH(`created_at`) = '$may'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function june_barang_masuk($june, $year)
	{
		$query = "SELECT *
					FROM `barang_masuk`
					WHERE MONTH(`created_at`) = '$june'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function july_barang_masuk($july, $year)
	{
		$query = "SELECT *
					FROM `barang_masuk`
					WHERE MONTH(`created_at`) = '$july'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function august_barang_masuk($august, $year)
	{
		$query = "SELECT *
					FROM `barang_masuk`
					WHERE MONTH(`created_at`) = '$august'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function september_barang_masuk($september, $year)
	{
		$query = "SELECT *
					FROM `barang_masuk`
					WHERE MONTH(`created_at`) = '$september'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function october_barang_masuk($october, $year)
	{
		$query = "SELECT *
					FROM `barang_masuk`
					WHERE MONTH(`created_at`) = '$october'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function november_barang_masuk($november, $year)
	{
		$query = "SELECT *
					FROM `barang_masuk`
					WHERE MONTH(`created_at`) = '$november'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

	public function december_barang_masuk($december, $year)
	{
		$query = "SELECT *
					FROM `barang_masuk`
					WHERE MONTH(`created_at`) = '$december'
					AND YEAR(`created_at`) = '$year'
					";
		return $this->db->query($query)->result_array();
	}

}
