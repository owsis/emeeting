<?php

/** 
* Dibuat untuk menghandling pagination CI
* Agar fleksibel
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadFileCustom{

	function doUpload($element,$path = null,$allowed_types = null, $max_size = null ,$max_width = null ,$max_height = null)
	{
		if (empty($_FILES[$element])) {

			$return['status'] = TRUE;			
			$return['upload_data']['file_name'] = '';

			return $return;
		}


		$CI =& get_instance();
		$config['upload_path']          = './file_uploaded/'.$path;

		$config['allowed_types']        = $allowed_types;
		$config['max_size']             = $max_size;
		$config['max_width']            = $max_width;
		$config['max_height']           = $max_height;
		$CI->load->library('upload', $config);		


		if (!$CI->upload->do_upload($element))
		{
			$return['status'] = FALSE;			
		} else {
			$return['status'] = TRUE;			
		}
		$return['error'] = $CI->upload->display_errors();
		$return['upload_data'] = $CI->upload->data();			

		return $return;

	}

	function fileExists($namefile = null,$path = null)
	{
		$file = './file_uploaded/'.$path.'/'.$namefile;
		return is_file($file);
	}


	function destroyFile($namefile = null,$path = null)
	{
		$file = './file_uploaded/'.$path.'/'.$namefile;
		if($this->fileExists($namefile,$path)) {
			return unlink($file);
		}
		return TRUE;
	}

}
?>