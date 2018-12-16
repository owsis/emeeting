<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->table = 'em_d003';
		$this->table_jadwal = 'em_d004';
		$this->load->model('AdminModel', 'admindb');
		// $this->load->helper('form');
		if ($this->session->userdata('status') != 1) {
			redirect(base_url('/user'),'refresh');
		}
	}

	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data_admin['ruangan'] = $this->admindb->get_data($this->table);
		$data_admin['test'] = date('Y-m-d H:i:s');

		$data['content_view'] = $this->load->view('admin', $data_admin, TRUE);
		$data['menu'] = $this->load->view('main_layout/_base_sidebar', '', TRUE);
		$data['script_js'] = $this->load->view('admin-js', '', TRUE);


		$this->load->view('main_layout/_base_layout', $data);
	}

	public function search_ruangan()
	{
		if (isset($_GET['term'])) {
			$result = $this->admindb->search_ruangan($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row) 
					$arr_result[] = array(
						'kunker'	=> $row->kunker,
						'nunker'	=> $row->nunker,
						'label'		=> $row->nunker . '; ' . $row->kunker
					);
				echo json_encode($arr_result);
			}
		}
	}

	// public function list_jadwal()
	// {
	// 	$data_admin['ruang'] = $this->admindb->get_data($this->table);
	// 	$data_admin['jadwal'] = $this->admindb->get_order_by($this->table_jadwal);

	// 	$data['content_view'] = $this->load->view('list_jadwal', $data_admin, TRUE);
	// 	$data['menu'] = $this->load->view('main_layout/_base_sidebar', '', TRUE);

	// 	$data['script_js'] = $this->load->view('list_jadwal-js', '', TRUE);

	// 	$this->load->view('main_layout/_base_layout', $data);
	// }

	// public function jadwal($code_r = null)
	// {
	// 	$r = $this->ruangandb->get_ruangan_where($this->table, 'code_r', $code_r);

	// 	$data_content['ruangan'] = $r;

	// 	$data_content['code_r'] = $code_r;

	// 	$data['content_view'] = $this->load->view('ruangan_jadwal', $data_content, TRUE);

	// 	$this->db->where('code_r', $code_r);
	// 	$events = $this->db->get($this->tableJadwal);

	// 	$data_events = array();
	// 	foreach($events->result() as $r) {
	// 		date_default_timezone_set('Asia/Jakarta');
	// 		$data_events[] = array(
	// 			"id" => $r->id,
	// 			"nip" => $r->nip,
	// 			"title" => $r->title,
	// 			"description" => $r->desc,
	// 			"code_r" => $r->code_r,
	// 			"start" => date(DATE_ISO8601, strtotime($r->start)),
	// 			"end" => date(DATE_ISO8601, strtotime($r->end)),
	// 			"color" => $r->color,
	// 			"textColor" => "#fff"
	// 		);
	// 	}
	// 	$data_js['get_data'] = json_encode($data_events);

	// 	$data['script_js'] = $this->load->view('ruangan_jadwal-js', $data_js, TRUE);

	// 	$data['menu'] = $this->load->view('main_layout/_base_sidebar', '', TRUE);

	// 	$data['additional_assets_css'] = array(
	// 		'css/fullcalendar.min.css',
	// 		'vendors/bootstrap-datepicker/css/bootstrap-datetimepicker.min.css'
	// 	);
	// 	$data['additional_assets_js'] = array(
	// 		'js/fullcalendar.min.js',
	// 		'js/fullcalendar-id.js',
	// 		'vendors/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js'
	// 	);

	// 	$this->load->view('main_layout/_base_layout', $data);
	// }

	// public function jadwal_user_setuju($id)
	// {
	// 	$data['status'] = 'diterima';
	// 	$this->admindb->update($this->table_jadwal, $data, 'id', $id);
	// 	return redirect(base_url('/admin/list_jadwal'), 'refresh');
	// }

	// public function jadwal_user_tolak($id)
	// {
	// 	$data['status'] = 'ditolak';
	// 	$this->admindb->update($this->table_jadwal, $data, 'id', $id);
	// 	return redirect(base_url('/admin/list_jadwal'), 'refresh');
	// }

}