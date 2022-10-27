<!DOCTYPE HTML>
<html lang="en">

<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/home/css/reset.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/home/css/plugins.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/home/css/style.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/home/css/color.css">

    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/home/css/dashboard-style.css">
    <!--=============== favicons ===============-->



    <script src="<?php echo base_url() ?>assets/home/js/jquery.min.js"></script>



    <!-- Plugins -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/modal-cross/prowl.css') ?>" />



</head>

<body>
    <!--loader-->
    <div class="loader-wrap">
        <div class="loader-inner">
            <div class="loader-inner-cirle"></div>
        </div>
    </div>
    <!--loader end-->
    <!-- main start  -->
    <div id="main">
        <!-- header -->
        <header class="main-header">
            <!-- logo-->
            <a href="index.html" class="logo-holder">

            </a>
            <!-- logo end-->
            <!-- header-search_btn-->

            <!-- header-search_btn end-->


            <?php if (empty($this->session->userdata('sess_username'))) { ?>
                <div class="show-reg-form "><i class="fal fa-user"></i><a style="color:aliceblue" href="<?php echo site_url(); ?>Login">Login</a></div>
            <?php } ?>
            <!-- header opt end-->

            <?php if ($this->session->userdata('sess_username')) { ?>
                <!-- header opt -->
                <div class="header-user-menu">
                    <div class="header-user-name">
                        <span><img src="<?php echo $this->session->userdata('sess_foto') ?>" alt=""></span>
                        Hello, <?php echo ($this->session->userdata('sess_username')) ?>
                    </div>
                    <ul>
                        <li><a href="<?php echo base_url('member/profile') ?>"> Profile Saya</a></li>
                        <li><a href="<?php echo base_url('login/out_process ') ?>">Log Out</a></li>
                    </ul>
                </div>
                <!-- header opt end-->
            <?php } ?>
            <div class="header-user-menu">
                <div class="dropdown">
                    <div class="facilities-list fl-wrap">
                        <a href="#sec1" style="color:white;"><i class="far fa-bell"></i></a>

                        <div id="pesan" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        </div>
                    </div>
                </div>
            </div>
            <!-- nav-button-wrap-->
            <div class="nav-button-wrap color-bg">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>
            <!-- nav-button-wrap end-->
            <!--  navigation -->
            <div class="nav-holder main-menu">
                <nav>
                    <ul class="no-list-style">
                        <li>
                            <a href="<?php echo base_url() ?>" class="act-link">Beranda</a>
                        </li>
                        <li>
                            <!-- <a href="<?php echo base_url() ?>">Lapangan</a> -->
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>member/sewa">Penyewaan Lapangan</a>
                        </li>
                        <li>
                            <!-- <a href="<?php echo base_url() ?>menu/jadwal">Jadwal</a> -->
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>">Hubungi Kami</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </header>