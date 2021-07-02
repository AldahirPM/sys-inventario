<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url();?>images/general/logoPestana-2.png" type="image/png" />

    <title>Sistema | Login </title>
    <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link  href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 
    <link  href="<?php echo base_url();?>assets/build/css/custom.min.css" rel="stylesheet">

    <link  href="<?php echo base_url();?>css/general.css" rel="stylesheet">
    <link  href="<?php echo base_url();?>assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link  href="<?php echo base_url();?>css/ohsnap.css" rel="stylesheet">
    <script src="<?php echo base_url();?>js/general.js"></script>

  </head>

  <body class="login">
    <div>
      <div class="login-header-wrapper">
        <div class="form login_form">
          <section class="login_content">
            <form class="frm-login" id="frmLogin" name="frmLogin" onsubmit="return login();"  autocomplete="off">
              <h1 class="title-login">SISTEMA DE INVENTARIO</h1>
              <div>
                <div class="title-name-input">
                  Usuario:
                </div>
                <input type="text" class="form-control" name="usuario" />
                
              </div>
              <div>
                <div class="title-name-input">
                  Contraseña:
                </div>
                <input type="password" class="form-control" name="password"   />
              </div>
              <div>
                <button type="submit" class="btn btn-login" > INGRESAR </button>    
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
   
  </body>
  <div id="ohsnap"></div>
  
</html>
<!-- jQuery -->
 

<script src="<?php echo base_url();?>js/ohSnap/ohsnap.js"></script>
<script src="<?php echo base_url();?>assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>