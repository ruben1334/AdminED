<div class="page-breadcrumb btn-warning text-center">
    <div class="row">
        <div class="col-md-12">

        <h2>Agregar Estudiante</h2><br>

        <?php echo form_open_multipart('Estudiante/agregarbd');?>

        
        <input type="text" name="nombre" placeholder="Ingrese su nombre" size="30" required><br>
        <br><input type="text" name="primerApellido" placeholder="Ingrese su apellido paterno" size="30"required><br>
        <br><input type="text" name="segundoApellido" placeholder="Ingrese su apellido materno" size="30"required><br>
        <br><input type="date" name="fechaNacimiento" placeholder="Ingrese su fecha de Nacimiento" minlength="1" maxlength="2" required><br>
        <br><h5>bautizado:
          <input type="radio" name="bautizado" value="Si" id="Si" >
          <label for="Si">Si</label> 
          <input type="radio" name="bautizado" value="No" id="No">
           <label for="No">No</label> 
        </h5>
        <input type="text" name="padres" placeholder="Ingrese nombre de los padres" size="30" required><br>
        <br><input type="text" name="NumeroReferencia" placeholder="Numero telefónico de referencia" size="30" required><br>
       <br><input type="file" name="userfile" ><br><br>

        <br><button type="submit" class=" btn btn-primary">Agregar Estudiante</button>  <br>
        
        <?php form_close();?>

      <?php echo form_open_multipart('Estudiante/index');?>
       <br><input type="button"  class="btn btn-success" name="Cancelar" value="Cancelar" onClick="location.href='index'"></input>
       <?php echo form_close();?>

        </div>


    </div>
   
</div>
