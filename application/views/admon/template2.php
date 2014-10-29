<!DOCTYPE html>
<html lang="es">
	<head>
		<base href="<?php echo base_url(); ?>">
		<title>Meblería Ureña</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8"/>
		<link rel="icon" href="media/favicon/favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="css/admon.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
    	<link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/clientes.js"></script>
		<script>
			$(window).bind("load resize", function() {
				width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
				if (width < 768) {
					$('div.sidebar-collapse').addClass('collapse')
				} else {
					$('div.sidebar-collapse').removeClass('collapse')
				}
			});
		</script>
	</head>
	<body>
		<div id="wrapper">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu_admin">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand">Mueblería Ureña</a>
				</div>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="glyphicon glyphicon-envelope"></i>  <i class="glyphicon glyphicon-chevron-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<a href="#">
									<div>
										<strong>John Smith</strong>
										<span class="pull-right text-muted">
											<em>Yesterday</em>
										</span>
									</div>
									<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<strong>John Smith</strong>
										<span class="pull-right text-muted">
											<em>Yesterday</em>
										</span>
									</div>
									<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<strong>John Smith</strong>
										<span class="pull-right text-muted">
											<em>Yesterday</em>
										</span>
									</div>
									<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a class="text-center" href="#">
									<strong>Read All Messages</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="glyphicon glyphicon-bell"></i>  <i class="glyphicon glyphicon-chevron-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li>
								<a href="#">
									<div>
										<i class="fa fa-comment fa-fw"></i> New Comment
										<span class="pull-right text-muted small">4 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<i class="fa fa-twitter fa-fw"></i> 3 New Followers
										<span class="pull-right text-muted small">12 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<i class="fa fa-envelope fa-fw"></i> Message Sent
										<span class="pull-right text-muted small">4 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a class="text-center" href="#">
									<strong>See All Alerts</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="<?php echo site_url('admon/logout')?>">
							<i class="glyphicon glyphicon-log-out"></i>
						</a>
					</li>
				</ul>
				<div class="navbar-default navbar-static-side" role="navigation">
					<div class="sidebar-collapse" id="menu_admin">
						<ul class="nav" id="side-menu">
							
							<li>
								<a href="#clientes_collapse" data-toggle="collapse">
									<i class="glyphicon glyphicon-user"></i>&nbsp;Clientes
									<span class="glyphicon glyphicon-chevron-left pull-right"></span>
								</a>
								<ul class="nav nav-second-level collapse" id="clientes_collapse">
									<li>
										<a id="consulta_clientes">Consulta</a>
									</li>
								</ul>
							</li>
							
							<li>
								<a href="#fletes_collapse" data-toggle="collapse">
									<i class="glyphicon glyphicon-road"></i>&nbsp;Fleteras
									<span class="glyphicon glyphicon-chevron-left pull-right"></span>
								</a>
								<ul class="nav nav-second-level collapse" id="fletes_collapse">
									<li>
										<a href="#">Consulta</a>
									</li>
									<li>
										<a href="#">Alta</a>
									</li>
									<li>
										<a href="#">Baja</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="#pedidos_collapse" data-toggle="collapse">
									<i class="glyphicon glyphicon-phone-alt"></i>&nbsp;Pedidos
									<span class="glyphicon glyphicon-chevron-left pull-right"></span>
								</a>
								<ul class="nav nav-second-level collapse" id="pedidos_collapse">
									<li>
										<a href="#">Consulta</a>
									</li>
								</ul>
							</li>
							
							<li>
								<a href="#productos_collapse" data-toggle="collapse">
									<i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;Productos
									<span class="glyphicon glyphicon-chevron-left pull-right"></span>
								</a>
								<ul class="nav nav-second-level collapse" id="productos_collapse">
									<li>
										<a href="">Consulta</a>
									</li>
									<li>
										<a href="">Alta</a>
									</li>
									<li>
										<a href="">Baja</a>
									</li>
								</ul>
							</li>
							
							<li>
								<a href="#proveedores_collapse" data-toggle="collapse">
									<i class="glyphicon glyphicon-briefcase"></i>&nbsp;Proveedores
									<span class="glyphicon glyphicon-chevron-left pull-right"></span>
								</a>
								<ul class="nav nav-second-level collapse" id="proveedores_collapse">
									<li>
										<a href="">Consultar</a>
									</li>
									<li>
										<a href="">Alta</a>
									</li>
									<li>
										<a href="">Baja</a>
									</li>
								</ul>
							</li>
							
							<li>
								<a href="#">
									<i class="glyphicon glyphicon-usd"></i>&nbsp;Ventas
								</a>
							</li>
						</ul>
					</div>
					<div class="hidden-xs"><br>
						<center>
							<p><b><?php echo $this->session->userdata('nombre')." ".$this->session->userdata('apellido_p')." ".$this->session->userdata('apellido_m')?></b></p>
						</center>
					</div>
				</div>
			</nav>
			<div id="page-wrapper">
				<?php $this->load->view($contenido);?>
			</div>
		</div>
	</body>
</html>

