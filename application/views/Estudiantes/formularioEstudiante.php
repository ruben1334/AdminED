<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">

        <div class="card card-primary mt-3">
          <div class="card-header btn-warning">
            <label class="card-title"><h1>Agregar Estudiantes</h1></label>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

     <?php echo form_open_multipart('Estudiante/agregarbd');?>

              <div class="form-group">
                <label for="nombre" class="form-label">Nombre</label>
                 <input  class="col-md-12"    
        type="text" 
        name="nombre" 
        placeholder="Ingrese su nombre" 
        size="30" 
        required>
              </div>              

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="nombre" class="form-label">Primer Apellido</label>
                   <input 
        type="text" 
        name="primerApellido" 
        placeholder="Ingrese su Primer Apellido " 
        size="30"
        required>
                  </div>
                  <div class="col-md-6">
                    <label for="nombre" class="form-label">Segundo Apellido</label>
                    
        <input 
        type="text" 
        name="segundoApellido" 
        placeholder="Ingrese su Segundo Apellido " 
        size="30"
        required>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label>Fecha de Nacimmiento </label>
                    <br>
                    <input 
        type="date" 
        name="fechaNacimiento" 
        placeholder="Ingrese su fecha de Nacimiento" 
        minlength="1" 
        maxlength="2" 
        required>
                  </div>
                  <div class="col-md-6">
                      <label>Es Bautizado...</label>
                    <br>

     <select type="tex"  name="bautizado" id="bautizado" required>

        <option value=""> Es Bautizado el Esctudiante...</option>
        <option value="Si">Si</option>
        <option value="No">No</option>
    
        </select> 
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="nombre" class="form-label">Padres</label>
                    <br>
                     <input 
        type="text" 
        name="padres" 
        placeholder="Ingrese nombre de los padres" 
        size="30" 
        required>
                  </div>
                  <div class="col-md-6">
                    <label for="nombre" class="form-label">Numero de Referencia</label>
                    <input   
        type="text" 
        name="NumeroReferencia"
        placeholder="Numero telefónico de referencia" 
        size="30" 
        required>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                 <label>Clase </label>
                    <br>

     <select type="text"  name="idClase" id="idClase" required>

        <option value="">Pertenece a la Clase...</option>
                <?php 
               foreach($clase->result()as $row)
               {
               ?>
              <option value=" <?php echo $row->idClase;?>"><?php echo $row->nombreClase;?></option>

               <?php 
                }
               ?> 
    
        </select>
                  </div>
                  <div class="col-md-6">
                    <label for="nombre" class="form-label">Subir Foto</label>
                   <input 
        type="file" 
        name="userfile" >
                  </div>
                </div>
              </div> 

               <input 
        hidden  
        name="idUsuario" 
        placeholder=" ID encargado"   
        value="<?php echo $this->session->userdata('idusuario'); ?>">

              
              <p>(*) Campos obligatorios</p>           
              <button type="submit" class=" btn btn-primary">Agregar Estudiante</button>
               <button class="btn btn-danger" onclick="location.href='index'" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
           <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


