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
       
 
   <h1>Lista MATERIALES Sin Stock</h1>
 
           
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
                   <button class="btn btn-danger" onclick="location.href='index'" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i>Volver</button>     
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
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre del Material</th>
                                <th scope="col">Stock </th>
                                <th scope="col">Unidad de Medida </th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha de registro</th>
                                <th scope="col">Fecha de Actualización</th>
                                <th scope="col">Habilitar</th>
                                <th scope="col">Aumentar Stock</th>
                              
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $indice=1;
                                foreach ($material->result() as $row) 
                                {
                                    ?> 
                                    <tr>
                                        <th scope="row"><?php echo $indice;?></th>

                                        <td><?php echo imagenMaterial($row->imagen);?>
                                        <td><?php echo $row->nombreMaterial;?></td>
                                        <td><?php echo $row->stock;?></td>
                                        <td><?php echo $row->unidadMedida;?></td>
                                        <td><?php echo $row->descripcion;?></td>
                                        <td><?php echo formatearFecha($row->fechaRegistro);?></td>
                                        <td><?php echo formatearFecha($row->fechaActualizacion);?></td>
                        <td>   
                        <?php echo form_open_multipart('Material/habilitarbd');?>
                        <input type="hidden" name="idMaterial" value="<?php echo $row->idMaterial;?>">
                        <input type="submit" name="buttonb" value="habilitar" class="btn btn-warning"></input>
                        <?php echo form_close();?>
                        </td> 
                         <td>   
                        <?php echo form_open_multipart('Material/modificar');?>
                        <input type="hidden" name="idMaterial" value="<?php echo $row->idMaterial;?>">
                       

                         <button type="submit" class="btn btn-success " >Aumentar Stock</button>
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

