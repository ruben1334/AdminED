<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper" style="min-height: 250px;">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">  
    <div class="page-breadcrumb btn-warning">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <H1>LISTA DE ESTUDIANTE HABILITADOS</H1>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
     <div class="row">
            <div class="col-md-12">
                <div class="main-wrapper">

                <?php echo form_open_multipart('Estudiante/listaxlsx');?>
                <button type="submit"  name="btn2" class="btn btn-success">Ver lista excel</button>
                <?php echo form_close();?><br>

                <?php echo form_open_multipart('Estudiante/deshabilitados');?>
                <button type="submit" class="btn btn-warning">Ver Estudiantes deshabilitados</button>
                <?php echo form_close();?><br>

                <?php echo form_open_multipart('Estudiante/agregar');?>
                <button type="submit" class="btn btn-primary">Agregar estudiante</button>
                <?php echo form_close();?>


                    <table class="table" >
                        <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Primer Apellido </th>
                                <th scope="col">Segundo Apellido </th>
                                <th scope="col">Fecha de Nacimiento</th>
                                <th scope="col">Bautizado (SI/No)</th>
                                <th scope="col">Padres</th>
                                <th scope="col">Nº de referencia</th>
                                <th scope="col">Fecha de registro</th>
                                <th scope="col">Fecha de actualización</th>
                                <th scope="col">Modificar</th>
                                <th scope="col">Eliminar</th>
                                <th scope="col">Deshabilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $indice=1;
                                foreach ($estudiante->result() as $row) 
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
                                                        <img src="<?php echo base_url();?>/uploads2/user.png" width="50px">
                                                        <?php
                                                    }
                                                    else {
                                                        ?>
                                                        <img src="<?php echo base_url();?>/uploads2/<?php echo $foto; ?>" width="50px">
                                                        <?php
                                                    }
                                                ?></td>
                                    
                                            <td><?php echo $row->nombre;?></td>
                                            <td><?php echo $row->primerApellido;?></td>
                                            <td><?php echo $row->segundoApellido;?></td>
                                            <td><?php echo formatearFecha($row->fechaNacimiento);?></td>
                                            <td><?php echo $row->bautizado;?></td>
                                            <td><?php echo $row->padres;?></td>
                                            <td><?php echo $row->NumeroReferencia;?></td>
                                            <td><?php echo formatearFecha($row->fechaRegistro);?></td>
                                            <td><?php echo formatearFecha($row->fechaActualizacion);?></td>
                                           

                                            <td>   
                                            <?php echo form_open_multipart('Estudiante/modificar');?>
                                            <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante;?>">
                                            <input type="submit" name="buttony" value="Modificar" class="btn btn-success"></input>
                                            <?php echo form_close();?>
                                            </td>    
                                            <td>   
                                            <?php echo form_open_multipart('Estudiante/eliminarbd');?>
                                            <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante;?>">
                                            <input type="submit" name="buttonx" value="Eliminar" class="btn btn-danger"></input>
                                            <?php echo form_close();?>
                                            </td>
                                            <td>   
                                            <?php echo form_open_multipart('Estudiante/deshabilitarbd');?>
                                            <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante;?>">
                                            <input type="submit" name="buttonz" value="Deshabilitar" class="btn btn-warning"></input>
                                            <?php echo form_close();?>
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
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
