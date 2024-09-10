<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/uploads/Berdin.ico') ?>">
    <title><?= $title ?></title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap/" />
    <link href="<?= base_url('assets/adminwrap/') ?>node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/adminwrap/') ?>node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/adminwrap/') ?>node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="<?= base_url('assets/adminwrap/') ?>node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="<?= base_url('assets/adminwrap/') ?>css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets/adminwrap/') ?>css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/adminwrap/') ?>node_modules/sweetalert2/dist/sweetalert2.min.css">

    <!-- full calendar  -->
    <link rel='stylesheet' type='text/css' href="<?= base_url('assets/') ?>fullcalendar/main.min.css" />
    <link rel='stylesheet' type='text/css' href="<?= base_url('assets/') ?>fullcalendar/main.css" />
    <link href="<?= base_url('assets/global/') ?>global.css" rel="stylesheet">
    <style> 
        @media only screen and (max-width: 445px) {
            #headnavlogo {
                width: 250px !important;
            } 
        }
        .modal {
            margin-top: auto;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="card-no-border">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">CONTACT SYSTEM</p>
        </div>
    </div>
    <div id="main-wrapper"> 
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <img src="#" id="headnavlogo" alt="CONTACT SYSTEM LOGO" class="light-logo" style="width:350px;" /> 
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down"><span></span></li>
                    </ul>
                    <ul class="navbar-nav my-lg-0"> 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('assets/uploads/') ?>defaultpicture.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user"> 
                                    <li role="separator" class="divider"></li> 
                                    <li><a href="javascript:void(0)" onclick="asidemylogout()"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>    
                    </ul>
                </div>
            </nav>
        </header>