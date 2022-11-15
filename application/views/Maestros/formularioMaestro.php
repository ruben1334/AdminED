 <div class="content-wrapper">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">

        <div class="card card-primary mt-3">
          <div class="card-header btn-warning">
            <label class="card-title"><h1>Agregar Maestro</h1></label>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

      <?php echo form_open_multipart('Maestros/agregarbd');?>
<input type="hidden" name="tipo" placeholder="Tipo de Rol" value="maestro" size="30"required>
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
                      <label>Carnet de Identidad</label>
                    <br>

                    <input type="text" name="ci" placeholder="Ingrese su carnet de identidad" size="30" required>

    
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="nombre" class="form-label">Es Bautizado el Maestro...</label>
                    <br>
          <select type="tex"  name="bautizado" id="bautizado" required>

        <option value="">  Es Bautizado...</option>
        <option value="Si">Si</option>
        <option value="No">No</option>
    
        </select> 
                  </div>
                  <div class="col-md-6">
                    <label for="nombre" class="form-label">Número de Telefono/Célular</label>
       <input type="text" name="telefono" placeholder="Ingrese su telefono/célular" size="30" required>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                 <label>Maestro de que Aula es... </label>
                    <br>

     <select type="text"  name="aula"  required>

        <option value="">Aula...</option>
                <?php 
               foreach($clase->result()as $row)
               {
               ?>
              <option value=" <?php echo $row->nombreClase;?>"><?php echo $row->nombreClase;?></option>

               <?php 
                }
               ?> 
    
        </select>
                  </div>
                  <div class="col-md-6">
                    <label for="nombre" class="form-label">Subir Foto</label>
                   <input type="file" name="userfile" id><br><br>
                  </div>
                </div>
              </div> 

               <input 
        hidden  
        name="idUsuario" 
        placeholder=" ID encargado"   
        value="<?php echo $this->session->userdata('idusuario'); ?>">

              
              <p>(*) Campos obligatorios</p>           
              <button type="submit" class=" btn btn-primary">Agregar Maestro</button>
               <button class="btn btn-danger" onclick="location.href='index'" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
           <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


