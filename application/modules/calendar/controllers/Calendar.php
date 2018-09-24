<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calendar extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->table 		= 'd004';
		$this->load->model('CalendarModel', 'calendardb');
		$this->load->helper('form', 'url');
		$this->load->library('form_validation');

		if($this->session->userdata('status') == ''){
			redirect(base_url('/user'));
		}
	}

	public function index($code_r = null) 
	{

		$data_content['page_title'] = 'test amkhsgdjha akjsgdkjasd asugdajkgsd kuagskjdgakj';

		$data['content_view'] = $this->load->view('calendar', $data_content, TRUE);

		$events = $this->db->get('d004');
		$data_events = array();
		foreach($events->result() as $r) {
			$data_events[] = array(
				"title" => $r->title,
				"description" => $r->desc,
				"start" => date(DATE_ISO8601, strtotime($r->start)),
				"end" => date(DATE_ISO8601, strtotime($r->end)),
				"color" => $r->color,
				"textColor" => "#fff"
			);
		}
		$data_js['get_data'] = json_encode($data_events);

		$data['script_js'] = $this->load->view('calendar-js', $data_js, TRUE);

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

	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('desc', 'Deskripsi', 'required');
		$this->form_validation->set_rules('color', 'Color', 'required');
		$this->form_validation->set_rules('start', 'Start', 'required');
		$this->form_validation->set_rules('end', 'End', 'required');

		if ($this->form_validation->run() == FALSE) {

			$message = "Ada yang salah \\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect('/calendar','refresh');

		} else {
			$data['title'] = $this->input->post('title');
			$data['desc'] = $this->input->post('desc');
			$data['start'] = $this->input->post('start');
			$data['end'] = $this->input->post('end');
			$data['color'] = $this->input->post('color');

			$this->calendardb->insert($this->table, $data);
			redirect('/calendar', 'refresh');
		}

	}
	public function delete()
	{
		$response 		= array();
		$calendar_id 	= $this->input->post('id');
		if(!empty($calendar_id))
		{
			$where = ['id' => $calendar_id];
			$delete = $this->calendardb->delete($this->table, $where);
			if ($delete > 0) 
			{
				$response['status'] = TRUE;
				$response['notif']	= 'Success delete calendar';
			}
			else
			{
				$response['status'] = FALSE;
				$response['notif']	= 'Server wrong, please save again';
			}
		}
		else
		{
			$response['status'] = FALSE;
			$response['notif']	= 'Data not found';
		}
		echo json_encode($response);
	}

}
