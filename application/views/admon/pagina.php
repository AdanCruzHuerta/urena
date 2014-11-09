<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-desktop"></i> Página</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li><a href="#">Home</a></li>
			<li class="active"><span>Página</span></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-body">
				<div id="alerta"></div>
				<table class="table table-hover">
					<thead>
						<tr>
							<th width="60%">Imagen</th>
							<th width="20%">Fecha</th>
							<th width="20%">Acciones</th>
						</tr>
					</thead>
						<?php foreach($slider as $row){?>
						<tr>
							<td><img src="<?php echo $row->ruta; ?>" class="img-responsive"></td>
							<td><?php echo $row->fecha; ?></td>
							<td>
								<div class="row">
									<div class="col-sm-6 text-center">
										<button class="btn-accion" type="button"><i class="fa fa-times"></i></button>
									</div>
									<div class="col-sm-6 text-center">
										<button class="btn-accion visibleSlider" type="button" data-id="<?php echo $row->id; ?>">
											<i class="fa <?php if($row->status == 1){echo 'fa-eye';}else{echo 'fa-eye-slash';} ?>"></i>
										</button>
									</div>
								</div>
							</td>
						</tr>
						<?php }?>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('button.visibleSlider').click(function(){
			var id = $(this).attr('data-id');
			if($(this).children('i').hasClass('fa-eye')){
				var status = 1;
			} else{
				var status = 0;
			}
			$.ajax({
				context: $(this),
				type: "POST",
				url: "<?php echo site_url('admon/visivilidad_slider'); ?>",
				data: {id:id,status:status},
				success: function(res){
					var result = jQuery.parseJSON(res);
					if(result.resp){
						if($(this).children('i').hasClass('fa-eye-slash')){
							$(this).children('i').removeClass('fa-eye-slash').addClass('fa-eye');
						}else{
							$(this).children('i').removeClass('fa-eye').addClass('fa-eye-slash');
						}
						$('#alerta').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Exito!</strong>&nbsp;'+result.mensaje+'</div>');
					}else{
						$('#alerta').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong>&nbsp;'+result.mensaje+'</div>');
					}
				}
			});
		});
	});
</script>