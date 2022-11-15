<?php
$nombreU = &get_instance();
$nombreU->load->model('pedido_model');
$cantidadPedido = $nombreU->pedido_model->contarPedido();

?>

<script type="text/javascript">

  var baseurl = '<?php echo base_url();?>';

  function calcularSubtotales() {

    var cant = document.getElementsByName("cantidad[]");
    var prec = document.getElementsByName("precio_venta[]");
    var sub = document.getElementsByName("subtotal[]");

    //Actualizar stock
    var stock = document.getElementsByName("stock[]");
    var text = document.getElementsByName("stock_text[]");

    var total1=0;
    for (var i = 0; i <cant.length; i++) {
      sub[i].value=(cant[i].value * prec[i].value);
      total1 += (cant[i].value * prec[i].value);

      //stock
      text[i].innerHTML = stock[i].value - cant[i].value;
    }
    //
    montoTotal.value = total1;
    
  }

  function calcularTotales(){
    var sub = document.getElementsByName("subtotal");
    var montoTotal = document.getElementsByName("montoTotal");
    var total = 0.0;

    for (var i = 0; i <sub.length; i++) {
    total += document.getElementsByName("subtotal")[i].value;
    }
    montoTotal.value = total;
  }
</script>
<script type="text/javascript">

  function alerta()
  {
    var opcion = confirm("¿Esta seguro que quiere continuar?");
    if (opcion == true) {
      var sub = document.getElementsByName("subtotal[]");
      if (sub.length>0) {
        document.formulario1.submit();
        location.reload();
        limpiaCampo();
      }else{
        alert("No se selecciono ningun producto");
      }
    }
  }

  function limpiaCampo() {
    var montoTotal = document.getElementsByName("montoTotal");
    montoTotal.value = 0;
  }
</script>


