<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Material</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>


<div class="container ">    
    <div class="row">
         <div class="col-lg-4">
         	<div class="card">
             <div class="card-body ">
           <form action="" method="POST">
           	     <div class="form-group">
           	     	  <label for="nombre">Nombre del material</label>
                       <input type="text" name="nombreMaterial" id="nombreMaterial" placeholder="Material" class="form-control" required><br>
           	     </div>
           	     <div>
           	     	     <label for="nombre">cantidad</label>
                          <input type="text" name="stock" id="stock" placeholder="Cantidad" class="form-control"required>
           	     </div>
           	     <div>
           	     	     <label for="nombre">Unidad de medida</label>
                          <input type="text" name="unidadMedida" id="unidadMedida" placeholder="Unidad de Medida" class="form-control" required>
           	     </div>
                  <div>
                  	      <label for="nombre">Descripción</label>
                          <input type="text" name="descripcion" id="descripcion" placeholder="Descripción" class="form-control" required>
             
                  </div> 
                  <div>
                  	
                          <input type="button" value="registrar"  class="btn btn-primary btn-block">
                  </div>         	

           </form>
                         
                 
                     <br><button type="submit" class=" btn btn-primary">Registrar </button>  <br>
           
                    </center>
                    	</div>
                   </div>
               	</div> 
             </div> 
         </div> 

         <div class="col-lg-8">
                <table class="table table-hover table-responsive">
                        <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre del Material</th>
                                <th scope="col"> Stock </th>
                                <th scope="col"> Unidad de Medida </th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha de registro</th>
                                <th scope="col">Fecha de Actualización</th>
                                <th scope="col">Modificar</th>
                                <th scope="col">Eliminar</th>
                                <th scope="col">Deshabilitar</th>
                            </tr>
                        </thead>
                        <tbody>


	</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>