<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->table = 'em_d003';
		$this->table_jadwal = 'em_d004';
		$this->load->model('AdminModel', 'admindb');
		// $this->load->helper('form');
		if ($this->session->userdata('status') != 1) {
			redirect(base_url('/user'),'refresh');
		}
	}

	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data_admin['ruangan'] = $this->admindb->get_data($this->table);
		$data_admin['test'] = date('Y-m-d H:i:s');

		$data['content_view'] = $this->load->view('admin', $data_admin, TRUE);
		$data['menu'] = $this->load->view('main_layout/_base_sidebar', '', TRUE);
		$data['script_js'] = $this->load->view('admin-js', '', TRUE);


		$this->load->view('main_layout/_base_layout', $data);
	}

	public function search_ruangan()
	{
		if (isset($_GET['term'])) {
			$result = $this->admindb->search_ruangan($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row) 
					$arr_result[] = array(
						'kunker'	=> $row->kunker,
						'nunker'	=> $row->nunker,
						'label'		=> $row->nunker . '; ' . $row->kunker,
						'value'		=> $row->nunker
					);
				echo json_encode($arr_result);
			}
		}
	}

	public function add_ruangan()
	{

		$this->form_validation->set_rules('nunker_r', 'Nunker Ruangan', 'required');
		$this->form_validation->set_rules('kunker_r', 'Kunker Ruangan', 'required');
		$this->form_validation->set_rules('name_r', 'Nama Ruangan', 'required');
		$this->form_validation->set_rules('lantai_r', 'Ruangan berada di Lantai?', 'required');
		$this->form_validation->set_rules('kapasitas_r', 'Kapasitas Ruangan', 'required');
		$this->form_validation->set_rules('fasilitas_r', 'Fasilitas Ruangan', 'required');
		// $this->form_validation->set_rules('admin_r', 'Admin Ruangan', 'required');
		// $this->form_validation->set_rules('email1_r', 'Email Admin Ruangan', 'required|valid_email');
		// $this->form_validation->set_rules('email2_r', 'Email Admin Ruangan', 'valid_email');
		// $this->form_validation->set_rules('phone_r', 'Tlp. Admin Ruangan', 'required');
		// $this->form_validation->set_rules('img_r', 'Foto Ruangan', 'required');

		if ($this->form_validation->run() == FALSE) {

			$message = "Ada yang salah \\nTry again.";
			echo validation_errors("<script type='text/javascript'>alert('", "');</script>");
			redirect('/admin','refresh');

		} else {

			$config['upload_path'] = './uploaded/images/ruangan/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2048';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if (!$this->upload->do_upload('img_r')) {

				$error = array('error' => $this->upload->display_errors());
				$message = $this->upload->display_errors();
				echo "<script type='text/javascript'>alert('$message');</script>";
				redirect('/admin', 'refresh');

			} else {

				$code = $this->admindb->get_last($this->table);
				$code_i = substr($code->code_r, 2);
				$code_r = intval($code_i) + 1;

				$data['code_r'] = 'R_' . $code_r;
				$data['nunker_r'] = $this->input->post('nunker_r');
				$data['kunker_r'] = $this->input->post('kunker_r');
				$data['name_r'] = $this->input->post('name_r');
				$data['lantai_r'] = $this->input->post('lantai_r');
				$data['kapasitas_r'] = $this->input->post('kapasitas_r');
				$data['fasilitas_r'] = $this->input->post('fasilitas_r');
				// $data['admin_r'] = $this->input->post('admin_r');
				// $data['email1_r'] = $this->input->post('email1_r');
				// $data['email2_r'] = $this->input->post('email2_r');
				// $data['phone_r'] = $this->input->post('phone_r');

				$upload_data = $this->upload->data();
				$data['img_r'] = $upload_data['file_name'];

				$this->admindb->insert($this->table, $data);

				redirect('/admin', 'refresh');

			}

			// redirect('/ruangan','refresh');


		}
		
	}

	public function update_ruangan($id)
	{
		$this->form_validation->set_rules('nunker_r-edit', 'Nunker Ruangan', 'required');
		$this->form_validation->set_rules('name_r-edit', 'Nama Ruangan', 'required');
		$this->form_validation->set_rules('lantai_r-edit', 'Ruangan berada di Lantai?', 'required');
		$this->form_validation->set_rules('kapasitas_r-edit', 'Kapasitas Ruangan', 'required');
		$this->form_validation->set_rules('fasilitas_r-edit', 'Fasilitas Ruangan', 'required');
		// $this->form_validation->set_rules('admin_r-edit', 'Admin Ruangan', 'required');
		// $this->form_validation->set_rules('email1_r', 'Email Admin Ruangan', 'required|valid_email');
		// $this->form_validation->set_rules('email2_r', 'Email Admin Ruangan', 'valid_email');
		// $this->form_validation->set_rules('phone_r', 'Tlp. Admin Ruangan', 'required');
		// $this->form_validation->set_rules('img_r', 'Foto Ruangan', 'required');

		if ($this->form_validation->run() == FALSE) {

			$message = "Ada yang salah \\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect('/admin', 'refresh');

		} else {

			$config['upload_path'] = './uploaded/images/ruangan/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2048';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// $data['code_r'] = 'R_' . $code_r;
				$data['nunker_r'] = $this->input->post('nunker_r-edit');
				$data['kunker_r'] = $this->input->post('kunker_r-edit');
				$data['name_r'] = $this->input->post('name_r-edit');
				$data['lantai_r'] = $this->input->post('lantai_r-edit');
				$data['kapasitas_r'] = $this->input->post('kapasitas_r-edit');
				$data['fasilitas_r'] = $this->input->post('fasilitas_r-edit');
			// $data['admin_r'] = $this->input->post('admin_r');
				// $data['email1_r'] = $this->input->post('email1_r');
				// $data['email2_r'] = $this->input->post('email2_r');
			// $data['phone_r'] = $this->input->post('phone_r');
			
			if (!$this->upload->do_upload('img_r-edit')) {

				$error = array('error' => $this->upload->display_errors());
				$message = $this->upload->display_errors();
				echo "<script type='text/javascript'>alert('$message');</script>";

			} else {

			
				$upload_data = $this->upload->data();
				$data['img_r'] = $upload_data['file_name'];


				$this->admindb->update(
					$this->table,
					$data,
					'id',
					$id
				);
				redirect('/admin', 'refresh');
			}

			$this->admindb->update(
					$this->table,
					$data,
					'id',
					$id
				);
				redirect('/admin', 'refresh');
		}
	}

	public function delete_ruangan($id)
	{
		$this->admindb->delete($this->table, 'id =' . $id);
		redirect('/admin', 'refresh');
	}

	// public function list_jadwal()
	// {
	// 	$data_admin['ruang'] = $this->admindb->get_data($this->table);
	// 	$data_admin['jadwal'] = $this->admindb->get_order_by($this->table_jadwal);

	// 	$data['content_view'] = $this->load->view('list_jadwal', $data_admin, TRUE);
	// 	$data['menu'] = $this->load->view('main_layout/_base_sidebar', '', TRUE);

	// 	$data['script_js'] = $this->load->view('list_jadwal-js', '', TRUE);

	// 	$this->load->view('main_layout/_base_layout', $data);
	// }

	// public function jadwal($code_r = null)
	// {
	// 	$r = $this->ruangandb->get_ruangan_where($this->table, 'code_r', $code_r);

	// 	$data_content['ruangan'] = $r;

	// 	$data_content['code_r'] = $code_r;

	// 	$data['content_view'] = $this->load->view('ruangan_jadwal', $data_content, TRUE);

	// 	$this->db->where('code_r', $code_r);
	// 	$events = $this->db->get($this->tableJadwal);

	// 	$data_events = array();
	// 	foreach($events->result() as $r) {
	// 		date_default_timezone_set('Asia/Jakarta');
	// 		$data_events[] = array(
	// 			"id" => $r->id,
	// 			"nip" => $r->nip,
	// 			"title" => $r->title,
	// 			"description" => $r->desc,
	// 			"code_r" => $r->code_r,
	// 			"start" => date(DATE_ISO8601, strtotime($r->start)),
	// 			"end" => date(DATE_ISO8601, strtotime($r->end)),
	// 			"color" => $r->color,
	// 			"textColor" => "#fff"
	// 		);
	// 	}
	// 	$data_js['get_data'] = json_encode($data_events);

	// 	$data['script_js'] = $this->load->view('ruangan_jadwal-js', $data_js, TRUE);

	// 	$data['menu'] = $this->load->view('main_layout/_base_sidebar', '', TRUE);

	// 	$data['additional_assets_css'] = array(
	// 		'css/fullcalendar.min.css',
	// 		'vendors/bootstrap-datepicker/css/bootstrap-datetimepicker.min.css'
	// 	);
	// 	$data['additional_assets_js'] = array(
	// 		'js/fullcalendar.min.js',
	// 		'js/fullcalendar-id.js',
	// 		'vendors/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js'
	// 	);

	// 	$this->load->view('main_layout/_base_layout', $data);
	// }

	// public function jadwal_user_setuju($id)
	// {
	// 	$data['status'] = 'diterima';
	// 	$this->admindb->update($this->table_jadwal, $data, 'id', $id);
	// 	return redirect(base_url('/admin/list_jadwal'), 'refresh');
	// }

	// public function jadwal_user_tolak($id)
	// {
	// 	$data['status'] = 'ditolak';
	// 	$this->admindb->update($this->table_jadwal, $data, 'id', $id);
	// 	return redirect(base_url('/admin/list_jadwal'), 'refresh');
	// }

}