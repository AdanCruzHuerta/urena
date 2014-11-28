<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-shopping-cart"></i> Proveedores</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li><a href="<?php echo site_url("admon/inicio");?>">Home</a></li>
			<li  class="active"><span>Proveedores</span></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Responsable</th>
							<th>Email</th>
							<th>Telefono</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($proveedores as $row) { ?>
						<tr>
							<td><?php echo $row->nombre; ?></td>
							<td><?php echo $row->responsable; ?></td>
							<td><?php echo $row->email; ?></td>
							<td><?php echo $row->telefono; ?></td>
							<td>
								<div class="row">
									<div class="col-sm-6 text-center">
										<button class="btn-accion" type="submit"><i class="fa fa-times"></i></button>
									</div>
									<div class="col-sm-6 text-center">
										<form action="<?php echo site_url('admon/proveedor'); ?>" method="post">
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
		<a href="<?php echo site_url("admon/alta_proveedor");?>" class="btn btn-primary pull-right">Agregar Nuevo</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<p class="info_seccion">En esta sección se podrá  consultar, dar de alta, actualizar y dar de baja a los proveedores.</p>
	</div>
</div>
<script type="text/javascript" src="js/dataTables.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.js"></script>
<script>
	$(document).ready(function(){
		$('.table').dataTable();
	});
</script>