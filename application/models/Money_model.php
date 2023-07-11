<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Money_model extends CI_Model {
            // create table ajoutmoney(
            //     idajoutmoney int primary key auto_increment  ,
            //     idusers int references users(idusers),
            //     idcodemoney int references codemoney(idcodemoney),
            //     montant float,
            //     dateajout date,
            //     etat int 
            // );
            // --1:non valider 11:valider 
            // create table retiremoney(
            //     idretiremoney int primary key auto_increment  ,
            //     idusers int references users(idusers),
            //     montant float,
            //     dateretire date,
            //     etat int 
            // );

            // create table codemoney(
            //     idcodemoney int primary key auto_increment  ,
            //     code varchar(30),
            //     valeur float,
            //     etat int
            // ); 1:dispo, 21:plus dispo
        public function getCodemoneyByIdcodemoney($idcodemoney){
            $rqt="select * from codemoney where idcodemoney=".$idcodemoney;
            $query = $this-> db ->query($rqt);
            $objet=null;
            foreach($query->result_array() as $objet){
                return $objet;
            }
        }
        public function getCodemoneyByCode($code){
            $rqt="select * from codemoney where code='".$code."'";
            $query = $this-> db ->query($rqt);
            $objet=null;
            foreach($query->result_array() as $objet){
                return $objet;
            }
            return $objet;
        }
        public function ajouterMoney($idusers,$code,$dateajout){
            //verification code
            $codemoney=$this->getCodemoneyByCode($code);
            if($codemoney==null){
                throw new Exception("code inconu");
            }else if($codemoney['etat']!=1 && $codemoney['etat']!="1"){
                throw new Exception("code non disponible");
            }
            $idcodemoney=$codemoney['idcodemoney'];
            $montant=$codemoney['valeur'];
            //ajout money
            $rqt="INSERT into ajoutmoney(idusers,idcodemoney,montant,dateajout,etat) values(%s,%s,%s,'%s',1)";
            $rqt=sprintf($rqt,$idusers,$idcodemoney,$montant,$dateajout);
            $this->db->query($rqt);
            //code money non dispo
            $rqt="UPDATE codemoney set etat=11 where idcodemoney=".$idcodemoney;
            $rqt=sprintf($rqt,$idusers,$idcodemoney,$montant,$dateajout);
            $this->db->query($rqt);
        }
        public function getAllcodemoney(){
            $rqt="SELECT * from codemoney";
            $query = $this-> db ->query($rqt);
            $objet=null;
            $objets=null;
            $ajout=0;
            $i=0;
            foreach($query->result_array() as $objet){
                $objets[$i]=$objet;
                $i++;
            }
            return $objets;
        }
        public function retirerMoney($idusers,$montant,$dateretire){
            $rqt="INSERT into retiremoney(idusers,montant,dateretire,etat) values(%s,%s,'%s',11)";
            $rqt=sprintf($rqt,$idusers,$montant,$dateretire);
            $this->db->query($rqt);
        }
        public function getMontantTotalMoneyUser($idusers){
            $rqt="SELECT sum(montant) as montant from ajoutmoney where idusers=%s and etat=11";//11: ze valider
            $rqt=sprintf($rqt,$idusers);
            $query = $this-> db ->query($rqt);
            $objet=null;
            $ajout=0;
            foreach($query->result_array() as $objet){
                $ajout=$ajout+$objet['montant'];
            }

            $rqt="SELECT sum(montant) as montant from retiremoney where idusers=%s and etat=11";//11: ze valider
            $rqt=sprintf($rqt,$idusers);
            $query = $this-> db ->query($rqt);
            $objet=null;
            $retire=0;
            foreach($query->result_array() as $objet){
                $retire=$retire+$objet['montant'];;
            }
            $rep=$ajout-$retire;
            return $rep;
        }

        
    }
?>