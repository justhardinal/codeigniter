<?php 
	//informasi web
	$site_config = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $title?>">
    <meta name="author" content="<?php echo $title?>">

    <title><?php echo $title?></title>
    <!-- Icon -->
    <link href="<?php echo base_url('assets/upload/image/'.$site_config->icon)?> " rel="shortcut icon">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/front/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo base_url('assets/front/css/freelancer.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/css/freelancer.min.css')?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/front/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    
    <!-- Owl Carousel Assets -->
    <link href="<?php echo base_url('assets/owl-carousel/owl-carousel/owl.carousel.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/owl-carousel/owl-carousel/owl.theme.css')?>" rel="stylesheet">
    
    
     <!-- jQuery -->
    <script src="<?php echo base_url('assets/front/vendor/jquery/jquery.min.js')?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">