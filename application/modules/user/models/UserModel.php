<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

	public function login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function login_admin($table, $email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);

		$sql = $this->db->get($table);
		if ($sql->num_rows() == 1) {
			return true;
		}
	}

}