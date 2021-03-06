<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->t_user = 'em_d001';
		$this->load->model('UserModel', 'userdb');
		$this->load->helper('form', 'url');
		$this->load->library('form_validation');
	}

	public function index()
	{
		// if($this->session->userdata('status') == '1'){
		// 	redirect(base_url('/ruangan'));
		// }
		$data['md5'] = md5('adminqwerty');
		$this->load->view('user-login', $data);
	}

	public function login_admin()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {

			$message = "Gunakan email yang valid \\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect('/user','refresh');

		} else {
			$email = $this->input->post('email');
			$pass = md5($this->input->post('password'));

			$login = $this->userdb->login_admin($this->t_user, $email, $pass);
			
			if ($login == false) {

				$message = "Username and/or Password incorrect.\\nTry again.";
				echo "<script type='text/javascript'>alert('$message');</script>";
				redirect(base_url('/user'),'refresh');

			} else {
				$data_session = array();
				foreach ($login as $key) {

					$data_session = array(
						'status' => 1,
						'email' => $key->email,
						'role' => $key->role,
						'notif' => $key->notifications
					);
					
				}
				$this->session->set_userdata($data_session);
				// echo $this->session->userdata('status');
				// echo $this->session->userdata('email');
				// echo $this->session->userdata('notif');
				// echo $this->session->userdata('role');
				redirect(base_url('/admin'),'refresh');
			}
			
		}
	}

	public function login()
	{
		//nip = 195501101981101001
		//nip = 195105151976032001
		//nip = 195406171985032001
		//nip = 195408081984032001
		//key = s1mp3g2018

		$data = array(
			'nip' => $this->input->post('nip'),
			'key' =>  $this->input->post('password')
		);

		if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
			$urlLogin = 'http://36.66.117.30/simpeg/api/list_employee/';
		} else {
			$urlLogin = 'http://127.0.0.1/simpeg/api/list_employee/';
		}

		$login = $this->postCURL($urlLogin, $data);
		$result = json_decode($login);

		// echo $result->results[0]->nip;
		// echo $result->status;

		if ($result->status == '1') {

			$data_session = array(
				'status' => $result->status,
				'nip' => $result->results[0]->nip,
				'namapeg' => $result->results[0]->namapeg,
				'njab' => $result->results[0]->njab
			);

			$this->session->set_userdata($data_session);
			redirect(base_url('/ruangan'),'refresh');

		} else {

			$message = "Username and/or Password incorrect.\\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect(base_url('/user'),'refresh');
			
		}
		

		// $nik = $this->input->post('nik');
		// $password = $this->input->post('password');

		// $where = array(
		// 	'nik' => $nik, 
		// 	'password' => md5($password)
		// );

		// $cek = $this->userdb->login($this->t_user, $where)->num_rows();
		// if ($cek > 0) {

		// 	$data_session = array(
		// 		'nik' => $nik,
		// 		'status' => '1'
		// 	);

		// 	$this->session->set_userdata($data_session);
		// 	redirect(base_url('/dashboard/'),'refresh');
		// } else {
		// 	$message = "Username and/or Password incorrect.\\nTry again.";
		// 	echo "<script type='text/javascript'>alert('$message');</script>";
		// 	redirect(base_url('/user'),'refresh');
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

	public function logout()
	{
		$this->session->sess_destroy();
		if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
			redirect('http://localhost/', 'refresh');
			echo "<script>window.close();</script>";
		} else {
			redirect('http://eoffice.kemendesa.go.id/', 'refresh');
			echo "<script>window.close();</script>";
		}
	}

}