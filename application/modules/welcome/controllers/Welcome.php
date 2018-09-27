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

	public function detail($code_r)
	{

		$this->db->where(
			array(
				'd004.code_r' => $code_r,
			)
		);
		$this->db->where('end >= NOW()');
		$this->db->limit(1);
		$data['jadwal'] = $this->db->get($this->t_jadwal)->result();

		$this->db->where(array('d003.code_r' => $code_r));
		$data['ruang'] = $this->db->get($this->t_ruangan)->result();
		$data['no'] = 1;

		$this->load->view('welcome_detail', $data);

	}

}
