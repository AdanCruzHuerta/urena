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
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h3>ACCESO A ADMINISTRADOR</h3>
				</div>
			</div>
		</div>
	</header>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<center>
						<img src="media/imagenes/logos/urena.png" class="logo-urena">
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xs-offset-0 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Iniciar Sesión</h3>
						</div>
						<div class="panel-body">
							<div id="alerta"></div>
							<form id="form-login" method="post" action="<?php echo site_url('admon/login')?>">
								<div class="form-group">
									<input type="text" name="email" id="email" class="form-control" placeholder="Usuario">
								</div>
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control" placeholder="Password">	
								</div>
								<input type="button" id="btn-entrar" class="btn btn-primary btn-block" value="Entrar">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<center>
			<p>Derechos reservados ©2014 Mueblería Ureña. Desarrollado por: <a href="http://sharksoft.com.mx" target="_blank">SharkSoft</a></p>
		</center>
	</footer>
</body>
<script>
	$(document).ready(function(){
		$('#btn-entrar').click(function(){
			var email = $('#email').val();
			var password = $('#password').val();
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('admon/verifica_usuario')?>",
				data:{email:email, password:password},
				success: function(result){
					var res = jQuery.parseJSON(result);
					if(res){
						$('#form-login').submit();
					}else{
						$('#alerta').html('<div class="alert alert-danger animated bounceIn" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong> Usuario o contraseña incorrecta</div>');
					}
				}
			});
		});
	});
</script>
</html>