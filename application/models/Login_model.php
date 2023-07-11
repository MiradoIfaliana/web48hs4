<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Login_model extends CI_Model {
        public function getUser($mail='',$password=''){
            $sql = "SELECT * from users where mail='%s' and passwords='%s'";
            $rqt=sprintf($sql,$mail,$password);
            $query = $this-> db ->query($rqt);
            $objet=null;
            foreach($query->result_array() as $objet){
                return $objet;
            }
            return $objet;
        }
        public function get_verify_admin($mail , $password){
            $sql = "SELECT * from admins where mail='%s' and passwords='%s'";
            $rqt=sprintf($sql,$mail,$password);
            $query = $this-> db ->query($rqt);
            $objet=null;
            foreach($query->result_array() as $objet){
                return $objet;
            }
            return $objet;
        }
        public function inscriptionUser($nom ,$mail ,$nee ,$idgenre ,$taillecm ,$poids ,$password){
			$sql="INSERT into users  values (null ,'%s','%s','%s','%s','%s','%s','%s')";
            if($nom==''){ throw new Exception("nom obligatoire"); }
            else if($mail==''){ throw new Exception("mail obligatoire"); }
            else if($nee==''){ throw new Exception("date de naissance obligatoire"); }
            else if($idgenre==''){ throw new Exception("genre obligatoire"); }
            else if($taillecm==''){ throw new Exception("taille obligatoire"); }
            else if($poids==''){ throw new Exception("poids obligatoire"); }
            else if($password==''){ throw new Exception("password obligatoire"); }
			$rqt=sprintf($sql,$nom,$mail,$nee,$idgenre,$taillecm,$poids,$password);
			$this->db->query($rqt);
        }
    }
?>