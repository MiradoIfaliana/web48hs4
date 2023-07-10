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
	public function login(){
		$this->load->model('Login');
		$mail=$this->input->post('mail');
		$password=$this->input->post('password');
		$user=$this->Login->getUser($mail,$password);
		if($user==null){
			$data["message"] = "user inconnu";
			$this->load->view('Login',$data);
		}else{
			$user['password']="";//esorina ny mots de passe-ny
			$this->session->set_userdata('user',$user);
			$this->load->view('Accueil');
		}
	}
	public function addinscription(){
		$this->load->model('Login');
		//--donnee
		$nom=$this->input->post('nom');
		$mail=$this->input->post('mail');
		$nee=$this->input->post('nee');
		$idgenre=$this->input->post('idgenre');
		$taillecm=$this->input->post('taillecm');
		$poids=$this->input->post('poids');
		$password=$this->input->post('password');
		try{
			$user=$this->Login->inscriptionUser($nom ,$mail ,$nee ,$idgenre ,$taillecm ,$poids ,$password);
			$this->load->view('Login');
		}catch(Exception $ex){
			$data["message"]=$ex->getMessage();
			$this->load->view('Inscription',$data);
		}
	}
}
