<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from vinodpal.com/demos/logic-cargo/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Aug 2016 22:37:19 GMT -->
<head>
	<meta charset="UTF-8">
	<title><?php echo $judul." | ".ucfirst($page_title);?></title>
	<!-- viewport meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $meta_desc?>">
	<meta name="keywords" content="<?php echo $meta_keywords?>">

	<meta property="og:url" content="<?php echo base_url()?>" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="<?php echo base_url().$wlogo;?>" />
    <meta property="og:title" content="<?php echo $company;?>" />
    <meta property="og:description" content="<?php echo $meta_desc?>" />

    <meta name="author" content="<?php echo $company?>">

	<!-- styles -->
	<!-- helpers -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/ppjkservice/plugins/bootstrap/css/bootstrap.min.css">
	<!-- fontawesome css -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/ppjkservice/plugins/font-awesome/css/font-awesome.min.css">
	<!-- strock gap icons -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/ppjkservice/plugins/Stroke-Gap-Icons-Webfont/style.css">
	<!-- revolution slider css -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/ppjkservice/plugins/revolution/css/settings.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/ppjkservice/plugins/revolution/css/layers.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/ppjkservice/plugins/revolution/css/navigation.css">
	<!-- flaticon css -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/ppjkservice/plugins/flaticon/flaticon.css">
	<!-- jQuery ui css -->
	<link href="<?php echo base_url();?>assets/frontend/ppjkservice/plugins/jquery-ui-1.11.4/jquery-ui.css" rel="stylesheet">
	<!-- owl carousel css -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/ppjkservice/plugins/owl.carousel-2/assets/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/ppjkservice/plugins/owl.carousel-2/assets/owl.theme.default.min.css">
	<!-- animate css -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/ppjkservice/plugins/animate.min.css">
	<!-- fancybox -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/ppjkservice/plugins/fancyapps-fancyBox/source/jquery.fancybox.css">



	<!-- master stylesheet -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/ppjkservice/css/style.css">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/ppjkservice/css/responsive.css">



</head>
<body>

<!-- Start header -->
<header id="header" class="stricky">
	<div class="thm-container clearfix">
		<div class="logo pull-left">
			<a href="index-2.html">
				<img src="<?php echo $wlogo;?>" width="200" alt="">
			</a>
		</div>
		<div class="header-info pull-right">
			
			<!--<div class="info-box">
				<div class="icon-box no-border">
					<i class="icon icon-Timer"></i>
				</div>
				<div class="text-box">
					<p class="highlighted">Mon - Sat 9.00 - 18.00</p>
					<p>Sunday Closed</p>
				</div>
			</div>-->
			<div class="info-box">
				<div class="icon-box">
					<i class="icon icon-Phone2"></i>
				</div>
				<div class="text-box">
					<p class="highlighted">Call Us:</p>
					<p class="phone-number"><?php echo $phone;?>  /  <?php echo $cellphone;?></p>
				</div>
			</div>
			<div class="info-box search-box-wrapper">
				<div class="icon-box">
					<i class="flaticon-search51"></i>
				</div>
				<form action="#" class="search-box-holder">
					<div class="search-box">
						<div class="form">
							<input type="text" placeholder="Track Your Shipment">
							<button type="submit"><span>GO</span></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</header>
<!-- End header  -->