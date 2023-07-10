<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Login extends CI_Model {

        public function getUser($poids=0,$taillecm=0){
           $repas_g=($poids*$taillecm)/30;
           return $repas_g;
        }
        public function getRegimeparamsByIdobjectif($idobjectif){
            $rqt = "SELECT * from regimeparam where idobjectif=%s";
            $rqt=sprintf($rqt,$idobjectif);
            $query = $this-> db ->query($rqt);
            $objet=null;
            foreach($query->result_array() as $objet){
                return $objet;
            }
            return $objet;
        }
        public function getregimaliment($poids=0,$taillecm=0,$idobjectif=0,$valeurObjectif=0){
            //     idusers int primary key auto_increment  ,
            //     nom varchar(55),
            //     mail varchar(55),
            //     nee date,
            //     idgenre int references genre(idgenre),
            //     taillecm float,
            //     poids float,
            //     passwords varchar(55)

            // idregimeparam int primary key auto_increment  ,
            // idobjectif int references objectif(idobjectif),
            // idrepas int references repas(idrepas), 
            // quantiteparjour float,
            // idsport int references sport(idsport),
            // dureeparjour float,
            // objectifobtenu float

            // idregimealiment int primary key auto_increment  ,
            // idregime int references regime(idregime),
            // jours int, unique(idregime,jours),
            // idrepasmatin int references repas(idrepas), 
            // idrepasmidi int references repas(idrepas), 
            // idrepassoir int references repas(idrepas), 
            // quantitematin float ,
            // quantitemidi float ,
            // quantitesoir float  


            $repas_g=$this->getUser($poids,$taillecm);
            $regimparams=$this->getRegimeparamsByIdobjectif($idobjectif);
            


        }
    }
?>