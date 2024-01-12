<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_category extends CI_Model {
	
	static $table = "category";

	public function get_all()
	{
		$this->db->order_by('updated_at', 'DESC');
		return $this->db->get(self::$table)->result_array();
	}

	public function get_where_category($category)
	{
		$where = [
			'category' => $category,
		];
		return $this->db->get_where(self::$table, $where)->row_array();
	}

	public function add($category, $remark)
	{
		$data = [
			'category' => $category,
			'remark' => $remark,
		];
		return $this->db->insert(self::$table, $data);
	}
	
	public function get_where_id($id_category)
	{
		$where = [
			'id_category' => $id_category,
		];
		return $this->db->get_where(self::$table, $where)->row_array();
	}

	public function update($id_category, $category, $remark)
	{
		$data = [
			'category' => $category,
			'remark' => $remark,
		];
		$where = [
			'id_category' => $id_category,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update(self::$table);
	}

	public function delete_where_id($id_category)
	{
		$where = [
			'id_category' => $id_category,
		];
		$this->db->where($where);
		return $this->db->delete(self::$table);
	}

	public function count_all_category()
	{
		$this->db->count_all_results(self::$table);
        $this->db->from(self::$table);
        return $this->db->count_all_results();
	}

}
