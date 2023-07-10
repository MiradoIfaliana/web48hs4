<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Tobase_model extends CI_Model {
        public function getNamees(){
            $test = $this->db->query("select * from users");
            $data = array();
            $count = 0;
            foreach($test->result_array() as $row) {
                $data[$count] = $row;
                $count ++ ;
            }
            return $data;
        }

        public function getUsers(){
            $query = $this-> db ->query("SELECT * from user");
            $admin=array();
            $i=0;
            foreach($query->result_array() as $admin[$i]){
                $i++;
            }
            return $admin;
        }
    }
?>