<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col col-lg-12">
        <div class="card card-primary mt-3">
          <div class="card-header">
            <label class="card-title">Generar Venta</label>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group" >
              <div clas="row">
                
                <div class="form-group row" >
                 
                  <div class="col-md-2" >
                    <div class="form-group row" > 
                      <label for="">Nit o Carnet de identidad</label>
                      <div class="input-group">                                                                  
                        <input type="text" name="carnetCliente" id="carnet-cliente" class="form-control" minlength="6" required disabled placeholder="NIT o carnet de identidad">
                      </div>                    
                    </div>
                  </div>   
                  <div class="col-md-6" >
                    <label for="">Nombre/s o Razon Social</label>
                    <div class="input-group">                                            
                      <input type="text" name="nombreCliente" id="nombre-cliente" class="form-control" minlength="6" required disabled>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lista-clientes">
                        <span class="fas fa-search"> </span>
                          Buscar Cliente
                      </button>
                    </div>                    
                  </div>   
                </div>
                         
              </div>
              
            </div>

            <form method="post" id="formulario1" name="formulario1" action="<?php echo base_url().'Venta/crearVenta'; ?>">
              <div class="form-group">
              
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <label for="">Fecha de venta:</label>
                    <input type="text" class="form-control" name="fecha"  value="<?php  echo date('Y-m-d');?>" readonly>
                    <input type="hidden" id="idCliente" name="idCliente">
                    <input type="hidden" name="nroComprobante" value="<?php echo $cantidadVentas ?>">
                  </div>
                  <div class="col-sm-5">
                    <label for="">Seleccionar productos:</label>
                    <select class="form-control select2" name="idarticuloSelect" id="exampleFormControlSelect2"  style="width: 100%;">
                    <!-- <select name="idarticuloSelect" class="js-example-basic-single w-100" id="exampleFormControlSelect2"> -->
                      <option value="">Seleccionar Producto</option>
                      <?php $i = 1; foreach ($productos  as $row) {
                        $ciU = &get_instance();
                        $ciU->load->model('Venta_model');
                        $precioventa = $ciU->Venta_model->precioVenta($row['idProducto']);
                        ?>
                        <option value="<?php echo $row['idProducto'].'*'.$row['nombre'].'*'.$row['img'].'*'.$precioventa.'*'.$row['stock']; ?>">
                          <?php echo $row['nombre']; ?>
                        </option>
                      <?php } ?>
                    </select>
                    
                  </div>
                  
                  <div class="col-sm-2">                  
                    <br>
                    <button type="button" name="agregar" id="agregar" class="btn btn-primary" ><span class="fas fa-cart-plus"></span> Agregar Producto</button>
                    <script type="text/javascript">
                      var baseurl = "<?php echo base_url(); ?>";
                      var data='';
                      var cont=0;
                      var product =[];
                      document.getElementById('exampleFormControlSelect2').onchange = function() {
                        /* Referencia al option seleccionado */
                        var mOption = this.options[this.selectedIndex];
                        /* Referencia a los atributos data de la opción seleccionada */
                        var mData = mOption.dataset;
                        var combo = document.getElementById('exampleFormControlSelect2');
                        data = combo.value;
                        //alert(data);
                      }; //fin del onchange
                      document.getElementById("agregar").onclick = function() {
                        if (data !='') {
                          //alert(data);
                          urlImagen = baseurl+'fotos/productos/';
                          infoproducto = data.split("*");
                          //alert(insertarProducto(infoproducto[0]));
                          var puede = 0;
                          if (insertarProducto(infoproducto[0])) {
                            html = '<tr class="filas" id="fila'+cont+'">';
                            html += "<td><p><input type='hidden' name='idarticulo[]' value='"+infoproducto[0]+"'>"+infoproducto[1]+"</p></td>";
                            html += "<td><p><img src='"+urlImagen+infoproducto[2]+"'></p></td>";
                            html += "<td><p><input type='hidden' name='stock[]' value='"+(infoproducto[4])+"'><span name='stock_text[]'>"+(infoproducto[4])+"</span></p></td>";
                            html += "<td><p><input type='text' name='cantidad[]' value='0'  size='10px'></p></td>";
                            <?php if ($this->session->userdata('s_rol')=='Administrador') {?>
                              html += "<td><p><input type='number' name='precio_venta[]' step='1.0' size='10px' value='"+infoproducto[3]+"'>"+"</p></td>";
                              <?php
                            }else{
                              ?>
                              html += "<td><p><input type='text' name='precio_venta[]' size='10px' value='"+infoproducto[3]+"' readonly>"+"</p></td>";
                            <?php } ?>
                            html += "<td><p><input type='text' name='subtotal[]' id='subtotal[]' value='0' size='10px' readonly  >&nbsp<button class='btn btn-primary' type='button' id='btnGuardar' onclick='calcularSubtotales()' ><i class='fa fa-strikethrough menu-icon'></i></button></p></td>";
                            html += "<td class='text-center'><p><button type='button' class='btn btn-danger btn-remove-producto btn-sm' onclick='eliminarDetalle("+cont+")'><span class='fa fa-times'></span> </button></p></td>";
                            html += "</tr>";
                            cont++;
                            $("#tborden tbody").append(html);
                            product.push(infoproducto[0]);
                          }
                        }else{
                          alert("Seleccione un producto...");
                        }
                      };
                      function eliminarDetalle(indice){
                        $("#fila" + indice).remove();
                        product.splice(indice, 1);
                      }

                      function insertarProducto(idProducto){
                        var existencia = 0;

                        for (var el of product) {
                          if (el === idProducto) {
                            exitencia++;
                            //alert('Hola');
                            break;
                          }
                        }
                        //alert(existencia);
                        if (cont==0) {
                          //alert('contador '+cont);
                          return true;
                        }else{
                          if (existencia==0) {
                            return true;
                          }else{
                            return false;
                          }
                        }
                      }
                    </script>
                  </div>
                </div>
              </div>
              
                <table class="table table-hover table-bordered" id="tborden">
                  <thead>
                    <tr>
                      <th>Producto</th>
                      <th>Foto</th>
                      <th>Cantidad Disponible</th>
                      <th>Cantidad a comprar (m³)</th>
                      <th>Precio Unitario</th>
                      <th>Sub Total</th>
                      <th>Quitar Producto</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="5" class="text-right"><p>Monto Total (Bs)</p></th>
                      <td>
                        <p><input type="text" name="montoTotal" id="montoTotal" value="0" size="10px" readonly disabled="true" ></p>
                      </td>
                      <td></td>
                    </tr>
                  </tfoot>
                </table>
              <!--<a href="javascript:alerta()" class="btn btn-primary">Guardar Venta</a>-->
              <button type="submit" class="btn btn-primary" >Guardar venta</button>
              <a href="<?php echo base_url().'ventas'; ?>" class="btn btn-light">Cancelar</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="modal-lista-clientes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
            <h4 class="modal-title">Lita de Clientes</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre/s o Razon Social</th>
                      <th>Nit o CI</th>
                      <th>Seleccionar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($clientes)) {?>                        
                      <?php 
                        $indice = 1;
                        foreach($clientes->result() as $cliente) {?>
                          <tr>
                            <th scope="row"><?php echo $indice; ?></th>      
                            <td><?php echo $cliente->nombres;?></td>
                            <td><?php echo $cliente->nit_carnet;?></td>
                            <?php $datacliente = $cliente->idCliente.'*'.$cliente->nombres.'*'.$cliente->primerApellido.'*'.$cliente->segundoApellido.'*'.$cliente->nit_carnet ?>
                            
                            <td class="text-center">
                              <input type="radio"  class="chkclass " id="cliente_id" value=<?php echo $datacliente ?> name=selectedCliente />
                              
                              <!--<button type="button" class="btn btn-success btn-check  btn-xs" value="<?php echo $datacliente;?>"><span class="fa fa-check"></span></button> 
                              <button type="button" class="btn btn-success btn-xs" value="<?php echo $datacliente;?>"><span class="fas fa-arrow-alt-circle-right"></span></button>                                -->
                            </td>
                          </tr>                            
                      <?php 
                      $indice++;
                      }
                      ?>
                    <?php } ?>
                  </tbody>
                </table>
            </div>

            <div class="modal-footer">    
