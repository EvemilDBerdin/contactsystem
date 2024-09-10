<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/uploads/Berdin.ico') ?>">
	<link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap/" />
	<link href="<?= base_url('assets/adminwrap/') ?>node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/adminwrap/') ?>css/style.css" rel="stylesheet">
	<title>404 Page Not Found</title>
	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		body {
			background-color: #fff; 
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 50px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
			text-align: center;
		}  

		p {
			text-align: center;
		} 
	</style>
</head>

<body>
	<div>
		<h1 class="font-bold">HUMAN RESOURCE MANAGEMENT SYSTEM</h1>
	</div>
	<div class="login-register rounded" style="background-image:url(<?= base_url('assets/uploads/backgroundlogin.png') ?>); width:100%; object-fit:contain;">
		<h1><?php echo $heading; ?></h1>
		<p><?php echo $message; ?></p>
	</div> 
	<img style="width:100%; object-fit:cover; height:100vh;  background-repeat: no-repeat; display:block;  margin-left: auto;
  margin-right: auto;" src="<?= base_url('assets/uploads/imagenotfound.jpg') ?>"/>
</body>

</html>