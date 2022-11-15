<div class="page-wrapper btn-warning text-center" style="color:black;">

 <h1>Modificar Maestro</h1>
 <br>
    <div class="row">
<div class="col-lg-6" style="background:#E8F836">
             <div class="card-body "style="color:black;">
           
   <section>

     <div class="row">
      <center>  
        <div class="col-lg-12 col-xs-12" >
  
       

        <?php
        foreach ($infomaestro->result() as $row) 
        {
        echo form_open_multipart('Maestros/modificarbd');?>
             
    
        
        <input type="hidden" name="tipo" placeholder="Tipo de Rol"value="<?php echo $row->tipo;?>" size="30">
        <input type="hidden" name="idUsuario" placeholder="Ingrese su id"value="<?php echo $row->idUsuario;?>">

  
</div>
<br><br>

                            <td><?php echo fotosUsuarioModificar($row->foto);?></td>
                            <br><br>
     <input type="file" name="userfile" value="<?php echo $row->foto;?>" ><br>
                                 
        <label>Nombre:</label>
        <input type="text" name="nombre" placeholder="Ingrese su nombre" value="<?php echo $row->nombre;?>" size="30" class="form-control input"><br> <br> 
   
  </center>
    
        </div>
       
    
</section> 

         </div> 


         </div> 

         <div class="col-lg-6">
               
         <section>

     <div class="row">
      <center>  
        <div class="col-lg-12 col-xs-12" style="background:#E8F836">


        <input type="hidden"  placeholder="Tipo de Rol"value="<?php echo $row->tipo;?>" size="30">
        <input type="hidden" name="idUsuario" placeholder="Ingrese su id"value="<?php echo $row->idUsuario;?>">
       <br>
        <label>Primer Apellido:</label>
        <input type="text" name="primerApellido" placeholder="Ingrese su primer apellido " value="<?php echo $row->primerApellido; ?>" size="30" class="form-control input">
       
        <label>Segundo Apellido:</label>
        <input type="text" name="segundoApellido" placeholder="Ingrese su segundo apellido " value="<?php echo $row->segundoApellido; ?>" size="30" class="form-control input">
       

       
       <label>Carnet de Identidad:</label>
        
        <input type="text" name="ci" placeholder="Ingrese su carnet de identidad" value="<?php echo $row->ci;?>" size="30" class="form-control input" required>
     
         <label>Fecha de Nacimiento:</label>
        
        <input type="date" name="fechaNacimiento" placeholder="Fecha de Nacimiento"  value="<?php echo $row->fechaNacimiento; ?>"class="form-control input">
    
      <br>
        <select type="text" id="bautizado" name="bautizado"  value="<?php echo $row->bautizado; ?>" required>

                    <option value="">Es Bautizado...</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
              

        </select>
          <input  style="width: 30px"  value="<?php echo $row->bautizado; ?>" size="30" readonly>
        <br>
        <label>Teléfono:</label>
        
        <input type="text" name="telefono" placeholder="Ingrese su telefono" value="<?php echo $row->telefono;?>" size="30" class="form-control input" required>
        <br>
       
        <select type="text"  name="aula" id="aula" >

        <option value="">Maestro de que Aula Es...</option>
                <?php 
               foreach($clase->result()as $row)
               {
               ?>
              <option value="<?php echo $row->nombreClase;?> "><?php echo $row->nombreClase;?></option>
               <?php 
                }
               ?> 
    
        </select>  
             <input style="width: 100px" type="text" name="nombreClase" value="<?php echo $row->nombreClase;?>" size="30"  readonly>                   
<br><br>
    
    
         </div>
         </center>
    </div>
</section> 

         </div> 


    </div>

         <p>(*) Campos obligatorios</p>           
              <button type="submit" class=" btn btn-primary">Modificar</button>
               <button class="btn btn-danger" onclick="location.href='index'" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
               <br><br>
     <?php echo form_close();           
                  
        }

   
        ?>

</div>


