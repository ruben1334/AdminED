<div class=" page-wrapper container table-responsive">
  <section>
    <h1>Información de 
      <small> CLASES</small>
    </h1>
  </section>
  <section class="content">
    <div class="box box-solid">
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">


            <div class="border-top">
               <div class="btn-group">
               <button type="button" class="btn btn-primary " onclick="location.href='agregar'">Agregar Información</button>
               <button type="button" class="btn btn-warning " onclick="location.href='deshabilitados'">Deshabilitados</button>
               </div>
              </div>
            
          </div>
        </div>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('correcto'); ?>"></div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <table id="zero_config" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Aula</th>
                  <th scope="col">Cantidad de Asistencia</th>
                  <th scope="col">Cantidad de Biblias</th>
                  <th scope="col">Cantidad de Nuevos</th>
                  <th scope="col">Cantidad de Ofrendas</th>
                  <th scope="col">Gestión</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Modificar</th>
                  <th scope="col">Eliminar</th>
                  <th scope="col">Deshabilitar</th>

                </tr>
              </thead>
              <tbody>
                <?php if (!empty($clase)) : ?>
                  <?php
                  $indice = 1;
                  foreach ($infoClase->result() as $row) {
                  ?>
                    <tr>
                      <th scope="row"><?php echo $indice; ?></th>

                      <td><?php echo $row->nombreClase; ?></td>
                      <td><?php echo $row->cantAsistencia; ?></td>
                      <td><?php echo $row->cantBiblia; ?></td>
                      <td><?php echo $row->cantNuevos; ?></td>
                      <td><?php echo $row->cantOfrenda; ?></td>
                      <td><?php echo $row->gestion; ?></td>
                      <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                      
                      <?php
                      if ($row->estado == 1) {
                        $style = 'class="label label-success"';
                        echo "<td><p><span $style><font style='vertical-align: inherit;'>Activo</font></span></p>";
                      } else {
                        $style = 'class="label label-danger"';
                        echo "<td><p><span $style><font style='vertical-align: inherit;'>Inactivo</font></span></p>";
                      }
                      ?>

                      <td>   
                                            <?php echo form_open_multipart('InfoClases/modificar');?>
                                            <input type="hidden" name="idClase" value="<?php echo $row->idClase;?>">
                                            <input type="submit" name="buttony" value="Modificar" class="btn btn-success"></input>
                                            <?php echo form_close();?>
                                            </td>    
                                            <td>   
                                            <?php echo form_open_multipart('InfoClases/eliminarbd');?>
                                            <input type="hidden" name="idClase" value="<?php echo $row->idClase;?>">
                                            <input type="submit" name="buttonx" value="Eliminar" class="btn btn-danger"></input>
                                            <?php echo form_close();?>
                                            </td>
                                            <td>   
                                            <?php echo form_open_multipart('InfoClases/deshabilitarbd');?>
                                            <input type="hidden" name="idClase" value="<?php echo $row->idClase;?>">
                                            <input type="submit" name="buttonz" value="Deshabilitar" class="btn btn-warning"></input>
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
  </section>