<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->table = 'em_d003';
		$this->table_jadwal = 'em_d004';
		$this->load->model('DashboardModel', 'dashboarddb');
		$this->load->helper('form', 'url');
		$this->load->library('form_validation');
		// $this->load->helper('form');
		// if ($this->session->userdata('timeout') <= time()) {
		// 	redirect('http://eoffice.kemendesa.go.id');
		// }
	}

	public function index()
	{
		$this->db->where('nip', $this->session->userdata('nip'))->where('(doc_rapat IS NULL OR doc_absensi IS NULL)');
		$data_dashboard['jadwal'] = $this->db->get($this->table_jadwal);
		// $data_dashboard['jadwal'] = $this->db->get($this->table_jadwal)->result();

		$data['content_view'] = $this->load->view('dashboard', $data_dashboard, TRUE);
		$data['menu'] = $this->load->view('main_layout/_base_sidebar', '', TRUE);
		$data['script_js'] = $this->load->view('dashboard-js', '', TRUE);
		$data['additional_assets_css'] = array(
			'css/style-hover.css'
		);

		$this->load->view('main_layout/_base_layout', $data);
	}

	public function upload_doc()
	{
		# code...
	}

	public function upload_doc_rapat($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$new_name = time(). '-' .$_FILES["doc_rapat"]['name'];

		$config['upload_path'] = './uploaded/dok/rapat/';
		$config['allowed_types'] = 'pdf|jpg|png';
		$config['max_size']  = '2048';
		$config['file_name'] = $new_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('doc_rapat')) {

			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();

		} else {

			$upload_data = $this->upload->data();
			$data['doc_rapat'] = $upload_data['file_name'];

			$this->dashboarddb->update($this->table_jadwal, $data, 'id', $id);
			redirect('/dashboard', 'refresh');

		}
	}

	public function upload_doc_absensi($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$new_name = time(). '-' .$_FILES["doc_absensi"]['name'];

		$config['upload_path'] = './uploaded/dok/absensi/';
		$config['allowed_types'] = 'pdf|jpg|png';
		$config['max_size']  = '2048';
		$config['file_name'] = $new_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('doc_absensi')) {

			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();

		} else {

			$upload_data = $this->upload->data();
			$data['doc_absensi'] = $upload_data['file_name'];

			$run = $this->dashboarddb->update($this->table_jadwal, $data, 'id', $id);
			// print_r($run);

			redirect('/dashboard', 'refresh');

		}
	}

}