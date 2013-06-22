<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Korisnik extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
	}
	
	public function index()
	{
		
	}
	
	public function login()
	{		
		$data = array(
			'title' => 'Prijava',
			'errorLogin' =>  0
		);
		
		//login submit
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			//model login result
			$resultLogin = $this->UserModel->doLogin($_POST['username'], $_POST['password'], $_POST['remember']);
			
			if($resultLogin['logedIn'] == TRUE)
			{
				$this->session->set_userdata($resultLogin);
				redirect('/', 'refresh');
			}
			else
				$data['errorLogin'] = 1;
		}
		
		$this->load->view('user/login', $data);
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/prijava', 'refresh');
	}
}
