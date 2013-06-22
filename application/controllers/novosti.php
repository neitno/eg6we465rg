<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Novosti extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('NewsModel');
	}
	
	public function index()
	{
		$data = array(
			'title' => 'Novosti'
		);
		
		if($this->uri->segment(2) != '')
		{
			$numRws = $this->NewsModel->cahackPostExsist($this->uri->segment(2));
			if($numRws <= 0)
				show_404();
		}
		
		$this->load->view('news/index', $data);
	}
	
	public function sideBar()
	{
		
		$result = $this->NewsModel->newsSidebar($_GET['page']);
		 
			
		$data = array(
			'results' => $result
		);
		
		$this->load->view('news/nawSidebar/index', $data);
	}
	
	public function search()
	{
		$results = $this->NewsModel->searchNew($_GET['s']);
		$data = array(
			'results' => $results
		);
		
		$this->load->view('news/search/index', $data);
	}
	
	public function singlePost()
	{
		if($_GET['id'] != 0)
			$row = $this->NewsModel->getSinglePost($_GET['id']);
		else
			$row = $this->NewsModel->getLastPost();
		
		$data = array(
			'row' => $row
		);
	
		$this->load->view('news/newSinglePost/index', $data);
	}
	
	public function pagenum()
	{
		echo $this->NewsModel->countPage();
	}
}