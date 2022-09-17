<div class="page-breadcrumb btn-warning text-center">
    <div class="row">
        <div class="col-md-12">

        <h2>Modificar Maestro</h2><br>

        <?php
        foreach ($infomaestro->result() as $row) 
        {
            echo form_open_multipart('Maestros/modificarbd');
            ?>
             
    <center>
        <input type="hidden" name="idMaestro" placeholder="Ingrese su id"value="<?php echo $row->idMaestro; ?>"><br>
        <br><input type="text" name="nombre" placeholder="Ingrese su nombre" value="<?php echo $row->nombre; ?>"><br> 
        <br><input type="text" name="primerApellido" placeholder="Ingrese su apellido paterno" value="<?php echo $row->primerApellido; ?>"><br>
        <br><input type="text" name="segundoApellido" placeholder="Ingrese su apellido materno" value="<?php echo $row->segundoApellido; ?>"><br>
        <br><input type="date" name="fechaNacimiento" placeholder="Fecha de Nacimiento"  value="<?php echo $row->fechaNacimiento; ?>"><br>
      <br><h5>bautizado:
        <input type="radio" name="bautizado" value="<?php echo $row->bautizado; ?>"  id="Si" >
        <label for="Si">Si</label> 
        <input type="radio" name="bautizado" value="<?php echo $row->bautizado; ?>" id="No">
        <label for="No">No</label> 

        <br><input type="file" name="userfile"><br>

        <br><button type="submit" class=" btn btn-success">Modificar</button>
    </center>
            <?php

            echo form_close();

           
            
            
        }

        echo form_open_multipart('Estudiante/index');?>
       <br><input type="button"  class="btn btn-primary" name="Cancelar" value="Cancelar" onClick="location.href='index'"></input>
       <?php echo form_close();
        ?>

    
        </div>
    </div>
</div>
