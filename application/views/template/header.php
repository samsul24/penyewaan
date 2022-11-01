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
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/css/style1.css">

    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/home/css/dashboard-style.css">
    <!--=============== favicons ===============-->
    <link href="<?php echo base_url() ?>assets/css/nifty.min.css" rel="stylesheet">



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

    <div id="main">

        <header class="main-header">

            <a href="index.html" class="logo-holder"></a>
            <?php if (empty($this->session->userdata('sess_username'))) { ?>
                <div class="show-reg-form modal-open avatar-img "><i class=" fal fa-user"></i><a style="color:aliceblue" href="<?php echo site_url(); ?>Login">Login</a></div>
            <?php } ?>


            <?php if ($this->session->userdata('sess_username')) { ?>

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

            <?php } ?>
            <div class="header-user-menu1" style="width:30px ;">
                <div class="header-user-name1">
                    <?php $this->db->select('*');
                    $this->db->where('status', 'belum_selesai');
                    $query = $this->db->get('pengumuman');

                    ?>
                    <a href="#sec1" style="color:white;"><i class="far fa-bell"></i>&nbsp;&nbsp;<?= $num = $query->num_rows(); ?></a>
                </div>
                <?php $pengumuman = $this->db->get('pengumuman')->result_array(); ?>
                <ul style="width: 200px; background-color:ghostwhite;  box-shadow:   5px 5px 12px 2px #1f2833;">
                    <l1>
                        <h3><b>Pengumuman</b></h3>
                        <br>
                    </l1>
                    <?php foreach ($pengumuman as $row) :
                        if ($row['status'] == "belum_selesai") { ?>
                            <li>
                                <hr><a href="" style=" ;"><b>Subjek : </b> &nbsp; <b><?php echo $row['objek'] ?>.</a></b>
                                <br><a>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['deskripsi'] ?></a><br>
                            </li>
                    <?php }
                    endforeach; ?>
                </ul>
            </div>

            <div class="nav-button-wrap color-bg">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>
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