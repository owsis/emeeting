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

			$data = json_decode(file_get_contents('php://input'),true);

			// print_r($data);

			$response = $this->suratdb->insert($this->tableJadwal, $data);

			if ($response) {
				$result = json_encode($data);
			// } else {
			// 	$data_result['status'] = 500;
			// 	$data_result['message'] = 'Silakan cek kembali data yang Anda input';

			// 	$result = json_encode($data_result);
			}

			echo $result;
	}


}