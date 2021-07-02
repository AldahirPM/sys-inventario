<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url();?>images/general/logoPestana-2.png" type="image/png" />

    <title><?= $titulo ?> </title>

    <!-- jQuery -->
 
    <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link  href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link  href="<?php  echo base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link  href="<?php echo base_url();?>assets/build/css/custom.css" rel="stylesheet">

    <!-- data table -->
    <link  href="<?php echo base_url();?>assets/libs/datatables/jquery.dataTables.css" rel="stylesheet">
    
    <link  href="<?php echo base_url();?>css/general.css" rel="stylesheet">
    <link  href="<?php echo base_url();?>css/ohsnap.css" rel="stylesheet">
    <link  href="<?php echo base_url();?>assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        