<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Display extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->t_ruangan = 'd003';
		$this->t_jadwal = 'd004';
		$this->load->helper('form', 'url');
		$this->load->library('form_validation');
		$this->load->model('DisplayModel', 'displaydb'); 

	}

	public function index($code_r = null) 
	{

		$data_ruangan['ruangan'] = $this->displaydb->get_ruangan($this->t_ruangan);
		// $data_ruangan['test'] = $this->ruangandb->get_last($this->table);

		$data['content_view'] = $this->load->view('display', $data_ruangan, TRUE);

		$data['menu'] = $this->load->view('main_layout/_base_sidebar', '', TRUE);
		// $data['script_js'] = $this->load->view('ruangan-js', '', TRUE);

		$data['additional_assets_css'] = array(
			'css/style-hover.css'
		);

		$this->load->view('main_layout/_base_layout', $data);
	}

	public function ruang($code_r)
	{
		date_default_timezone_set('Asia/Jakarta');
		$date = new DateTime();
		$timestamp = $date->getTimestamp();
		$data['test'] = $timestamp;
		$this->db->where(
			array(
				'd004.code_r' => $code_r,
			)
		);
		$this->db->where('start <=', date("Y-m-d H:i:s"));
		$this->db->where('end >=', date("Y-m-d H:i:s"));
		$this->db->limit(1);
		$data['jadwal'] = $this->db->get($this->t_jadwal)->result();
		// $query = $this->db->query('SELECT * FROM '.$this->t_jadwal.' WHERE code_r LIKE "%'.$code_r.'%" AND start >= NOW()');
		// $data['jadwal'] = $query;

		$this->db->where(array('d003.code_r' => $code_r));
		$data['ruang'] = $this->db->get($this->t_ruangan)->result();


		$this->db->where('code_r', $code_r);
		$events = $this->db->get($this->t_jadwal);
		$data_events = array();
		foreach($events->result() as $r) {
			date_default_timezone_set('Asia/Jakarta');
			$data_events[] = array(
				"id" => $r->id,
				"title" => $r->title,
				"description" => $r->desc,
				"code_r" => $r->code_r,
				"start" => date(DATE_ISO8601, strtotime($r->start)),
				"end" => date(DATE_ISO8601, strtotime($r->end)),
				"color" => $r->color,
				"textColor" => "#fff"
			);
		}
		$data['get_data'] = json_encode($data_events);

		$this->load->view('display_ruang', $data);

	}

}
