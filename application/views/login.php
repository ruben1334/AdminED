<section class="ftco-section">
<div class="container" >
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-4">
				<div class="login-wrap p-0">
					<h1 class="mb-4 text-center">Login</h1>
					<?php
						switch($msg)
						{
							case '1':
							$mensaje="Gracias por usar el sistema";
							break;
							case '2':
							$mensaje="Usuario no identificado";
							break;	
							case '3':
							$mensaje="Acceso denegado - Favor inicie sesion";
							break;
							default:
							$mensaje="";
						}
						?>
						<h2 class="text-center"><?php echo $mensaje; ?></h2>

						<?php
						echo form_open_multipart('Usuarios/validar',array('id'=>'form1'))
						?>
						<div class="mb-3">
							<input type="text" name="login" class="form-control" placeholder="Login" >
						</div>

						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Contraseña" >
						</div>
						<div class="form-group">
							<button type="submit" class="form-control btn btn-primary submit px-3">Iniciar Sesion</button>
						</div>
					<?php
					echo form_close();
					?>

				</div>
			</div>
		</div>
</div>
	</section>
