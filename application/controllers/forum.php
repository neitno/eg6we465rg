<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forum extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ForumModel');
	}
	
	public function index()
	{
		$data = array(
			'title' => 'Forum',
			'single' => 0
		);
		
		$this->load->view('forum/index', $data);
	}
	
	public function category()
	{
		$row = $this->ForumModel->getTitle($this->uri->segment(2), $this->uri->segment(3));
		$result = $this->ForumModel->forumTheme($this->uri->segment(2));
		
		if($row == false)
			show_404();
		
		$data= array(
			'result' => $result,
			'title' => 'Forum - ' . $row->name,
			'single' => 1
		);
				
		$this->load->view('forum/index', $data);
	}
	
	public function post()
	{
		if(isset($_POST['content']))
		{
			$_POST['date'] = date('Y-m-d G:i:s');
			$_POST['authorId'] = $this->session->userdata('id');
			$_POST['content'] = nl2br(htmlentities($_POST['content']));
			$this->ForumModel->insertPost($_POST);
		}
		
		
		$exsist = $this->ForumModel->chackExsist($this->uri->segment(2),$this->uri->segment(3),$this->uri->segment(4),$this->uri->segment(5));
		
		if(!$exsist)
			show_404();
		
		$row = $this->ForumModel->getPostTheme($this->uri->segment(2));
		
		if($row == false)
			show_404();
		
		$result = $this->ForumModel->getSinglePosts($this->uri->segment(4));
			
		$data= array(
			'title' => $row->theme,
			'row' 	=> $row,
			'result'=> $result
		);
		
		$this->load->view('forum/forumPost/index', $data);
	}
}
