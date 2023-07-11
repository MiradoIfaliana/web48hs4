<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Regime_model extends CI_Model {

        public function getQuantiterepas_g($poids=0,$taillecm=0){
           $repas_g=($poids*$taillecm)/30;
           return $repas_g;
        }
        public function getDureesportMoyen($age=0,$poids=0,$taillecm=0){
            $duree=($taillecm/($age*$poids))*100;
            return $duree;
        }
        public function getAllCategorierepas(){
            $rqt = "SELECT * from categorierepas ";
            $query = $this-> db ->query($rqt);
            $objet=null;
            $objets=array();
            $i=0;
            foreach($query->result_array() as $objet){
                $objets[$i]=$objet;
                $i++;
            }
            return $objets;
        }
        public function getAllObjectif(){
            $rqt = "SELECT * from objectif";
            $query = $this-> db ->query($rqt);
            $objet=null;
            $objets=array();
            $i=0;
            foreach($query->result_array() as $objet){
                $objets[$i]=$objet;
                $i++;
            }
            return $objets;
        }
        public function getSportByIdsport($idsport){
            $rqt = "SELECT * from sport where idsport=%s";
            $rqt=sprintf($rqt,$idsport);
            $query = $this-> db ->query($rqt);
            $objet=null;
            $i=0;
            foreach($query->result_array() as $objet){
                return $objet;
                $i++;
            }
            return $objet;
        }
        public function getAllrepasBycategorie($idcategorierepas){
            $rqt="select * from repas where idcategorierepas=%s";
            $rqt=sprintf($rqt,$idcategorierepas);
            $query = $this-> db ->query($rqt);
            $objet=null;
            $objets=array();
            $i=0;
            foreach($query->result_array() as $objet){
                $objets[$i]=$objet;
                $i++;
            }
            return $objets;
        }
        public function getRepasByrepas($idrepas){
            $rqt="select * from repas where idrepas=%s";
            $rqt=sprintf($rqt,$idrepas);
            $query = $this-> db ->query($rqt);
            $objet=null;
            foreach($query->result_array() as $objet){
                return $objet;
            }
            return $objet;
        }
        public function getRegimeparamsByIdobjectif($idobjectif){
            $rqt = "SELECT * from regimeparam where idobjectif=%s";
            $rqt=sprintf($rqt,$idobjectif);
            $query = $this-> db ->query($rqt);
            $objet=null;
            $objets=null;
            $i=0;
            foreach($query->result_array() as $objet){
                 $objets[$i]=$objet;
                 $i++;
            }
            return $objets;
        }
        public function getregimealiments($age=0,$poids=0,$taillecm=0,$idobjectif=0,$valeurObjectif=0){

            $repas_g=$this->getQuantiterepas_g($poids,$taillecm);
            $regimeparams=$this->getRegimeparamsByIdobjectif($idobjectif);
            $repasmatin=null;
            $repasmidi=null;
            $repassoir=null;
            $idparam=0;
            $end=false;
            $i=0;

            $totalObtenu=0;
            $totalprix=0;
            $sport=null;
            $regimealimentsport=null;
            while($end==false){
                //aliment
                $regimealimentsport[$i]['jours']=$i+1;
                //getRepasByrepas($idrepas)
                $repasmatin=$this->getRepasByrepas($regimeparams[$idparam]['idrepasmatin']);
                $repasmidi=$this->getRepasByrepas($regimeparams[$idparam]['idrepasmidi']);
                $repassoir=$this->getRepasByrepas($regimeparams[$idparam]['idrepassoir']);

                $regimealimentsport[$i]['idrepasmatin']= $repasmatin['idrepas'];
                $regimealimentsport[$i]['idrepasmidi']= $repasmidi['idrepas'];
                $regimealimentsport[$i]['idrepassoir']= $repassoir['idrepas'];

                $regimealimentsport[$i]['repasmatin']= $repasmatin['nomrepas'];
                $regimealimentsport[$i]['repasmidi']= $repasmidi['nomrepas'];
                $regimealimentsport[$i]['repassoir']= $repassoir['nomrepas'];

                $regimealimentsport[$i]['imgrepasmatin']= $repasmatin['photos'];
                $regimealimentsport[$i]['imgrepasmidi']= $repasmidi['photos'];
                $regimealimentsport[$i]['imgrepassoir']= $repassoir['photos'];

                $regimealimentsport[$i]['quantitematin']=$repas_g;
                $regimealimentsport[$i]['quantitemidi']=$repas_g;
                $regimealimentsport[$i]['quantitesoir']=$repas_g;

                $regimealimentsport[$i]['descriptionsmatin']=$repasmatin['descriptions'];
                $regimealimentsport[$i]['descriptionsmidi']=$repasmidi['descriptions'];
                $regimealimentsport[$i]['descriptionssoir']=$repassoir['descriptions'];
                //sport
                $regimealimentsport[$i]['idsport']=$regimeparams[$idparam]['idsport'];
                $sport=$this->getSportByIdsport($regimealimentsport[$i]['idsport']);
                $regimealimentsport[$i]['sport']=$sport['nomsport'];
                $regimealimentsport[$i]['descriptionssport']=$sport['descriptions'];
                $regimealimentsport[$i]['imgsport']=$sport['photos'];
                $regimealimentsport[$i]['dureeminut']=$this->getDureesportMoyen($age,$poids,$taillecm);

                //obtenu
                $regimealimentsport[$i]['ojectifobtenu']=( $regimealimentsport[$i]['dureeminut']*$repas_g *$regimeparams[$idparam]['objectifobtenu'])/($regimeparams[$idparam]['quantiteparjour']*$regimeparams[$idparam]['dureeparjour']);
                $totalObtenu=$totalObtenu + $regimealimentsport[$i]['ojectifobtenu'];

                $totalprix=$totalprix+(($repas_g * $repasmatin['prixunit'])/$repasmatin['unit'])+(($repas_g * $repasmidi['prixunit'])/$repasmidi['unit'])+(($repas_g * $repassoir['prixunit'])/$repassoir['unit']);

                $i++;
                if( ($totalObtenu)>=($valeurObjectif*1000) ){ //rehefa azo le objectif
                    $end=true;
                    break;
                }
                $idparam++;
                if($idparam>=count($regimeparams)){ $idparam=0; }
            }
            $regimealimentsport[0]['prixtotal']=$totalprix;
            $regimealimentsport[0]['idobjectif']=$idobjectif;
            $regimealimentsport[0]['valeurObjectif']=$valeurObjectif;
            return $regimealimentsport;
        }
        public function getLastRegimByIdusers($idusers){
            $rqt="select * from regime where idregim=(select max(idregime) as idregime from regime where idusers=%s)";
            $rqt=sprintf($rqt,$idusers);
            $query = $this-> db ->query($rqt);
            $objet=null;
            foreach($query->result_array() as $objet){
                return $objet;
            }
            return $objet;
        }
        public function insertCommanderegimealimentsportif($idusers,$idobjectif,$valeurObjectif,$datechoix,$prixregime, $regimealimentsport){

            $montant=$this->Money_model->getMontantTotalMoneyUser($idusers);
            if( ($montant-$prixregime)<0 ){
                throw new Exception("solde insufisant,prix".$prixregime.", solde=".$montant);
            }
            $rqt="INSERT into regime(idusers,idobjectif,valeurobjectif,datechoix,prixregime) values(%s,%s,%s,'%s',%s)";
            $rqt=sprintf($rqt,$idusers,$idobjectif,$valeurObjectif,$datechoix,$prixregime);
            $this->db->query($rqt);

            $regime=$this->getLastRegimByIdusers($idusers);
            for($i=0;$i<count($regimealimentsport);$i++){
                $rqt="INSERT into regimealiment(idregime,jours,idrepasmatin,idrepasmidi,idrepassoir,quantitematin,quantitemidi,quantitesoir) values (%s,%s,%s,%s,%s,%s,%s,%s)";
                $rqt=sprintf($rqt,$regime['idregime'], $regimealimentsport[$i]['jours'],$regimealimentsport[$i]['idrepasmatin'],$regimealimentsport[$i]['idrepasmidi'],$regimealimentsport[$i]['idrepassoir'],$regimealimentsport[$i]['quantitematin'],$regimealimentsport[$i]['quantitemidi'],$regimealimentsport[$i]['quantitesoir']);
                $this->db->query($rqt);

                $rqt="INSERT into regimesport(idregime,jours,idsport,dureeminut) values (%s,%s,%s,%s)";
                $rqt=sprintf($rqt,$regime['idregime'], $regimealimentsport[$i]['jours'] ,$regimealimentsport[$i]['idsport'] ,$regimealimentsport[$i]['dureeminut']);
                $this->db->query($rqt);
            }
        }

        public function update_21_code($idcodemoney){
            $sql = "UPDATE codemoney SET etat = 21 WHERE idcodemoney = '%s'" ;
            $rqt = sprintf($sql , $idcodemoney);
            $this->db->query($rqt);
        }
        public function update_1_code($idcodemoney){
            $sql = "UPDATE codemoney SET etat = 1 WHERE idcodemoney = '%s'" ;
            $rqt = sprintf($sql , $idcodemoney);
            $this->db->query($rqt);
        }
        public function update_11_ajoutmoney($idajoutmoney){
            $sql = "UPDATE ajoutmoney SET etat = 11 WHERE idajoutmoney = '%s'" ;
            $rqt = sprintf($sql , $idajoutmoney);
            $this->db->query($rqt);
        }
        public function validate_code_money($idajoutmoney){
            $tab = $this->get_about_ajout($idajoutmoney);
            $this->update_11_ajoutmoney($idajoutmoney);
            $this->update_21_code($tab[0]['idcodemoney']);
        }
        public function delete_ajouter_money($idajoutmoney){
            $tab = $this->get_about_ajout($idajoutmoney);
            $this->update_1_code($tab['idcodemoney']);
            $sql = "DELETE FROM ajoutmoney WHERE  idajoutmoney = ".$idajoutmoney;
            $this->db->query($sql);
        }
        public function get_about_ajout($idajoutmoney){
            $sql = "SELECT  * FROM ajoutmoney where idajoutmoney = '%s'" ;
            $rqt = sprintf($sql , $idajoutmoney);
            $query = $this-> db ->query($rqt);
            $objet=null;
            foreach($query->result_array() as $objet){
                return $objet;
            }
            return $objet;
        }
        public function get_ajout_money(){
            $sql = "select * from ajoutmoney where etat = 1 " ;
            $query = $this-> db ->query($sql);
            $data = array();
            $count = 0;
            foreach($query->result_array() as $row) {
                $data[$count] = $row;
                $count ++ ;
            }
            return $data;
        }
        public function get_about_code_money($code){
            $sql = "select * from codemoney where idcodemoney = ".$code;
            $query = $this-> db ->query($sql);
            $objet=null;
            $data = array();
            $count = 0;
            foreach($query->result_array() as $row){
                $data[$count] = $row;
                $count ++ ;
            }
            return $data;
        }
        public function getabout_users($id){
            $sql = "SELECT * from users where idusers='%s'";
            $rqt=sprintf($sql,$id);
            $query = $this-> db ->query($rqt);
            $objet=null;
            foreach($query->result_array() as $objet){
                return $objet;
            }
            return $objet;
        }
        public function stat_money($date){
            $sql = "select year(datechoix)  , month(datechoix) ,  sum(prixregime) from regime where year(datechoix) = ".$date." group by datechoix order by month(datechoix) asc ;";
            $query = $this-> db ->query($sql);
            $objet=null;
            $data = array();
            $count = 0;
            foreach($query->result_array() as $row) {
                $data[$count] = $row;
                $count ++ ;
            }
            return $data;
        }
        public function moiss($id) {
            $tab[1] = "jav" ;
            $tab[2] = "fev" ;
            $tab[3] = "mars" ;
            $tab[4] = "avr" ;
            $tab[5] = "mai" ;
            $tab[6] = "jui" ;
            $tab[7] = "jul" ;
            $tab[8] = "aout" ;
            $tab[9] = "sep" ;
            $tab[10] = "oct" ;
            $tab[11] = "nov" ;
            $tab[12] = "dec" ;
            return $tab[$id];
        }
        public function stat_money_month($date){
            $sql = "select month(datechoix) as month from regime where year(datechoix) = ".$date." group by datechoix order by month(datechoix) asc ;";
            $query = $this-> db ->query($sql);
            $objet=null;
            $data = array();
            $count = 0;
            foreach($query->result_array() as $row) {
                $data[$count] = $this->moiss($row['month']) ;
                $count ++ ;
            }
            return $data;
        }
          public function stat_money_encours($date){
            $sql = "select sum(prixregime) as prix from regime where year(datechoix) = ".$date." group by datechoix order by month(datechoix) asc ;";
            $query = $this-> db ->query($sql);
            $objet=null;
            $data = array();
            $count = 0;
            foreach($query->result_array() as $row) {
                $data[$count] = $row['prix'];
                $count ++ ;
            }
            return $data;
        }

        public function year_encours(){
            $sql = "select year(curdate()) as year" ;
            $query = $this-> db ->query($sql);
            $objet=null;
            foreach($query->result_array() as $objet){
                return $objet['year'];
            }
            return $objet;
        }
        public function transform_date($date){
            $sql = "select year('".$date."') as year" ;
            $query = $this-> db ->query($sql);
            $objet=null;
            foreach($query->result_array() as $objet){
                return $objet['year'];
            }
            return $objet;

        }

    }
?>