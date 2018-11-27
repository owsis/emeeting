<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->table = 'd003';
		// $this->load->model('RuanganModel', 'ruangandb');
		// $this->load->helper('form');
		if ($this->session->userdata('timeout') <= time()) {
			redirect('http://eoffice.kemendesa.go.id');
		}
	}

	public function index()
	{
		$data['content_view'] = $this->load->view('dashboard', '', TRUE);
		$data['menu'] = $this->load->view('main_layout/_base_sidebar', '', TRUE);

		$data['additional_assets_css'] = array(
			'css/style-hover.css'
		);

		$this->load->view('main_layout/_base_layout', $data);
	}

}