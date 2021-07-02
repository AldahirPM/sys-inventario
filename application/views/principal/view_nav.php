<div class="col-md-3 left_col">
          <div class="left_col menu_fixed  scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url();?>Inicio" class="site_title"><i class="fa fa-desktop"></i> <span>SISTEMA DE INVENTARIO</span></a>
         
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
      
                <img src="<?=$imgUsuario?>" alt="..." class="img-circle profile_img img-nav">
              </div>
              <div class="profile_info">
                <span><?=$usuario['rol']?></span>
                <h2><?=$usuario['primerNombre'].' '.$usuario['primerApellido']?></h2>
               
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">
                <h3>General</h3>
                
                <ul class="nav side-menu">
                  <?php foreach($nav_menu['grupos'] as $grupo):?>
                  <li>
                    <a><i class="<?= $grupo['icon']?>"></i> <?=$grupo['nombre_grupo']?> <span class="fa fa-chevron-down"></span></a>
                    
                    <ul class="nav child_menu">
                    
                      <?php foreach($nav_menu['modulos'] as $modulo):?> 
                        <?php if($grupo['id_grupo_modulo'] == $modulo['id_grupo_modulo']):?>
                          <li><a href="<?=base_url()?><?=$modulo['url_modulo']?>"><?=$modulo['nombre_modulo']?></a></li>
                
                        <?php endif;?>
                    

                    
                      <?php endforeach;?>
                    </ul>
                  
                    </li>
                  <?php endforeach;?>    
                </ul>        
<!-- 
                <ul class="nav side-menu">
                  
                  <li>

                  <a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  
                    <ul class="nav child_menu">
                  
                      <li><a href="<?= base_url();?>Inicio">Inicio</a></li>
                  
                    </ul>
                  
                  </li>
                 
                 
                  <li><a><i class="fa fa-key"></i>Administrador<span class="fa fa-chevron-down"></span></a>
                 
                    <ul class="nav child_menu">
                 
                      <li><a href="<?=base_url()?>Usuario">Usuarios</a></li>
                      <li><a href="<?=base_url()?>Roles">Roles y Permisos</a></li>
                
                    </ul>
                 
                  </li>
                
                </ul> -->
              
              </div>
            </div>

            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!--<div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>-->
            <!-- /menu footer buttons -->
          </div>
        </div>

         <!-- top navigation -->
         <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=$imgUsuario?>" alt=""><?=$usuario['primerNombre']?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <!-- <a class="dropdown-item"  href="javascript:;"> Profile</a> -->
                      <!-- <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a> -->
                  <!-- <a class="dropdown-item"  href="javascript:;">Help</a> -->
                    <a class="dropdown-item cerrarSesion"  href=""><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
                  </div>
                </li>

                <!-- <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li> -->
              </ul>
            </nav>
          </div>
        </div>
    <!-- /top navigation -->
    

<!-- page content -->
<div class="right_col" role="main">

