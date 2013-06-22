<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kalendar extends CI_Controller {
	public function index()
	{
		$data = array(
			'title' => 'Kalendar'
		);
		
		$this->load->view('calendar/index', $data);
	}
}
