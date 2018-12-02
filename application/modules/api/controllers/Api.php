<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->table_ruangan 	= 'd003';
		$this->table_jadwal 	= 'd004';
		$this->load->model('ApiModel', 'api');
		$this->load->helper('form', 'url');
		$this->load->library('form_validation');

		// if($this->session->userdata('status') == ''){
		// 	redirect(base_url('/user'));
		// }
	}

	public function get_ruangan() 
	{
		$data = $this->api->get_ruangan($this->table_ruangan);
		header('Content-Type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
	}


}