<!--             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lista-clientes">
                        Buscar Cliente
                      </button>      -->     
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-crear-clientes">
                Crear nuevo Cliente
              </button>
              <!-- <div class="text-center">
                <a href="<?php echo base_url().'index.php/cliente/agregar';?>" class="btn btn-success" >Crear nuevo Cliente</a>
              </div> -->
              <button type="button" id="client-confirm" class="btn btn-primary pull-left" data-dismiss="modal">Seleccionar Cliente</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- /.modal -->
<div class="modal fade" id="modal-crear-clientes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
            <h4 class="modal-title">Agregar Cliente</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body">
              <form method="post" id="add_create" name="add_create" action="<?= site_url('cliente/crearClienteVenta') ?>">

                <div class="form-group">
                  <label for="nombre" class="form-label">Nombre/s o Razon Social *</label>
                  <input id="nombre" type="text" name="nombres" class="form-control" placeholder="Escriba el Nombre" required>
                </div>              

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="nombre" class="form-label">Primer Apellido</label>
                      <input id="primerAp" type="text" name="primerApellido" class="form-control" placeholder="Escriba el Primer Apellido">
                    </div>
                    <div class="col-md-6">
                      <label for="nombre" class="form-label">Segundo Apellido</label>
                      <input id="segundoAp" type="text" name="segundoApellido" class="form-control" placeholder="Escriba el segundo Apellido">
                    </div>
                  </div>
                </div> 

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label>NIT o Carnet de Identidad *</label>
                      <input type="text" name="nit_carnet" class="form-control" placeholder="Escriba su numero de carnet de identidad" minlength="6"  required>
                    </div>
                    <div class="col-md-6">
                      <label>Telefono</label>
                      <input type="text" name="telefono" class="form-control" placeholder="Escriba el numero de telefono">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Direccion</label>
                  <input type="text" name="direccion" class="form-control" placeholder="Escriba la dirección">
                </div>
                <p>(*) Campos obligatorios</p>    
                <button type="submit" class="btn btn-primary">Crear Cliente</button>       
                
              </form>
            

            </div>

            <div class="modal-footer">    


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



 <!-- jQuery -->
 <script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(e) {
   

    $("#client-confirm").click(function() {
      var result = [];
      var tableControl = $("#example1");
      
      $('input[name="selectedCliente"]:checked').each(function() {
        console.log(this.value);
        var arrayNombre = this.value.split("*");
        $("#nombre-cliente").val(arrayNombre[1] + " " + arrayNombre[2] + " " +arrayNombre[3] );
        $("#carnet-cliente").val(arrayNombre[4] );
        $("#idCliente").val(arrayNombre[0]);
      });

    });
  });
</script>