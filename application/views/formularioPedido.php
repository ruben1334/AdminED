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

  <section class="content-header">

    <h1>

      Solicitar Pedido

    </h1>



  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->

<form method="post" id="formulario1" name="formulario1" action="<?php echo base_url().'index.php/Pedido/crearPedido'; ?>">
      <div class="col-lg-6 col-xs-12">

        <div class="box box-success ">

          <div class="box-header with-border"></div>



          <div class="box-body">

            <div class="box">

              <!--=====================================
                ENTRADA DEL USUARIO
                ======================================-->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control" id="idUsuario" value="<?php echo $this->session->userdata('nombre'); ?>" readonly required>


                </div>

              </div>

              <!--=====================================
                ENTRADA DEL CÓDIGO
                ======================================-->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-key"></i></span>

                  <input type="text" class="form-control" name="nroComprobante" value="<?php echo $cantidadPedidos + 1 ?>" readonly>



                </div>

              </div>

              <!--=====================================
                ENTRADA DE LA FECHA
                ======================================-->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                  <input type="text" class="form-control" name="fecha" value="<?php echo date('Y-m-d'); ?>" readonly>



                </div>

              </div>

              <!--=====================================
                ENTRADA DEL MAESTRO
                ======================================-->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                 <!--<label for="">MAESTRO DE AULA...</label>-->
                      <div class="input-group">
                        <input type="text" name="clase" id="nombre-clase" class="form-control" minlength="6" required disabled placeholder="Nombre de la Clase">
                      </div><br>
               <!-- <label for="">NOMBRE COMPLETO DEL MAESTRO:</label>-->
                    <div class="input-group">
                      <input type="text" name="nombreMaestro" id="nombre-maestro" class="form-control" minlength="6" required disabled placeholder="Nombre Completo del Maestro">

                    </div>
                    
                </div>
                <br>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modal-lista-maestros">
                          <span class="fas fa-search"> </span>
                          Buscar Maestro
                        </button>
                
                <button type="button" class="btn btn-success   pull-right" data-toggle="modal" data-target="#modalAgregarMaestro" data-dismiss="modal">Crear Nuevo Maestro</button>

              </div><br>

              <!--=====================================
                ENTRADA PARA AGREGAR MATERIAL
                ======================================-->
              <hr>
              <div class="form-group row nuevoMaterial">

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
                        <p><input type="text" name="montoTotal" id="montoTotal" value="0" size="10px" readonly></p>
                        <!-- <p><input type="text" name="montoTotal" id="montoTotal" value="0" size="10px" readonly disabled="true" ></p> -->
                        <!-- <p><label for="" type="text" name="montoTotal" id="montoTotal" size="10px" readonly>0</label></p> -->
                      </td>

              </tr>
            </tfoot>

          </table>

              </div>

              <input type="hidden" id="listaMaterial" name="listaMaterial">

              <!--=====================================
                BOTÓN PARA AGREGAR MATERIAL
                ======================================-->

              <!--<button type="button" name="agregar" id="agregar" class="btn btn-primary"><span class="fas fa-cart-plus"></span> Agregar Material</button>-->

             


               


                

              <div class="row">

                <div class="col-xs-8 pull-right">



                </div>

              </div>

              <hr>



              <br>

            </div>

          </div>

          <div class="box-footer">
            <!--   <a  target="_blank" href="<?php// echo base_url(); ?>index.php/Pedido/listapdf">
                    <button  class="btn btn-danger btn-block " >PDF</button>
                   </a> -->
           

               <button type="submit" class="btn btn-primary">Guardar Pedido</button>


          <a href="<?php echo base_url();'Pedido/index'; ?>" class="btn btn-light">Lista de Pedidos</a>
            
          </div>

        

       

        </div>

      </div>

      <!--=====================================
      LA TABLA DE MATERIALES
      ======================================-->

      <div class="col-lg-6  col-xs-12">

        <div class="box box-warning">

          <div class="box-header with-border"></div>

          <div class="box-body">

            <table id="zero_config" class="table table-bordered table-striped dt-responsive">

              <thead>

                <tr>
                  <th style="width: 10px">#</th>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Unidad de Medida</th>
                  <th>Stock</th>
                  <th>Acciones</th>

                </tr>

              </thead>

              <tbody>
                <?php if (!empty($materiales)) : ?>

                  <?php
                  $indice = 1;
                  foreach ($materiales->result() as $row) {
                 //  $nombreU = &get_instance();
                  //  $nombreU->load->model('Pedido_model');
                   // $preciopedido = $nombreU->pedido_model->precioPedido($row['idMaterial']);
                  ?>
                    <tr id="exampleFormControlSelect2" >
                      <th scope="row"><?php echo $indice; ?></th>
                      <td><?php echo imagenMaterial($row->imagen); ?></td>
                      <td><?php echo $row->nombreMaterial; ?></td>
                      <td><?php echo $row->unidadMedida; ?></td>
                      <?php
                      if ($row->stock == 0) {
                        $style = 'style="background-color:#f2dede; border-left: 5px solid #c23321; vertical-align:middle; textalign:center;"';
                      } else if ($row->stock > 0 and $row->stock <= 10) {
                        $style = 'style="background-color:#faf2cc; border-left: 5px solid #f0ad4e; vertical-align:middle; text-align:center;"';
                      } else {
                        $style = 'style="background-color:#dff0d8; border-left: 5px solid #4cae4c; vertical-align:middle; text-align:center;"';
                      }
                      echo "<td $style>$row->stock</td>";
                      ?>
                        
                      <td>
                         
                       
                       <!-- <?php $datamaterial = $row->idMaterial . "*" . $row->nombreMaterial . "*" ?>-->

                        <!--<button type="button" class="btn btn-success btn-Agregar" value="<?php echo $datamaterial; ?>" >
                     <span class="fa fa-check"></span> </button> -->

                        
                  <button type="button" name="agregar" id="agregar" class="btn btn-warning"  value="<?php echo $row->idMaterial . '*' . $row->nombreMaterial . '*' . $row->imagen . '*' . $row->precio . '*' . $row->stock; ?>"><span class="fas fa-cart-plus"></span> Agregar </button>
                      
                      </td>


                    </tr>
                  <?php
                    $indice++;
                  }
                  ?>
                <?php endif; ?>
              </tbody>

            </table>




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
html += "<td><input type='hidden'  name='nombreMaestro[]' value='"+nameMa+"'><p><input type='hidden' name='idarticulo[]' value='"+infomaterial[0]+"'>"+infomaterial[1]+"</p></td>";
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
      </form>

    </div>

  </section>

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
        <table id="zero_config" class="table table-bordered table-hover">
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





