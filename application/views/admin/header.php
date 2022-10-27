<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $title  ?></title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url() ?>assets/css/nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="<?php echo base_url() ?>assets/css/demo/nifty-demo-icons.min.css" rel="stylesheet">

    <!--jQuery [ REQUIRED ]-->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?php echo base_url() ?>assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/plugins/pace/pace.min.js"></script>
    <script>
        var serverside = '<?php echo base_url() ?>';
    </script>


    <!-- Theme -->
    <link rel="stylesheet" href="<?php echo base_url('assets/themes/theme-navy.min.css') ?>">

    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?php echo base_url() ?>assets/css/demo/nifty-demo.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/') ?>plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets/') ?>plugins/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets/') ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!--DataTables [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets/') ?>plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/') ?>plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">


    <link rel="shortcut icon" href="<?php echo base_url('assets/img/futsal2.png') ?>" />


</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->


<body>

    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="" class="navbar-brand " style="margin-left:-50px ;">
                        <div class="brand-title" style="background-color:#1f2833;">
                            <img src="<?= base_url('assets/images/logomini.png') ?>" alt="gor" class="brand-icon" style="padding: 10px">
                            <span class="brand-text">Admin</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content">

                    <ul class="nav navbar-top-links">


                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--You can use an image instead of an icon.-->
                                    <!--<img class="img-circle img-user media-object" src="<?php echo base_url() ?>assets/img/profile-photos/1.png" alt="Profile Picture">-->
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <i class="demo-pli-male"></i>
                                </span>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--You can also display a user name in the navbar.-->
                                <!--<div class="username hidden-xs">Aaron Chavez</div>-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            </a>


                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                <ul class="head-list">
                                    <li>
                                        <a href="<?php echo base_url('admin/setting') ?>"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('login/out_process') ?>"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->

                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->
        <div class="boxed">

            <!--Small Bootstrap Modal-->
            <!--===================================================-->
            <div id="process-loader" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="">
                        <div class="load6" style="color: #fff">
                            <div class="loader" style="color: #69f0ae"></div>
                            <h4 class="text-center" style="color: #00e676">Sedang Memproses</h4>
                            <div class="text-center"><small>Tunggu beberapa saat, kami sedang mengerjakan</small></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===================================================-->
            <!--End Small Bootstrap Modal-->








            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav" style="border-radius: 5px ; border-color: #786e62;">
                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">
                                <br>

                                <ul id="mainnav-menu" class="list-group">

                                    <!--Nav-->
                                    <li class="list-header">Menu Navigasi</li>
                                    <!--Menu list item-->
                                    <li>
                                        <a href="<?php echo base_url('admin/home') ?>">
                                            <i class="demo-pli-home"></i>
                                            <span class="menu-title">Halaman Utama</span>
                                        </a>
                                    </li>

                                    <li class="treeview">
                                        <a href="#">
                                            <i class="ti-agenda"></i>
                                            <span>Penyewaan Lapangan</span>
                                            <span class="pull-right-container">
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?php echo base_url('admin/lapangan') ?>"><i class="fa fa-circle-o"></i> Lapangan</a></li>
                                            <li><a href="<?php echo base_url('admin/lapangan/sewa1') ?>"><i class="fa fa-circle-o"></i> Data Sewa L1</a></li>
                                            <li><a href="<?php echo base_url('admin/lapangan/sewa2') ?>"><i class="fa fa-circle-o"></i> Data Sewa L2</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('admin/pengumuman') ?>">
                                            <i class="fa fa-gear"></i>
                                            <span class="menu-title">Data Pengumuman</span>
                                        </a>
                                    </li>
                                    <li class="list-header">Pengguna</li>
                                    <li>
                                        <a href="<?php echo base_url('admin/setting') ?>">
                                            <i class="fa fa-gear"></i>
                                            <span class="menu-title">Pengaturan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('login/out_process') ?>">
                                            <i class="fa fa-gear"></i>
                                            <span class="menu-title">Logout</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>