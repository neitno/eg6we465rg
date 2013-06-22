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
	<script src="/assets/js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.nicescroll.min.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap.js" type="text/javascript"></script>
	<script src="/assets/js/custom.js" type="text/javascript"></script>

	<!-- Font -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

	<!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="/assets/img/favicon.ico" type="image/x-icon" />

</head>

<body class="LoginPage">

	<!-- Container -->
	<div class="container Login">
		<?php if($errorLogin == 1):?>
        <div class="alert alert-error loginFail">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Prijava nije uspijela.</strong>
        </div>
        <?php endif;?>
        <form class="form-signin" action="/prijava" method="post" autocomplete="off">
            <h2 class="form-signin-heading">Prijavi se</h2>
            <input type="text" class="input-block-level" name="username" placeholder="Korisničko ime">
            <input type="password" class="input-block-level" name="password" placeholder="Lozinka">
                <label class="checkbox">
                  <input type="hidden"   name="remember" value="0">
                  <input type="checkbox" name="remember" value="1"> Zapamti me
                </label>
            <button class="btn btn-large btn-primary" type="submit">Prijava</button>
        </form>

    </div>
	<!-- Container -->


</body>

</html>