 <div class="page-wrapper">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">

        <div class="card card-primary mt-3">
          <div class="card-header btn-warning">
            <label class="card-title"><h1>Agregar Nuevo Material</h1></label>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

     <?php echo form_open_multipart('Material/agregarbd');?>
<input  name="idMaterial" placeholder=" id Material" class="form-control" >
              <div class="form-group">
          <label for="nombre">Nombre del material</label>
          <input type="text" name="nombreMaterial" placeholder="Material" class="form-control" required><br>
              </div>              

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
              <label for="nombre">Cantidad</label>
              <input type="text" name="stock" placeholder="Cantidad" class="form-control"required>
                  </div>
                  <div class="col-md-6">
             <label for="nombre">Unidad de medida</label>
             <input type="text" name="unidadMedida" placeholder="Unidad de Medida" class="form-control" required>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
              <label for="nombre">Descripción</label>
              <input type="text" name="descripcion" placeholder="Descripción" class="form-control" required>
                  </div>
                  <div class="col-md-6">
             <label for="nombre">Precio Unitario</label>
              <input type="text" name="precio" placeholder="Precio Unitario" class="form-control" required>
                  </div>
                </div>
              </div>
           <label for="nombre" class="form-label">Subir Foto</label>
                   <input type="file" name="userfile" >

               <input 
        hidden  
        name="idUsuario" 
        placeholder=" ID encargado"   
        value="<?php echo $this->session->userdata('idusuario'); ?>">

              
              <p>(*) Campos obligatorios</p>           
              <button type="submit" class=" btn btn-primary">Agregar Material</button>
               <button class="btn btn-danger" onclick="location.href='index'" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
           <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


