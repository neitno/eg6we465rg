<?php
class NewsModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
		
    }
	
	function cahackPostExsist($id)
	{
		$query = $this->db->get_where('news', array('id' => $id));
		return $query->num_rows();
	}
	
	function homeNews() 
	{
		$this->db->order_by("date", "desc"); 
		$this->db->limit(9);
		$query = $this->db->get('news');
		
		return $query->result();
	}
	
	function getSinglePost($id)
	{
		$query = $this->db->get_where('news', array('id' => $id),1);
		return $query->row();
	}
	
	function getLastPost()
	{
		$this->db->order_by("date", "desc"); 
		$this->db->limit(1);
		$query = $this->db->get('news');
		return $query->row();
	}
	
	function searchNew($s)
	{
		$this->db->like('title', $s, 'none'); 
		$this->db->or_like('title', $s, 'before');
		$this->db->or_like('title', $s, 'after');
		$this->db->or_like('title', $s, 'both');
		$this->db->order_by("date", "desc");
		
		$query = $this->db->get('news');
		
		return $query->result();
	}
	
	function newsSidebar($page) 
	{		
		
		$page = ($page-1) * 7; 
		$this->db->order_by("date", "desc"); 
		$this->db->limit(7, $page);
		$query = $this->db->get('news');

		return $query->result();
	}
	
	function countPage()
	{
		$query = $this->db->get('news');
		return $query->num_rows();
	}
}