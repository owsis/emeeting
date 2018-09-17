<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->t_user = 'd001';
		$this->load->model('UserModel', 'userdb');
	}

	public function index()
	{
		if($this->session->userdata('status') == '1'){
			redirect(base_url('/dashboard'));
		}
		$this->load->view('user-login');
	}

	public function login()
	{

		$nik = $this->input->post('nik');
		$password = $this->input->post('password');

		$where = array(
			'nik' => $nik, 
			'password' => md5($password)
		);

		$cek = $this->userdb->login($this->t_user, $where)->num_rows();
		if ($cek > 0) {
			
			$data_session = array(
				'nik' => $nik,
				'status' => '1'
			);

			$this->session->set_userdata($data_session);
			redirect(base_url('/dashboard/'),'refresh');
		} else {
			$message = "Username and/or Password incorrect.\\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect(base_url('/user'),'refresh');
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('/'));
	}

}