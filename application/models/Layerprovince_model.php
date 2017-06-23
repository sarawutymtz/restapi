<?php

class Layerprovince_model extends CI_Model {

        function __construct()
        {
                $this->load->database();
        }

        public function getpepoleprovince ($id){

                $query = $this->db->query("SELECT *,(((male + female) / (SELECT sum(male + female) FROM pepolecount) * 100)) as evg FROM pepolecount WHERE id = ?",[$id]);
                return $query->result_array()[0];

        }

        public function getpepole (){

                $query = $this->db->query("SELECT
                 id,  
                (male + female) as summary, 
                (((male + female) / (SELECT sum(male + female) FROM pepolecount) * 100)) as evg, 
                ((male + female) / (SELECT max(male + female) FROM pepolecount) * 100) as percent, 
                (SELECT max(male + female) FROM pepolecount) as maximum  
                FROM pepolecount ");

                return $query->result_array();
        }
}

?>