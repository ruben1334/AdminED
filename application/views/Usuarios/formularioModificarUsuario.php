
<div class="page-wrapper btn-warning text-center" style="color:black;">

 <h1>Modificar Usuario</h1>
 <br>
    <div class="row">
<div class="col-lg-6" style="background:#E8F836">
             <div class="card-body "style="color:black;">
           
   <section>

     <div class="row">
      <center>  
        <div class="col-lg-12 col-xs-12" >
  
       

        <?php
        foreach ($infousuario->result() as $row) 
        {
        echo form_open_multipart('Usuarios/modificarbd');?>
        
        <input type="hidden" name="tipo" placeholder="Tipo de Rol"value="<?php echo $row->tipo;?>" size="30">
        <input type="hidden" name="idUsuario" placeholder="Ingrese su id"value="<?php echo $row->idUsuario;?>">
       </div>

        <td><?php echo fotosUsuarioModificar($row->foto);?></td>
  <br>
        <label>Nombre:</label>
        <input type="text" name="nombre" placeholder="Ingrese su nombre"  class="form-control input"value="<?php echo $row->nombre;?>" size="30"><br> <br> 
   
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

        <input type="hidden" name="tipo" placeholder="Tipo de Rol"value="<?php echo $row->tipo;?>" size="30">
        <input type="hidden" name="idUsuario" placeholder="Ingrese su id"value="<?php echo $row->idUsuario;?>">
        <br><br>
        <label>Primer Apellido:</label>
        <input type="text" name="primerApellido" placeholder="Ingrese su primer apellido " value="<?php echo $row->primerApellido; ?>" class="form-control input" size="30">
     
    
        <label>Login:</label>
        
        <input type="text" name="acceso" placeholder="Ingrese su login" value="<?php echo $row->acceso;?>" size="30"class="form-control input"  required>      

     <label>Password:</label>
        
        <input type="password" name="password" placeholder="Ingrese su password"  size="30" class="form-control input" required>

       
         
    <label for="nombre">Rol:</label>
<select  class="form-control input" name="tipo">
                  
    <option value="">Selecionar Perfil</option>
    <option value="admin">admin</option>
    <option value="directorio">directorio</option>
    <option value="maestro">maestro</option>

</select>
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














































<!--<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">

        <div class="card card-primary mt-3">
          <div class="card-header btn-success">
            <label class="card-title"><h1>Modificar Usuario</h1></label>
          </div>-->
          <!-- /.card-header -->
          <!--<div class="card-body">
    <?php
        //foreach ($infousuario->result() as $row) 
        {

      //echo form_open_multipart('Usuarios/modificarbd');?>
         <center><?php //echo fotosUsuarioModificar($row->foto);?></center>
       <input type="hidden" name="tipo" placeholder="Tipo de Rol"value="<?php //echo $row->tipo;?>" size="30">
        <input type="hidden" name="idUsuario" placeholder="Ingrese su id"value="<?php //echo $row->idUsuario;?>">
              <div class="form-group">
          <label >Nombre del Usuario:</label>
        <input type="text" name="nombre" placeholder="Ingrese su nombre" value="<?php //echo $row->nombre;?>" class="form-control" size="30">
              </div>    
               <div class="form-group">
           <label >Primer Apellido:</label>
       <input type="text" name="primerApellido" placeholder="Ingrese su primer apellido " value="<?php //echo $row->primerApellido; ?>" class="form-control"size="30">

               </div>           

<div class="form-group">
    <label for="nombre">Login:</label> 
    <input type="text" name="acceso" placeholder="Ingrese su login" value="<?php //echo $row->acceso;  ?>"  class="form-control">

  </div> 

  <div class="form-group">
 <label for="nombre">Password:</label>
 <input  type="password" name="password" placeholder="Password"class="form-control">
  </div> 

<div class="form-group">
<label for="nombre">Rol:</label>
<select  class="form-control input" name="tipo">
                  
    <option value="">Selecionar Perfil</option>
    <option value="admin">admin</option>
    <option value="directorio">directorio</option>
    <option value="maestro">maestro</option>

</select>

</div> 

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
         
                  </div>
                  <div class="col-md-6">
           
                  </div>
                </div>
              </div> 
          
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
              
                  </div>
                  <div class="col-md-6">
                   
             
                  </div>
                </div>
              </div>
         

               <input 
        hidden  
        name="idUsuario" 
        placeholder=" ID encargado"   
        value="<?php //echo $this->session->userdata('idusuario'); ?>">

              
              <p>(*) Campos obligatorios</p>           
              <button type="submit" class=" btn btn-primary">Modificar</button>
               <button class="btn btn-danger" onclick="location.href='index'" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
           <?php //echo form_close();?>
         <?php 
                }
               ?> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>-->













































