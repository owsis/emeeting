<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardModel extends CI_Model
{

	public function get_ruangan($table)
	{
		return $this->db->get($table)->result();
	}

	public function login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function get_jadwal_where($table, $where, $value_where)
	{
		$this->db->where($where, $value_where);
		return $this->db->get($table)->result();
	}

	public function get_jadwal_where2($table, $where, $value_where, $where2, $value_where2)
	{
		$this->db->where($where, $value_where);
		$this->db->where($where2, $value_where2);
		return $this->db->get($table)->result();
	}
		
	public function insert($table, $param)
	{
		$this->db->insert($table, $param);
		return $this->db->insert_id();
	}
	public function update($table, $data, $where, $value)
	{
		$this->db->where($where, $value);
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}
	public function delete($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
		return $this->db->affected_rows();
	}
	
}