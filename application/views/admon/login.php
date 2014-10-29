<!DOCTYPE html>
<html lang="es">
<head>
	<base href="<?php echo base_url()?>"/>
	<meta charset="UTF-8">
	<title>Mueblería Ureña</title>
	<link rel="icon" href="media/favicon/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="hidden-xs col-sm-12 col-md-12 col-lg-12">
						<h3>ADMINISTRADOR</h3>
					</div>
					<div class="col-xs-12">
						<center>
							<h3>ADMINISTRADOR</h3>
						</center>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<center>
						<img src="media/imagenes/logos/logo.jpg" class="logo-urena">
					</center>
				</div>
			</div>
		</div>
		<div class="container-fluit">
			<div class="row jumbotron">
				<center>
					<form action="<?php echo site_url('admon/login')?>" method="post" class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xs-offset-0 col-sm-offset-3 col-md-offset-4 col-lg-offset-4 form-panel">
						<legend><h2>Iniciar Sesión</h2></legend>
						<div class="form-group">
							<input type="text" name="email" class="form-control input-lg text-center" placeholder="Usuario" required/>
						</div>
						
						<div class="form-group">
							<input type="password" name="password" class="form-control input-lg text-center" placeholder="Password" required/>	
						</div>

						<input type="submit" class="btn btn-primary btn-lg btn-block" value="Entrar">
					</form>
				</center>
			</div>
		</div>
	</section>
	<footer>
		<center>
			<p>Derechos reservados ©2014 Mueblería Ureña</p>
		</center>
	</footer>
</body>
</html>