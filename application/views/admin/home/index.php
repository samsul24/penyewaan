<!-- Begin Page Content -->
<script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
        <small>
            <div class="text-muted"><a href="<?php echo base_url("admin/home"); ?>">
                    Beranda </a>
            </div>
        </small>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4 border-bottom-primary">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sekilas Info</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url(); ?>assets/images/dashboard.svg" alt="">
                    </div>


                    <div class="alert alert-primary" role="alert">
                        <center>
                            <h6 class="alert-heading">Selamat Datang Pengurus

                                <b>Admin</b>
                                di halaman pengurus <b>Baiti Jannati</b>
                            </h6>
                        </center>
                        <hr>
                        <h1 class="alert-heading">
                            <center>Sisa Saldo Keuangan <b>Rp. </b>
                            </center>
                        </h1>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="listing-item-grid_container fl-wrap">
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $this->db->get('user')->num_rows() ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hand-holding-heart fa-2x text-gray-300"></i>
                            </div>

                        </div>
                    </div>
                    <a href="<?php echo base_url("admin/pemasukan_non_donasi"); ?>" class="btn btn-primary"> <i class="fas fa-fw fa-eye"></i>&nbsp;Detail </a>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Pesanan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $this->db->get_where('data_sewa', array('status' => 'belum_selesai'))->num_rows() ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url("admin/users"); ?>" class="btn btn-primary"> <i class="fas fa-fw fa-eye"></i>&nbsp;Detail </a>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Lapangan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $this->db->get_where('lapangan')->num_rows() ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-funnel-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url("admin/pengeluaran_donasi"); ?>" class="btn btn-primary"> <i class="fas fa-fw fa-eye"></i>&nbsp;Detail </a>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Pengumuman</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $this->db->get_where('pengumuman')->num_rows() ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url("admin/kategori"); ?>" class="btn btn-primary"> <i class="fas fa-fw fa-eye"></i>&nbsp;Detail </a>
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-white">Grafik Sewa Perbulan Lapangan 1 pada
                            Tahun
                            <?= date('Y'); ?>
                        </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="list-single-main-item fl-wrap block_box">
                        <!-- chart-wra-->
                        <div class="chart-wrap   fl-wrap">
                            <div class="chart-header fl-wrap">
                                <div id="myChart"></div>
                            </div>
                            <canvas id="canvas-chart"></canvas>
                        </div>
                        <!--chart-wrap end-->
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-white">Grafik Sewa Perbulan Lapangan 2 pada
                            Tahun
                            <?= date('Y'); ?>
                        </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="list-single-main-item fl-wrap block_box">
                        <!-- chart-wra-->
                        <div class="chart-wrap fl-wrap">
                            <div class="chart-header fl-wrap">
                                <div id="myChartLegend2"></div>
                            </div>
                            <canvas id="canvas-chart2"></canvas>
                        </div>
                        <!--chart-wrap end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="<?php echo base_url() ?>assets/js/charts.js"></script>

