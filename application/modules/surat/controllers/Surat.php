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
		date_default_timezone_set('Asia/Jakarta');

		$data = json_decode(file_get_contents('php://input'),true);
		$data['status'] = 'order';
		$data['created_at'] = date('Y-m-d H:i:s');

		$sender = $data['nip'];
		$receiver = explode(",", $data['receiver']);
		$length_receiver = count($receiver);
		// echo json_encode($receiver);

		for ($i=0; $i < $length_receiver; $i++) { 
			$pengirim = $sender;
			$penerima = $receiver[$i];
			$pesan = $data['desc'];
			$darinama = $data['name'];
			$url_notif = 'http://eoffice.kemendesa.go.id/simpeg/api/apiabsensi/kirimpesan';

			$data_pesan = array(
				'pengirim' => 'Admin Emeeting',
				'penerima' => $penerima,
				'aplikasi' => 'emeeting',
				'pesan'	=> $pesan,
				'darinama' => $darinama,
				'key' => 's1mp3g2018'
			);

			$this->postCURL($url_notif, $data_pesan);
			// echo $penerima . 'berhasil, <br>';
		}

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

	public function postCURL($_url, $_param){

		$postData = '';
        //create name value pairs seperated by &
		foreach($_param as $k => $v) 
		{ 
			$postData .= $k . '='.$v.'&'; 
		}
		rtrim($postData, '&');


		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, false); 
		curl_setopt($ch, CURLOPT_POST, count($postData));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    

		$output = curl_exec($ch);

		curl_close($ch);

		return $output;
	}


}