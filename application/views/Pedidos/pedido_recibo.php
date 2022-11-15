<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col col-lg-12">
        <div class="card card-primary mt-3">
          <div class="card-header">
            <label class="card-title">Generar Recibo</label>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
            <table id="example2" class="table table-sm table-bordered" >
                <thead>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>SUBTOTAL</th>
                </thead>
                <tbody id="tabla-detalle">
                
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>


<script type="text/javascript">
    
    $(function () {
        var tituloReporte = "COMPROBANTE DE PEDIDO";
        var autor = "Escuela Domincal"
        $("#example2").DataTable({
          dom: 'Bfrtip',
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "searching": true,
          "retrieve": true,
    
          "buttons": [{
            extend: 'pdfHtml5',
            title: tituloReporte.toUpperCase(),
            bom: true,
            pageSize: "LETTER",
            customize: function ( doc ) {
              doc.content.splice( 0, 0, obtenerImagenCabecera() );
              var today = getDate()
              var objFooter = {};
              objFooter['alignment'] = 'center';
              doc['footer'] = function(currentPage, pageCount) {
                var footer = [
                  {
                    alignment: 'left',
                    stack: [
                      {
                        text: '' + autor,
                        color: 'grey',
                        alignment: 'left',
                        margin:[20, 5, 0, 0]
                      },
                      {
                        text: today,
                        color: 'grey',
                        fontSize: 8,
                        alignment: 'left',
                        margin:[20, 2, 0, 0]
                      }
                    ]
                  },
                  {
                    stack: [
                      {
                        text: 'Pagina ' + currentPage + " de " + pageCount,
                        alignment: 'right',
                        color: 'grey',
                        fontSize: 8,
                        margin:[0, 2, 20, 0]
                      }
                    ]
                  }
                ];
                objFooter['columns'] = footer;
                return objFooter;
              };
            }
          }]
    }).buttons().container().appendTo('#example2_filter .col-sm-6:eq(0)'); 

    })

    function getDate() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    if(dd < 10){
        dd = '0' + dd
    }
    if(mm < 10){
        mm = '0' + mm
    }
    return dd + '/' + mm + '/' + yyyy;
  }

  function obtenerImagenCabecera() {
    return {
      margin: [ 0, 0, 0, 12 ],
      alignment: 'right',
      width: 100,
      image: 'data:image/png;base64,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'
    }
  }

</script>