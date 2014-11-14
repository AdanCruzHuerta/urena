		<?php// if(dameURL()=='http://urena.sharksoft.com.mx/'){?>
		<!-- <script>
			$('html').css('overflow','hidden');
		</script>
		<section class="hidden-xs">
			<div class="contenedor">
				<div class="principal">
					<h3>Siguenos en</h3>
					<div class="redes">
					 	<a href="https://www.facebook.com/muebleria.urena?fref=ts" target = "_blank">
					 		<img id="facebook" class="social" src="media/imagenes/cortina/facebook.png" >
					 	</a>
					 		<img id="twitter" class="social" src="media/imagenes/cortina/twitter.png" >
					 	<a href="https://www.youtube.com/user/MUEBLERIAURENA" target="_blank">
					 		<img id="youtube" class="social" src="media/imagenes/cortina/youtube.png" >
					 	</a>
					 		<img id="instagram" class="social" src="media/imagenes/cortina/instagram.png" >
					 		<img id="google" class="social" src="media/imagenes/cortina/google.png" >
					</div>
					<div class="imagen">
						<img class="urena" src="media/imagenes/cortina/urena1.png">
					</div>
					<div class="btn-entrar" id="entrar">
						<h4>Entra al sitio</h4>
					</div>
				</div>
			</div>
		</section> -->
		<?php// } ?>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div id="myCarousel" class="carousel slide">
									<div class="carousel-inner">
										<?php $activo = 0; foreach($slider as $row){?>
										<div class="item <?php if($activo == 0){echo 'active';}?>">
											<img src="<?php echo $row->ruta; ?>" class="img-responsive">
										</div>
										<?php $activo = 1; }?>
									</div>
									<a class="left carousel-control" href="#myCarousel" data-slide="prev">
										<span class="fa fa-chevron-left"></span>
									</a>
									<a class="right carousel-control" href="#myCarousel" data-slide="next">
										<span class="fa fa-chevron-right"></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="container">
				<br>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="cabecera"><div class="text-cabecera">Mueblería Ureña</div></div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, similique provident dolor numquam ad. Illum, eius, distinctio, earum porro explicabo qui impedit culpa necessitatibus minus dolore tenetur beatae ratione nobis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, impedit, eaque delectus accusantium sint architecto quod id modi eligendi aspernatur nemo laboriosam dolor obcaecati ipsam facilis hic molestiae placeat quisquam.
								</p>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<img src="media/imagenes/muebleria3.gif" alt="" class="img-thumbnail img-responsive ">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="container">
			<br>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="cabecera"><div class="text-cabecera">Formas de Pago</div></div>
						<div class="row">
							<center>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<img src="media/imagenes/formaspago.png" alt="">
								</div>
							</center>
							<!-- <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
								<div class="thumbnail">
									<img src="media/imagenes/producto1.jpg" alt="" class="img-rounded">
									<div class="caption">
										<h4>Categoria 1</h4>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
								<div class="thumbnail">
									<img src="media/imagenes/producto1.jpg" alt="" class="img-rounded">
									<div class="caption">
										<h4>Categoria 2</h4>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
								<div class="thumbnail">
									<img src="media/imagenes/producto1.jpg" alt="" class="img-rounded">
									<div class="caption">
										<h4>Categoria 3</h4>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
								<div class="thumbnail">
									<img src="media/imagenes/producto1.jpg" alt="" class="img-rounded">
									<div class="caption">
										<h4>Categoria 4</h4>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
								<div class="thumbnail">
									<img src="media/imagenes/producto1.jpg" alt="" class="img-rounded">
									<div class="caption">
										<h4>Categoria 5</h4>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
								<div class="thumbnail">
									<img src="media/imagenes/producto1.jpg" alt="" class="img-rounded">
									<div class="caption">
										<h4>Categoria 6</h4>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<br>
		<br>
		<script type="text/javascript">
			$('.carousel').carousel({
				interval: 3000
			});
			$("#entrar").click(function(){
				$('.contenedor').css('margin-top','-1120px');
				$('html').css('overflow','auto');
			});
		</script>