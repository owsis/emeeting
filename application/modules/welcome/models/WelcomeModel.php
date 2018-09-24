<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WelcomeModel extends CI_Model
{

	public function get_ruangan($table)
	{
		return $this->db->get($table)->result();
	}

	public function login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function get_ruangan_where($table, $where, $value_where)
	{
		$this->db->where($where, $value_where);
		return $this->db->get($table)->result();
	}
		
	public function insert($table, $param)
	{
		$this->db->insert($table, $param);
		return $this->db->insert_id();
	}
	public function update($table, $set, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $set);
		return $this->db->affected_rows();
	}
	public function delete($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
		return $this->db->affected_rows();
	}
	
}