<!--=====================================
MODAL AGREGAR MAESTRO
======================================-->

<div id="modalAgregarMaestro" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <?php echo form_open_multipart('Maestros/agregarmodalbd'); ?>


      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header" style="background:#c7060c; color:white">

        <button type="button" class="close " data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Maestro</h4>

      </div>

      <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body" style="background:#0c0d0c;">

        <div class="box-body" style="background:#cfcfcf;">

          <!-- ENTRADA PARA EL NOMBRE -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" name="nombre" id="nombre" placeholder="Ingresar nombre" required>

            </div>

          </div>

          <!-- ENTRADA PARA PRIMER APELLIDO-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-users"></i></span>

              <input type="text" class="form-control input-lg" name="primerApellido" placeholder="primerApellido" required>

            </div>

          </div>
          <!-- ENTRADA PARA SEGUNDO APELLIDO-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-users"></i></span>

              <input type="text" class="form-control input-lg" name="segundoApellido" placeholder="segundoApellido" required>

            </div>

          </div>
          <!-- ENTRADA PARA C.I. -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fas fa-id-card"></i></span>

              <input type="text" class="form-control input-lg" name="ci" id="ci" placeholder="Carnet de Identidad" required>

            </div>

          </div>

          <!-- ENTRADA PARA FECHA DE NACIMIENTO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

              <input type="date" class="form-control input-lg" name="fechaNacimiento" id="fechaNacimiento" placeholder="Fecha de Nacimiento" data-mask required>

            </div>

          </div>



          <!-- ENTRADA DE BAUTIZO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <select class="form-control" id="bautizado" name="bautizado" required>

                <option value="">Usted es Bautizado...</option>
                <option value="Si">Si</option>
                <option value="No">No</option>


              </select>

            </div>

          </div>



          <!-- ENTRADA PARA EL TELÉFONO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-phone"></i></span>

              <input type="text" class="form-control input-lg" name="telefono" id="telefono" placeholder="Ingrese su teléfono/celular" required>

            </div>

          </div>
          <!-- ENTRADA PARA EL ROL-->

          <div class="form-group">

            <div class="input-group">


              <input type="hidden" value="maestro" class="form-control input-lg" name="tIPO" id="tIPO" placeholder="Ingrese su Rol " required>

            </div>

          </div>


          <!-- ENTRADA PARA LA IMAGEN -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-image"></i></span>

              <input type="file" class="form-control input-lg" name="userfile" id="userfile">

            </div>

          </div>

        </div>

      </div>


      <!--=====================================
        PIE DEL MODAL
        ======================================-->

      <div class="modal-footer" style="background:#c7060c;">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Maestro</button>

      </div>

      <?php echo form_close(); ?>



    </div>

  </div>

