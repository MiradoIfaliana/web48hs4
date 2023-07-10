<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Login extends CI_Model {

        // create table genre(
        //     idgenre int primary key auto_increment,
        //     genre varchar(55),
        //     codegenre int
        // );
        
        // create table users(
        //     idusers int primary key auto_increment  ,
        //     nom varchar(55),
        //     mail varchar(55),
        //     nee date,
        //     idgenre int references genre(idgenre),
        //     taillecm float,
        //     poids float,
        //     passwords varchar(55)
        // );
        public function getUser($mail='',$password=''){
            $rqt = $this-> db ->query("SELECT * from user where mail='%s' and passwords='%s'");
            $rqt=sprintf($rqt,$mail,$password);
            $query = $this-> db ->query($rqt);
            $objet=null;
            foreach($query->result_array() as $objet){
                return $objet;
            }
            return $objet;
        }
        public function inscriptionUser($nom='' ,$mail='' ,$nee='' ,$idgenre='' ,$taillecm='' ,$poids='' ,$password=''){
			$rqt="INSERT into users (nom,mail,nee,idgenre,taillecm,poids,passwords) values ('%s','%s','%s',%s,%s,%s,'%s')";

            if($nom=''){ throw new Exception("nom obligatoire"); }
            else if($mail=''){ throw new Exception("mail obligatoire"); }
            else if($nee=''){ throw new Exception("date de naissance obligatoire"); }
            else if($idgenre=''){ throw new Exception("genre obligatoire"); }
            else if($taillecm=''){ throw new Exception("taille obligatoire"); }
            else if($poids=''){ throw new Exception("poids obligatoire"); }
            else if($password=''){ throw new Exception("password obligatoire"); }
            
			$rqt=sprintf($rqt,$nom,$mail,$nee,$idgenre,$taillecm,$poids,$password);
			$this->db->query($rqt);
        }
    }
?>