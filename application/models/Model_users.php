<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_users extends CI_Model {
	
	static $table = "users";

	public function add($name, $email, $password)
	{
		$data = [
			'id_roles' => 1,
			'name' => $name,
			'email' => $email,
			'password' => $password,
			'image' => "default.svg",
			'is_active' => 1,
		];
		return $this->db->insert(self::$table, $data);
	}

	public function get_where_email($email)
	{
		$query = "SELECT `users` . *,
					`roles` . `role`
					FROM `users`
					JOIN `roles`
					ON `users` . `id_roles` = `roles` . `id_roles`
					WHERE `users` . `email` = '$email'
					ORDER BY `users` . `updated_at` DESC
					";
		return $this->db->query($query)->row_array();
	}

	public function get_all()
	{
		$query = "SELECT `users` . *,
					`roles` . `role`
					FROM `users`
					JOIN `roles`
					ON `users` . `id_roles` = `roles` . `id_roles`
					ORDER BY `users` . `updated_at` DESC
					";
		return $this->db->query($query)->result_array();
	}

	public function add_from_admin($name, $email, $password, $id_roles)
	{
		$data = [
			'id_roles' => $id_roles,
			'name' => $name,
			'email' => $email,
			'password' => $password,
			'image' => "default.svg",
			'is_active' => 1,
		];
		return $this->db->insert(self::$table, $data);
	}

	public function get_where_id($id_users)
	{
		$query = "SELECT `users` . *,
					`roles` . `role`
					FROM `users`
					JOIN `roles`
					ON `users` . `id_roles` = `roles` . `id_roles`
					WHERE `users` . `id_users` = '$id_users'
					";
		return $this->db->query($query)->row_array();
	}

	public function update($id_users, $name, $id_roles)
	{
		$data = [
			'name' => $name,
			'id_roles' => $id_roles,
		];
		$where = [
			'id_users' => $id_users,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update(self::$table);
	}

	public function reset_password_where_id($id_users, $password)
	{
		$data = [
			'password' => $password,
		];
		$where = [
			'id_users' => $id_users,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update(self::$table);
	}

	public function delete_where_id($id_users)
	{
		$where = [
			'id_users' => $id_users,
		];
		$this->db->where($where);
		return $this->db->delete(self::$table);
	}

}
