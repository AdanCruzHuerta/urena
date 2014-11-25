<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
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
							<li><a href="javascript:;" data-id="<?php echo $categoria->id?>" data-accion="renombrar">Renombrar</a></li>
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
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti in ad molestias error earum perspiciatis saepe ipsam ullam, soluta aperiam quo sed consequatur amet. Laboriosam ipsam facilis quo molestiae, expedita?
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
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>
<script>
	$(document).ready(function(){
		var id_categoria = 1;
		var id_categoria_anterior = 1;
		var subnivel = 0;
		$('#addCategoria').click(function(){
			if(subnivel >= 3){
				$('#mensaje').append('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;No se puede agregar mas de 3 subcategorias</div>');
			}else{
				$('#modal-categoria').modal('show');
			}
		});
		var validacion = $('#form-categoria').validate({
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
							var cadena = "";
							for(var i = 0; i < result.categorias.length; i++){
								cadena += '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><div class="categoria"><div  class="sticker" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-folder fa-fw"></i> '+result.categorias[i].nombre+'<span class="caret"></span></div><ul class="dropdown-menu" role="menu"><li><a href="javascript:;" data-id="'+result.categorias[i].id+'" data-accion="ver">Ver</a></li><li><a href="javascript:;" data-id="'+result.categorias[i].id+'" data-accion="renombrar">Renombrar</a></li><li><a href="javascript:;" data-id="'+result.categorias[i].id+'" data-accion="eliminar">Eliminar</a></li></ul></div></div>';
							}
							$('#list-categorias').html(cadena);
						}
					}
				});
			}
		});
		$('#list-categorias').on('click','.categoria > .dropdown-menu > li > a',function(){
			//Aquie el codigo de las acciones para las categorias
			var accion = $(this).attr('data-accion');
			var id = $(this).attr('data-id');
			if(accion == "ver"){
				//id_categoria_anterior = id_categoria;
				subnivel++;
				id_categoria = id;
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admon/subcategorias')?>",
					data:{id:id},
					success: function(result){
						var res = jQuery.parseJSON(result);
						//alert(subnivel);
						//var categorias = resp.mensaje.length;
						//alert(res.resp);
						if(res.resp == false){
							$('#list-categorias').html(res.mensaje);
						} else{
							if(res.length > 0){
								var cadena = "";
								id_categoria_anterior = res[0].anterior;
								for(var i = 0; i < res.length; i++){
									cadena += '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><div class="categoria"><div  class="sticker" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-folder fa-fw"></i> '+res[i].nombre+'<span class="caret"></span></div><ul class="dropdown-menu" role="menu"><li><a href="javascript:;" data-id="'+res[i].id+'" data-accion="ver">Ver</a></li><li><a href="javascript:;" data-id="'+res[i].id+'" data-accion="renombrar">Renombrar</a></li><li><a href="javascript:;" data-id="'+res[i].id+'" data-accion="eliminar">Eliminar</a></li></ul></div></div>';
								}
								$('#list-categorias').html(cadena);
							}else{
								$('#mensaje').html('<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;Actualmente no cuenta con categorías</div>');
								$('#list-categorias').html('');
							}
						}
					}
				});
			}
		});
		$('#regresarCategoria').click(function(){
			//id_categoria = id_categoria_anterior;
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
						$.ajax({
							type: "POST",
							url: "<?php echo site_url('admon/subcategorias')?>",
							data:{id:id_categoria},
							success: function(categorias){
								var cat = jQuery.parseJSON(categorias);
								if(cat.resp == false){
									$('#list-categorias').html(cat.mensaje);
								} else{
									if(cat.length > 0){
										var cadena = "";
										id_categoria_anterior = cat[0].anterior;
										for(var i = 0; i < cat.length; i++){
											cadena += '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><div class="categoria"><div  class="sticker" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-folder fa-fw"></i> '+cat[i].nombre+'<span class="caret"></span></div><ul class="dropdown-menu" role="menu"><li><a href="javascript:;" data-id="'+cat[i].id+'" data-accion="ver">Ver</a></li><li><a href="javascript:;" data-id="'+cat[i].id+'" data-accion="renombrar">Renombrar</a></li><li><a href="javascript:;" data-id="'+cat[i].id+'" data-accion="eliminar">Eliminar</a></li></ul></div></div>';
										}
										$('#list-categorias').html(cadena);
									}else{
										$('#list-categorias').html('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="cat-vacio"><label>Actualmente no cuenta con categorías</label></div></div>');
									}
								}
							}
						});
					}
				});
			}
		});
	});
</script>	