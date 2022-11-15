<script type="text/javascript">
  function confirm_modal_eliminar(id, activo) {
    var url = '<?php echo base_url() . "Pedido/eliminarDetallePedido/"; ?>';
    $("#url-delete").attr('href', url + id + '/' + activo);
    jQuery('#modal-4').modal('show', {
      backdrop: 'static'
    });

  }
</script>



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
   <h1>Lista de Pedidos</h1>
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
                         <a href="<?php echo base_url() . 'index.php/Pedido/agregar'; ?>" class="btn btn-primary"><i class="fas fa-plus-square"></i> Solicitar nuevo Pedido</a> 
                          <a href="<?php echo base_url() . 'index.php/Pedido/anulados'; ?>" class="btn btn-warning"><i class=" fas fa-ban"></i>Pedidos deshabilitados</a>        
              </div>
           </div>
            <hr>
                  <div class="table-responsive">

                    <table
                      id="zero_config"
                      class="table table-bordered table-hover">

                     <thead>
                  <tr>
                    <th>#</th>
                    <th>Nº DE COMPROBANTE</th>
                    <th>USUARIO QUE REALIZÓ...</th>
                    <th>MAESTRO QUE SOLICITÓ...</th>
                    <th>FECHA DE PEDIDO</th>
                    <th>MATERIALES</th>
                    <th>CANTIDAD</th>
                    <th>IMPRIMIR RECIBO</th>
                    <th>ANULAR PEDIDO</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $indice = 1;
                  foreach ($pedido->result() as $row) {
                  ?>
                    <tr>
                      <td scope="row"><?php echo $indice; ?></td>
                      <td><?php echo $row->nroComprobante; ?></td>
                      <td><?php echo $row->nombreUsuario; ?></td>
                      <td><?php echo $row->nombreMaestro; ?></td>
                      <td><?php echo $row->fecha; ?></td>
                      <td><?php echo $row->nombreMaterial; ?></td>
                      <td><?php echo $row->cantidad; ?></td>

                      <!-- btn imprimir recibo -->
                      <td class="text-center">
                        <a href="<?php echo base_url() .'index.php/Pedido/notaDePedido/' . $row->idPedido; ?>" class="btn btn-dark btn-xs" target="_blank">
                          <i class="fas fa-file-pdf"></i>
                        </a>
                      </td>
                      <!-- btn eliminar -->
                      <td class="text-center">
                        <?php echo form_open_multipart('pDetalle/deshabilitarPedidoBd'); ?>
                        <input type="hidden" name="idPedido" value="<?php echo $row->idPedido; ?>">
                        <input type="submit" name="buttonz" value="Anular" class="btn btn-danger"></input>
                        <?php echo form_close(); ?>
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


<!--//Modal Confirmacion Eliminar-->
<!-- Modal -->
<div class="modal fade" id="modal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anular Venta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro que desea Anulas la venta?.
      </div>
      <div class="modal-footer">
        <a href="#" id="url-delete" class="btn btn-success btn-sm"><i class="fa fa-check">&nbsp;</i>Aceptar</a>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times">&nbsp;</i>Cerrar</button>
      </div>
    </div>
  </div>
</div>