</div>




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
        console.log(id);
        $("#nombre-maestro").val(arrayNombre[1] + " " + arrayNombre[2] + " " + arrayNombre[3]);
        
        document.querySelector("#idMaestro").value = id;
      });

    });

  });
</script>

























<!--<script type="text/javascript">
  //  $("#txtmaestro").on("change"function(){
  // var option = $(this).val();
  //  if(option!="")
  //{
  // var atributo = opcion.split("*");

  // $("#txtmaestro").val(atributo[0]);
  //  }
  //else
  //{
  // $("#txtmaestro").val(null);
  //}
  //});
  //$("#txtnum_pedido").val(generarnumero)(row[1]); 


  function generarnumero(numero) {
    if (numero >= 99999 && numero < 999999) {
      return Number(numero) + 1;
    }
    if (numero >= 9999 && numero < 99999) {
      return "0" + (Number(numero) + 1);
    }
    if (numero >= 999 && numero < 9999) {
      return "00" + (Number(numero) + 1);
    }
    if (numero >= 99 && numero < 999) {
      return "000" + (Number(numero) + 1);
    }
    if (numero >= 9 && numero < 99) {
      return "0000" + (Number(numero) + 1);
    }
    if (numero < 9) {
      return "00000" + (Number(numero) + 1);
    }
  }

  $(".btn-Agregar").on("click", function() {

    var datamaterial = $(this).val();
    var dtmaterial = datamaterial.split("*");
    tabladt = "<tr>";
    tabladt += "<tr><input type='hidden' name='txtidproducto[]' id='txtidproducto' value='" + dtmaterial[0] + "'>" + dtmaterial[1] + "</td>";
    tabladt += "<td>" + dtmaterial[2] + "</td>";
    tabladt += "<td><a href=' " + base_url + "uploads/materiales/" + dtmaterial[3] + "' data-lightbox='example-set'><img src='" + base_url + "uploads/materiales/" + dtmaterial[3] + "' class'img-thumbnail alt='Cinque Terre' width='50px' height='50px'></a></td>";
    tabladt += "<td><i class='fa fa-fw fa-qrcode'></i>" + dtmaterial[3] + "</td>";
    tabladt += "<td>" + dtmaterial[3] + "</td>";
    tabladt += "<td><input type='number' name='txtcantidad[]' id='txtcantidad' style='min-width:70px; width:74px;' class='cantidades' value='1'></td>";
    tabladt += "<td><button type='button' class='btn btn-danger btn-remove-material'><span class='fa fa-remove'></span></button></td>";
    tabladt += "</tr>";
    $("#detpedidos tbody").append(tabladt);
  });


  $("#txt-material".on(change), function() {
    var option = $(this).val();
    (#btn - agregar).val(option);

  });




  //$(".btn-Agregar").on("click", function(){
  //  data =$(this).val();
  //   if (data !='') 
  //   {
  //     infomaterial = data.split("*");
  //        html += "<td><input type'hidden' name='idMaterial[]' value='"+infomaterial[0]+"'>"+infomaterial[1]+"</td>";
  //        html += "<td>"+infomaterial[2]+"</td>";
  //        html += "<td>"+infomaterial[3]+"</td>";
  //       html += "<td><input type='text' name='cantidades'value='1'</td>";
  //       html += "<td><button type='button' class='btn btn-danger' btn-remove-material><span class='fa fa-remove'></span></button></td>";
  //        html += "</tr>";
  //        $("#tbpedido tbody").append(html);
  //    else
  //    {
  //  alert("selccione un material...")
  //  }
  //}
</script>-->