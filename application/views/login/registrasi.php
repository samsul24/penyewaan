<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Login Aplikasi</title>


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


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?php echo base_url() ?>assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/plugins/pace/pace.min.js"></script>
    <!--Themify Icons [ OPTIONAL ]-->
    <link href="<?php echo base_url() ?>assets/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">



    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?php echo base_url() ?>assets/css/demo/nifty-demo.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/futsal2.png" />



    <!--Chosen [ OPTIONAL ]-->
    <link href="<?php echo base_url() ?>assets/plugins/chosen/chosen.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/themes/theme-navy.min.css') ?>">

    <style>



    </style>

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div id="container" class="cls-container" style="background-color: #c5c6c7;">
        <br><br><br><br><br><br><br>


        <!-- LOGIN FORM -->
        <!--===================================================-->
        <div class="cls-content" style="z-index: 1">
            <div class="cls-content-sm panel" style="background-color: #fff;">
                <div class="text-center">
                    <br>
                    <h1 class="h3">Registrasi</h1>
                    <p>Isi data dibawah ini dengan benar</p>
                </div>

                <?php echo $this->session->userdata('msg') ?>
                <form action="<?php echo base_url('registrasi/reg_process') ?>" method="POST">
                    <div class="panel-body">

                        <div id="form-login">
                            <input type="hidden" name="level" class="form-control" placeholder="level" value="">
                            <div class="form-group has-feedback ">
                                <input type="text" name="nama_lengkap" class="form-control" placeholder="nama" value="" autofocus required="">
                                <i class="demo-pli-male form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback ">
                                <input type="text" name="email" class="form-control" placeholder="email" value="" autofocus required="">
                                <i class="demo-pli-male form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback ">
                                <input type="number" name="no_telp" class="form-control" placeholder="no telpon" value="" autofocus required="">
                                <i class="demo-pli-male form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback ">
                                <input type="text" name="username" class="form-control" placeholder="Username" value="" autofocus required="">
                                <i class="demo-pli-male form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback ">
                                <input type="password" name="password" class="form-control" placeholder="Kata sandi" required="">
                                <i class="ti ti-key form-control-feedback"></i>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Daftar</button><br>

                        </div>
                    </div>

                    <div class="pad-all">
                        <small>Punya akun langsung <a href="<?php echo base_url('Login') ?>">Login</a></small> <br>
                    </div>
                </form>

            </div>
        </div>
        <!--===================================================-->
        <br><br><br><br>
    </div>

    <!--===================================================-->
    <!-- END OF CONTAINER -->



    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url() ?>assets/js/nifty.min.js"></script>




    <!--=================================================-->
    <script>
        var serverside = "<?php echo base_url() ?>";
    </script>
    <script src="<?php echo base_url() ?>assets/js/modules/login.js"></script>

    <!--Chosen [ OPTIONAL ]-->
    <script src="<?php echo base_url() ?>assets/plugins/chosen/chosen.jquery.min.js"></script>

    <script>
        $('#chosen-provice').chosen({
            width: "100%"
        });
        $('#chosen-district').chosen({
            width: "100%"
        });
        $('#chosen-unit').chosen({
            width: "100%"
        });
    </script>


</body>

</html>