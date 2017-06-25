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
                 name, 
                (male + female) as summary, 
                (((male + female) / (SELECT sum(male + female) FROM pepolecount) * 100)) as evg, 
                ((male + female) / (SELECT max(male + female) FROM pepolecount) * 100) as percent, 
                (SELECT max(male + female) FROM pepolecount) as maximum  
                FROM pepolecount");
                return $query->result_array();
        }

        public function addlocation ($data){

                $wherelocation = $this->db->query("SELECT id FROM location where id = ?",[$data['id']]);

                if($wherelocation->num_rows() == 0)
                {

                             $insert = [
                            'id' => $data['id'],
                            'name' => $data['name'],
                            'icon' => $data['icon'],
                            'place_id' => $data['place_id'],
                            'type' => $data['type'],
                            'address' => $data['icon'],
                            'lat' => $data['lat'],
                            'lng' => $data['lng'],
                            'url' => $data['url']
                        ];

                        return $this->db->insert('location', $insert);
                }

                return false;
                

        }

}

?>