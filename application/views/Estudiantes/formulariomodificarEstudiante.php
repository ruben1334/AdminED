<div class="page-wrapper btn-warning text-center" style="color:black;">

 <h1>Modificar Estudiante</h1>
 <br>
 <div class="row">
   <div class="col-lg-6" style="background:#E8F836">      
   <section>
     <div class="row">
      <center>  
         <div class="col-lg-12 col-xs-12" >
  
             <?php
        foreach ($infoestudiante->result() as $row) 
        {
        echo form_open_multipart('Estudiante/modificarbd');?>
             
    <br>
        <td><?php echo fotosEstudianteModificar($row->foto);?></td>
                        
    <input type="hidden" name="idEstudiante" placeholder="Ingrese su id"   value="<?php echo $row->idEstudiante; ?>"><br>
     <br><input type="file" name="userfile">
    <br>
    <label>Nombre:</label>
    <input type="text" name="nombre"placeholder="Ingrese su nombre" class="form-control input" value="<?php echo $row->nombre; ?>">
 <label>Primer Apellido:</label>
    <input type="text" name="primerApellido" placeholder="Ingrese su priner apellido " class="form-control input" value="<?php echo $row->primerApellido;?>">
    <br>
      
         </div> 
        </center>
      </div> 
    </section> 
 </div>

  <div class="col-lg-6">         
    <section>
      <div class="row">
        <center>  
          <div class="col-lg-12 col-xs-12" style="background:#E8F836">


    <br>
    <br>
   
    
    <label>Segundo Apellido:</label>
    <input type="text" name="segundoApellido" placeholder="Ingrese su segundo apellido" class="form-control input" value="<?php echo $row->segundoApellido; ?>">
   
    
    <label>Fecha de Nacimiento:</label>
    <input type="date" name="fechaNacimiento"placeholder="Ingrese fecha de nacimiento " class="form-control input" value="<?php echo $row->fechaNacimiento; ?>">
   <br>
  
                <select type="select" id="bautizado" name="bautizado"   value="<?php echo $row->bautizado; ?>" required>
                    <option value="">Usted es Bautizado...</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
               </select>
               <input  style="width: 30px"  value="<?php echo $row->bautizado; ?>" size="30" readonly>
 <br>
    <label>Nombre de los Padres:</label>
        <input type="text" name="padres"placeholder="Ingrese nombre de los padres" class="form-control input" value="<?php echo $row->padres; ?>"><br>
       
        <label>Numero de Referencia:</label>
        <input type="text" name="NumeroReferencia"placeholder="Numero telefónico de referencia" class="form-control input" value="<?php echo $row->NumeroReferencia; ?>"><br>
    
    <select type="text"  name="idClase" id="clase" required>

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
         <input style="width: 100px" type="text" name="nombreClase" value="<?php echo $row->nombreClase;?>" size="30"  readonly>   
    <br><br><br>
          </div>
        </center>
      </div>
    </section> 
  </div> </div>

<div>
  <br>
             <p>(*) Campos obligatorios</p>           
              <button type="submit" class=" btn btn-primary">Modificar</button>
               <button class="btn btn-danger" onclick="location.href='index'" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
               <br><br>
     
     <?php echo form_close();           
                  
        }
        ?>
</div>



