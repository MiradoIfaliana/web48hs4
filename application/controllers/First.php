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
			$data["message"] = "Wrong identity";
			$this->load->view('Login',$data);
		}

	}
}
