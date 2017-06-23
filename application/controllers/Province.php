<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 header('Access-Control-Allow-Origin: *'); 
require_once('application/libraries/REST_Controller.php');

class Province extends REST_Controller {

	public function layer_post()
	{
		$this->load->model('Layerprovince_model');
		$result = $this->Layerprovince_model->getpepoleprovince($this->input->post('id'));

		if($result){
            $this->response(['result' => true, 'data' => $result], 200); 
        } else {
            $this->response(['result' => false], 404);
        }

	}

	public function layerheat_get()
	{
		$this->load->model('Layerprovince_model');
		$result = $this->Layerprovince_model->getpepole();

		if($result){
            $this->response(['result' => true, 'data' => $result], 200); 
        } else {
            $this->response(['result' => false], 404);
        }
	}
}
