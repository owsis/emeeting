<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->table = 'd003';
		$this->tableJadwal = 'd004';
		$this->load->model('SuratModel', 'suratdb');
		$this->load->helper('form', 'url');
		$this->load->library('form_validation');

	}

	public function jadwal_store()
	{
		
		$this->form_validation->set_rules('nip', 'Nip Pemesan', 'required');
		$this->form_validation->set_rules('code_r', 'Ruangan', 'required');
		$this->form_validation->set_rules('title', 'Jadwal Rapat', 'required');
		$this->form_validation->set_rules('desc', 'Deskripsi Rapat', 'required');
		$this->form_validation->set_rules('start', 'Start', 'required');
		$this->form_validation->set_rules('end', 'End', 'required');
		$this->form_validation->set_rules('color', 'Color', 'required');

		if ($this->form_validation->run() == FALSE) {

			$data['status_json'] = 500;
			$data['message'] = 'Terdapat kesalahan pada input data';
			echo json_encode($data);

		} else {
			date_default_timezone_set('Asia/Jakarta');
			
			$data['nip'] = $this->input->post('nip');
			$data['code_r'] = $this->input->post('code_r');
			$data['title'] = $this->input->post('title');
			$data['desc'] = $this->input->post('desc');
			$data['start'] = $this->input->post('start');
			$data['end'] = $this->input->post('end');
			$data['color'] = $this->input->post('color');
			$data['status'] = 'order';
			$data['created_at'] = date('Y-m-d H:i:s');

			$this->suratdb->insert($this->tableJadwal, $data);
			echo json_encode($data, 200);
		}

	}


}