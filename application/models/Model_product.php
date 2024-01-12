<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_product extends CI_Model {
	
	static $table = "product";

	public function get_all()
	{
		$query = "SELECT `product` . *,
					`category` . `category`
					FROM `product`
					JOIN `category`
					ON `product` . `id_category` = `category` . `id_category`
					ORDER BY `product` . `updated_at` DESC
					";
		return $this->db->query($query)->result_array();
	}

	public function get_where_category_product($id_category, $product)
	{
		$where = [
			'id_category' => $id_category,
			'product' => $product,
		];
		return $this->db->get_where(self::$table, $where)->row_array();
	}

	public function get_where_barcode($barcode)
	{
		$where = [
			'barcode' => $barcode,
		];
		return $this->db->get_where(self::$table, $where)->row_array();
	}

	public function add($id_category, $barcode, $new_image, $product, $uom, $remark)
	{
		$data = [
			'id_category' => $id_category,
			'barcode' => $barcode,
			'image' => $new_image,
			'product' => $product,
			'uom' => $uom,
			'remark' => $remark,
			'stock' => 0,
		];
		return $this->db->insert(self::$table, $data);
	}

	public function update_where_id($id_product, $stock)
	{
		$data = [
			'stock' => $stock,
		];
		$where = [
			'id_product' => $id_product,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update(self::$table);
	}

	public function get_where_id_category($id_category)
	{
		$where = [
			'id_category' => $id_category,
		];
		return $this->db->get_where(self::$table, $where)->row_array();
	}

	public function count_all_product()
	{
		$this->db->count_all_results(self::$table);
        $this->db->from(self::$table);
        return $this->db->count_all_results();
	}

	public function get_where_id($id_product)
	{
		$query = "SELECT `product` . *,
					`category` . `category`
					FROM `product`
					JOIN `category`
					ON `product` . `id_category` = `category` . `id_category`
					WHERE `product` . `id_product` = $id_product
					";
		return $this->db->query($query)->row_array();
	}

	public function update($id_product, $id_category, $product, $uom, $remark, $new_image)
	{
		$data = [
			'id_category' => $id_category,
			'product' => $product,
			'uom' => $uom,
			'remark' => $remark,
			'image' => $new_image,
		];
		$where = [
			'id_product' => $id_product,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update(self::$table);
	}

	public function delete_where_id($id_product)
	{
		$where = [
			'id_product' => $id_product,
		];
		$this->db->where($where);
		return $this->db->delete(self::$table);
	}

}
