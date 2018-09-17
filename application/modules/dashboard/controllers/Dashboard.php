<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->table = 'd003';
		// $this->load->model('RuanganModel', 'ruangandb');
		// $this->load->helper('form');
		if($this->session->userdata('status') != '1'){
			redirect(base_url('/user'));
		}
	}

	public function index()
	{
		$data['menu'] = $this->load->view('main_layout/_base_sidebar', '', TRUE);

		$this->load->view('main_layout/_base_layout', $data);
	}

}