<?php
class ForumModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function loadCategory()
	{
		$query = $this->db->get('forum');
		return $query->result();
	}
	
	function getTitle($id = 0, $url = '')
	{
		$this->db->where(array('id' => $id, 'url' => $url));
		$query = $this->db->get('forum');
		if($query->num_rows() > 0)
			return $query->row();
		else
			return false;
	}
	
	function forumTheme($id = 0)
	{
		if($id != 0)
			$this->db->where('forumtheme.forumId', $id);
			 
		$this->db->select('forumtheme.*, users.forumResponse, users.fullName');
		$this->db->from('forumtheme');
		$this->db->join('users', 'forumtheme.authorId = users.id');
		$this->db->order_by("date", "desc"); 
		$query = $this->db->get(); 
		
		return $query->result();
	}
	
	function getPostTheme($id = 0)
	{
		$this->db->select('forumtheme.*, users.image, users.forumResponse, users.fullName');
		$this->db->from('forumtheme');
		$this->db->join('users', 'forumtheme.authorId = users.id');
		$this->db->where('forumtheme.forumId', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->row();
		else
			return false;
	}
	
	function getSinglePosts($id = 0)
	{
		$this->db->select('forumposts.*, users.image, users.id, users.fullName, users.forumResponse');
		$this->db->from('forumposts');
		$this->db->join('users', 'forumposts.authorId = users.id');
		$this->db->where('forumposts.forumThemeId', $id);
		$query = $this->db->get();
		
		return $query->result();
	}
	
	function chackExsist($id, $url, $id1, $url1)
	{
		$r1 = $this->db->get_where('forum', array('id' => $id, 'url' => $url));
		$r2 = $this->db->get_where('forumtheme', array('id' => $id1, 'url' => $url1));
		
		if($r1->num_rows() > 0 && $r2->num_rows() > 0)
			return true;
		else
			return false;
	}
	
	function insertPost($data)
	{
		$themeId = $data['themeId'];
		$forumThemeId = $data['forumThemeId'];
		unset($data['themeId'], $data['forumThemeId']);
		$this->db->insert('forumposts', $data); 
		$userId = $data['authorId'];
		$date = $data['date'];
		
		$this->db->query("UPDATE forumtheme SET lastResponse = (SELECT fullName FROM users WHERE id = '{$userId}') WHERE id='{$forumThemeId}'");
		$this->db->query("UPDATE users SET forumResponse = (forumResponse+1) WHERE id='{$userId}'");
		$this->db->query("UPDATE forumtheme SET numberResponse = (numberResponse+1), lastTime = '{$date}'  WHERE id='{$forumThemeId}'");
		

		
		//, lastResponse = '{$userId}'
	}
	function newTheme($data)
	{
		$this->db->insert('forumtheme', $data);
	}
}