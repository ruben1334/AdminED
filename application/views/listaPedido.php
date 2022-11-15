<div class=" page-wrapper container table-responsive">    
  <section class="btn-warning">
   <h1>Lista
   <small>PEDIDOS</small>
   </h1>
  </section>
  <section class="content">
      <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                       <a href="<?php echo base_url();?>index.php/Pedido/cinsertar" class="btn btn-primary btn-flat"><span  class="fa fa-plus">Agregar Pedido</span></a> 
                    </div>
                </div>
                <div class="flash-data" data-flashdata="<?=$this->session->flashdata('correcto');?>"></div>
                <hr>
                <div class="row">
                     <div class="col-md-12">
                          <table id="zero_config" class="table table-bordered table-hover">
                                  <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre del Maestro</th>
                                <th scope="col">Nombre del Encargado</th>
                                <th scope="col">Fecha </th>
                                <th scope="col">Nombre del Material</th>
                               <th scope="col">Cantidad </th>
                                <th scope="col">Acciones</th>
                              
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
                    
                      <!-- btn imprimir recibo -->
                      <td class="text-center">
                        <a href="<?php echo base_url().'Pedidos/notaDePedido/'.$row->idPedidoMaterial;?>" class="btn btn-dark btn-xs" target="_blank">                          
                          <i class="fas fa-file-pdf"></i>
                        </a>                       
                      </td>    
                      <!-- btn eliminar -->
                      <td class="text-center">
                        <a href="#"
                          title="Estado Persona" class="btn btn-danger btn-xs" onClick="return confirm_modal_eliminar(<?php echo $row->idPedidoMaterial; ?>,0)">
                          <i class="fas fa-ban"></i>
                        </a>
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
  </section>
 
</div>
