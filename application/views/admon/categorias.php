<link rel="stylesheet" type="text/css" href="css/fileinput.min.css">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-tag"></i> Categorías</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li><a href="<?php echo site_url("admon/inicio");?>">Home</a></li>
			<li class="active"><span>Categorías</span></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		<div id="mensaje"></div>
		<div class="row" id="list-categorias">
			<?php if(count($categorias) == 0){
					$id_categoria = 1;
					echo "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'><div class='cat-vacio'><label>Actualmente no cuenta con categorías</label></div></div>";
		     }?>
		    <?php 
		     	$id_categoria = 1;
				foreach($categorias as $categoria) { ?>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="categoria">
						<div  class="sticker" data-toggle="dropdown" aria-expanded="false">
							<i class="fa fa-folder fa-fw"></i><?php echo " ".$categoria->nombre;?>
							<span class="caret"></span>
						</div>
						<ul class="dropdown-menu" role="menu">
							<li><a href="javascript:;" data-id="<?php echo $categoria->id?>" data-accion="ver">Ver</a></li>
							<li><a href="javascript:;" data-id="<?php echo $categoria->id?>" data-nombre="<?php echo $categoria->nombre;?>" data-accion="renombrar">Renombrar</a></li>
							<li><a href="javascript:;" data-id="<?php echo $categoria->id?>" data-accion="eliminar">Eliminar</a></li>
						</ul>
						</div>
					</div>
				<?php }?>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a id="regresarCategoria" class="btn btn-default pull-left">Regresar</a>
				<a id="addCategoria" class="btn btn-primary pull-right">Agregar categoría</a>
				<a id="addArticulo" class="btn btn-primary pull-right" style="margin-right:10px;">Agregar articulo</a>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<p class="info_seccion">En esta sección podrá consultar, dar de alta, dar de baja y renombrar el nombre de las categorías. <br> Se podrán agregar dar de alta, dar de baja y actualizar artículos dentro de cada categoría creada.</p>
	</div>
</div>
	
<div class="modal fade" id="modal-categoria">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Agregar nueva categoría</h4>
			</div>
			<form id="form-categoria" action="<?php echo site_url('admon/categorias')?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="categoria" class="control-label">Nombre de categoría</label>
								<input type="text" id="categoria" name="nombre" class="form-control"/>
								<input type="hidden" name="id_categoria" value="<?php echo $id_categoria?>" />
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-renombrar">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Renombrar categoría</h4>
			</div>
			<form id="form-categoria_renombrar" action="<?php echo site_url('admon/categorias')?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="categoria" class="control-label">Nombre de categoría</label>
								<input type="text" id="nombre_categoria" name="nombre_categoria" class="form-control"/>
								<input type="hidden" id="id_categoria" />
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Renombrar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-articulo">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Agregar nuevo articulo</h4>
			</div>
			<form id="form-articulo" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<input type="file" id="imagen" name="imagen">
						</div>
						<div class="col-md-8">
							<div class="form-horizontal">
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Nombre</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="nombre" name="nombre">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Descripcion</label>
									<div class="col-sm-10">
										<textarea class="form-control" id="descripcion" name="descripcion"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="" class="col-sm-6 control-label">Alto</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="alto" name="alto">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="" class="col-sm-6 control-label">Largo</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="largo" name="largo">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="" class="col-sm-6 control-label">Ancho</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="ancho" name="ancho">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label for="" class="col-sm-3 control-label">Proveedor</label>
											<div class="col-sm-9">
												<select class="form-control" id="proveedor" name="proveedor">
													<option value="1">Selecciona un proveedor</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="" class="col-sm-6 control-label">Precio</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="precio" name="precio">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-verArticulo">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Articulo</h4>
			</div>
			<form id="form-verArticulo" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<input type="file" id="verImagen" name="verImagen">
						</div>
						<div class="col-md-8">
							<div class="form-horizontal">
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Nombre</label>
									<div class="col-sm-10">
										<input type="text" class="form-control input-readonly" id="verNombre" name="verNombre">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Descripcion</label>
									<div class="col-sm-10">
										<textarea class="form-control input-readonly" id="verDescripcion" name="verDescripcion"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="" class="col-sm-6 control-label">Alto</label>
											<div class="col-sm-6">
												<input type="text" class="form-control input-readonly" id="verAlto" name="verAlto">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="" class="col-sm-6 control-label">Largo</label>
											<div class="col-sm-6">
												<input type="text" class="form-control input-readonly" id="verLargo" name="verLargo">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="" class="col-sm-6 control-label">Ancho</label>
											<div class="col-sm-6">
												<input type="text" class="form-control input-readonly" id="verAncho" name="verAncho">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label for="" class="col-sm-3 control-label">Proveedor</label>
											<div class="col-sm-9">
												<select class="form-control input-readonly" id="verProveedor" name="verProveedor">
													<option value="1">Selecciona un proveedor</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="" class="col-sm-6 control-label">Precio</label>
											<div class="col-sm-6">
												<input type="text" class="form-control input-readonly" id="verPrecio" name="verPrecio">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger">Eliminar</button>
					<button type="button" class="btn btn-warning" id="editarArticulo">Editar</button>
					<button type="submit" class="btn btn-primary" id="btn-guardarCambios" disabled>Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>
