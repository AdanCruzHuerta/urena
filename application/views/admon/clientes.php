<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-users"></i> Clientes</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li><a href="<?php echo site_url("admon/inicio");?>">Home</a></li>
			<li  class="active"><span>Clientes</span></li>
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
							<th>Email</th>
							<th>Telefono</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($clientes as $row) { ?>
						<tr>
							<td><?php echo $row->nombre; ?></td>
							<td><?php echo $row->email; ?></td>
							<td><?php echo $row->telefono; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<p class="info_seccion">En esta sección se podrá consultar a los clientes que se han registrado en el sitio.</p>
	</div>
</div>
<script type="text/javascript" src="js/dataTables.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.js"></script>
<script>
	$(document).ready(function(){
		$('.table').dataTable();
	});
</script>