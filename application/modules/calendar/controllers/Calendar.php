<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calendar extends MX_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->table 		= 'd004';
		$this->load->model('CalendarModel', 'modeldb'); 
	}

	public function index() 
	{
		$data_cal = $this->modeldb->get_list($this->table);
		date_default_timezone_set("Asia/Bangkok");
		$cal = array();
		foreach ($data_cal as $key => $d_cal) {
			$cal[] = array(
				'title' => $d_cal->title,
				'description' => trim($d_cal->desc), 
				'start' => date(DATE_ISO8601, strtotime($d_cal->start)),
				'end' 	=> date(DATE_ISO8601, strtotime($d_cal->end)),
				'color' => $d_cal->color,
			);
		}
		$data_content['get_data'] = json_encode($cal);

		$data_content['page_title'] = "Calendar";
		$data_content['test'] = date(DATE_ISO8601, strtotime($data_cal[0]->start));

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
			'vendors/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js'
		);

		$this->load->view('main_layout/_base_layout', $data);
	}

	public function save()
	{
		$response = array();
		$this->form_validation->set_rules('title', 'Title cant be empty ', 'required');
		if ($this->form_validation->run() == TRUE)
		{
			$param = $this->input->post();
			$calendar_id = $param['calendar_id'];
			unset($param['calendar_id']);
			if($calendar_id == 0)
			{
				$param['create_at']   	= date('Y-m-d H:i:s');
				$insert = $this->modeldb->insert($this->table, $param);
				if ($insert > 0) 
				{
					$response['status'] = TRUE;
					$response['notif']	= 'Success add calendar';
					$response['id']		= $insert;
				}
				else
				{
					$response['status'] = FALSE;
					$response['notif']	= 'Server wrong, please save again';
				}
			}
			else
			{	
				$where 		= [ 'id'  => $calendar_id];
				$param['modified_at']   	= date('Y-m-d H:i:s');
				$update = $this->modeldb->update($this->table, $param, $where);
				if ($update > 0) 
				{
					$response['status'] = TRUE;
					$response['notif']	= 'Success add calendar';
					$response['id']		= $calendar_id;
				}
				else
				{
					$response['status'] = FALSE;
					$response['notif']	= 'Server wrong, please save again';
				}
			}
		}
		else
		{
			$response['status'] = FALSE;
			$response['notif']	= validation_errors();
		}
		echo json_encode($response);
	}
	public function delete()
	{
		$response 		= array();
		$calendar_id 	= $this->input->post('id');
		if(!empty($calendar_id))
		{
			$where = ['id' => $calendar_id];
			$delete = $this->modeldb->delete($this->table, $where);
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
