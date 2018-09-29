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
	}

	public function index() {

		$data['ruangan'] = $this->welcomedb->get_ruangan($this->t_ruangan);

		$this->load->view('welcome_message', $data);
	}

	public function home($idclient, $token, $nip, $timeout)
	{

		// $data = array(
		// 	'nip' => $nip,
		// 	'key' => 's1mp3g2018'
		// );

		// if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
		// 	$urlLogin = 'http://36.66.117.30/simpeg/api/list_employee/';
		// } else {
		// 	$urlLogin = 'http://127.0.0.1/simpeg/api/list_employee/';
		// }

		// $login = $this->postCURL($urlLogin, $data);
		// $result = json_decode($login);

		// echo $result->results[0]->nip;
		// echo $result->status;

		// if ($result->status == '1') {

			$data_session = array(
				'idclient' => $idclient,
				'token'	=> $token,
				'timeout' => $timeout,
				'status' => '1',
				'nip' => $nip,
				// 'status' => $result->status,
				// 'nip' => $result->results[0]->nip,
				// 'namapeg' => $result->results[0]->namapeg,
				// 'njab' => $result->results[0]->njab
			);

			$this->session->set_userdata($data_session);
			redirect(base_url('/'),'refresh');

		// } else {

		// 	$message = "Mohon Maaf, Anda tidak punya akses ke Halaman ini.\\nTry again.";
		// 	echo "<script type='text/javascript'>alert('$message');</script>";
		// 	// redirect('http://127.0.0.1','refresh');
			
		// }

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

		$this->db->where(
			array(
				'd004.code_r' => $code_r,
			)
		);
		$this->db->where('start <= NOW()');
		$this->db->where('end >= NOW()');
		$this->db->limit(1);
		$data['jadwal'] = $this->db->get($this->t_jadwal)->result();

		$this->db->where(array('d003.code_r' => $code_r));
		$data['ruang'] = $this->db->get($this->t_ruangan)->result();
		$data['no'] = 1;

		$this->load->view('welcome_detail', $data);

	}

}
