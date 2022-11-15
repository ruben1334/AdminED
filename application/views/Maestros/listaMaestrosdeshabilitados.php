<!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">



        
    <div class="page-breadcrumb ">
        <div class="row align-items-center">
            
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
   <section >
   <h1>Lista
   <small>Maestros Deshabilitados</small>
   </h1>
  </section>
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

            <div class="border-top">
               <div class="btn-group">
                <?php echo form_open_multipart('Maestros/index');?>
                <button type="submit" class="btn btn-primary">Ver maestros habilitados</button>
                <?php echo form_close();?><br>          
              </div>
           </div>
            <hr>
                  <div class="table-responsive">

                    <table
                      id="zero_config"
                      class="table table-bordered table-hover">

                                   <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Primer Apellido </th>
                                <th scope="col">Segundo Apellido </th>
                                <th scope="col">Fecha de nacimiento</th>
                                <th scope="col">Bautizado(Si/No)</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Clase</th>
                                <th scope="col">FechaRegistro</th>
                                <th scope="col">FechaActualización</th>
                                 <th scope="col">Habilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $indice=1;
                                foreach ($maestro->result() as $row) 
                                {
                                    ?> 
                                    <tr>
                                        <th scope="row"><?php echo $indice;?></th>

                                            <td><?php echo fotosUsuario($row->foto);?></td>
                                            <td><?php echo $row->nombre;?></td>
                                            <td><?php echo $row->primerApellido;?></td>
                                            <td><?php echo $row->segundoApellido;?></td>
                                            <td><?php echo formatearFecha($row->fechaNacimiento);?></td>
                                            <td><?php echo ($row->bautizado);?></td>
                                            <td><?php echo ($row->telefono);?></td>
                                            <td><?php echo ($row->aula);?></td>
                                            <td><?php echo formatearFecha($row->fechaRegistro);?></td>
                                            <td><?php echo formatearFecha($row->fechaActualizacion);?></td>
                                            <td>
                                            <?php echo form_open_multipart('Maestros/habilitarbd');?>
                                            <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario;?>">
                                            <input type="submit" name="buttonb" value="habilitar" class="btn btn-warning"></input>
                                            <?php echo form_close();?>
                                            </td>              
                                   </tr>
                                    <?php
                                $indice++;
                                }
                            ?>
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

