<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">

        <div class="card card-primary mt-3">
          <div class="card-header btn-success">
            <label class="card-title"> <h1>Información de Clase</h1> </label>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <form method="post" id="add_create" name="add_create" action="<?= site_url('InfoClases/agregarbd') ?>">

              <div class="form-group">
                <label for="Clase" class="form-label" >Clase</label>
               

                 <select type="text" class="eliminarblanco"  name="nombreClase" id="nombreClase" required>

        <option value="">Clase...</option>
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

      

              
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="Asistencia" class="form-label">Cantidad de Asistencia</label>
                    <input id="Asistencia" type="number" name="cantAsistencia" class="form-control" placeholder="Cantidad total de Asistentes">
                  </div>
                  <div class="col-md-6">
                    <label for="cantBiblias" class="form-label">Cantidad de Biblias</label>
                    <input id="cantBiblias" type="number" name="cantBiblia" class="form-control" placeholder="Escriba la Cantidad de Biblias">
                  </div>
                </div>
              </div>
             <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label>Cantidad  de Ofrenda *</label>
                    <input type="number" name="cantOfrenda" class="form-control" placeholder="Cantidad de Ofrenda" minlength="6" required>
                  </div>
                  <div class="col-md-6">
                    <label>Cantidad de Nuevos Asistentes</label>
                    <input type="number" name="cantNuevos" class="form-control" placeholder="Cantidad de Nuevos">
                  </div>
                </div>
              </div>

             
           <div class="col-md-12">
            <label>Gestión</label>
            <input type="" name="gestion" class="form-control" placeholder="ingrese la Gestión Actual">
            </div>
             <input type="hidden" name="idUsuario" class="form-control" placeholder="ingrese idUsuario" value="<?php echo $this->session->userdata('idusuario'); ?>">
            <br><br>

              <p>(*) Campos obligatorios</p>
              <button type="submit" class="btn btn-primary">Registrar</button>
                <button class="btn btn-danger" onclick="location.href='index'" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


  <script type="text/javascript">
          $(".eliminarblanco").on('focus', function(event){
              $(this).find("option[value='']").remove();
          });
        </script> 
<!-- jQuery -->
<script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>