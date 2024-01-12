<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_request_material extends CI_Model {
	
	static $table = "request_material";

	public function get_all()
	{
		$query = "SELECT `request_material` . *,
					`product` . `product` AS `join_product`,
					`product` . `barcode` AS `join_barcode`,
					`product` . `uom` AS `join_uom`,
					`users` . `name` AS `join_name`,
					`supplier` . `supplier` AS `join_supplier`
					FROM `request_material`
					JOIN `product`
					ON `request_material` . `id_product` = `product` . `id_product`
					JOIN `supplier`
					ON `request_material` . `id_supplier` = `supplier` . `id_supplier`
					JOIN `users`
					ON `request_material` . `id_users` = `users` . `id_users`
					ORDER BY `request_material` . `updated_at` DESC
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

	public function get_where_id($id_request_material)
	{
		$query = "SELECT `request_material` . *,
					`product` . `product` AS `join_product`,
					`product` . `barcode` AS `join_barcode`,
					`product` . `uom` AS `join_uom`,
					`users` . `name` AS `join_name`,
					`supplier` . `supplier` AS `join_supplier`
					FROM `request_material`
					JOIN `product`
					ON `request_material` . `id_product` = `product` . `id_product`
					JOIN `supplier`
					ON `request_material` . `id_supplier` = `supplier` . `id_supplier`
					JOIN `users`
					ON `request_material` . `id_users` = `users` . `id_users`
					WHERE `request_material` . `id_request_material` = $id_request_material
					";
		return $this->db->query($query)->row_array();
	}

	public function update_where_id($id_request_material, $qty, $remark)
	{
		$data = [
			'qty' => $qty,
			'remark' => $remark,
		];
		$where = [
			'id_request_material' => $id_request_material,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update(self::$table);
	}

	public function delete_where_id($id_request_material)
	{
		$where = [
			'id_request_material' => $id_request_material,
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

}
