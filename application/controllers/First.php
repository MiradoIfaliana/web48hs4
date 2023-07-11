<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class First extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('Login');
		// $connected=$this->session->userdata('connected');
		// $connected=$this->session->set_userdata('connected',);
	}
	public function inscription()
	{
		$this->load->view('Inscription');
	}	
	public function admin(){
		$this->load->view('login_admin');
	}
	public function login(){
		$mail=$this->input->post('mail');
		$password=$this->input->post('password');
		$user=$this->Login_model->getUser($mail,$password);
		if($user==null){
			$data["message"] = "user inconnu";
			$this->load->view('Login',$data);
		}else{
			$user['password']="";
			$this->session->set_userdata('idusers' , $user['idusers']);
			$this->session->set_userdata('users' , $user);
			$this->load->view('Accueil');
		}
	}
	public function acceuil_admin(){
		$this->load->view('Acceuil_admin');
	}
	public function notif(){
		$this->load->view('Notifications');
	}
	public function verify_admin(){
		$mail=$this->input->post('mail');
		$password=$this->input->post('password');
		$user=$this->Login_model->get_verify_admin($mail,$password);
		if($user==null){
			$data["message"] = "admin inconnu";
			$this->load->view('login_admin',$data);
		}else{
			$user['password']="";
			$this->session->set_userdata('user',$user);
			$this->load->view('Acceuil_admin');
		}
	}
	public function addinscription(){
		$nom=$this->input->post('nom');
		$mail=$this->input->post('mail');
		$nee=$this->input->post('nee');
		$idgenre=$this->input->post('idgenre');
		$taillecm=$this->input->post('taillecm');
		$poids=$this->input->post('poids');
		$password=$this->input->post('password');
		try{
			$this->Login_model->inscriptionUser($nom ,$mail ,$nee ,$idgenre ,$taillecm ,$poids ,$password);
			$this->load->view('Login');
		}catch(Exception $ex){
			$data["message"]=$ex->getMessage();
			$this->load->view('Inscription',$data);
		}
	}
	public function validate_money($id){
		$this->Regime_model->validate_code_money($id);
		redirect('First/notif');
	}
	public function delete_money($id){
		$this->Regime_model->delete_ajouter_money($id);
		redirect('First/notif');
	}
	public function log_out_admin(){
		session_destroy();
		redirect('First/admin');
	}
	public function acceuil(){
		$this->load->view('Accueil');
	}
	public function log_user(){
		session_destroy();
		$this->load->view('Login');
	}
	//--------------------------------------------------generer le regime
	public function regime_acceuil(){
		$data['objectifs']=$this->Regime_model->getAllObjectif();
		if($this->input->post('idobjectif')!=null && $this->input->post('kg')!=null){
			$users=$this->session->userdata('users');
			// $date=new DateTime($users['nee']);
			// $today=new DateTime(date('Y-m-d'));
			// $interval=$date->diff($today);
			// $age=$interval->y;
			$age = 20 ;
			$data['regimealimentsport']=$this->Regime_model->getregimealiments($age ,$users['poids'] ,$users['taillecm'] ,$this->input->post('idobjectif') ,$this->input->post('kg'));
			$this->session->set_userdata('regimealimentsport',$data['regimealimentsport']);
		}
		$this->load->view('Regime',$data);
	}
	//---------------------------------------------------
	public function insertCommande(){
		$users=$this->session->userdata('users');
		$regimealimentsport=$this->session->userdata('regimealimentsport');
		$data['objectifs']=$this->Regime_model->getAllObjectif();
		try{
			$this->Regime_model->insertCommanderegimealimentsportif($users['idusers'],$regimealimentsport[0]['idobjectif'],$regimealimentsport[0]['valeurObjectif'],date('Y-m-d'), $regimealimentsport[0]['prixtotal'], $regimealimentsport);
		}catch(Exception $ex){
			$data["message"]=$ex->getMessage();
			
			$this->load->view('Regime',$data);
		}
		$this->load->view('Regime',$data);
	}
	
	public function stat_money_month(){
		$data = $this->input->get('id');
		if($data == 0){
			$year_en_cours = $this->Regime_model->year_encours();
			$valuer = $this->Regime_model->stat_money_month($year_en_cours) ;
			echo json_encode($valuer);
		}
		else{
			$yaers = $this->Regime_model->transform_date($data);
			$valuer = $this->Regime_model->stat_money_month($yaers) ;
			echo json_encode($valuer);
		}
	}
	public function stat_money_encours(){
		$data = $this->input->get('id');
		if($data == 0){
			$year_en_cours = $this->Regime_model->year_encours();
			$valuer = $this->Regime_model->stat_money_encours($year_en_cours) ;
			echo json_encode($valuer);
		}
		else{
			$yaers = $this->Regime_model->transform_date($data);
			$valuer = $this->Regime_model->stat_money_encours($yaers) ;
			echo json_encode($valuer);
		}
	}
	//--------------------------------------------------
	public function toAjoutmoney(){
		$codemoney=$this->Money_model->getAllcodemoney();
		$data['codemoney']=$codemoney;
		$this->load->view('Ajoutmoney',$data);
	}
	//----------------------------------------------------
	public function insertmoney(){
		$users=$this->session->userdata('users');
		$code=$this->input->post('code');
		$data['message']="";
		try{
			$this->Money_model->ajouterMoney($users['idusers'],$code,date('Y-m-d'));
		}catch (Exception $ex){
			$data['message']=$ex->getMessage();
		}
		$codemoney=$this->Money_model->getAllcodemoney();
		$data['codemoney']=$codemoney;
		$this->load->view('Ajoutmoney',$data);

	}

}
