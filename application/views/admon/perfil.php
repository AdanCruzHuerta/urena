<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-user"></i> Perfil</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li><a href="<?php echo site_url("admon/inicio");?>">Home</a></li>
			<li class="active"><span>Perfil</span></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="media">
					<div class="media-left">
						<img src="<?php echo $this->session->userdata('img_perfil');?>" class="img-circle img-responsive">
					</div>
					<div class="media-body">
						<h4 class="media-heading"><?php echo $this->session->userdata('nombre')." ".$this->session->userdata('apellido_p')." ".$this->session->userdata('apellido_m');?></h4>
						<label>Correo: </label><?php echo $this->session->userdata('email');?><br>
						<label>Rol: </label><?php if($this->session->userdata('rol_id') == "1" ){ echo "Gerente"; } else { echo "Empleado";}?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>