<script type="text/javascript" src="js/fileinput.min.js"></script>
<script>
	$(document).ready(function(){
		var id_categoria = 1;
		var id_categoria_anterior = 1;
		var subnivel = 0;
		var id_articulo = 0;
		var categoriasOarticulos = 0;
		$("input[type=file]").fileinput({
			browseClass: 'btn btn-primary btn-block',
			browseLabel: ' Seleccionar Imagen',
			browseIcon: '<i class="fa fa-picture-o"></i>',
			initialPreview: '<img src="/urena/media/imagenes/producto1.jpg" class="file-preview-image">',
			allowedFileExtensions: ["jpg", "png"],
			allowedFileTypes: ["image"],
			showCaption: false,
			showRemove: false,
			showUpload: false
		});
		$('#addCategoria').click(function(){
			if(subnivel >= 3){
				$('#mensaje').append('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;No se puede agregar mas de 3 subcategorias</div>');
			}else if(categoriasOarticulos == 1){
				$('#mensaje').append('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;No se puede agregar subcategorias si hay productos</div>');
			}else{
				$('#modal-categoria').modal('show');
			}
		});
		$('#addArticulo').click(function(){
			if(id_categoria == 1){
				$('#mensaje').append('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;No se puede agregar articulos en la raiz</div>');
			}else if(categoriasOarticulos == 0){
				$('#mensaje').append('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;No se puede agregar articulos si hay subcategorias</div>');
			}else{
				$('#modal-articulo').modal('show');
			}
		});
		var nuevaCategoria = $('#form-categoria').validate({
			errorElement: "span",
			errorClass:"help-block",
			rules:{
				nombre:{required:true, minlength:3}
			},
			highlight: function(element, error){
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element){
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			submitHandler: function(){
				var nombre = $('#categoria').val();
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admon/categorias')?>",
					data:{id_categoria:id_categoria,nombre:nombre},
					success: function(result){
						var result = jQuery.parseJSON(result);
						$("html, body").animate({scrollTop:"0px"});
						$('#modal-categoria').modal('hide');
						$('#categoria').val("");
						if(result.resp){
							$('#mensaje').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Exito!</strong>&nbsp;'+result.mensaje+'</div>');
							$.categoriasYarticulos();
						}
					}
				});
			}
		});
		var renombrar = $('#form-categoria_renombrar').validate({
			errorElement: "span",
			errorClass: "help-block",
			rules:{
				nombre_categoria:{required:true, minlength:3}
			},
			highlight: function(element, error){
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element){
				$(element).closest('form-group').removeClass('has-error').addClass('has-success');
			},
			submitHandler: function(){
				var id_categoria = $('#id_categoria').val();
				var nombre = $('#nombre_categoria').val();
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admon/categoria_renombrar')?>",
					data:{id_categoria:id_categoria, nombre:nombre},
					success:function(result){
						var result = jQuery.parseJSON(result);
						$("html, body").animate({scrollTop:"0px"});
						$('#modal-renombrar').modal('hide');
						$('#nombre_categoria').val("");
						if(result.resp){
							//$('#nombre_categoria').val(result.nombre);
							$('#mensaje').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Exito!</strong>&nbsp;'+result.mensaje+'</div>');
							$.categoriasYarticulos();
						}else{
							$('#mensaje').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;'+result.mensaje+'</div>');
						}
					}
				});
			}
		});
		var files = [];
		var articulo = $('#form-articulo').validate({
			errorElement: "span",
			errorClass:"help-block",
			rules:{
				imagen:{required:true},
				nombre:{required:true, minlength:3},
				descripcion:{required:true, minlength:3},
				alto:{required:true, number:true},
				largo:{required:true, number:true},
				ancho:{required:true, number:true},
				proveedor:{required:true,},
				precio:{required:true, minlength:3}
			},
			highlight: function(element, error){
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element){
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			submitHandler: function(){
				var formulario = $('#form-articulo').serialize();
				var data = new FormData();
				$.each(files, function(key, value)
				{
					data.append(key, value);
				});
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admon/agregarArticulo'); ?>?id_categoria="+id_categoria+"&"+formulario,
					cache: false,
					processData: false,
					contentType: false,
					data: data,
					success: function(result){
						var res = jQuery.parseJSON(result);
						if(res.resp){
							$('#mensaje').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Exito!</strong>&nbsp;'+res.mensaje+'</div>');
							$.categoriasYarticulos();
						}else{
							$('#mensaje').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;'+res.mensaje+'</div>');
						}
						$('#modal-articulo').modal('hide');
						$('#form-articulo').each(function(){
							this.reset();
						});
					}
				});
			}
		});
		var editarArticulo = $('#form-verArticulo').validate({
			errorElement: "span",
			errorClass:"help-block",
			rules:{
				verImagen:{required:true},
				verNombre:{required:true, minlength:3},
				verDescripcion:{required:true, minlength:3},
				verAlto:{required:true, number:true},
				verLargo:{required:true, number:true},
				verAncho:{required:true, number:true},
				verProveedor:{required:true,},
				verPrecio:{required:true, minlength:3}
			},
			highlight: function(element, error){
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element){
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			submitHandler: function(){
				var formulario = $('#form-verArticulo').serialize();
				var data = new FormData();
				$.each(files, function(key, value)
				{
					data.append(key, value);
				});
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admon/editarArticulo'); ?>?id_articulo="+id_articulo+"&"+formulario,
					cache: false,
					processData: false,
					contentType: false,
					data: data,
					success: function(result){
						var res = jQuery.parseJSON(result);
						if(res.resp){
							$('#mensaje').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Exito!</strong>&nbsp;'+res.mensaje+'</div>');
							$.categoriasYarticulos();
						}else{
							$('#mensaje').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;'+res.mensaje+'</div>');
						}
						$('#modal-verArticulo').modal('hide');
						$('#form-verArticulo').each(function(){
							this.reset();
						});
					}
				});
			}
		});
		$(document).on('change','#imagen',function(e){
			files = e.target.files;
		});
		$('#list-categorias').on('click','.categoria > .dropdown-menu > li > a',function(){
			//Aquie el codigo de las acciones para las categorias
			var accion = $(this).attr('data-accion');
			var id = $(this).attr('data-id');
			if(accion == "ver"){
				//id_categoria_anterior = id_categoria;
				subnivel++;
				id_categoria = id;
				$.categoriasYarticulos();
			}
			else if(accion == 'renombrar'){
				$('#id_categoria').val($(this).attr('data-id'));
				$('#nombre_categoria').val($(this).attr('data-nombre'));
				$('#modal-renombrar').modal('show');
			}else if(accion == 'eliminar'){
				id_categoria = id;

			}
		});
		$('#list-categorias').on('click','.articulo',function(){
			id_articulo = $(this).attr('data-id');
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('admon/datosArticulo')?>",
				data:{id:id_articulo},
				success: function(result){
					var res = jQuery.parseJSON(result);
					var articulo = res.articulo;
					$('#form-verArticulo').find('img').attr('src','<?php echo base_url(); ?>'+articulo.ruta_imagen)
					$('#verNombre').val(articulo.nombre);
					$('#verDescripcion').val(articulo.descripcion);
					$('#verAlto').val(articulo.alto);
					$('#verLargo').val(articulo.largo);
					$('#verAncho').val(articulo.ancho);
					$('#verProveedor option['+articulo.proveedor+']').attr("selected",true);
					$('#verPrecio').val(articulo.precio);
					$('#form-verArticulo :input').each(function(){
					});
					$('#modal-verArticulo').modal('show');
				}
			});
			
		});
		$('#editarArticulo').click(function(){
			$('#verNombre').toggleClass('input-readonly');
			$('#verDescripcion').toggleClass('input-readonly');
			$('#verAlto').toggleClass('input-readonly');
			$('#verLargo').toggleClass('input-readonly');
			$('#verAncho').toggleClass('input-readonly');
			$('#verProveedor').toggleClass('input-readonly');
			$('#verPrecio').toggleClass('input-readonly');
			$('#btn-guardarCambios').prop('disabled',!$('#btn-guardarCambios').prop('disabled'));
			$('.form-group').removeClass('has-error has-success');
		});
		$('#modal-verArticulo').on('hide.bs.modal',function(e){
			$('#verNombre').addClass('input-readonly');
			$('#verDescripcion').addClass('input-readonly');
			$('#verAlto').addClass('input-readonly');
			$('#verLargo').addClass('input-readonly');
			$('#verAncho').addClass('input-readonly');
			$('#verProveedor').addClass('input-readonly');
			$('#verPrecio').addClass('input-readonly');
			$('#btn-guardarCambios').prop("disabled",true);
		});
		$('#regresarCategoria').click(function(){
			if(id_categoria == 1){
				$('#mensaje').html('<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;Ya se encuentra en la raiz</div>');
			}else{
				subnivel--;
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admon/categoriaAnterior')?>",
					data:{id:id_categoria},
					success: function(result){
						var res = jQuery.parseJSON(result);
						id_categoria = res;
						$.categoriasYarticulos();
					}
				});
			}
		});
		$.categoriasYarticulos = function(){
			//$('#mensaje').html('');
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('admon/subcategorias')?>",
				data:{id:id_categoria},
				success: function(respuesta){
					var datos = jQuery.parseJSON(respuesta);
					var categorias = datos.categorias;
					var articulos = datos.articulos;
					var vandera = false;
					if(datos.resp == false){
						$('#mensaje').html('<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;'+datos.mensaje+'</div>');
						$('#list-categorias').html('');
					} else{
						if(categorias.length > 0){
							var cadena = "";
							id_categoria_anterior = categorias[0].anterior;
							for(var i = 0; i < categorias.length; i++){
								cadena += '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><div class="categoria"><div  class="sticker" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-folder fa-fw"></i> '+categorias[i].nombre+'<span class="caret"></span></div><ul class="dropdown-menu" role="menu"><li><a href="javascript:;" data-id="'+categorias[i].id+'" data-accion="ver">Ver</a></li><li><a href="javascript:;" data-id="'+categorias[i].id+'" data-accion="renombrar" data-nombre="'+categorias[i].nombre+'">Renombrar</a></li><li><a href="javascript:;" data-id="'+categorias[i].id+'" data-accion="eliminar">Eliminar</a></li></ul></div></div>';
							}
							$('#list-categorias').html(cadena);
							vandera = true;
							categoriasOarticulos = 0;
						}
						if(articulos.length > 0){
							if(vandera == false){
								$('#list-categorias').html('');
							}
							var cadena = "";
							id_categoria_anterior = articulos[0].anterior;
							for(var i = 0; i < articulos.length; i++){
								cadena += '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><div class="articulo" data-id="'+articulos[i].id+'"><div class="sticker" aria-expanded="false"><i class="fa fa-tag fa-fw"></i> '+articulos[i].nombre+'</div></div></div>';
							}
							$('#list-categorias').append(cadena);
							vandera = true;
							categoriasOarticulos = 1;
						}
						if(vandera == false){
							$('#mensaje').html('<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;Actualmente no cuenta con categorías ni articulos</div>');
							$('#list-categorias').html('');
							categoriasOarticulos = 2;
						}
					}
				}
			});
		}
		$('.modal').on('hide.bs.modal',function(e){
			nuevaCategoria.resetForm();
			articulo.resetForm();
			renombrar.resetForm();
			editarArticulo.resetForm();
			$('.form-group').removeClass('has-error has-success');
		});
	});
</script>	