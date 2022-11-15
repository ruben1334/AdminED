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
                          <table id="zero_config" class="table table-bordered table-hover ">
                                  <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Primer Apellido</th>
                                <th scope="col">Segundo Apellido</th> 
                                <th scope="col">Cédula de Identidad</th>            
                                <th scope="col">Fecha de Nacimiento</th>
                                <th scope="col">Bautizado (SI/No)</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Maestro de:</th>
                                <th scope="col">Fecha de registro</th>
                                <th scope="col">Fecha de Actualización</th>
                                <th scope="col">Acciones</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($maestro)):?>
                            <?php
                                $indice=1;

                                foreach ($maestro->result() as $row) 
                                {
                                    ?> 
                                    <tr>
                                        <th scope="row"><?php echo $indice;?></th>
                                        <td>
                                        <?php
                                                    $foto=$row->foto;
                                                    if($foto=="")
                                                    {
                                                        ?>
                                                        <img 
                                                    src="<?php echo base_url();?>/fotosUsuario/user.png"
                                                    alt="user"
                                                    class="rounded-circle"
                                                     width="50px">
                                                        <?php

                                                    }
                                                    else {
                                                        ?>
                                        <img 
                                        src="<?php echo base_url();?>/fotosUsuario/<?php echo $foto; ?>"
                                        alt="user" 
                                        class="rounded-circle"
                                        width="50px"/>
                                        
                                                 <?php
                                                    }
                                                ?></td>
                                            
                                            <td><?php echo $row->nombre;?></td>
                                            <td><?php echo $row->primerApellido;?></td>
                                            <td><?php echo $row->segundoApellido;?></td>
                                            <td><?php echo $row->ci;?></td>
                                            <td><?php echo formatearFecha($row->fechaNacimiento);?></td>
                                            <td><?php echo $row->bautizado;?></td>
                                            <td><?php echo $row->telefono;?></td>
                                            <td><?php echo $row->clase;?></td>
                                            <td><?php echo formatearFecha($row->fechaRegistro);?></td>
                                            <td><?php echo formatearFecha($row->fechaActualizacion);?></td>
                                              
                                            <td>   
                                            <?php echo form_open_multipart('Maestros/modificar');?>
                                            <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario;?>">
                                            <input type="submit" name="buttony" value="Modificar" class="btn btn-success"></input>
                                            <?php echo form_close();?>
                                            </td>    
                                           
                                            <td>  

                                            <?php echo form_open_multipart('Maestros/eliminarbd');?>
                                            <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario;?>">
                                            <input type="submit" name="buttonx" value="Eliminar" class="btn btn-danger"></input>
                                            <?php echo form_close();?>
                                            </td>    
                                              <td>   
                                            <?php echo form_open_multipart('Maestros/deshabilitarbd');?>
                                            <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario;?>">
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
 
</div>
