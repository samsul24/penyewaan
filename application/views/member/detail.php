<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>


<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">


<!--Nifty Stylesheet [ REQUIRED ]-->
<link href="<?php echo base_url() ?>assets/css/nifty.min.css" rel="stylesheet">


<!--Nifty Premium Icon [ DEMONSTRATION ]-->
<link href="<?php echo base_url() ?>assets/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
<!-- wrapper-->


<div id="wrapper">
    <!-- content-->
    <div class="content">
        <section class="listing-hero-section hidden-section" data-scrollax-parent="true" id="sec1">
            <div class="bg-parallax-wrap">
                <?php
                // var_dump($detail->result_array());
                // exit;
                foreach ($detail->result_array() as $rows) : ?>
                    <!-- listing-item  -->
                    <div class="listing-item">
                        <article class="geodir-category-listing fl-wrap">
                            <div class="geodir-category-img">

                                <?php

                                $img_profile = base_url('assets/images/5.png');


                                $img_sampul = "";
                                if ($rows['gambar_lapangan']) {

                                    $img_sampul = base_url('assets/images/lapangan/' . $rows['gambar_lapangan']);
                                } else {

                                    $img_sampul = base_url('assets/images/5.png');
                                }

                                ?>
                                <div class="bg par-elem " data-bg="<?php echo $img_sampul ?>" data-scrollax="properties: { translateY: '30%' }"></div>
                                <div class="overlay"></div>
                            </div>
                            <div class="slide-progress-wrap">
                                <div class="slide-progress"></div>
                            </div>
                            <div class="container">
                                <div class="list-single-header-item  fl-wrap">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h1><?php echo $rows['nama_lapangan'] ?> <span class="verified-badge"><i class="fal fa-check"></i></span></h1>
                                            <div class="geodir-category-location fl-wrap">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="fl-wrap list-single-header-column custom-scroll-link " href="#sec6">
                                                <div class="listing-rating-count-wrap single-list-count">
                                                    <div class="review-score"><?php  ?></div>
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php  ?>"></div>
                                                    <br>
                                                    <div class="reviews-count"><?php ?> reviews</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-single-header_bottom fl-wrap">
                                    <a class="listing-item-category-wrap" href="#">
                                        <div class="listing-item-category  blue-bg"><i class="fal fa-dumbbell"></i></div>
                                        <span>Tim Futsal</span>
                                    </a>
                                    <div class="list-single-author">
                                        <a href=""><span class="author_avatar">
                                                <img src='<?php echo $img_sampul ?>'> </span>By <?php echo $rows['nama_lapangan'] ?></a>
                                    </div>

                                    <?php


                                    ?>

                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <div class="scroll-nav-wrapper fl-wrap">
            <div class="container">
                <nav class="scroll-nav scroll-init">
                    <ul class="no-list-style">
                        <li><a class="act-scrlink" href="#sec1"><i class="fal fa-images"></i> Informasi Utama</a></li>
                        <li><a href="#sec2"><i class="fal fa-running"></i>Tim Futsal </a></li>
                        <li><a href="#sec3"><i class="fal fa-info"></i>Deskripsi</a></li>
                        <li><a href="#sec4"><i class="fal fa-image"></i>Galeri</a></li>
                        <li><a href="#sec6"><i class="fal fa-comments-alt"></i>Reviews</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- scroll-nav-wrapper end-->
        <section class="gray-bg no-top-padding">
            <div class="container">
                <div class="breadcrumbs inline-breadcrumbs fl-wrap">
                    <a href="<?php echo base_url() ?>">Halaman Utama</a>
                    <span>Rincian Detail Tim Futsal</span>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <!-- list-single-main-wrapper-col -->
                    <div class="col-md-8">
                        <!-- list-single-main-wrapper -->
                        <div class="list-single-main-wrapper fl-wrap">
                            <!-- list-single-main-item-->
                            <div class="list-single-main-item fl-wrap block_box" id="sec2">
                                <div class="list-single-main-item-title">
                                    <h3>Tim Futsal</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="team-holder fl-wrap">

                                        <?php  ?>
                                        <!-- team-item -->
                                        <div class="team-box">
                                            <div class="team-photo">
                                                <img src="images/team/5.jpg" alt="" class="respimg">
                                            </div>
                                            <div class="team-info fl-wrap">
                                                <h3><a href="#"><?php ?></a></h3>
                                                <h4><?php  ?></h4>
                                                <div class="team-social">
                                                    <ul class="no-list-style">
                                                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                        <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- team-item  end-->
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fl-wrap block_box" id="sec3">
                                <div class="list-single-main-item-title">
                                    <h3>Deskripsi</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <p>"<?php echo $rows['deskripsi_lapangan'] ?>"</p>
                                    <p>Dibuat pada <?php echo date('d F Y', strtotime($rows['date'])) ?></p>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p style="margin: 0px">Status Ketersediaan Bertanding</p>

                                            <?php if ($this->session->userdata('sess_idprofile')) { ?>

                                                <?php  ?>
                                                <h2 class="text-main" style="text-align: left">Belum Bersedia</h2>

                                                <?php
                                                ?>

                                                <a href="<?php echo $link ?>" style="margin: 0px" onclick="<?php echo $pesan ?>" class="btn color2-bg float-btn"><?php echo $textPengajuan ?><i class="fal fa-chevron-right"></i></a>
                                                <?php ?>

                                            <?php } else { ?>

                                                <p>"Silahkan daftar terlebih dahulu untuk meminta pengajuan bertanding"</p>
                                            <?php } ?>
                                        </div>

                                        <?php if ((!empty($this->session->userdata('sess_idprofile'))) && ($pengajuanbergabung == 0)) { ?>
                                            <div class="col-md-6">

                                                <p style="margin: 0px;">Ingin menjadi satu tim yang sama ?</p>
                                                <a href="<?php echo base_url('find/join/' . $rows['id_grup']) ?>" style="margin: 0px" class="btn color2-bg float-btn">Ajukan Bergabung<i class="fal fa-chevron-right"></i></a>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item-->
                            <div class="list-single-main-item fl-wrap block_box" id="sec4">
                                <div class="list-single-main-item-title">
                                    <h3>Galeri Tim Futsal</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">

                                    <?php ?>
                                    <div class="single-carousel-wrap fl-wrap lightgallery">
                                        <div class="sc-next sc-btn color2-bg"><i class="fas fa-caret-right"></i></div>
                                        <div class="sc-prev sc-btn color2-bg"><i class="fas fa-caret-left"></i></div>
                                        <div class="single-carousel fl-wrap full-height">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">

                                                    <?php  ?>
                                                    <!-- swiper-slide-->
                                                    <div class="swiper-slide">
                                                        <div class="box-item">
                                                            <img src="<?php echo base_url('assets/img/profile-gallery/' . $rowGaleri['foto']) ?>" alt="">
                                                            <a href="<?php echo base_url('assets/img/profile-gallery/' . $rowGaleri['foto']) ?>" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                    <!-- swiper-slide end-->
                                                    <?php  ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- list-single-main-wrapper-col end -->
                    <!-- list-single-sidebar -->

                    <!-- list-single-sidebar end -->
                </div>
            </div>
        </section>
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
</div>