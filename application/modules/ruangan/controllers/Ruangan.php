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
		$data['script_js'] = $this->load->view('ruangan-js', '', TRUE);

		$this->load->view('main_layout/_base_layout', $data);
	}

	public function store()
	{
		$this->form_validation->set_value('name_r', 'Nama Ruangan', 'required');
		$this->form_validation->set_value('lt_r', 'Ruangan berada di Lantai?', 'required');
		$this->form_validation->set_value('kapasitas_r', 'Kapasitas Ruangan', 'required');
		$this->form_validation->set_value('fasilitas_r', 'Fasilitas Ruangan', 'required');
		$this->form_validation->set_value('admin_r', 'Admin Ruangan', 'required');
		$this->form_validation->set_value('email_r', 'Email Admin Ruangan', 'required');
		$this->form_validation->set_value('phone_r', 'Tlp. Admin Ruangan', 'required');
		$this->form_validation->set_value('img_r', 'Foto Ruangan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('ruangan');
		} else {
			
			$data['code_r'] = 'R_' . echo unique_code(5);
			$data['name_r'] = $this->input->post('name_r');
			$data['lantai_r'] = $this->input->post('lantai_r');
			$data['kapasitas_r'] = $this->input->post('kapasitas_r');
			$data['fasilitas_r'] = $this->input->post('fasilitas_r');
			$data['admin_r'] = $this->input->post('admin_r');
			$data['email_r'] = $this->input->post('email_r');
			$data['phone_r'] = $this->input->post('phone_r');

			$config['upload_path'] = base_url() . '/assets/images/ruangan/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '100';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('img_r')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('ruangan', $error);
			} else {

				$upload_data = $this->upload->data();
				$data['img_r'] = $upload_data['file_name'];
				$this->ruangandb->store_pic_data($data);
				
				redirect('/ruangan','refresh')
			}
		}
		
	}
}