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
		<img src="/assets/img/HomeImage.jpg">
	</div>
	<!-- Header Image -->
    
    <!-- Container -->
	<div class="container news">
		<div class="row">
			<div class="span12">
				<h2>Novosti</h2>
				<ul class="NewsUL">
					<?php 
						$this->load->view('news/home/index');
					?>
				<ul>
			</div>
		</div>
	</div>
	<!-- Container -->

	<!-- Facebook-->
	<div class="Facebook">
		<a href="http://www.facebook.com/groups/mioc2.b/" target="_blank"><img src="/assets/img/facebook.png"/></a>
	</div>
	<!-- Facebook-->
<?php $this->load->view('layout/footer');?>