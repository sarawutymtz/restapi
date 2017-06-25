<?php

class Marker_model extends CI_Model {

        function __construct()
        {
                $this->load->database();
        }

        public function getAllDetail ($type=0){

        	if($type !=){
				$s_type=addslashes($type);
				$this->db->where("(type LIKE '%".$s_type."%')");
        	}
                $query = $this->db->get('location');
                return $query->result_array();
        }
}

?>