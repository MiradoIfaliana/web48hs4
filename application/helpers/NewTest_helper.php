<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->library('session');
	function Test_admin($nom = '' , $mdp = ''){
		$tab[0][0] = 'andy';
		$tab[0][1] = '1234';
		for($i = 0 ; $i<count($tab) ; $i++){
			if(($tab[$i][0] == $nom) && $tab[$i][1] == $mdp ){
				return 1;
			}
		}
		return 0;
	}	
	