<script>
    'use strict';

    function legendClickCallback1(event) {
        event = event || window.event;

        var target = event.target || event.srcElement;
        while (target.nodeName !== 'LI') {
            target = target.parentElement;
        }
        var parent = target.parentElement;
        var chartId = parseInt(parent.classList[0].split("-")[0], 10);
        var chart = Chart.instances[chartId];
        var index = Array.prototype.slice.call(parent.children).indexOf(target);
        var meta = chart.getDatasetMeta(index);
        if (meta.hidden === null) {
            meta.hidden = !chart.data.datasets[index].hidden;
            target.classList.add('hidden-lable');
        } else {
            target.classList.remove('hidden-lable');
            meta.hidden = null;
        }
        chart.update();
    }
    var config = {
        type: 'line',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                    label: 'Data Sewa',
                    fill: true,
                    animation: false,
                    backgroundColor: "rgba(94, 207, 177, 0.2)",
                    borderColor: "#5ECFB1",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointBorderColor: "#1f2833",
                    pointHoverBorderWidth: 1,
                    data: [<?php echo implode(', ', $charts) ?>]
                }

            ]
        },
        options: {
            legend: {
                display: false
            },
            hover: {
                onHover: function(e) {
                    var point = this.getElementAtEvent(e);
                    if (point.length) e.target.style.cursor = 'pointer';
                    else e.target.style.cursor = 'default';
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "rgba(0,0,0,0.2)",
                        fontStyle: "bold",
                        beginAtZero: true,

                        padding: 20
                    },
                    gridLines: {

                        display: true,
                        zeroLineColor: "transparent"
                    }

                }],
                xAxes: [{
                    gridLines: {
                        zeroLineColor: "transparent"
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold"
                    }
                }],

            },
            tooltips: {
                backgroundColor: "rgba(0,0,0,0.6)",
                titleMarginBottom: 10,
                footerMarginTop: 6,
                xPadding: 22,
                yPadding: 12
            }
        }
    };
    var ctx = document.getElementById("canvas-chart");
    var myLegendContainer = document.getElementById("myChart");

    var myChart = new Chart(ctx, config);
    myLegendContainer.innerHTML = myChart.generateLegend();
    var legendItems = myLegendContainer.getElementsByTagName('li');
    for (var i = 0; i < legendItems.length; i += 1) {
        legendItems[i].addEventListener("click", legendClickCallback1, false);
    }
</script>

<script>
    'use strict';

    function legendClickCallback2(event) {
        event = event || window.event;

        var target = event.target || event.srcElement;
        while (target.nodeName !== 'LI') {
            target = target.parentElement;
        }
        var parent = target.parentElement;
        var chartId = parseInt(parent.classList[0].split("-")[0], 10);
        var chart = Chart.instances[chartId];
        var index = Array.prototype.slice.call(parent.children).indexOf(target);
        var meta = chart.getDatasetMeta(index);
        if (meta.hidden === null) {
            meta.hidden = !chart.data.datasets[index].hidden;
            target.classList.add('hidden-lable');
        } else {
            target.classList.remove('hidden-lable');
            meta.hidden = null;
        }
        chart.update();
    }
    var config = {
        type: 'line',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                    label: 'Data Sewa',
                    fill: true,
                    animation: false,
                    backgroundColor: "rgba(94, 207, 177, 0.2)",
                    borderColor: "#5ECFB1",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointBorderColor: "#1f2833",
                    pointHoverBorderWidth: 1,
                    data: [<?php echo implode(', ', $charts2) ?>]
                }

            ]
        },
        options: {
            legend: {
                display: false
            },
            hover: {
                onHover: function(e) {
                    var point = this.getElementAtEvent(e);
                    if (point.length) e.target.style.cursor = 'pointer';
                    else e.target.style.cursor = 'default';
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "rgba(0,0,0,0.2)",
                        fontStyle: "bold",
                        beginAtZero: true,

                        padding: 20
                    },
                    gridLines: {

                        display: true,
                        zeroLineColor: "transparent"
                    }

                }],
                xAxes: [{
                    gridLines: {
                        zeroLineColor: "transparent"
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold"
                    }
                }],

            },
            tooltips: {
                backgroundColor: "rgba(0,0,0,0.6)",
                titleMarginBottom: 10,
                footerMarginTop: 6,
                xPadding: 22,
                yPadding: 12
            }
        }
    };
    var ctx = document.getElementById("canvas-chart2");
    var myLegendContainer = document.getElementById("myChartLegend2");

    var myChart = new Chart(ctx, config);
    myLegendContainer.innerHTML = myChart.generateLegend();
    var legendItems = myLegendContainer.getElementsByTagName('li');
    for (var i = 0; i < legendItems.length; i += 1) {
        legendItems[i].addEventListener("click", legendClickCallback2, false);
    }
</script>