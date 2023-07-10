<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Login extends CI_Model {

        public function getUser($mail='',$password=''){
            $rqt = $this-> db ->query("SELECT * from user where mail='%s' and password='%s'");
            $rqt=sprintf($rqt,$idobjet);
            $query = $this-> db ->query($rqt);
            $objet=null;
            foreach($query->result_array() as $objet){
                return $objet;
            }
            return $objet;
        }
    }
?>