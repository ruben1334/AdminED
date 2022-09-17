<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" >
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url(); ?>sbadmin2/plugins/images/logo1.png" width="50" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="<?php echo base_url(); ?>sbadmin2/plugins/images/logo1.png" width="150" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

        
                       
                      
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                      
                        
                     
                           
              
                
                           <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>  


                         <center>
                <?php echo form_open_multipart('Usuarios/logout');?>
                <button type="submit" class="btn btn-danger">Cerrar sesion</button>
                <?php echo form_close();?>
                   </center>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="<?php echo base_url(); ?>sbadmin2/plugins/images/users/varun.jpg" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium">ADMIN</span></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->

                       <li class="sidebar-item">
                            <a class="sidebar-link">
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <?php echo form_open_multipart('Maestros/index');?>
                <button type="submit" class="btn btn-secondary">Maestros</button>
                <?php echo form_close();?><br>
                            </a>
                        </li> 
                        

                        <li class="sidebar-item">
                            <a class="sidebar-link">
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <?php echo form_open_multipart('Estudiante/index');?>
                <button type="submit" class="btn btn-secondary">Estudiantes</button>
                <?php echo form_close();?><br>
                            </a>
                        </li> 

                        <li class="sidebar-item">
                            <a class="sidebar-link">
                            <i class="fa fa-columns" aria-hidden="true"></i>
                                <?php echo form_open_multipart('Usuarios/logout');?>
                <button type="submit" class="btn btn-danger">Cerrar sesion</button>
                <?php echo form_close();?>
                            </a>
                        </li>  

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        