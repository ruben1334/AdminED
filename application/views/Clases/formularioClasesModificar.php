    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border btn-success">
  <h1 class="box-title"><i class="fa fa-th-large"></i> Clase </h1>

</div>
<!--box-header-->
<!--centro-->
 <?php
        foreach ($infoClase->result() as $row) 
        {
       ?>

         
              

<div class="panel-body" style="height: 400px;" id="formularioClases">
  <?php echo form_open_multipart('Clases/modificarbd');?>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Nombre de la Clase</label>
      <input type="hidden" class="form-control"  name="idUsuario" id="idUsuario" value="<?php echo $this->session->userdata('idusuario'); ?>">
       <input type="hidden" class="form-control"  name="idClase" id="idClase" value="<?php echo $row->idClase; ?>">
      <input class="form-control" type="text" name="nombreClase" id="nombreClase" maxlength="50" placeholder="Nombre de la clase"  value="<?php echo $row->nombreClase ?>" required>
    </div>
      

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button class="btn btn-primary" type="submit"  ><i class="fa fa-save"></i>Modificar</button>
      <button class="btn btn-danger" onclick="location.href='index'" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>

    </div>
    <?php  echo form_close();?>
    <?php 
      }
      ?> 
 
</div>
<!--fin centro-->
      </div>
      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
