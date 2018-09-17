<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RuanganModel extends CI_Model
{

	public function get_ruangan($table)
	{
		return $this->db->get($table)->result();
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
		$param['code_r']      = $data['code_r'];
		$param['name_r']      = $data['name_r'];
		$param['img_r']       = $data['img_r'];
		$param['lantai_r']    = $data['lantai_r'];
		$param['kapasitas_r'] = $data['kapasitas_r'];
		$param['fasilitas_r'] = $data['fasilitas_r'];
		$param['admin_r']     = $data['admin_r'];
		$param['email_r']     = $data['email_r'];
		$param['phone_r']     = $data['phone_r'];

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