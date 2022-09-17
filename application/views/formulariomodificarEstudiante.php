<div class="page-breadcrumb btn-warning text-center">
    <div class="row">
        <div class="col-md-12">

        <h2>Modificar Estudiante</h2><br>

        <?php
        foreach ($infoestudiante->result() as $row) 
        {
            echo form_open_multipart('Estudiante/modificarbd');?>
             
    <center>
    <input type="hidden" name="idEstudiante" placeholder="Ingrese su id"   value="<?php echo $row->idEstudiante; ?>"><br>
    <br><input type="text" name="nombre"placeholder="Ingrese su nombre" value="<?php echo $row->nombre; ?>"><br>
    <br><input type="text" name="primerApellido" placeholder="Ingrese su apellido paterno" value="<?php echo $row->primerApellido;?>"><br>
    <br><input type="text" name="segundoApellido" placeholder="Ingrese su apellido materno" value="<?php echo $row->segundoApellido; ?>"><br>
    <br><input type="date" name="fechaNacimiento"placeholder="Ingrese fecha de nacimiento " value="<?php echo $row->fechaNacimiento; ?>"><br>
    <br><h5>bautizado:
        <input type="radio" name="bautizado" value="<?php echo $row->bautizado; ?>"  id="Si" >
        <label for="Si">Si</label> 
        <input type="radio" name="bautizado" value="<?php echo $row->bautizado; ?>" id="No">
        <label for="No">No</label> 
        </h5>

        <input type="text" name="padres"placeholder="Ingrese nombre de los padres" value="<?php echo $row->padres; ?>"><br>
        <br><input type="text" name="NumeroReferencia"placeholder="Numero telefónico de referencia" value="<?php echo $row->NumeroReferencia; ?>"><br>
    <br><input type="file" name="userfile"><br>
    <br><button type="submit" class=" btn btn-success">Modificar</button>
            </center>
            <?php
            echo form_close();

          echo form_open_multipart('Estudiante/index');?>
       <br><input type="button"  class="btn btn-primary" name="Cancelar" value="Cancelar" onClick="location.href='index'"></input>
       <?php echo form_close();
        }
         ?>

    
        </div>
    </div>
</div>
