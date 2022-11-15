
<?php 
    //var_dump($venta);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>REPORTE PEDIDOS</h1>
        </div>
        <div class="col-sm-6">
        
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>




    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">                                
                <div class="row p-3">
                <div class="col-md-7">
                  <h2 class="card-title">Tabla de reporte de Pedidos</h2>
                </div>
                  <div class="col-md-2">
                  <!--  <button type="button" class="btn btn-default float-right" id="daterange-btn" name="pedido-filtro-fecha">
                      <i class="far fa-calendar-alt"></i> 
                      Seleccionar Rango de fechas
                      <i class="fas fa-caret-down"></i>
                    </button>-->
                  <div class="input-group">
                        
                </div>
                </div>
               <!-- <div class="col-lg-3">
                  <div class="input-group">
                    <label>Desde</label>
                    <input type="date" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" id="reportrange" >
                     <label>Hasta</label>
                    <input type="date" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" id="reportrange" >
                    <button class="btn btn-outline-secondary" type="button" id="btn-buscar-ventas">Buscar</button>
                  </div>
                </div>-->
              </div>
                <div class="container text-left">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nº DE COMPROBANTE</th>
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
                  foreach ($pedido as $row) {
                    ?>
                        <tr>
                       <td scope="row"><?php echo $indice; ?></td>
                      <td><?php echo $row->nroComprobante; ?></td>
                      <td><?php echo $row->nombreUsuario; ?></td>
                      <td><?php echo $row->nombreMaestro; ?></td>
                      <td><?php echo $row->fecha; ?></td>
                      <td><?php echo $row->nombreMaterial; ?></td>
                      <td><?php echo $row->cantidad; ?></td>
                        
                        <!-- aumentar mas columnas -->            
                        </tr>
                    <?php
                    $indice++;
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->



</div>


<!-- jQuery -->
<script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(e) {
    var tbody = $("tbody");
    $("#btn-buscar-ventas").click(function() {
      var startDate = $('#daterange-btn').data('daterangepicker').startDate;
      var endDate = $('#daterange-btn').data('daterangepicker').endDate;
      var num = 1;
      var url = '<?= base_url() ?>index.php/reporte/buscarventaporfecha';
      $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: {
          startDate: startDate.format('YYYY-MM-DD'),
          endDate: endDate.format('YYYY-MM-DD')
        },
        success: function(r) {
          tbody.find('tr').remove();
          console.log(r);
          $(r).each(function(indice, valor) {
            tbody.append(
                '<tr>' +
                '<td>' + num + '</td>' +
                '<td>' + valor.nroComprobante + '</td>' +                
                '<td>' + valor.nombreCliente + '</td>' + 
                '<td>' + valor.nombre + '</td>' +  
                '<td>' + valor.precio + '</td>' +  
                '<td>' + valor.cantidad + '</td>' +                 
                '<td>' + valor.total + '</td>' +
                '<td>' + valor.fecha + '</td>' +                
                '<td>' + valor.nombreUsuario + '</td>' +
                '</tr>'
              );
              num++;
            });
        },
          error : function(xhr, status) {
            alert('Hay un error al obtener las ventas');
        },
      });
    });
  })
</script>
<!-- jQuery -->
<script src="/adminLte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/adminLte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminLte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminLte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/adminLte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/adminLte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/adminLte/plugins/jszip/jszip.min.js"></script>
<script src="/adminLte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/adminLte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/adminLte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/adminLte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/adminLte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminLte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminLte/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>