    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title"><i class="fa fa-th-large"></i> Clase </h1>

</div>
<!--box-header-->
<!--centro-->

<div class="panel-body" style="height: 400px;" id="formularioClases">
  <?php echo form_open_multipart('Clases/agregarbd');?>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Nombre de la Clase</label>
      <input type="hidden" class="form-control"  name="idUsuario" id="idUsuario" value="<?php echo $this->session->userdata('idusuario'); ?>">
      <input class="form-control" type="text" name="nombreClase" id="nombreClase" maxlength="50" placeholder="Nombre de la clase"  required>
    </div>
      

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button>
      <button class="btn btn-danger" onclick="location.href='index'" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>

    </div>
    <?php  echo form_close();?>
    
 
</div>
<!--fin centro-->
      </div>
      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
