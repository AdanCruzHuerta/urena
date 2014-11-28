<!DOCTYPE html>
<html lang="es">
	<head>
		<base href="<?php echo base_url(); ?>">
		<meta charset="UTF-8"/>
		<title>Mueblería Ureña</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="media/favicon/favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/urena.css">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="visible-xs">
			<div class="navbar navbar-fixed-top navbar-default">
				<div class="container">
					<div class="navbar-header">
						<button data-toggle="collapse-side" data-target=".side-collapse" data-target-=".side-collapse-container" type="button" class="navbar-toggle pull-left">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="navbar-default side-collapse in">
						<div role="navigation" class="navbar-collapse">
							<ul class="nav navbar-nav">
								<li><a href="#">Inicio</a></li>
								<li><a href="#">Productos</a></li>
								<li><a href="#">Nosotros</a></li>
								<li><a href="#">Contacto</a></li>
								<li><a href="#">Tienda en Linea</a></li>
								<li><a href="#">Acceso</a></li>
								<li><a href="#">Registrate</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<div class="side-collapse-container">
			<header>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="text-center">
								<img src="media/imagenes/logos/logo-header.png" class="logo-urena">
							</div>
							<div class="accesos btn-group btn-group pull-right hidden-xs">
								<button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-acceso">Acceso&nbsp;<i class="fa fa-sign-in fa-lg"></i></button>
								<button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-registro">Registrate&nbsp;<i class="fa fa-edit fa-lg"></i></button>
								<button id="btn-carrito" type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-carrito" >
									<i class="fa fa-shopping-cart"></i><!-- <kbd>0</kbd> -->
								</button>
							</div>
						</div>
					</div>
				</div>
			</header>
			<nav class="hidden-xs">
				<div class="container">
					<div class="navbar navbar-default">
						<div class="container-fluid">
							<ul class="nav nav-justified">
								<li class="<?php if($contenido == 'home/inicio'){echo 'activo';} ?>">
									<a href="<?php echo site_url('home'); ?>" class="btn_nav">Inicio</a>
								</li>
								<li class="<?php if($contenido == 'home/productos'){echo 'activo';} ?>">
									<a href="<?php echo site_url('home/productos'); ?>" class="btn_nav">Productos</a>
								</li>
								<li class="<?php if($contenido == 'home/nosotros'){echo 'activo';} ?>">
									<a href="<?php echo site_url('home/nosotros'); ?>" class="btn_nav">Nosotros</a>
								</li>
								<li class="<?php if($contenido == 'home/contacto'){echo 'activo';} ?>">
									<a href="<?php echo site_url('home/contacto'); ?>" class="btn_nav">Contacto</a>
								</li>
								<li class="<?php if($contenido == 'home/tienda'){echo 'activo';} ?>">
									<a href="<?php echo site_url('home/tienda');?>" class="btn_nav">Tienda en Linea</a>
								</li>
							</ul>
			          	</div>
					</div>
				</div>
			</nav>
			<?php $this->load->view($contenido)?>
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 separador">
							<label class="txt1-footer">Somos distribuidores de las mejores marcas</label>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
									<div class="img-logo">
										<img class="img-responsive-height" src="media/imagenes/logos/boal.png" alt="">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
									<div class="img-logo">
										<img class="img-responsive-height" src="media/imagenes/logos/lizmueble.png" alt="">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
									<div class="img-logo">
										<img class="img-responsive-height" src="media/imagenes/logos/lomalta.png" alt="">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
									<div class="img-logo">
										<img class="img-responsive-height" src="media/imagenes/logos/selther.png" alt="">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
									<div class="img-logo">
										<img class="img-responsive-height" src="media/imagenes/logos/spring.png" alt="">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
									<div class="img-logo">
										<img class="img-responsive-height" src="media/imagenes/logos/sealy.png" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
							<div class="text-center">
								<img src="media/imagenes/logos/urena.png" class="hidden-xs logo-urena">
								<br>
								<label>Derechos reservados ©2014 Muebleria Ureña</label>
								<br>
								<label>Diseñado por: <a href="http://sharksoft.com.mx" target="_blank">Shark Soft</a></label>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<div class="modal fade" id="modal-acceso" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Inicia Sesión</h4>
					</div>
					<form action="#" method="post">
					<div class="modal-body">
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" placeholder="Ingresa tu email" required>
							</div>
							<div class="form-group">
								<label for="">Contraseña</label>
								<input type="password" class="form-control" placeholder="Ingresa tu contraseña" required>
							</div>
							<div class="form-group pull-right">
								<a href="">¿Olvidaste tu contraseña?</a>
							</div><br>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-block btn-primary" value="Iniciar">
					</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-registro" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Regístrate en Muebleria Ureña!</h4>
					</div>
					<div id="alerta"></div>
					<form id = "form-registro">
						<div class="modal-body">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="email" class="control-label">*Email</label>
											<input type="email" id="email" name="email" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="c_email" class="control-label">*Confirma Email</label>
											<input type="email" id="c_email" name="c_email" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="form-group">
											<label for="nombre" class="control-label">*Nombre</label>
											<input type="text" id="nombre" name="nombre" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="ap_paterno" class="control-label">*Apellido Paterno</label>
											<input type="email" id="ap_paterno" name="ap_paterno" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="ap_materno" class="control-label">*Apellido Materno</label>
											<input type="email" id="ap_materno" name="ap_materno" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="password" class="control-label">*Contraseña</label>
											<input type="password" id="password" name="password" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="c_password" class="control-label">*Confirma Contraseña</label>
											<input type="password" id="c_password" name="c_password" class="form-control">
										</div>
									</div>
									<div class="form-group check-modal">
										<label for="">
											<input type="checkbox" id="check_ok" name="check_ok">&nbsp;He leido y acepto los términos de aviso de privacidad.
											<a href="#">Leer</a>
										</label>
									</div>
									<div class="form-group">
										
									</div>
								</div>
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-primary" value="Registrar">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-carrito" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><i class="fa fa-shopping-cart"></i>&nbsp;Carrito de compras</h4>
					</div>
					<form action="#" method="post">
					<div class="modal-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th width="120px">Imagen</th>
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Precio</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
								<tr >
									<td >
										<img class="img-responsive" src="http://placehold.it/620x296/cccccc/ffffff">
									</td>
									<td>Nombre</td>
									<td><input type="number" class="form-control cantidad" value="1" min="1" max="5"></td>
									<td>$500.00</td>
									<td>
										<button type="button" class="btn btn-link">
											<i class="fa fa-trash fa-lg"></i>
										</button>
									</td>
								</tr>
								<tr>
									<td>
										<img class="img-responsive" src="http://placehold.it/620x296/cccccc/ffffff">
									</td>
									<td>Nombre</td>
									<td><input type="number" class="form-control cantidad" value="1" min="1" max="5"></td>
									<td>$500.00</td>
									<td>
										<button type="button" class="btn btn-link">
											<i class="fa fa-trash fa-lg"></i>
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" value="Iniciar">
					</div>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/validate.js"></script>
		<script type="text/javascript" src="js/messages_es.js"></script>
		<script>
			$(document).ready(function(){
				$( ".btn_nav" ).hover(
					function() {
						$( this ).addClass( "animated pulse" );
					}, function() {
						$( this ).removeClass( "animated pulse" );
					}
				);    
				/*$('#btn-carrito').tooltip({
					placement: 'left',
					title: 'Productos',
					trigger: 'hover',
					viewport: {'selector':'#btn-carrito','left':'60px'}
				});*/
				var sideslider = $('[data-toggle=collapse-side]');
				var sel = sideslider.attr('data-target');
				var sel2 = sideslider.attr('data-target-2');
				sideslider.click(function(event){
					$(sel).toggleClass('in');
					$(sel2).toggleClass('out');
				});
				
				var validacion = $('#form-registro').validate({
					errorElement: "span",
					errorClass:"help-block",
					rules:{
						email:{required:true, email:true},
						c_email:{required:true, email:true, equalTo:"#email"},
						nombre:{required: true, minlength: 3},
						ap_paterno:{required: true, minlength: 3, email:false},
						ap_materno:{required: true, email:false},
						password:{required:true},
						c_password:{required:true, equalTo: "#password"},
					},
					highlight: function(element, error){
						$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
					},
					success: function(element){
						$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
					},
					submitHandler: function (){
						$.post("<?php echo site_url('home/valida_correo')?>", function(result){
							$("html, body").animate({scrollTop:"0px"});
							if(result.resp){
								$('#alerta').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;'+result.mensaje+'</div>');
							}else{
								$.post("<?php echo site_url('home/registra_cliente')?>", $('form#form-registro').serialize(), function(result){
								$("html, body").animate({scrollTop:"0px"});
								if(result.resp){
									$('#alerta').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Exito!</strong>&nbsp;'+result.mensaje+'</div>');
									$('#form-registro').each(function(){
										this.reset();
									});
								}else{
									$('#alerta').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;'+result.mensaje+'</div>');
								}
								$('#form-registro').each(function(){
									this.reset();
								});
								}, "json");
							}
						});
					}
				});
			});
		</script>
	</body>
</html>