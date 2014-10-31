<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-shopping-cart"></i> Alta proveedor</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li><a href="<?php echo site_url("admon/inicio");?>">Home</a></li>
			<li><a href="<?php echo site_url("admon/proveedores");?>">Proveedores</a></li>
			<li class="active"><span>Alta</span></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<div class="panel panel-default">
			<div class="panel-body">
			<div id="alerta"></div>
				<div class="row">
					<form id="form-proveedor">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-horizontal">
								<div class="form-group">
									<label for="proveedor" class="control-label	col-sm-4">Proveedor</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="proveedor" id="proveedor">
									</div>
								</div>
								<div class="form-group">
									<label for="estado" class="control-label	col-sm-4">Estado</label>
									<div class="col-sm-8">
										<select name="estado" id="estado" class="form-control">
											<option value="">Selecciona Estado</option>
											<?php foreach($estados as $row){ ?>
												<option value="<?php echo $row->id; ?>"><?php echo $row->nombre; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="municipio" class="control-label	col-sm-4">Municipio</label>
									<div class="col-sm-8">
										<select name="municipio" id="municipio" class="form-control"></select>
									</div>
								</div>
								<div class="form-group">
									<label for="direccion" class="control-label	col-sm-4">Direccion</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="direccion" id="direccion">
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-horizontal">
								<div class="form-group">
									<label for="telefono" class="control-label	col-sm-4">Telefono</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="telefono" id="telefono">
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="control-label	col-sm-4">Email</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="email" id="email">
									</div>
								</div>
								<div class="form-group">
									<label for="responsable" class="control-label	col-sm-4">Responsable</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="responsable" id="responsable">
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<input type="submit" class="btn btn-primary pull-right" value="Registrar">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>
<script>
	$(document).ready(function(){
		$('#estado').change(function(){
			var estado = $(this).val();
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('admon/municipios')?>",
				data:{estado:estado},
				success: function(result){
					var res = jQuery.parseJSON(result);
					var cadena = '<option value="">Selecciona Municipio</option>';
					for(var i = 0; i<res.length; i++){
						cadena += '<option value="'+res[i].id+'">'+res[i].nombre+'</option>';
					}
					$('#municipio').html(cadena);
				}
			});
		});
		var validacion = $('#form-proveedor').validate({
			errorElement: "span",
			errorClass: "help-block",
			rules: {
				proveedor: {required: true, minlength: 3},
				estado: {required: true},
				municipio: {required: true},
				direccion: {required: true, minlength: 3},
				telefono: {required: true, number: true},
				email: {required: true, email: true},
				responsable: {required: true, minlength: 3},
			},
			highlight: function(element, error) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			submitHandler: function() {
				$.post("<?php echo site_url('admon/registra_proveedor')?>", $('form#form-proveedor').serialize(), function(result){
					$("html, body").animate({scrollTop:"0px"});
					if(result.resp){
						$('#alerta').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Exito!</strong>&nbsp;'+result.mensaje+'</div>');
						$('#form-proveedor').each(function(){
							this.reset();
						});
					} else{
						$('#alerta').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;'+result.mensaje+'</div>');
					}
					$('div.has-success').removeClass('.has-success');
					$('#registro').each(function(){
						this.reset();
					});
				}, "json");
			}
		});
	});
</script>