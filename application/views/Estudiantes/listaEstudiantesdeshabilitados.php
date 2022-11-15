      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">



        
    <div class="page-breadcrumb ">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
    <section >
   <h1>Estudiantes
   <small>DESHABILITADOS</small>
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
                  <?php echo form_open_multipart('Estudiante/index');?>
                <button type="submit" class="btn btn-primary">Ver Estudiantes habilitados</button>
                <?php echo form_close();?>         
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
                                <th scope="col">Primer Apellido</th>
                                <th scope="col">Segundo Apellido</th>
                                <th scope="col">Fecha de Nacimiento</th>
                                <th scope="col">Bautizado (SI/No)</th>
                                <th scope="col">Padres</th>
                                <th scope="col">Nº de referencia</th>
                                <th scope="col">Encargado de Registro </th>
                                <th scope="col">Fecha de registro</th>
                                <th scope="col">FechaActualización</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $indice=1;
                                foreach ($estudiante->result() as $row) 
                                {
                                    ?> 
                                    <tr>
                                    <th scope="row"><?php echo $indice;?></th>
                                            <td><?php echo fotosEstudiante($row->foto);?></td>
                                            <td><?php echo $row->nombre;?></td>
                                            <td><?php echo $row->primerApellido;?></td>
                                            <td><?php echo $row->segundoApellido;?></td>
                                            <td><?php echo formatearFecha($row->fechaNacimiento);?></td>
                                            <td><?php echo ($row->bautizado);?></td>
                                            <td><?php echo ($row->padres);?></td>
                                            <td><?php echo ($row->NumeroReferencia);?></td>
                                             <td><?php echo $this->session->userdata('nombre'); ?>
                                                <?php echo $this->session->userdata('tipo'); ?>
                                            </td>
                                            <td><?php echo formatearFecha($row->fechaRegistro);?></td>
                                            <td><?php echo formatearFecha($row->fechaActualizacion);?></td>
                                            
                                            <td>
                                            <?php echo form_open_multipart('Estudiante/habilitarbd');?>
                                            <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante;?>">
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

