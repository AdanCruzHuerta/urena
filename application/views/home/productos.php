<section>
	<div class="container">
		<br>
		<br>
		 <?php #echo "<pre>"; echo print_r($categorias); echo "</pre>"; echo count($categorias); ?>
		<div class="row">
			<div class="hidden-xs col-sm-2 col-md-3 col-lg-3">
				<div class="input-group">
                	<input type="text" class="form-control" placeholder="Buscar articulo">
                	<span class="input-group-btn">
                		<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
              		</span>
                </div><br/>
				<ol class="breadcrumb">
					<li class="active">Categorias</li>
				</ol>
				<ul class="nav" id="side-menu">
					<?php for($i=0; $i < count($categorias); $i++){
							if(count($categorias[$i]['subcategorias']) > 0){?>
							<li>
								<a href="#"><?php echo $categorias[$i]['nombre']; ?><span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
								<?php for($j=0; $j < count($categorias[$i]['subcategorias']); $j++){?>
								<li>
									<a href="flot.html"><?php echo $categorias[$i]['subcategorias'][$j]['nombre']?></a>
								</li>
								<?php }?>
								</ul>
							<?php }else{ ?>
							<li>
								<a href=""><?php echo $categorias[$i]['nombre']; ?></a>
							</li>
					<?php }} ?>
                    <!-- <li>
                        <a href="#">Línea Modernista<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Salas <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                	<li>
                                		<a href="#">3-2-1</a>
                                	</li>
                                	<li>
                                		<a href="#">Esquineras</a>
                                	</li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Comedores <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                	<li>
                                		<a href="#">4 sillas</a>
                                	</li>
                                	<li>
                                		<a href="#">6 sillas</a>
                                	</li>
                                	<li>
                                		<a href="#">8 sillas</a>
                                	</li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Recamaras <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Contemporanea</a>
                                    </li>
                                    <li>
                                        <a href="#">Infantiles</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                            	<a href="#">Centros de entretenimiento</a>
                            </li>
                            <li>
                            	<a href="#">Porta pantallas</a>
                            </li>
                            <li>
                            	<a href="#">Cajoneras</a>
                            </li>
                            <li>
                            	<a href="#">Diversos</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
			</div>
			<div class="col-xs-12 col-sm-10 col-md-9 col-lg-9">
				<ol class="breadcrumb">
					<li><a href="#">Contemporaneo</a></li>
					<li class="active">Recamaras</li>
				</ol>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img src="media/imagenes/producto1.jpg" alt="" class="img-rounded">
							<div class="caption">
								<h4>Producto 1</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img src="media/imagenes/producto2.jpg" alt="" class="img-rounded">
							<div class="caption">
								<h4>Producto 2</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img src="media/imagenes/producto3.jpg" alt="" class="img-rounded">
							<div class="caption">
								<h4>Producto 3</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img src="media/imagenes/producto4.jpg" alt="" class="img-rounded">
							<div class="caption">
								<h4>Producto 4</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img src="media/imagenes/producto1.jpg" alt="" class="img-rounded">
							<div class="caption">
								<h4>Producto 5</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img src="media/imagenes/producto2.jpg" alt="" class="img-rounded">
							<div class="caption">
								<h4>Producto 6</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img src="media/imagenes/producto3.jpg" alt="" class="img-rounded">
							<div class="caption">
								<h4>Producto 7</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img src="media/imagenes/producto4.jpg" alt="" class="img-rounded">
							<div class="caption">
								<h4>Producto 8</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img src="media/imagenes/producto1.jpg" alt="" class="img-rounded">
							<div class="caption">
								<h4>Producto 9</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img src="media/imagenes/producto2.jpg" alt="" class="img-rounded">
							<div class="caption">
								<h4>Producto 10</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img src="media/imagenes/producto3.jpg" alt="" class="img-rounded">
							<div class="caption">
								<h4>Producto 11</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img src="media/imagenes/producto4.jpg" alt="" class="img-rounded">
							<div class="caption">
								<h4>Producto 12</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-producto">Modal</button> -->
</section>
<br>
<br>
<div class="modal fade" id="modal-producto">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<center>
					<i class="fa fa-spinner fa-spin fa-5x"></i>
				</center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.thumbnail').click(function(){
			$('#modal-producto').modal('show');
		});
		$(function() {
			$('#side-menu').metisMenu();
		});
		!function(a,b,c){function d(b,c){this.element=b,this.settings=a.extend({},f,c),this._defaults=f,this._name=e,this.init()}var e="metisMenu",f={toggle:!0};d.prototype={init:function(){var b=a(this.element),c=this.settings.toggle;this.isIE()<=9?(b.find("li.active").has("ul").children("ul").collapse("show"),b.find("li").not(".active").has("ul").children("ul").collapse("hide")):(b.find("li.active").has("ul").children("ul").addClass("collapse in"),b.find("li").not(".active").has("ul").children("ul").addClass("collapse")),b.find("li").has("ul").children("a").on("click",function(b){b.preventDefault(),a(this).parent("li").toggleClass("active").children("ul").collapse("toggle"),c&&a(this).parent("li").siblings().removeClass("active").children("ul.in").collapse("hide")})},isIE:function(){for(var a,b=3,d=c.createElement("div"),e=d.getElementsByTagName("i");d.innerHTML="<!--[if gt IE "+ ++b+"]><i></i><![endif]-->",e[0];)return b>4?b:a}},a.fn[e]=function(b){return this.each(function(){a.data(this,"plugin_"+e)||a.data(this,"plugin_"+e,new d(this,b))})}}(jQuery,window,document);
	});
</script>