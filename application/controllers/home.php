<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->model('NewsModel');		
		$data = array(
			'title' => 'Naslovnica'
		);
		
		$this->load->view('home/index', $data);
	}
}
