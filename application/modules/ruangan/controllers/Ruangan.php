<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->table = 'd003';
		$this->load->model('RuanganModel', 'ruangandb');
		$this->load->helper('form');

		if($this->session->userdata('status') == ''){
			redirect(base_url('/user'));
		}
	}

	public function index()
	{
		$data_ruangan['ruangan'] = $this->ruangandb->get_ruangan($this->table);

		$data['content_view'] = $this->load->view('ruangan', $data_ruangan, TRUE);

		$data['menu'] = $this->load->view('main_layout/_base_sidebar', '', TRUE);

		$this->load->view('main_layout/_base_layout', $data);
	}
}