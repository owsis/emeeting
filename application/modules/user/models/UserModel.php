<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

	public function login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

}