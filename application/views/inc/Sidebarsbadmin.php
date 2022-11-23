<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    

          <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <nav class=" top-navbar navbar-expand-md navbar-dark ">
          <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="../Inicio/index">
              <!-- Logo icon -->
              <b class="logo-icon ps-2">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img
                  src="../../assets/images/logo1.png"
                  width="50"
                  alt="homepage"
                  class="light-logo"
                  
                />
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text ms-2">
                <!-- dark Logo text -->
               <h1>AdminED</h1>
              </span>
              <!-- Logo icon -->
              <!-- <b class="logo-icon"> -->
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

              <!-- </b> -->
              <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div
            class=" navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a
                  class="nav-link sidebartoggler waves-effect waves-light"
                  href="javascript:void(0)"
                  data-sidebartype="mini-sidebar"
                  ><i class="mdi mdi-menu font-24"></i
                ></a>
              </li>
              <!-- ============================================================== -->
              <!-- create new -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
               <span class="d-none d-md-block"
                    >Create New <i class="fa fa-angle-down"></i
                  ></span>
                  <span class="d-block d-md-none"
                    ><i class="fa fa-plus"></i
                  ></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
              </li>
              <!-- ============================================================== -->
              <!-- Search -->
              <!-- ============================================================== -->
              <li class="nav-item search-box">
                <a
                  class="nav-link waves-effect waves-dark"
                  href="javascript:void(0)"
                  ><i class="mdi mdi-magnify fs-4"></i
                ></a>
                <form class="app-search position-absolute">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search &amp; enter"
                  />
                  <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                </form>
              </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
              <!-- ============================================================== -->
              <!-- Comment -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  
                </a>
               
              </li>
         
                
              <!-- ============================================================== -->
              <!-- End Comment -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- Messages -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle waves-effect waves-dark"
                  href="#"
                  id="2"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="font-24 mdi mdi-comment-processing"></i>
                </a>
                <ul
                  class="
                    dropdown-menu dropdown-menu-end
                    mailbox
                    animated
                    bounceInDown
                  "
                  aria-labelledby="2"
                >
                  <ul class="list-style-none">
                    <li>
                      <div class="">
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span
                              class="
                                btn btn-success btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "
                              ><i class="mdi mdi-calendar text-white fs-4"></i
                            ></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Event today</h5>
                              <span class="mail-desc"
                                >Just a reminder that event</span
                              >
                            </div>
                          </div>
                        </a>
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span
                              class="
                                btn btn-info btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "
                              ><i class="mdi mdi-settings fs-4"></i
                            ></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Settings</h5>
                              <span class="mail-desc"
                                >You can customize this template</span
                              >
                            </div>
                          </div>
                        </a>
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span
                              class="
                                btn btn-primary btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "
                              ><i class="mdi mdi-account fs-4"></i
                            ></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Pavan kumar</h5>
                              <span class="mail-desc"
                                >Just see the my admin!</span
                              >
                            </div>
                          </div>
                        </a>
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span
                              class="
                                btn btn-danger btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "
                              ><i class="mdi mdi-link fs-4"></i
                            ></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Luanch Admin</h5>
                              <span class="mail-desc"
                                >Just see the my new admin!</span
                              >
                            </div>
                          </div>
                        </a>
                      </div>
                    </li>
                  </ul>
                </ul>
              </li>
              <!-- ============================================================== -->
              <!-- End Messages -->
              <!-- ============================================================== -->

              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a
                  class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  "
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <img
                    src="<?php echo base_url();?>/fotos/usuarios/<?php echo $this->session->userdata('foto'); ?>"
                    alt="user"
                    class="rounded-circle"
                    width="31" 
                  />
               <span class="hidden-xs"><?php echo $this->session->userdata('tipo'); ?></span>
                </a >
                <ul 
                  class="dropdown-menu dropdown-menu-end user-dd animated"

                  aria-labelledby="navbarDropdown"
                >
                  <a class="dropdown-item" href="javascript:void(0)"
                    ><i class="mdi mdi-account me-1 ms-1"></i> My Profile</a>
                  <center>
                      <img
                    src="<?php echo base_url();?>/fotos/usuarios/<?php echo $this->session->userdata('foto'); ?>"
                    alt="user"
                    class="rounded-circle"
                    width="150" 
                  />
                  <br>
                  <span class="hidden-xs"><?php echo $this->session->userdata('nombre'); ?></span>
                  <span class="hidden-xs"><?php echo $this->session->userdata('primerApellido'); ?></span>
                
                  </center>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../Acceso/logout"
                    ><i class="fa fa-power-off me-1 ms-1"></i>Cerrar Sesión</a
                  >
                  <div class="dropdown-divider"></div>
                  <div class="ps-4 p-10">
                    <a
                      href=""
                      class="btn btn-sm btn-success btn-rounded text-white"
                      >View Profile</a
                    >
                  </div>
                </ul>
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
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
             
             <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="<?php echo base_url(); ?>index.php/Inicio/index"
                  aria-expanded="false"
                  ><i class="fa fa-home"></i
                  ><span class="hide-menu">Inicio</span></a
                >
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="<?php echo base_url(); ?>index.php/Usuarios/index"
                  
                  aria-expanded="false"
                  ><i class="far fa-user"></i>
                  <?php echo form_open_multipart('Usuarios/index');?>
                <span type="submit" class="hide-menu">Usuarios</span>
                <?php echo form_close();?><br></a
                >

              </li>
             
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="../Maestros/index"
                  
                  aria-expanded="false"
                  ><i class="far fa-id-badge"></i>
                  <?php echo form_open_multipart('Maestros/index');?>
                <span type="submit" class="hide-menu">Maestros</span>
                <?php echo form_close();?><br></a
                >

              </li>

               <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="fa fa-cogs"></i
                  ><span class="hide-menu">Clases</span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/Clases/index" class="sidebar-link"
                      ><i class="mdi mdi-note-outline"></i
                      ><span class="hide-menu">Agregar Clase</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/InfoClases/index" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Información de Clases </span></a
                    >
                  </li>
                </ul>
              </li>
               
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="<?php echo base_url(); ?>index.php/Estudiante/index"

                  aria-expanded="false"
                  ><i class=" fas fa-users"></i
                  ><span class="hide-menu">Estudiante</span>
                  </a>
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="<?php echo base_url(); ?>index.php/Material/index"
                  aria-expanded="false"
                  ><i class="mdi mdi-clipboard-text"></i
                  ><span class="hide-menu">Material</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="fas fa-box-open"></i
                  ><span class="hide-menu">Pedidos</span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/Pedido/agregar" class="sidebar-link"
                      ><i class=" fas fa-hand-holding"></i
                      ><span class="hide-menu"> Pedido de Materiales </span></a
                    >
                  </li>

                   <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/Pedido1/agregar" class="sidebar-link"
                      ><i class="mdi mdi-note-outline"></i
                      ><span class="hide-menu"> Pedido de Materiales1 </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="../Pedido/index"  class="sidebar-link"
                      ><i class="fa fa-check-circle"></i
                      ><span class="hide-menu"> Lista de Pedidos  </span></a
                    >
                  </li>

                   <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/Pedido/Anulados"  class="sidebar-link"
                      ><i class=" fas fa-ban"></i
                      ><span class="hide-menu"> Lista de Pedidos Anulados </span></a
                    >
                  </li>
                </ul>
              </li>
              

             <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="fas fa-box-open"></i
                  ><span class="hide-menu">Devoluciones</span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/Devoluciones/agregar" class="sidebar-link"
                      ><i class=" fas fa-hand-holding"></i
                      ><span class="hide-menu"> Devolución de Materiales </span></a
                    >
                  </li>

                   <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/Pedido1/cinsertar" class="sidebar-link"
                      ><i class="mdi mdi-note-outline"></i
                      ><span class="hide-menu"> Pedido de Materiales1 </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/Devoluciones/index"  class="sidebar-link"
                      ><i class="fa fa-check-circle"></i
                      ><span class="hide-menu"> Lista de Devoluciones  </span></a
                    >
                  </li>

                   <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/Devoluciones/Anulados"  class="sidebar-link"
                      ><i class=" fas fa-ban"></i
                      ><span class="hide-menu"> Lista de Pedidos Sin Devolver </span></a
                    >
                  </li>
                </ul>
              </li>

                   <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="far fa-chart-bar"></i
                  ><span class="hide-menu">Reportes</span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/Reporte/pedidos" class="sidebar-link"
                      ><i class=" fas fa-hand-holding"></i
                      ><span class="hide-menu">Reporte de pedidos</span></a
                    >
                  </li>

                 <!--  <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/Reporte/pedidosAnulados" class="sidebar-link"
                      ><i class="mdi mdi-note-outline"></i
                      ><span class="hide-menu">Reporte de pedidos Anulados</span></a
                    >
                  </li>-->
                  <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/Reporte/MaterialesMasSalidos"  class="sidebar-link"
                      ><i class="fa fa-check-circle"></i
                      ><span class="hide-menu">Materiales con mas salidas</span></a
                    >
                  </li>
                   <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/Reporte/Stock"  class="sidebar-link"
                      ><i class="fa fa-check-circle"></i
                      ><span class="hide-menu">Reporte de stock</span></a
                    >
                  </li>
                <!-- <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/Pedido/Anulados"  class="sidebar-link"
                      ><i class=" fas fa-ban"></i
                      ><span class="hide-menu">Reporte de Maestros</span></a
                    >
                  </li>
                   <li class="sidebar-item">
                    <a href="<?php echo base_url(); ?>index.php/Pedido/Anulados"  class="sidebar-link"
                      ><i class=" fas fa-ban"></i
                      ><span class="hide-menu">Reporte de Estudiantes</span></a
                    >
                  </li>-->
                </ul>
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
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->