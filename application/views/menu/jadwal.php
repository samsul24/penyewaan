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
        <!--  section  end-->
        <section id="sec1" data-scrollax-parent="true">
            <div class="container">
                <div class="section-title">
                    <h2>Jadwal Lapangan</h2>
                    <div class="section-subtitle">Gor Tombro</div>
                    <p>Ayo Tanding, Hidup sehat untuk bangkit</p>
                </div>
                <!--about-wrap -->
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">

                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <!--Start-->
                                <!--===================================================-->
                                <div class="panel">
                                    <!--Chart information-->
                                    <div class="panel-body" style="background-color:#c5c6c7 ;">

                                        <?php echo $this->session->flashdata('msg') ?>

                                        <h4 class="">Tabel Lapangan</h4>
                                        <label>Menampilkan daftar lapangan</label> <br>

                                        <!--Small Bootstrap Modal-->
                                        <table class=" table" id="active-datatable" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Lapangan</th>
                                                    <th>Deskripsi</th>
                                                    <th>Status</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($lapangan->num_rows() > 0) {

                                                    $nomor = 1;
                                                    foreach ($lapangan->result_array() as $row) :
                                                ?>
                                                        <tr>
                                                            <td><?php echo $nomor++ ?></td>
                                                            <td><?php echo $row['nama_lapangan'] ?>
                                                                <br>
                                                                <?php

                                                                if ($row['gambar_lapangan']) {

                                                                    $link = base_url('assets/img/img-lapangan/' . $row['gambar_lapangan']);
                                                                    echo '<a class="btn-link text-sm text-main" href="' . $link . '" target="_blank">lihat gambar lapangan</a>';
                                                                } else {

                                                                    echo '<small class="text-muted">tidak memiliki gambar</small>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $row['deskripsi_lapangan'] ?></td>
                                                            <td>
                                                                <?php

                                                                $warnaLabel = "";
                                                                $textLabel  = "";
                                                                if ($row['status_lapangan'] == "tersedia") {

                                                                    $warnaLabel = "label label-success";
                                                                    $textLabel  = "Tersedia";
                                                                } else {
                                                                    $warnaLabel = "label label-default";
                                                                    $textLabel  = "Tidak Tersedia";
                                                                }
                                                                ?>

                                                                <label class="<?php echo $warnaLabel ?>"><?php echo $textLabel ?></label>
                                                            </td>

                                                        </tr>
                                                <?php endforeach;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <div class="clearfix"></div>
    <div class="testimonilas-carousel-wrap fl-wrap">
        <div class="tc-pagination"></div>
    </div>
    </section>
    <!--section end-->
</div>
<!--content end-->
</div>
<!-- wrapper end-->