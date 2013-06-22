<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontakt extends CI_Controller {
	public function index()
	{
		$data = array(
			'title' => 'Kontakt'
		);
		
		$this->load->view('contact/index', $data);
	}
}
