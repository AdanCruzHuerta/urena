<link rel="stylesheet" type="text/css" href="css/datatables.bootstrap.css">
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
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
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
	</div>
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti in ad molestias error earum perspiciatis saepe ipsam ullam, soluta aperiam quo sed consequatur amet. Laboriosam ipsam facilis quo molestiae, expedita?
	</div>
</div>
<script type="text/javascript" src="js/datatables.js"></script>
<script type="text/javascript" src="js/datatables.bootstrap.js"></script>
<script>
	$(document).ready(function(){
		$('.table').dataTable();
	});
</script>