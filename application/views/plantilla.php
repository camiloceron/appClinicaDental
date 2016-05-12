<!Doctype html>
<html lang="es">
    <head>
        <title>BOCCA</title>
        <link href="<?php echo base_url('public/css/bootstrap.css')?>" rel="stylesheet">        
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.css" rel="stylesheet">                
        <link href="<?php echo base_url('public/css/custom.css')?>" rel="stylesheet">        
        <link href="<?php echo base_url('public/css/dataTable/dataTables.bootstrap.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/breadcrumb.css')?>" rel="stylesheet">        
        
        
    </head>
    <body class="nav-md">
        <div class="container body">

          <div class="main_container">
            <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?php echo base_url('paciente/index')?>" class="site_title"><i class="fa fa-hospital-o" aria-hidden="true"></i> <span>BOCCA</span></a>
                </div>

                <div class="clearfix"></div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                      <li><a><i class="fa fa-male"></i> Pacientes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li>
                            <a href="<?php echo base_url('paciente/newPaciente')?>">Nuevo Paciente</a>
                          </li>
                          <li>
                            <a href="<?php echo base_url('paciente/index')?>">Buscar Paciente</a>
                          </li>
                        </ul>
                      </li>               
                    </ul>
                  </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
              </div>
            </div>        

            <!-- top navigation -->
            <div class="top_nav">

              <div class="nav_menu">
                <nav class="" role="navigation">
                  <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                  </div>

                  <ul class="nav navbar-nav navbar-right">
                    <li class="">
                      <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;">  Profile</a>
                        </li>
                        <li>
                          <a href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                          </a>
                        </li>
                        <li>
                          <a href="javascript:;">Help</a>
                        </li>
                        <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 640px;">
                <!--Contenido vistas -->
                <?php
                    $this->load->view($contenido)
                ?>

            </div>        
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <a class="go-top" href="#"><i class="fa fa-arrow-circle-up fa-2x" aria-hidden="true"></i></a>
                <div class="clearfix"></div>              
            </footer>
            <!-- /footer content -->
          </div>
        </div>      
        
        <script src="<?php echo base_url('public/js/jquery-1.12.3.min.js')?>"></script>        
        <script src="<?php echo base_url('public/js/bootstrap.js')?>"></script>
        
        <!-- dataTable -->
        <script src="<?php echo base_url('public/js/dataTable/jquery.dataTables.js')?>"></script>
        <script src="<?php echo base_url('public/js/dataTable/dataTables.bootstrap.js')?>"></script>                
        
        <!-- Custom Theme Scripts -->
        <script src="<?php echo base_url('public/js/custom.js')?>"></script>        
        <script src="<?php echo base_url('public/js/paciente.js')?>"></script>
        <script src="<?php echo base_url('public/js/tratamiento.js')?>"></script>
    </body>    
</html>

