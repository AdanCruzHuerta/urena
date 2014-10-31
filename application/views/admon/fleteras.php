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
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<div id="table">
			<table id="tabla" class='table table-hover'>
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
						<td>Olis</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="hidden-xs hidden-sm col-md-4 col-lg-4">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptates tenetur facere dolore numquam reiciendis, itaque labore sequi animi laboriosam, quisquam fugit sint dolores cupiditate minus quos dolorem iure fugiat.
	</div>
</div>