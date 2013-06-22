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
<!-- Header Image -->
	<div class="HeaderImage">
		<img src="/assets/img/ForumHeader.png" />
	</div>
<!-- Header Image -->

<?php $this->load->view('layout/footer');?>
