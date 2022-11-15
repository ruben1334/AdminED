
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
   <small>CLASES Deshabilitadas</small>
   </h1>
  </section>
                </div>
                    <div class="border-top">
               <div class="btn-group">
                  <?php echo form_open_multipart('Clases/index');?>
                <button type="submit" class="btn btn-primary">Habilitados</button>
                <?php echo form_close();?><br>          
              </div>
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
                                <th scope="col">Nombre de la Clase</th>
                                <th scope="col">Fecha de registro</th>
                                <th scope="col">Fecha de Actualización</th>
                                <th scope="col"> Estado </th>
                                <th scope="col">Habilitar</th>
                              
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($clase)):?>
                            <?php
                                $indice=1;
                                foreach ($clase->result() as $row) 
                                {
                                    ?> 
                                    <tr>
                                        <th scope="row"><?php echo $indice;?></th>
                                       
                                    
                                        <td><?php echo $row->nombreClase;?></td>
                                        <td><?php echo formatearFecha($row->fechaRegistro);?></td>
                                        <td><?php echo formatearFecha($row->fechaActualizacion);?></td>
                            <?php 
                                if ($row->estado == 1)
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
                           
                                           
                                            <td>   
                                            <?php echo form_open_multipart('Clases/habilitarbd');?>
                                            <input type="hidden" name="idClase" value="<?php echo $row->idClase;?>">
                                            <input type="submit" name="buttonz" value="Habilitar" class="btn btn-warning"></input>
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


