<section class="ftco-section">
<div class="container">
	<center>
		<div class="row justify-content-center col-md-4"style="background:#ff9800">
			<div class="col-md-12 " style="background:#900c3f">
				<div class="login-wrap p-0">
					<h1 class="mb-4 text-center">ACCESO</h1>
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
						echo form_open_multipart('Acceso/validar',array('id'=>'form1','class'))
						?>
						<div class="form-group">
							<input type="text" name="acceso" class="form-control" placeholder="Login" >
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
					</center>
</div>
	</section>
