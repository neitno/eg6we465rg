<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Predmeti extends CI_Controller {
	public function index()
	{
		$data = array(
			'title' => 'Predmeti'
		);
		
		$this->load->view('subjects/index', $data);
	}
}
