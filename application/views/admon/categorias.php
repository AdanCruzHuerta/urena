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
		<ul id="list-categorias">
			<?php if(count($categorias) == 0){
					$id_categoria = 1;
					echo "<div class='cat-vacio'><label>Actualmente no cuenta con categorías</label></div>";
		     }?>
		    <?php 
		     	$id_categoria = 1;
				foreach($categorias as $categoria) { ?>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sticker">
							<a onclick='despliega_cat(<?php echo $categoria->id?>)' id="<?php echo $categoria->id?>"><li><i class="fa fa-folder folder-cat"></i><?php echo " ".$categoria->nombre;?></li></a>
						</div>
					</div>
				<?php }?>
		</ul>
		<a id="addCategoria" class="btn btn-primary pull-right">Agregar categoría</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti in ad molestias error earum perspiciatis saepe ipsam ullam, soluta aperiam quo sed consequatur amet. Laboriosam ipsam facilis quo molestiae, expedita?
	</div>
</div>
<div class="modal fade" id="modal-categoria">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header m-header-cat">
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
				<div class="modal-footer m-header-cat">
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
		$('#addCategoria').click(function(){
			$('#modal-categoria').modal('show');
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
				$.post("<?php echo site_url('admon/categorias')?>", $('form#form-categoria').serialize(), function(result){
					$("html, body").animate({scrollTop:"0px"});
					if(result.resp){
						$('#mensaje').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Exito!</strong>&nbsp;'+result.mensaje+'</div>');
						var cadena = "";
						for(var i = 0; i < result.categorias.length; i++){
							cadena += "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-4'><div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 sticker'><a onclick='despliega_cat("+result.categorias[i].id+")' id='"+result.categorias[i].id+"'><li><i class='fa fa-folder folder-cat'></i> "+ result.categorias[i].nombre+"</li></a></div></div>"
						}
						$('#list-categorias').html(cadena);
						$('#form-categoria').each(function(){
							this.reset();
						});
					}
				},"json");
			}
		});
	});
	
	function despliega_cat(id_categoria){
		alert(id_categoria);
	}
</script>	