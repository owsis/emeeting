<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->table = 'd003';
		$this->tableJadwal = 'd004';
		$this->load->model('RuanganModel', 'ruangandb');
		$this->load->helper('form', 'url');
		$this->load->library('form_validation');

		// if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
			// if ($this->session->userdata('timeout') <= time()) {
			// 	redirect('http://eoffice.kemendesa.go.id');
			// }
		// } else {
		// 	if ($this->session->userdata('timeout') <= time()) {
		// 		redirect('http://127.0.0.1');
		// 	}
		// } 
	}

	public function unique_code($length) {
		return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
	}

	public function index()
	{
		$data_ruangan['ruangan'] = $this->ruangandb->get_ruangan($this->table);
		$data_ruangan['test'] = $this->ruangandb->get_last($this->table);

		$data['content_view'] = $this->load->view('ruangan', $data_ruangan, TRUE);

		$data['menu'] = $this->load->view('main_layout/_base_sidebar', '', TRUE);
		$data['script_js'] = $this->load->view('ruangan-js', '', TRUE);

		$this->load->view('main_layout/_base_layout', $data);
	}

	public function store()
	{

		$this->form_validation->set_rules('name_r', 'Nama Ruangan', 'required');
		$this->form_validation->set_rules('lantai_r', 'Ruangan berada di Lantai?', 'required');
		$this->form_validation->set_rules('kapasitas_r', 'Kapasitas Ruangan', 'required');
		$this->form_validation->set_rules('fasilitas_r', 'Fasilitas Ruangan', 'required');
		$this->form_validation->set_rules('admin_r', 'Admin Ruangan', 'required');
		$this->form_validation->set_rules('email1_r', 'Email Admin Ruangan', 'required|valid_email');
		$this->form_validation->set_rules('email2_r', 'Email Admin Ruangan', 'valid_email');
		$this->form_validation->set_rules('phone_r', 'Tlp. Admin Ruangan', 'required');
		// $this->form_validation->set_rules('img_r', 'Foto Ruangan', 'required');

		if ($this->form_validation->run() == FALSE) {

			$message = "Ada yang salah \\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect('/ruangan','refresh');

		} else {

			$config['upload_path'] = './uploaded/images/ruangan/';
			$config['allowed_types'] = 'gif|jpg|png';
			// $config['max_size']  = '1000';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if (!$this->upload->do_upload('img_r')) {

				$error = array('error' => $this->upload->display_errors());
				echo $this->upload->display_errors();

			} else {

				$code = $this->ruangandb->get_last($this->table);
				$code_i = substr($code->code_r, 2);
				$code_r = intval($code_i) + 1;

				$data['code_r'] = 'R_' . $code_r;
				$data['name_r'] = $this->input->post('name_r');
				$data['lantai_r'] = $this->input->post('lantai_r');
				$data['kapasitas_r'] = $this->input->post('kapasitas_r');
				$data['fasilitas_r'] = $this->input->post('fasilitas_r');
				$data['admin_r'] = $this->input->post('admin_r');
				$data['email1_r'] = $this->input->post('email1_r');
				$data['email2_r'] = $this->input->post('email2_r');
				$data['phone_r'] = $this->input->post('phone_r');

				$upload_data = $this->upload->data();
				$data['img_r'] = $upload_data['file_name'];

				$this->ruangandb->insert($this->table, $data);

				redirect('/ruangan', 'refresh');

			}

			// redirect('/ruangan','refresh');


		}
		
	}

	public function jadwal($code_r = null)
	{
		$r = $this->ruangandb->get_ruangan_where($this->table, 'code_r', $code_r);

		$data_content['ruangan'] = $r;

		$data_content['code_r'] = $code_r;

		$data['content_view'] = $this->load->view('ruangan_jadwal', $data_content, TRUE);

		$this->db->where('code_r', $code_r);
		$events = $this->db->get($this->tableJadwal);
		
		$data_events = array();
		foreach($events->result() as $r) {
			date_default_timezone_set('Asia/Jakarta');
			$data_events[] = array(
				"id" => $r->id,
				"nip" => $r->nip,
				"title" => $r->title,
				"description" => $r->desc,
				"code_r" => $r->code_r,
				"start" => date(DATE_ISO8601, strtotime($r->start)),
				"end" => date(DATE_ISO8601, strtotime($r->end)),
				"color" => $r->color,
				"textColor" => "#fff"
			);
		}
		$data_js['get_data'] = json_encode($data_events);

		$data['script_js'] = $this->load->view('ruangan_jadwal-js', $data_js, TRUE);

		$data['menu'] = $this->load->view('main_layout/_base_sidebar', '', TRUE);

		$data['additional_assets_css'] = array(
			'css/fullcalendar.min.css',
			'vendors/bootstrap-datepicker/css/bootstrap-datetimepicker.min.css'
		);
		$data['additional_assets_js'] = array(
			'js/fullcalendar.min.js',
			'js/fullcalendar-id.js',
			'vendors/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js'
		);

		$this->load->view('main_layout/_base_layout', $data);
	}

	public function jadwal_update($id)
	{
		$this->form_validation->set_rules('nip_r', 'Nip Pemesan', 'required');
		$this->form_validation->set_rules('code_r', 'Ruangan', 'required');
		$this->form_validation->set_rules('title', 'Jadwal Rapat', 'required');
		$this->form_validation->set_rules('desc', 'Deskripsi Rapat', 'required');
		$this->form_validation->set_rules('start', 'Start', 'required');
		$this->form_validation->set_rules('end', 'End', 'required');
		$this->form_validation->set_rules('color', 'Color', 'required');

		if ($this->form_validation->run() == FALSE) {

			$message = "Ada yang salah \\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect('/ruangan/jadwal/' . $this->input->post('code_r'), 'refresh');

		} else {

			$data['nip'] = $this->input->post('nip');
			$data['code_r'] = $this->input->post('code_r');
			$data['title'] = $this->input->post('title');
			$data['desc'] = $this->input->post('desc');
			$data['start'] = $this->input->post('start');
			$data['end'] = $this->input->post('end');
			$data['color'] = $this->input->post('color');
			$data['status'] = 'order';
			$data['created_at'] = date('Y-m-d H:i:s');


			$this->ruangandb->update(
				$this->tableJadwal,
				$data,
				'id',
				$id
			);
			redirect('/ruangan/jadwal/' . $this->input->post('code_r'), 'refresh');
		}
	}

	public function jadwal_store()
	{
		
		$this->form_validation->set_rules('nip_r', 'Nip Pemesan', 'required');
		$this->form_validation->set_rules('code_r', 'Ruangan', 'required');
		$this->form_validation->set_rules('title', 'Jadwal Rapat', 'required');
		$this->form_validation->set_rules('desc', 'Deskripsi Rapat', 'required');
		$this->form_validation->set_rules('start', 'Start', 'required');
		$this->form_validation->set_rules('end', 'End', 'required');
		$this->form_validation->set_rules('color', 'Color', 'required');

		if ($this->form_validation->run() == FALSE) {

			$message = "Ada yang salah \\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect('/ruangan/jadwal/' . $this->input->post('code_r'), 'refresh');

		} else {
			$data['nip'] = $this->input->post('nip');
			$data['code_r'] = $this->input->post('code_r');
			$data['title'] = $this->input->post('title');
			$data['desc'] = $this->input->post('desc');
			$data['start'] = $this->input->post('start');
			$data['end'] = $this->input->post('end');
			$data['color'] = $this->input->post('color');
			$data['status'] = 'order';
			$data['created_at'] = date('Y-m-d H:i:s');

			$this->ruangandb->insert($this->tableJadwal, $data);
			redirect('/ruangan/jadwal/' . $this->input->post('code_r'), 'refresh');
		}

	}


}