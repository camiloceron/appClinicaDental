<!Doctype html>
<html lang="es">
    <head>
        <title>BOCCA</title>
        <link href="<?php echo base_url('public/css/bootstrap.css')?>" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.css" rel="stylesheet">                
        <link href="<?php echo base_url('public/css/custom.css')?>" rel="stylesheet">        
        
    </head>
    <body class="nav-md">
        <div class="container body">

          <div class="main_container">
            <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?php echo base_url('welcome/index')?>" class="site_title"><i class="fa fa-hospital-o" aria-hidden="true"></i> <span>BOCCA</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                  <div class="profile_pic">
                    <img src="<?php echo base_url('public/imagenes/usuario.jpg')?>" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>John Doe</h2>
                  </div>
                </div>
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
                      <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="form.html">General Form</a>
                          </li>
                          <li><a href="form_advanced.html">Advanced Components</a>
                          </li>                      
                          <li><a href="form_buttons.html">Form Buttons</a>
                          </li>
                        </ul>
                      </li>
                      <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="general_elements.html">General Elements</a>
                          </li>                      
                          <li><a href="calendar.html">Calendar</a>
                          </li>
                        </ul>
                      </li>                  
                    </ul>
                  </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                  <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="Logout">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                  </a>
                </div>
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
                      <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo base_url('public/imagenes/usuario.jpg')?>" alt="">John Doe
                        <span class=" fa fa-angle-down"></span>
                      </a>
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
            <div class="right_col" role="main">
                <!--Contenido vistas -->
                <?php
                    $this->load->view($contenido)
                ?>

            </div>        
            <!-- /page content -->

            <!-- footer content -->
            <footer>
              <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
              </div>
              <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
          </div>
        </div>
        
        <script src="<?php echo base_url('public/js/jquery.js')?>"></script>
        <script src="<?php echo base_url('public/js/bootstrap.js')?>"></script>        
        <!-- Custom Theme Scripts -->
        <script src="<?php echo base_url('public/js/custom.js')?>"></script>        
        <script src="<?php echo base_url('public/js/paciente.js')?>"></script>       
                         
    </body>    
</html>

