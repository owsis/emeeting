<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
	var $column_order = array(null, 'Pemesan','Judul','Deskripsi','KodeRuangan','MulaiRapat','SelesaiRapat','status','TglPesan');
	var $column_search = array('Pemesan','Judul','Deskripsi','KodeRuangan','MulaiRapat','SelesaiRapat','status','TglPesan');
	var $order = array('id' => 'asc');

	private function _get_datatables_query($table)
    {
         
        $this->db->from($table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($table)
    {
        $this->_get_datatables_query($table);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($table)
    {
        $this->_get_datatables_query($table);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($table)
    {
        $this->db->from($table);
        return $this->db->count_all_results();
    }

	public function get_data($table)
	{
		return $this->db->get($table)->result();
	}

	public function get_order_by($table)
	{
		return $this->db->order_by('id', 'desc')->get($table)->result();
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