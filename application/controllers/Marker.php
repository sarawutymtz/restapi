<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 header('Access-Control-Allow-Origin: *'); 
require_once('application/libraries/REST_Controller.php');

class Marker extends REST_Controller {

	public function marker_post()
	{
		$this->load->model('Marker_model');

		$result = $this->Marker_model->getAllDetail($this->input->post('type'));

		if($result){
            $this->response(['result' => true, 'data' => $result], 200); 
        } else {
            $this->response(['result' => false], 404);
        }

	}

}
