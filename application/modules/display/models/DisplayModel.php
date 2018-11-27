<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DisplayModel extends CI_Model
{
	public function get_ruangan($table)
	{
		return $this->db->get($table)->result();
	}

	public function get_events($start, $end)
	{
		return $this->db->where("start >=", $start)->where("end <=", $end)->get("d004");
	}

	public function get_list($table, $where = FALSE )
	{
		if ($where) {
			$this->db->where($where);
		}
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