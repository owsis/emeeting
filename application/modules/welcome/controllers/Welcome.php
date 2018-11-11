<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *         http://example.com/index.php/welcome
	 *    - or -
	 *         http://example.com/index.php/welcome/index
	 *    - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() 
	{
		parent::__construct();
		$this->t_ruangan = 'd003';
		$this->t_jadwal = 'd004';
		$this->t_user = 'd001';
		$this->load->model('WelcomeModel', 'welcomedb'); 

		// if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
		// 	if ($this->session->userdata('timeout') >= time()) {
		// 		redirect('http://36.66.117.30');
		// 	}
		// } else {
		// 	if ($this->session->userdata('timeout') >= time()) {
		// 		redirect('http://127.0.0.1');
		// 	}
		// }
		
	}

	public function index() {

		// if ($this->session->userdata('timeout') >= time()) {
		// 	redirect('http://36.66.117.30');
		// }

		// $data['ruangan'] = $this->welcomedb->get_ruangan($this->t_ruangan);

		// $this->load->view('welcome_message', $data);

		$data_ruangan['ruangan'] = $this->welcomedb->get_ruangan($this->t_ruangan);
		// $data_ruangan['test'] = $this->ruangandb->get_last($this->table);

		$data['content_view'] = $this->load->view('welcome_message', $data_ruangan, TRUE);

		$data['menu'] = $this->load->view('main_layout/_base_sidebar', '', TRUE);
		// $data['script_js'] = $this->load->view('ruangan-js', '', TRUE);

		$data['additional_assets_css'] = array(
			'css/style-hover.css'
		);

		$this->load->view('main_layout/_base_layout', $data);
	}

	public function home($idclient, $token, $nip, $timeout)
	{

		$data = array(
			'nip' => $nip,
			'key' => 's1mp3g2018'
		);

		if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
			$urlLogin = 'http://eoffice.kemendesa.go.id/simpeg/api/list_employee/';
		} else {
			$urlLogin = 'http://127.0.0.1/simpeg/api/list_employee/';
		}

		$login = $this->postCURL($urlLogin, $data);
		$result = json_decode($login);

		// echo $result->status;
		// echo $result->results[0]->name;

		if ($result->status == '1') {

		$data_session = array(
			'idclient' => $idclient,
			'token'	=> $token,
			'timeout' => $timeout,
			'status' => '1',
			'nip' => $nip,
			'name' => $result->results[0]->name,
			'mzpwd' => $result->results[0]->mzpwd,
			'photo' => $result->results[0]->photo,
			'level' => $result->results[0]->level,
			'komp' => $result->results[0]->komp,
            'unit' => $result->results[0]->unit,
            'kuntp' => $result->results[0]->kuntp,
            'kunkom' => $result->results[0]->kunkom,
            'kununit' => $result->results[0]->kununit,
            'kunsk' => $result->results[0]->kunsk,
            'kunssk' => $result->results[0]->kunssk,
		);

		$this->session->set_userdata($data_session);
		redirect(base_url('/'),'refresh');

		} else {

			$message = "Mohon Maaf, Anda tidak punya akses ke Halaman ini.\\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			// redirect('http://127.0.0.1','refresh');

		}

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

	public function detail($code_r)
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

		$this->load->view('welcome_detail', $data);

	}

}
