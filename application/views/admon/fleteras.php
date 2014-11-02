<link rel="stylesheet" type="text/css" href="css/datatables.bootstrap.css">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-truck"></i> Fleteras</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li><a href="<?php echo site_url("admon/inicio");?>">Home</a></li>
			<li class="active"><span>Fleteras</span></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		<div class="panel panel-default">
			<div class="panel-body">
				<table class='table table-hover'>
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Responsable</th>
							<th>Email</th>
							<th>Teléfono</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($fleteras as $row) { ?>
						<tr>
							<td><?php echo $row->nombre;?></td>
							<td><?php echo $row->responsable;?></td>
							<td><?php echo $row->email;?></td>
							<td><?php echo $row->telefono;?></td>
							<td>
								<div class="row">
									<div class="col-sm-6 text-center">
										<button class="btn-accion" type="submit"><i class="fa fa-times"></i></button>
									</div>
									<div class="col-sm-6 text-center">
										<form action="<?php echo site_url('admon/fletera'); ?>" method="post">
											<input type="hidden" name="id" value="<?php echo $row->id; ?>">
											<button class="btn-accion" type="submit"><i class="fa fa-pencil-square-o"></i></button>
										</form>
									</div>
								</div>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<a href="<?php echo site_url("admon/alta_fletera");?>" class="btn btn-primary pull-right">Agregar Nuevo</a>
	</div>
	<div class="hidden-xs hidden-sm col-md-3 col-lg-3">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptates tenetur facere dolore numquam reiciendis, itaque labore sequi animi laboriosam, quisquam fugit sint dolores cupiditate minus quos dolorem iure fugiat.
	</div>
</div>
<script type="text/javascript" src="js/datatables.js"></script>
<script type="text/javascript" src="js/datatables.bootstrap.js"></script>
<script>
	$(document).ready(function(){
		$('.table').dataTable();
	});
</script>