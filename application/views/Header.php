<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<!-- Mirrored from rypecreative.com/easy-living/index_header3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Sep 2016 22:46:14 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ThePak Land | Home</title>
	<link rel="shortcut icon" href="<?= base_url('assets/images') ?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?= base_url('assets/images') ?>/favicon.ico" type="image/x-icon">
<!--<link href="/favicon.ico" rel="shortcut icon">-->
	<!-- html5 support in IE8 and later -->
	<!-- CSS file links -->
	<link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" media="screen">
	<link href="<?= base_url('assets/css/jquery.bxslider.css')?>" rel="stylesheet" media="screen">
	<link href="<?= base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css" media="all" />
	<link href="<?= base_url('assets/css/responsive.css')?>" rel="stylesheet" type="text/css" media="all" />
	<link href="<?= base_url('assets/css/yamm.css')?>" rel="stylesheet" type="text/css" media="all" />
	<link href="<?= base_url('assets/css/jquery.nouislider.min.css')?>" rel="stylesheet" type="text/css" media="all" />
	<link href="<?= base_url('assets/css/custom.css')?>" rel="stylesheet" type="text/css" media="all" />
	<?php if( $this->router->class == 'submit_property'){?>
		<link rel="stylesheet" href="<?= base_url('assets/css/image_upload.css'); ?>">
	<?php } ?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
<!--javascript base url define	-->
	<script>
		<?php
			if($_SERVER['SERVER_NAME'] == 'localhost'){
				echo "var base_url = 'http://localhost/thepakland/';";
			}else{
				echo "var base_url = 'http://thepakland.com/';";
			}
		?>
	</script>
</head>
<!--	test query-->

<body>
<!-- Start Header -->
<header class="navbar yamm navbar-default navbar-fixed-top header3">
	<?php
		if(isset($_SESSION['verified_reg'])){
			echo '<div class="bg-success text-center"><h4>'.$_SESSION['verified_reg'].'</h4></div>';
		}else if(isset($_SESSION['unverified_reg'])) {
			echo '<div class="bg-danger text-center"><h4>' . $_SESSION['unverified_reg'] . '</h4></div>';
		}
	?>
	<div class="topBar">
		<div class="container">
			<p class="topBarText"><img class="icon" src="<?= base_url('assets/images/icon-phone.png')?>" alt="phone" /><?= settings('top_phone') ?></p>
			<p class="topBarText"><img class="icon" src="<?= base_url('assets/images/icon-mail.png')?>" alt="mail" /><?= settings('top_email') ?></p>
			<ul class="socialIcons">
				<?php
				if($this->session->userdata('user_id')  ){
				echo '<li><a href="'.base_url("user_panel/dashboard").'">MY ACCOUNT</a></li>
					  <li><a href="'.base_url("signout").'" id="logout">SIGN OUT</a></li>';
				}else{
				echo '<li><a href="javascript:void(0)" id="login">SIGN IN</a></li>
					  <li><a href="javascript:void(0)" id="register">REGISTER</a></li>';
				}?>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('assets/images/logo.PNG')?>" alt="The pak land" /> <span class="m-l-20">THEPAK </span><span>LAND</span></a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="<?= base_url('contact') ?>"> Contact Us </a></li>
				<li class="add_prop" <?php if(!$this->session->userdata('user_id')) echo 'id="user_login"'?>><a href="<?php if($this->session->userdata('user_id')){ echo base_url('submit_property');}else{ echo 'javascript:void(0)'; }?>"><button class="btn btn-warning">SUBMIT PROPERTY</button></a></li>
				<li class="dropdown">
					<ul class="nav navbar-nav userButtons">
                        <li <?php if(!$this->session->userdata('user_id')) echo 'id="user_login"'?>><a href="<?php if($this->session->userdata('user_id')){ echo base_url('submit_property');}else{ echo 'javascript:void(0)'; }?>"><button class="btn btn-warning">SUBMIT PROPERTY</button></a>
                        </li>
                        <li><a href="#"><img src="<?= base_url('assets/images/icon-fb.png')?>" alt="" /></a></li>
						<li><a href="#"><img src="<?= base_url('assets/images/icon-twitter.png')?>" alt="" /></a></li>
						<li><a href="#"><img src="<?= base_url('assets/images/icon-google.png')?>" alt="" /></a></li>
						<li><a href="#"><img src="<?= base_url('assets/images/icon-rss.png')?>" alt="" /></a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!--/.navbar-collapse -->
	</div>
	<!-- end header container -->
</header>
<!-- End Header -->

