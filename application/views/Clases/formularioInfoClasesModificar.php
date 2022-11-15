<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">

        <div class="card card-primary mt-3">
          <div class="card-header btn-warning">
            <label class="card-title"><h1>Modificar Material</h1></label>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
    <?php
        foreach ($infoClased->result() as $row) 
        {

      echo form_open_multipart('InfoClases/modificarbd');?>


    <div class="form-group">
          <label for="nombre">Aula</label>
  
    <input type="text" name="nombreClase" placeholder="Cantidad de Asistentes" value="<?php echo $row->nombreClase;?>">
              </div> 

              <div class="form-group">
          <label for="nombre">Cantidad de Asistencia</label>
    <input type="hidden" name="idClase" placeholder="Ingrese su id"value="<?php echo $row->idClase;?>">
    <input type="text" name="cantAsistencia" placeholder="Cantidad de Asistentes" value="<?php echo $row->cantAsistencia;?>">
              </div>              

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
              <label for="nombre">Cantidad de Biblias </label><br>
           <input type="text" name="cantBiblia" placeholder="cantidad Biblias" value="<?php echo $row->cantBiblia; ?>">
                  </div>
                  <div class="col-md-6">
             <label for="nombre">Cantidad de Ofrenda</label>
           <input type="text" name="cantOfrenda" placeholder="Ingrese la unidad de medida" value="<?php echo $row->cantOfrenda; ?>">
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
              <label for="nombre">Cantidad de Nuevos</label>
              <input type="text" name="cantNuevos" placeholder=" Cantidad Nuevos"  value="<?php echo $row->cantNuevos; ?>">
                  </div>
                  <div class="col-md-6">
                   <label for="nombre" class="form-label">Gestion</label>
                   <input type="text" name="gestion" placeholder="Ingrese la unidad de medida" value="<?php echo $row->gestion; ?>" >
             
                  </div>
                </div>
              </div>
           
               <input 
        hidden  
        name="idUsuario" 
        placeholder=" ID encargado"   
        value="<?php echo $this->session->userdata('idusuario'); ?>">

              
              <p>(*) Campos obligatorios</p>           
              <button type="submit" class=" btn btn-primary">Modificar</button>
               <button class="btn btn-danger" onclick="location.href='index'" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
           <?php echo form_close();?>
         <?php 
                }
               ?> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


