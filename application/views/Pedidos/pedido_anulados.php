<!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
 


            
              
   



    <div class="page-wrapper">


  <section>
   <h1>Lista de Pedidos Deshabilitados </h1>
  </section>

        
    <div class="page-breadcrumb ">
        <div class="row align-items-center">
            
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
   <section >
   <h1>  <button class="btn btn-danger" onclick="location.href='index'" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i>Volver</button>
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

          
                  <div class="table-responsive">

                    <table
                      id="zero_config"
                      class="table table-bordered table-hover">

                                    <thead>
                  <tr>
                    <th>#</th>
                    <th>USUARIO QUE REALIZÓ...</th>                    
                    <th>MAESTRO QUE SOLICITÓ...</th>
                    <th>FECHA DE PEDIDO</th>
                    <th>MATERIALES</th>
                    <th>CANTIDAD</th>
                  
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $indice = 1;
                  foreach ($pedido->result() as $row) {
                  ?>
                    <tr>
                      <td scope="row"><?php echo $indice; ?></td>
                   <td><?php echo $row->nombreUsuario; ?></td>
                      <td><?php echo $row->nombreMaestro; ?></td>
                      <td><?php echo $row->fecha; ?></td>
                      <td><?php echo $row->nombreMaterial; ?></td>
                      <td><?php echo $row->cantidad; ?></td>                   
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


