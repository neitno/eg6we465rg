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
<!-- Calendar -->
<link href='/assets/css/fullcalendar.css' rel='stylesheet' type='text/css'>
<script src="/assets/js/fullcalendar.js" type="text/javascript"></script>
<!-- Header Image -->
<div class="HeaderImage">
    <img src="/assets/img/CalendarHeade.png">
</div>
<!-- Header Image -->

<script type="text/javascript">
	$(function() {
		var calendar = $('#calendar').fullCalendar({
				header: {
					right: 'prev,next today',
				},
				editable: true ,
				selectable: true,
				selectHelper: true 
			});
	});
</script>

<!-- Container -->
<div class="container Calendar">
	<div class="row">
		<div class="span12">
			<div id="calendar"></div>				
		</div>
	</div>
</div>
<!-- Container -->

<?php $this->load->view('layout/footer');?>