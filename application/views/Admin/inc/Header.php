<?php clearstatcache(); ?>
<!DOCTYPE html>
<html>
<?php
$admin_name = $this->session->userdata('admin_name');
$admin_pic = $this->session->userdata('admin_pic');

?>
<!-- Mirrored from admin-plus.envato.ipv4.ro/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Feb 2016 03:44:39 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
  <title>Dashboard</title>
  <!-- App CSS -->
  <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" media="screen">
  <link type="text/css" href="<?= base_url('assets/admin/assets/css/datatable.css') ?>" rel="stylesheet">
  <link type="text/css" href="<?= base_url() ?>assets/admin/assets/css/style.min.css" rel="stylesheet">    
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/examples/css/morris.min.css"> <!-- CHART (morris)-->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/style.css"> <!-- CHART (morris)-->
  <!-- Google Font & Material Icons  -->
<!--  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
<!--  <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">-->

  <link type="text/css" href="<?= base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">


  <script>
    <?php
    if($_SERVER['SERVER_NAME'] == 'localhost'){
      echo "var base_url = '".base_url()."';";
    }else{
      echo "var base_url = 'http://thepakland.com/';";
    }
    ?>
  </script>
  <!-- Jquery -->
  <script src="<?= base_url() ?>assets/admin/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/admin/assets/js/custom.js') ?>"></script>
  <script src="<?= base_url('assets/admin/assets/js/signup_charts.js?v=1.0.'). $this->session->userdata('propChartYear') ?>"></script>
  <script src="<?= base_url('assets/admin/assets/js/property_charts.js?v=1.0.'). $this->session->userdata('propChartYear') ?>"></script>
</head>
<body>

  <!-- Navbar -->
  <?php include_once('nav.php'); ?>

  <!-- Sidebar -->
  <?php include_once('sidebar.php'); ?>
  <!--  Content -->  

  
  