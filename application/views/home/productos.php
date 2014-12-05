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
								<a href="javascript:;" data-id="<?php echo $categorias[$i]['id']; ?>"><?php echo $categorias[$i]['nombre']; ?><span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
								<?php for($j=0; $j < count($categorias[$i]['subcategorias']); $j++){?>
									<?php if(count($categorias[$i]['subcategorias'][$j]['subcategorias']) > 0){ ?>
										<li>
										<a href="javascript:;" data-id="<?php echo $categorias[$i]['subcategorias'][$j]['id']?>"><?php echo $categorias[$i]['subcategorias'][$j]['nombre']?><span class="fa arrow"></span></a>
		                                <ul class="nav nav-third-level">
		                                <?php for($k=0; $k < count($categorias[$i]['subcategorias'][$j]['subcategorias']); $k++){?>
		                                    <li>
		                                        <a href="javascript:;" data-id="<?php echo $categorias[$i]['subcategorias'][$j]['subcategorias'][$k]['id']?>"><?php echo $categorias[$i]['subcategorias'][$j]['subcategorias'][$k]['nombre']?></a>
		                                    </li>
		                                <?php } ?>
		                                </ul>
		                                </li>
									<?php }else{?>
										<li>
											<a href="javascript:;" data-id="<?php echo $categorias[$i]['subcategorias'][$j]['id']?>"><?php echo $categorias[$i]['subcategorias'][$j]['nombre']?></a>
										</li>
									<?php }?>
								<?php }?>
								</ul>
							<?php }else{ ?>
							<li>
								<a href="javascript:;" data-id="<?php echo $categorias[$i]['id']; ?>"><?php echo $categorias[$i]['nombre']; ?></a>
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
				<div class="row" id="listProductos">
					<!-- <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="thumbnail">
							<img src="media/imagenes/producto1.jpg" alt="" class="img-rounded">
							<div class="caption">
								<h4>Producto 1</h4>
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
<div class="modal fade" id="modal-producto">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="verNombre"></h4>
			</div>
			<form id="form-verArticulo" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<img src="" class="img-responsive img-thumbnail" id="imagen">
						</div>
						<div class="col-md-6">
							<table class="table table-user-information">
								<tbody>
									<tr>
										<td>Descripcion:</td>
										<td id="verDescripcion"></td>
									</tr>
									<tr>
										<td>Alto:</td>
										<td id="verAlto"></td>
									</tr>
									<tr>
										<td>Largo:</td>
										<td id="verLargo"></td>
									</tr>
									<tr>
										<td>Ancho:</td>
										<td id="verAncho"></td>
									</tr>
									<tr>
										<td>Precio:</td>
										<td id="verPrecio"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-warning" id="btn-guardarCambios">Añadir al Carrito</button>
					<button type="submit" class="btn btn-primary" id="btn-guardarCambios">Comprar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#side-menu').find('a').click(function(){
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('home/getProductos')?>",
				data:{id:$(this).attr('data-id')},
				success: function(result){
					var res = jQuery.parseJSON(result);
					if(res.length > 0){
						var cadena = "";
						for(var i = 0; i < res.length; i++){
							cadena += '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><div class="thumbnail" data-id="'+res[i].id+'"><img src="'+res[i].imagen+'" alt="" class="img-rounded"><div class="caption"><h4>'+res[i].nombre+'</h4></div></div></div>';
						}
						$('#listProductos').html(cadena);
					}else{
						$('#listProductos').html('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;Actualmente no cuenta con articulos esta categoria</div></div>');
					}
				}
			});
		});
		$('#listProductos').on('click','.thumbnail',function(){
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('home/datosArticulo')?>",
				data:{id:$(this).attr('data-id')},
				success: function(result){
					var res = jQuery.parseJSON(result);
					var articulo = res.articulo;
					$('#imagen').attr('src','<?php echo base_url(); ?>'+articulo.ruta_imagen);
					$('#verNombre').html(articulo.nombre);
					$('#verDescripcion').html(articulo.descripcion);
					$('#verAlto').html(articulo.alto);
					$('#verLargo').html(articulo.largo);
					$('#verAncho').html(articulo.ancho);
					$('#verPrecio').html(articulo.precio);
					$('#modal-producto').modal('show');
				}
			});
		});
		$(function() {
			$('#side-menu').metisMenu();
		});
		!function(a,b,c){function d(b,c){this.element=b,this.settings=a.extend({},f,c),this._defaults=f,this._name=e,this.init()}var e="metisMenu",f={toggle:!0};d.prototype={init:function(){var b=a(this.element),c=this.settings.toggle;this.isIE()<=9?(b.find("li.active").has("ul").children("ul").collapse("show"),b.find("li").not(".active").has("ul").children("ul").collapse("hide")):(b.find("li.active").has("ul").children("ul").addClass("collapse in"),b.find("li").not(".active").has("ul").children("ul").addClass("collapse")),b.find("li").has("ul").children("a").on("click",function(b){b.preventDefault(),a(this).parent("li").toggleClass("active").children("ul").collapse("toggle"),c&&a(this).parent("li").siblings().removeClass("active").children("ul.in").collapse("hide")})},isIE:function(){for(var a,b=3,d=c.createElement("div"),e=d.getElementsByTagName("i");d.innerHTML="<!--[if gt IE "+ ++b+"]><i></i><![endif]-->",e[0];)return b>4?b:a}},a.fn[e]=function(b){return this.each(function(){a.data(this,"plugin_"+e)||a.data(this,"plugin_"+e,new d(this,b))})}}(jQuery,window,document);
	});
</script>