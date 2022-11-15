<?php
$nombreU = &get_instance();
$nombreU->load->model('pedido_model');
$cantidadPedidos = $nombreU->pedido_model->contarPedidos();

?>

<script type="text/javascript">

  var baseurl = '<?php echo base_url();?>';

  function calcularSubtotales() {

    var cant = document.getElementsByName("cantidad[]");
    var prec = document.getElementsByName("precio_pedido[]");
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
  function alerta() {
    var opcion = confirm("¿Esta seguro que quiere continuar?");
    if (opcion == true) {
      var sub = document.getElementsByName("subtotal[]");
      if (sub.length > 0) {
        document.formulario1.submit();
        location.reload();
        limpiaCampo();
      } else {
        alert("No se selecciono ningun material");
      }
    }
  }

function limpiaCampo() {
    var montoTotal = document.getElementsByName("montoTotal");
    montoTotal.value = 0;
 }
</script>


<div class="page-wrapper table-responsive">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col col-lg-12">
        <div class="card card-primary mt-3">
          <div class="card-header">
            <label class="card-title">
              <h1>Solicitar Pedido</h1>
            </label>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <div clas="row">

                <div class="form-group row">

                  <div class="col-md-3">
                    <div class="form-group row">
                      <label for="">MAESTRO DE AULA...</label>
                      <div class="input-group">
                        <input type="text" name="clase" id="nombre-clase" class="form-control" minlength="6" required disabled placeholder="Nombre de la Clase">
                      </div>


                    
                    </div>
                  </div>

                  <div class="col-md-3">

                    <label for="">NOMBRE COMPLETO DEL MAESTRO:</label>
                    <div class="input-group">
                      <input type="text" name="nombreMaestro" id="nombre-maestro" class="form-control" minlength="6" required disabled>
                    </div>
                  </div>

                     <div class="col-md-3">
                      <br>
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modal-lista-maestros">
                          <span class="fas fa-search"> </span>
                          Buscar Maestro
                        </button>
                      </div>

                    <div class="col-md-3">
                       <label for="">NRO. DE COMPROBANTE:</label>
                      <input type="text" class="form-control" name="nroComprobante" value="<?php echo $cantidadPedidos + 1 ?>" readonly>
                    </div>
                </div>


              </div>

            </div>

          </div>
         <!-- <?php //echo form_open_multipart('Pedido/crearPedido'); ?>-->









    <form method="post" id="formulario1" name="formulario1" action="<?php echo base_url().'index.php/Pedido/crearPedido'; ?>">
          <div class="form-group">

          </div>

          <div class="col-md-12">
            <div class="form-group row">
              <div class="col-md-3">
                <label for="">FECHA DE SOLICITUD:</label>
                <input type="text" class="form-control" name="fecha" value="<?php echo date('Y-m-d'); ?>" readonly>
                <input type="hidden" id="idMaestro" name="idMaestro" value=¨¨>
                <input type="hidden" id="idClase" name="idClase" value=¨¨>
                <input type="hidden" class="form-control" name="nroComprobante" value="<?php echo $cantidadPedidos + 1 ?>" readonly>
               
              </div>
              <div class="col-sm-4">
                <label for="">SELECCIONAR MATERIAL:</label>
                <select class="form-control select2" name="idarticuloSelect" id="exampleFormControlSelect2" style="width: 100%;">
                  <!-- <select name="idarticuloSelect" class="js-example-basic-single w-100" id="exampleFormControlSelect2"> -->
                  <option value="">Seleccionar Material</option>
                  <?php
                  foreach ($material  as $row) {
                    $nombreU = &get_instance();
                    $nombreU->load->model('Pedido_model');
                    $preciopedido = $nombreU->pedido_model->precioPedido($row['idMaterial']);

                  ?>
                    <option value="<?php echo $row['idMaterial'] . '*' . $row['nombreMaterial'] . '*' . $row['imagen'] . '*' . $preciopedido . '*' . $row['stock']; ?>">
                      <?php echo $row['nombreMaterial'] ?>
                    </option>
                  <?php } ?>
                </select>

              </div>
              <div class="col-sm-2">
                <br>
                <button type="button" name="agregar" id="agregar" class="btn btn-primary"><span class="fas fa-cart-plus"></span> Agregar Material</button>


                <script type="text/javascript">
                  var baseurl = "<?php echo base_url(); ?>";
                  //value del select en data
                  var data = '';
                  var cont = 0;
                  var mat = [];
                  document.getElementById('exampleFormControlSelect2').onchange = function() {
                    console.log(this.value);
                    /* Referencia al option seleccionado */
                    var mOption = this.options[this.selectedIndex];

                    /* Referencia a los atributos data de la opción seleccionada */
                    var mData = mOption.dataset;
                    var combo = document.getElementById('exampleFormControlSelect2');
                    data = combo.value;
                    console.log(data);
                    //alert(data);
                  }; //fin del onchange
                  document.getElementById("agregar").onclick = function() {
                    console.log('llega');

                    if (data != '') {
                      //alert(data);
                      urlImagen = baseurl + 'uploads/materiales/';
                      console.log(urlImagen);


                      infomaterial = data.split("*");
                      //alert(insertarProducto(infomaterial[0]));
                        var puede = 0;
              if (insertarMaterial(infomaterial[0])) {
                const nameMa= document.querySelector('#nombre-maestro').value;
                const nameClase= document.querySelector('#nombre-clase').value;
html = '<tr class="filas" id="fila'+cont+'">';
html += "<td><input type='hidden'  name='nombreMaestro[]' value='"+nameMa+"'><input type='hidden'  name='nombreClase[]' value='"+nameClase+"'><p><input type='hidden' name='idarticulo[]' value='"+infomaterial[0]+"'>"+infomaterial[1]+"</p></td>";
html += "<td><p><img width='50' src='"+urlImagen+infomaterial[2]+"'></p></td>";
html += "<td><p><input type='hidden' name='stock[]' value='"+(infomaterial[4])+"'><span name='stock_text[]'>"+(infomaterial[4])+"</span></p></td>";
html += "<td><p><input type='number' name='cantidad[]' value='1'  size='10px'></p></td>";
<?php if ($this->session->userdata('tipo')=='admin') {?>
html += "<td><p><input type='number' name='precio_pedido[]' step='1.0' size='10px' value='"+infomaterial[3]+"'>"+"</p></td>";
  <?php
 }else{
?>
html += "<td><p><input type='number' name='precio_pedido[]' size='10px' value='"+infomaterial[3]+"' readonly>"+"</p></td>";
<?php } ?>
html += "<td><p><input type='number' name='subtotal[]' id='subtotal[]' value='0' size='10px' readonly  >&nbsp<button class='btn btn-primary' type='button' id='btnGuardar' onclick='calcularSubtotales()' ><i class=' fas fa-dollar-sign menu-icon'></i></button></p></td>";
html += "<td class='text-center'><p><button type='button' class='btn btn-danger btn-remove-producto btn-sm' onclick='eliminarDetalle("+cont+")'><span class='fa fa-times'></span> </button></p></td>";
html += "</tr>";
                            cont++;
                        //agregando a la tabla
                 $("#tborden tbody").append(html);
                 mat.push(infomaterial[0]);
                console.log(mat);

                      }
                    } else {
                      alert("Seleccione un material...");
                    }
                  };

                  function eliminarDetalle(indice) {
                    $("#fila" + indice).remove();
                    mat.splice(indice, 1);
                  }

                  function insertarMaterial(idMaterial) {
                    var existencia = 0;

                    for (var el of mat) {
                      if (el === idMaterial) {
                        exitencia++;
                        //alert('Hola');
                        break;
                      }
                    }
                    //alert(existencia);
                    if (cont == 0) {
                      //alert('contador '+cont);
                      return true;
                    } else {
                      if (existencia == 0) {
                        return true;
                      } else {
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
                <th>Material</th>
                <th>Imagen</th>
                <th>Cantidad Disponible</th>
                <th>Cantidad a Pedir </th>
                <th>Precio unitario</th>
                <th>Sub Total</th>
                <th>Quitar Material</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
              <tr>
                 <th colspan="5" class="text-right"><p>Monto Total (Bs)</p></th>
                      <td>
                        <p><input type="text" name="montoTotal" id="montoTotal" value="0" size="10px" width="10" readonly></p>
                        <!-- <p><input type="text" name="montoTotal" id="montoTotal" value="0" size="10px" readonly disabled="true" ></p> -->
                        <!-- <p><label for="" type="text" name="montoTotal" id="montoTotal" size="10px" readonly>0</label></p> -->
                      </td>

              </tr>
            </tfoot>

          </table>

          <!--<a href="javascript:alerta()" class="btn btn-primary">Guardar Venta</a>-->
          <button type="submit" class="btn btn-primary">Guardar Pedido</button>


          <a href="<?php echo base_url();
                    'Inicio/index'; ?>" class="btn btn-light">Cancelar</a>
            </form>
         <!-- <?php //echo form_close(); ?>-->

        </div>
      </div>
    </div>
  </div>
</div>
</div>







<div class="modal fade" id="modal-lista-maestros">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Lista de Maestros</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
        <table id="zero_config" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre del Maestro</th>
              <th>Clase</th>
              <th>Seleccionar</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($maestro)) { ?>
              <?php
              $indice = 1;
              foreach ($maestro->result() as $row) { ?>
                <tr>
                  <th scope="row"><?php echo $indice; ?></th>
                  <td><?php echo $row->nombre; ?></td>
                  <td><?php echo $row->aula; ?></td>

                  <?php $datamaestro = $row->idUsuario . '*' . $row->nombre . '*' . $row->primerApellido . '*' . $row->segundoApellido . '*'. $row->aula  ?>

                  <td class="text-center">
                    <input type="radio" class="chkclass " id="Maestro_id" value=<?php echo $datamaestro ?> name=selectedMaestro />

                   <!-- <button type="button" class="btn btn-success btn-check  btn-xs" value="<?php //echo $datamaestro; ?>"><span class="fa fa-check"></span></button> 
                              <button type="button" class="btn btn-success btn-xs" value="<?php //echo $datamaestro; ?>"><span class="fas fa-arrow-alt-circle-right"></span></button>-->                              
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
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-crear-Maestros">
          Crear nuevo Maestro
        </button>
        <!-- <div class="text-center">
                <a href="<?php //echo base_url() . 'index.php/Maestro/agregar'; ?>" class="btn btn-success" >Crear nuevo Cliente</a>
              </div> -->
        <button type="button" id="maestro-confirm" class="btn btn-primary pull-left" data-dismiss="modal">Seleccionar Maestro</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>







<!-- /.modal -->
<div class="modal fade" id="modal-crear-Maestros">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Maestro</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
        <form method="post" id="add_create" name="add_create" action="<?= base_url('Maestro/agregar') ?>">

          <div class="form-group">
            <label for="nombre" class="form-label">Nombre *</label>
            <input id="nombre" type="text" name="nombres" class="form-control" placeholder="Escriba el Nombre" required>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="nombre" class="form-label">Primer Apellido</label>
                <input id="primerAp" type="text" name="primerApellido" class="form-control" placeholder="Escriba el primer Apellido">
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
                <label>Carnet de identidad</label>
                <input type="text" name="ci" placeholder="Ingrese su carnet de identidad" size="30" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label>Fecha de Nacimiento</label>
                <input type="date" name="fechaNacimiento" placeholder="Ingrese su fecha de Nacimiento" minlength="1" maxlength="2" class="form-control" required>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label>Es bautizado..</label>
                <select type="text" name="bautizado" id="bautizado" class="form-control" required>

                  <option value="">Usted es Bautizado...</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>

                </select>
              </div>
              <div class="col-md-6">
                <label>Telefono</label>
                <input type="text" name="telefono" class="form-control" placeholder="Escriba el numero de telefono">
              </div>

            </div>
          </div>





          <p>(*) Campos obligatorios</p>
          <button type="submit" class="btn btn-primary">Crear Maestro</button>

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
<!--<script src="<?php //echo base_url(); ?>/assets/plugins/jQuery/jquery.min.js"></script>-->

<script type="text/javascript">
  $(document).ready(function(e) {


    $("#maestro-confirm").click(function() {
      var result = [];
      var tableControl = $("#example1");

      $('input[name="selectedMaestro"]:checked').each(function() {
        console.log(this.value);
        var arrayNombre = this.value.split("*");

        $("#nombre-clase").val(arrayNombre[4]);
        $("#nombre-maestro").val(arrayNombre[0]);
        const id= arrayNombre[0];
        const idCl= arrayNombre[4];
        console.log(id);
        console.log(idCl);
        $("#nombre-maestro").val(arrayNombre[1] + " " + arrayNombre[2] + " " + arrayNombre[3]);
        
        document.querySelector("#idMaestro").value = id;
        document.querySelector("#idClase").value = idCl;
      });

    });

  });
</script>