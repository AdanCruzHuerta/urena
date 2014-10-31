<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-truck"></i> Fleteras</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li><a href="<?php echo site_url("admon/inicio");?>">Home</a></li>
			<li><a href="<?php echo site_url("admon/fleteras");?>">Fleteras</a></li>
			<li  class="active"><span>Editar</span></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<div class="panel panel-default">
			<div class="panel-body">
			<div id="alerta"></div>
				<div class="row">
					<form id="form-fletera">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-horizontal">
								<div class="form-group">
									<label for="proveedor" class="control-label	col-sm-4">Fletera</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="proveedor" id="proveedor" value="<?php echo $fletera->nombre;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="estado" class="control-label col-sm-4">Estado</label>
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
									<label for="direccion" class="control-label	col-sm-4">Ciudad</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="ciudad" id="ciudad" value="<?php echo $fletera->ciudad;?>">
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-horizontal">
								<div class="form-group">
									<label for="direccion" class="control-label	col-sm-4">Direccion</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $fletera->direccion;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="telefono" class="control-label	col-sm-4">Telefono</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $fletera->telefono;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="control-label	col-sm-4">Email</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="email" id="email" value="<?php echo $fletera->email;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="responsable" class="control-label	col-sm-4">Responsable</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="responsable" id="responsable" value="<?php echo $fletera->responsable;?>">
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<input type="hidden" name="id" id="id" value="<?php echo $fletera->id;?>">
							<input type="submit" class="btn btn-primary pull-right" value="Guardar">
							<input type="submit" class="btn btn-danger pull-right" value="Eliminar" style="margin-right:10px;">
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
		$('#estado option[value="<?php echo $fletera->estado;?>"]').attr("selected",true);
		var estadoIni = $('#estado').val();
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('admon/municipios')?>",
			data:{estado:estadoIni},
			success: function(result){
				var res = jQuery.parseJSON(result);
				var cadena = '<option value="">Selecciona Municipio</option>';
				for(var i = 0; i<res.length; i++){
					cadena += '<option value="'+res[i].id+'">'+res[i].nombre+'</option>';
				}
				$('#municipio').html(cadena);
				$('#municipio option[value="<?php echo $fletera->municipio;?>"]').attr("selected",true);
			}
		});
		
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
				$.post("<?php echo site_url('admon/actualiza_fletera')?>", $('form#form-fletera').serialize(), function(result){
					$("html, body").animate({scrollTop:"0px"});
					if(result.resp){
						$('#alerta').html('<div class="alert alert-success animated bounceIn" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Exito!</strong>&nbsp;'+result.mensaje+'</div>');
					} else{
						$('#alerta').html('<div class="alert alert-danger animated bounceIn" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;'+result.mensaje+'</div>');
					}
				}, "json");
			}
		});
	});
</script>