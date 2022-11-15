<!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">

  <section>
   <h1>Lista
   <small>Usuarios</small>
   </h1>
  </section>

        
    <div class="page-breadcrumb ">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">




<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<!--<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

  <?php //echo form_open_multipart('Usuarios/agregarbd');?>-->
   

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

       <!-- <div class="modal-header" style="background:#c7060c; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Usuario</h4>

        </div>-->

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

       <!-- <div class="modal-body" style="background:#0c0d0c;">

          <div class="box-body" style="background:#cfcfcf;">-->

            <!-- ENTRADA PARA EL NOMBRE -->
            
           <!-- <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                
                <input type="text" class="form-control input-lg" name="nombre" placeholder="Ingresar nombre" required>

              </div>

            </div>-->

            <!-- ENTRADA PARA PRIMER APELLIDO-->
            
            <!--<div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input type="text" min="0" class="form-control input-lg" name="primerApellido" placeholder="primerApellido" required>

              </div>

            </div>-->
        <!-- ENTRADA PARA EL USUARIO -->

            <!-- <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="login" placeholder="Ingresar usuario" id="nuevoUsuario" required>

              </div>

            </div>-->

            <!-- ENTRADA PARA LA CONTRASEÑA -->

            <!-- <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="password" placeholder="Ingresar contraseña" required>

              </div>

            </div>-->

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

           <!-- <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input" name="tipo">
                  
                  <option value="">Selecionar Perfil</option>

                  <option value="admin">admin</option>

                  <option value="directorio">directorio</option>

                  <option value="maestro">maestro</option>

                </select>

              </div>

            </div>-->
   

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <!--<div class="modal-footer" style="background:#c7060c;">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Usuario</button>

        </div>

     <?php //echo form_close();?>

    

    </div>

  </div>

</div>-->




        
            </div>
              <div class="border-top">
               <div class="btn-group">
                   <button type="button" class="btn btn-success " onclick="location.href='listaxlsx'">Excel</button> 
                   <button type="button" class="btn btn-danger " >PDF</button> 
                  <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modalAgregarUsuario" data-dismiss="modal">Agregar Usuario</button> -->       
              </div>
           </div>     
        </div>
        <!-- /.col-lg-12 -->
    </div>
   
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->

           <div class="flash-data" data-flashdata="<?=$this->session->flashdata('correcto');?>"></div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">

          
                  <div class="table-responsive">

                    <table
                      id="zero_config"
                      class="table table-bordered table-hover">

                       <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Primer Apellido</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Perfil</th> 
                                <th scope="col">Estado</th>
                                <th scope="col">Fecha de registro</th>
                                <th scope="col">Modificar</th>
                                <th scope="col">Eliminar</th>
                                <th scope="col">Habilitar</th>
                                <th scope="col">Deshabilitar</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($usuario)):?>
                            <?php
                                $indice=1;
                                foreach ($usuario->result() as $row) 
                                {
                                    ?> 
                                    <tr>
                                        <th scope="row"><?php echo $indice;?></th>
                                       
                                         
                                    <td><?php echo fotosUsuario($row->foto);?></td>
                                    <td><?php echo $row->nombre;?></td>
                                    <td><?php echo $row->primerApellido;?></td>
                                    <td><?php echo $row->acceso;?></td>
                                    <td><?php echo $row->tipo;?></td>
                                    
                           
                       
                             
                            <?php 
                                if ($row->habilitado == 3)
                                {
                                    $style='class="label label-success"';
                                    echo "<td><p><span $style><font style='vertical-align: inherit;'>Activo</font></span></p>";

                                }
                                else 
                                {
                                    $style='class="label label-danger"';
                                    echo "<td><p><span $style><font style='vertical-align: inherit;'>Inactivo</font></span></p>";
                                }
                             ?>

                         
                             <td><?php echo formatearFecha($row->fechaRegistro);?></td> 
                          <td>   
                                            <?php echo form_open_multipart('Usuarios/modificar');?>
                                            <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario;?>">
                                            <input type="submit" name="buttony" value="Modificar" class="btn btn-primary"></input>
                                            <?php echo form_close();?>
                                            </td>    
                                           
                                            <td>  

                                            <?php echo form_open_multipart('Usuarios/eliminarbd');?>
                                            <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario;?>">
                                            <input type="submit" name="buttonx" value="Eliminar" class="btn btn-danger"></input>
                                            <?php echo form_close();?>
                                            </td>
                                             <td>   
                                            <?php echo form_open_multipart('Usuarios/habilitarbd');?>
                                            <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario;?>">
                                            <input type="submit" name="buttonz" value="Habilitar" class="btn btn-success"></input>
                                            <?php echo form_close();?>
                                            
                                            </td>     
                                              <td>   
                                            <?php echo form_open_multipart('Usuarios/deshabilitarbd');?>
                                            <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario;?>">
                                            <input type="submit" name="buttonz" value="Deshabilitar" class="btn btn-warning"></input>
                                            <?php echo form_close();?>
                                            
                                            </td>     
                    </tr>
                                    <?php
                                $indice++;
                                }
                            ?>
                        <?php endif; ?>
                        </tbody>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->


