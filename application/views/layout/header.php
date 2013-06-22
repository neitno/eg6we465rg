<!doctype html>
<html lang="hr">

<head>
	<title><?php echo $title;?> | Mioc Zd</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="Mioc zd stanica je namijenjena učenicama 3.b razreda gimnazije Franje Petrić. Na stranici možete pronaći brojne materijale i saznati najnovije vijesti.">
    <meta name="author" content="Lovro Strihić">
  	<meta name="keywords" content="mioc zd,zd mioc, mioc 3.b, zadar mioc, mioc zadar, mioc, gimnazija franje petrić" />

  	<!-- CSS -->
  	<link href='/assets/css/style.css' rel='stylesheet' type='text/css'>
	<link href='/assets/css/bootstrap.css' rel='stylesheet' type='text/css'>
	<link href='/assets/css/bootstrap-responsive.css' rel='stylesheet' type='text/css'>

	<!-- Script -->
	<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.nicescroll.min.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap.js" type="text/javascript"></script>
	<script src="/assets/js/custom.js" type="text/javascript"></script>

	<!-- Font -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

	<!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="/assets/img/favicon.ico" type="image/x-icon" />


</head>

<body>

	<!-- Header -->
	<header>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="brand" href="/"><img src="/assets/img/logo.png"></a>
						<div class="nav-collapse collapse">
						<div class="hidden-tablet hidden-phone navbar-text pull-right">
                        	<?php if($this->session->userdata('logedIn')):?>
                            <a class="navbar-link dropdown-toggle" data-toggle="dropdown" href="#"><img class="DefaultUser" src="<?php echo $user->image;?>" /> <?php echo $user->fullName;?>
                               <ul class="dropdown-menu" id="logedInInfo">
                                  <li><a href="/profil">Profil</a></li>
                                  <li><a href="/profil/uredi">Uredi Profil</a></li>
                                  <li class="divider"></li>
                                  <li><a href="/odjava">Odjava</a></li>
                                </ul>
                            </a>
                            <?php else:?>
                            <a class="navbar-link" href="/prijava"><img class="DefaultUser" src="/assets/img/DefaultUser.jpg" /> Prijavite se</a>
                            <?php endif;?>
							
			            </div>
						<ul class="nav">
							<li <?php if($this->uri->segment(1) == '') echo 'class="active"';?>><a href="/">Naslovnica</a></li>
							<li <?php if($this->uri->segment(1) == 'novosti') echo 'class="active"';?>><a href="/novosti">Novosti</a></li>
							<li <?php if($this->uri->segment(1) == 'predmeti') echo 'class="active"';?>><a href="/predmeti">Predmeti</a></li>
							<li <?php if($this->uri->segment(1) == 'forum') echo 'class="active"';?>><a href="/forum">Forum</a></li>
							<li <?php if($this->uri->segment(1) == 'kalendar') echo 'class="active"';?>><a href="/kalendar">Kalendar</a></li>
							<li <?php if($this->uri->segment(1) == 'kontakt') echo 'class="active"';?>><a href="/kontakt">Kontakt</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header -->