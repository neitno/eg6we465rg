<?php
	if($this->session->userdata('logedIn'))
	{
		$user = $this->UserModel->userData($this->session->userdata('id'));
		$header = array('user' => $user);
		$this->load->view('layout/header', $header);
	}
	else
		$this->load->view('layout/header');
?>
<?php $this->load->view('layout/footer');?>

<div>
</div>