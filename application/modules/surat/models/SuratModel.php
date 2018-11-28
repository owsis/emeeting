<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratModel extends CI_Model
{

	public function get_ruangan($table)
	{
		return $this->db->get($table)->result();
	}

	public function get_last($table)
	{
		return $this->db->order_by('id', 'desc')->limit(1)->get($table)->row();
	}

	public function get_ruangan_where($table, $where, $value_where)
	{
		$this->db->where($where, $value_where);
		return $this->db->get($table)->result();
	}

	public function get_jadwal($table, $where = null )
	{
		$arr = array(
			'code_r' => $where
		);
		$this->db->where('code_r', $where);
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