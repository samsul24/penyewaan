<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>


<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
<!-- <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/demo/bootstrap.min.css"> -->


<!--Nifty Stylesheet [ REQUIRED ]-->
<link href="<?php echo base_url() ?>assets/css/nifty.min.css" rel="stylesheet">


<!--Nifty Premium Icon [ DEMONSTRATION ]-->
<link href="<?php echo base_url() ?>assets/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
<!-- wrapper-->
<!-- wrapper-->
<div id="wrapper">
    <!-- content-->
    <div class="content">
        <div class="page-scroll-nav">

            </nav>
        </div>
        <!--  section  -->
        <section class="parallax-section single-par" data-scrollax-parent="true">

            <div class="bg par-elem " data-bg="<?php echo base_url() ?>assets/images/val.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay op7"></div>
            <div class="container">
                <div class="section-title center-align big-title">
                    <h2><span>Jadwal Lapangan</span></h2>
                </div>
            </div>
            <div class="header-sec-link">
                <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
            </div>
        </section>

        <!-- list-main-wrap-header end-->
        <div class="fl-wrap">
            <div class="mob-nav-content-btn mncb_half color2-bg show-list-wrap-search ntm fl-wrap"><i class="fal fa-filter"></i> Filters</div>
            <div class="mob-nav-content-btn mncb_half color2-bg schm ntm fl-wrap"><i class="fal fa-map-marker-alt"></i> View on map</div>
            <!-- listsearch-input-wrap-->

            <!-- listsearch-input-wrap end-->
            <!-- listing-item-container -->
            <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic three-columns-grid">

                <!-- listing-item  -->
                <?php

                ?>
                <?php foreach ($lapangan as $rows) : ?>
                    <div class="listing-item">
                        <article class="geodir-category-listing fl-wrap">
                            <div class="geodir-category-img">

                                <?php

                                $img_profile = "";
                                if ($rows['gambar_lapangan']) {

                                    $img_profile = base_url('assets/images/lapangan/' . $rows['gambar_lapangan']);
                                } else {

                                    $img_profile = base_url('assets/images/5.png');
                                }

                                ?>
                                </a>
                                <span class="avatar-tooltip">Lapangan<strong><?php echo $rows['nama_lapangan'] ?></strong></span>
                                <a href="<?php echo base_url('member/sewa/detail/' . $rows['id_lapangan']) ?>" class="geodir-category-img-wrap fl-wrap">
                                    <img src="<?php echo $img_profile ?>" alt="" style="width: 100%; height: 250px">
                                </a>
                                <div class="listing-avatar"><a href="<?php //echo base_url('find/detail/'. $rows['id_lapangan']) 
                                                                        ?>">
                                        <img src="<?php echo $img_profile ?>" alt="">
                                    </a>
                                    <span class="avatar-tooltip">Lapangan <strong><?php echo $rows['nama_lapangan'] ?></strong></span>
                                </div>
                            </div>

                            <div class="geodir-category-content fl-wrap">
                                <div class="geodir-category-content-title fl-wrap">
                                    <div class="geodir-category-content-title-item">
                                        <h3 class="title-sin_map"><a href="<?php echo base_url('find/detail/' . $rows['id_lapangan']) ?>"><?php echo $rows['nama_lapangan'] ?></a><span class="verified-badge"><i class="fal fa-check"></i></span></h3>
                                        <div class="geodir-category-location fl-wrap"><a href="#1" class="map-item"><i class="fas fa-map-marker-alt"></i>3JFJ+2VQ, Jl. Ikan Tombro, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142</a></div>
                                    </div>
                                </div>
                                <div class="geodir-category-text fl-wrap">
                                    <p class="small-text"><?php

                                                            $text = $rows['deskripsi_lapangan'];
                                                            if (strlen($text) > 150) {

                                                                echo substr($text, 0, 155);
                                                            } else echo $text;

                                                            ?>.</p>

                                    <div class="facilities-list fl-wrap" style="margin-bottom: 20px">
                                        <div class="facilities-list-title">Informasi Tim : </div>
                                        <ul class="no-list-style">
                                            <li class="tolt" data-microtip-position="top" data-tooltip="Dapat Dihubungi"><i class="fal fa-envelope"></i>
                                            </li>
                                            <li class="tolt" data-microtip-position="top" data-tooltip="Tersedia Lokasi"><i class="fal fa-map-marker-alt"></i>
                                            </li>
                                            <li class="tolt" data-microtip-position="top" data-tooltip="Memiliki Galeri"><i class="fal fa-search-plus"></i></li>
                                            <li class="tolt" data-microtip-position="top" data-tooltip="Sudah terbuat tim"><i class="fal fa-users"></i></li>
                                        </ul>
                                    </div>

                                </div>
                                <!-- sewa 1 -->

                                <div class="listing-item" style="width:390px ;">
                                    <table class=" table" id="active-datatable" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pemesan</th>
                                                <th>Lapangan</th>
                                                <th>jadwal</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $nomor = 1;
                                            foreach ($sewa as $row) :
                                                if ($row['status'] == "disetujui") {
                                            ?>

                                                    <tr>
                                                        <td><?php echo $nomor++ ?></td>
                                                        <td><?php echo $row['nama'] ?></td>
                                                        <td><?php echo $row['nama_lapangan'] ?></td>
                                                        <td><?php echo "(" . $row['start_time'] . ") - (" . $row['end_time'] . ")" ?></td>

                                                    </tr>

                                                    <!--Small Bootstrap Modal-->
                                                    <!--===================================================-->

                                                    <!--===================================================-->
                                                    <!--End Small Bootstrap Modal-->
                                            <?php }
                                            endforeach;

                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
                <?php foreach ($lapangan2 as $rows) : ?>
                    <div class="listing-item">
                        <article class="geodir-category-listing fl-wrap">
                            <div class="geodir-category-img">

                                <?php

                                $img_profile = "";
                                if ($rows['gambar_lapangan']) {

                                    $img_profile = base_url('assets/images/lapangan/' . $rows['gambar_lapangan']);
                                } else {

                                    $img_profile = base_url('assets/images/5.png');
                                }

                                ?>
                                </a>
                                <span class="avatar-tooltip">Lapangan<strong><?php echo $rows['nama_lapangan'] ?></strong></span>
                                <a href="<?php echo base_url('member/sewa/detail/' . $rows['id_lapangan']) ?>" class="geodir-category-img-wrap fl-wrap">
                                    <img src="<?php echo $img_profile ?>" alt="" style="width: 100%; height: 250px">
                                </a>
                                <div class="listing-avatar"><a href="<?php //echo base_url('find/detail/'. $rows['id_lapangan']) 
                                                                        ?>">
                                        <img src="<?php echo $img_profile ?>" alt="">
                                    </a>
                                    <span class="avatar-tooltip">Lapangan <strong><?php echo $rows['nama_lapangan'] ?></strong></span>
                                </div>
                            </div>

                            <div class="geodir-category-content fl-wrap">
                                <div class="geodir-category-content-title fl-wrap">
                                    <div class="geodir-category-content-title-item">
                                        <h3 class="title-sin_map"><a href="<?php echo base_url('find/detail/' . $rows['id_lapangan']) ?>"><?php echo $rows['nama_lapangan'] ?></a><span class="verified-badge"><i class="fal fa-check"></i></span></h3>
                                        <div class="geodir-category-location fl-wrap"><a href="#1" class="map-item"><i class="fas fa-map-marker-alt"></i>3JFJ+2VQ, Jl. Ikan Tombro, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142</a></div>
                                    </div>
                                </div>
                                <div class="geodir-category-text fl-wrap">
                                    <p class="small-text"><?php

                                                            $text = $rows['deskripsi_lapangan'];
                                                            if (strlen($text) > 150) {

                                                                echo substr($text, 0, 155);
                                                            } else echo $text;

                                                            ?>.</p>

                                    <div class="facilities-list fl-wrap" style="margin-bottom: 20px">
                                        <div class="facilities-list-title">Informasi Tim : </div>
                                        <ul class="no-list-style">
                                            <li class="tolt" data-microtip-position="top" data-tooltip="Dapat Dihubungi"><i class="fal fa-envelope"></i>
                                            </li>
                                            <li class="tolt" data-microtip-position="top" data-tooltip="Tersedia Lokasi"><i class="fal fa-map-marker-alt"></i>
                                            </li>
                                            <li class="tolt" data-microtip-position="top" data-tooltip="Memiliki Galeri"><i class="fal fa-search-plus"></i></li>
                                            <li class="tolt" data-microtip-position="top" data-tooltip="Sudah terbuat tim"><i class="fal fa-users"></i></li>
                                        </ul>
                                    </div>

                                </div>


                                <!-- sewa 2 -->
                                <div class="listing-item" style="width:390px ;">
                                    <table class=" table" id="active-datatable" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pemesan</th>
                                                <th>Lapangan</th>
                                                <th>jadwal</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            // if ($sewa['id_lapangan'] == $rows['id_lapangan']) {

                                            $nomor = 1;
                                            foreach ($sewa2 as $row) : ?>

                                                <tr>
                                                    <td><?php echo $nomor++ ?></td>
                                                    <td><?php echo $row['nama'] ?></td>
                                                    <td><?php echo $row['nama_lapangan'] ?></td>
                                                    <td><?php echo "(" . $row['start_time'] . ") - (" . $row['end_time'] . ")" ?></td>

                                                </tr>

                                                <!--Small Bootstrap Modal-->
                                                <!--===================================================-->

                                                <!--===================================================-->
                                                <!--End Small Bootstrap Modal-->
                                            <?php endforeach;
                                            // }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>







                <!-- listing-item end -->



                <div id="container" class="cls-container" style="background-color: #c5c6c7;">

                    <!-- LOGIN FORM -->
                    <!--===================================================-->
                    <div class="cls-content" style="z-index: 1">
                        <div class="cls-content-sm panel" style="background-color: #fff;">
                            <div class="text-center">
                                <!-- <img src="<?php echo base_url() ?>assets/img/futsal2.png" alt="logo" style="width: 100px"> -->
                                <br>
                                <h1 class="h3">Pesan Sekarang</h1>
                                <p>Misi data dibawah ini dengan benar</p>
                            </div>
                            <hr>
                            <?php echo $this->session->userdata('msg') ?>
                            <form action="<?php echo base_url('member/sewa/pesan_process') ?>" method="POST" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <div class="custom-form">
                                        <div class="form-group">
                                            <p class="text-semibold" style="text-align:left;">Lapangan</p>
                                            <div class="listsearch-input-item ">
                                                <select data-placeholder="Data Lapangan" name="id_lapangan" class="chosen-select no-search-select" required="">
                                                    <option value="">-- Pilih Lokasi Lapangan --</option>

                                                    <?php foreach ($pilih->result_array() as $rowLapangan) : ?>
                                                        <option value="<?php echo $rowLapangan['id_lapangan'] ?>"><?php echo $rowLapangan['nama_lapangan'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <input type="hidden" class="form-control" name="id_user" value="<?php echo  $this->session->userdata('sess_id_user') ?>" placeholder="Masukkan nama pemesan" required="" />
                                            <input type="hidden" class="form-control" name="status" value="belum_disetujui" placeholder="Masukkan nama pemesan" required="" />
                                            <div class="form-group">
                                                <p class="text-semibold" style="text-align:left;">Nama Pemesan</p>
                                                <input type="text" class="form-control" name="nama" value="<?php echo  $this->session->userdata('sess_username') ?>" placeholder="Masukkan nama pemesan" required="" />
                                            </div>
                                            <div class="form-group">
                                                <p class="text-semibold" style="text-align:left;">Tanggal</p>
                                                <input type="date" class="form-control" name="tanggal" placeholder="Masukkan nama lapangan" required="" />
                                            </div>
                                            <div class="form-group">
                                                <p class="text-semibold" style="text-align:left;">Jam</p>
                                            </div>
                                            <?php date_default_timezone_set("Asia/Jakarta"); ?>

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="time" class="form-control" name="start_time" value="<?php echo date("H:i"); ?>" placeholder="Masukkan nama lapangan" required="" />
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <input class="form-control" value="=" readonly />
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="time" class="form-control" name="end_time" placeholder="Masukkan nama lapangan" required="" />
                                                </div>
                                            </div>
                                            <?php if (empty($this->session->userdata('sess_id_user'))) { ?>
                                                <button class="btn btn-primary btn-block" type="button" onClick="return confirm('Harap Login Terlebih Dahulu');" readonly>Pesan</button>
                                            <?php } else { ?>
                                                <button class="btn btn-primary btn-block" type="submit">Pesan</button>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="pad-all">
                                        <small>kesulitan mengakses aplikasi, harap hubungi admin</small> <br>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>