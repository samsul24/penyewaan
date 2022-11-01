<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sewa Lapangan 1</h1>
        <small>
            <div class="text-muted"> Manajemen Data &nbsp;/&nbsp; <a href="<?php echo base_url("admin/sewa/sewa1"); ?>">Sewa Lapangan 1</a>
            </div>
        </small>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Sewa Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($data_sewa_hari as $dt) : ?>
                                    <?= $dt ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Sewa Bulan Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($data_sewa_bulan as $dt) : ?>
                                    <?= $dt ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Sewa Tahun Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($data_sewa_tahun as $dt) : ?>
                                    <?= $dt ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Seluruh Data Sewa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('data_sewa', array('status' => 'disetujui', 'id_lapangan' => 1))->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-database fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data sewa</h6>
        </div>
        <div class="card-body border-bottom-primary">
            <?= $this->session->flashdata('msg'); ?>
            <p>

            <form method="post" action="<?= base_url('admin/sewa/filter1'); ?>">
                <label class="text-primary"><b>Filter Data Berdasarkan Tanggal</b></label>
                <div class=" form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="date" class="form-control form-control-user  border-left-primary" id="start" name="start" placeholder="Start Date" required value="<?php echo $this->session->userdata('startSession') ?>">
                        <?= form_error('startdate', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-3">
                        <input type="date" class="form-control form-control-user  border-left-primary" id="end" name="end" placeholder="End Date" required value="<?php echo $this->session->userdata('endSession') ?>">
                    </div>
                    <div class="col-sm-3">
                        <label></label>
                        <button type="submit" class=" btn btn-primary"><i class="fas fa-filter"></i>&nbsp;Filter</button>
                        <a href="<?php echo base_url("admin/sewa/sewa1"); ?>" class="btn btn-success"> <i class="fas fa-sync-alt"></i>&nbsp; </a>
                    </div>

                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-primary" style=" text-align: center;">Nama Lapangan</th>
                            <th class="text-primary" style=" text-align: center;">Nama Pemesan</th>
                            <th class="text-primary" style=" text-align: center;">Tanggal</th>
                            <th class="text-primary" style=" text-align: center;">Waktu</th>
                            <th class="text-primary" style=" text-align: center;">Status</th>
                            <th class="text-primary" style=" text-align: center;">Opsi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($sewa as $row) : ?>
                            <tr>
                                <td style=" text-align: center;"><?= $no++ ?></td>
                                <td><?php echo $row['nama_lapangan'] ?>
                                    <br>
                                    <?php

                                    if ($row['gambar_lapangan']) {

                                        $link = base_url('assets/images/lapangan/' . $row['gambar_lapangan']);
                                        echo '<a class="btn-link text-sm text-main" href="' . $link . '" target="_blank">lihat gambar lapangan</a>';
                                    } else {

                                        echo '<small class="text-muted">tidak memiliki gambar</small>';
                                    }
                                    ?>
                                </td>
                                <td style=" text-align: center;"><?php echo $row['nama'] ?>
                                <td style=" text-align: center;"><?php echo $row['tanggal'] ?></td>
                                <td style=" text-align: center;"><?php echo "(" . $row['jam_mulai'] . ") - (" . $row['jam_selesai'] . ")" ?></td>
                                <?php if ($row['status'] == "disetujui") : ?>
                                    <td class="project-state" style=" text-align: center;">
                                        <span class="badge badge-success">Disetujui</span>
                                    </td>
                                <?php else : ?>
                                    <td class="project-state" style=" text-align: center;">
                                        <span class="badge badge-danger">Panding</span>
                                    </td>
                                <?php endif ?>
                                <td style=" text-align: center;">
                                    <a class=' btn-circle btn-primary' data-target="#ubah-sewa-<?php echo $row['id_sewa'] ?>" data-toggle="modal">
                                        <i class="fas fa-PEN" aria-hidden="true" style="color: white;"></i>
                                    </a>
                                    <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/sewa/hapus_process1/' . $row['id_sewa']) ?>')" class='btn btn-circle btn-danger'>
                                        <i class="fas fa-trash" aria-hidden="true" style="color: white;"></i>
                                    </a>
                                </td>
                            </tr>
                            <div id="ubah-sewa-<?php echo $row['id_sewa'] ?>" class="modal fade" tabindex="-1">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                            <h4 class="modal-title" id="mySmallModalLabel">Sunting Sewa</h4>
                                        </div>

                                        <form action="<?php echo base_url('admin/sewa/ubah_process1/' . $row['id_sewa']) ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <p>Isi form dibawah ini untuk menambah data lapangan.</p>

                                                <input type="hidden" class="form-control" name="durasi" value="<?php echo $row['durasi'] ?>" readonly />
                                                <input type="hidden" class="form-control" name="id_user" value="<?php echo $row['id_user'] ?>" readonly />
                                                <input type="hidden" class="form-control" name="id_lapangan" value="<?php echo $row['id_lapangan'] ?>" readonly />
                                                <div class="form-group">
                                                    <label class="text-semibold">Nama Penyewa</label>
                                                    <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'] ?>" placeholder="Masukkan nama " required="" readonly />
                                                    <small>Berisi nama penyewa</small>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-semibold">Nama Lapangan</label>
                                                    <input type="text" class="form-control" name="nama_lapangan" value="<?php echo $row['nama_lapangan'] ?>" placeholder="Masukkan nama lapangan" required="" readonly />
                                                    <small>Berisi nama lapangan</small>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-semibold">Tanggal</label>
                                                    <input type="text" class="form-control" name="tanggal" value="<?php echo $row['tanggal'] ?>" required="" readonly />
                                                    <small>Berisi tanggal sewa</small>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-semibold">Waktu</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" style="text-align: center;" class="form-control" name="jam_mulai" value="<?php echo $row['jam_mulai'] ?>" required="" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" style="text-align: center;" class="form-control" value="s/d" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" style="text-align: center;" class="form-control" name="jam_selesai" value="<?php echo $row['jam_selesai'] ?>" required="" readonly />
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label class="text-semibold">Status Sewa</label>
                                                            <div class="radio">

                                                                <!-- Inline radio buttons -->
                                                                <input id="demo-inline-form-radio<?php echo $row['id_sewa'] ?>" class="magic-radio" type="radio" name="status" value="disetujui" <?php if ($row['status']  == "disetujui") {
                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                    } ?>>
                                                                <label for="demo-inline-form-radio<?php echo $row['id_sewa'] ?>">Disetujui</label>

                                                                <input id="demo-inline-form-radio-2<?php echo $row['id_sewa'] ?>" class="magic-radio" type="radio" name="status" value="belum_disetujui" <?php if ($row['status']  == "belum_disetujui") {
                                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                                            } ?>>
                                                                <label for="demo-inline-form-radio-2<?php echo $row['id_sewa'] ?>">Belum Disetujui</label> <br>
                                                                <small>Pilih status Sewa saat ini</small>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                                <button class="btn btn-primary">Simpan dan Perbarui</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalDelete">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><b>Konfirmasi Hapus Data</b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin akan menghapus data ini?
                                        </div>
                                        <div class="modal-footer">
                                            <form id="formDelete" action="" method="post">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <br>
                <div class="alert alert-primary" role="alert">
                    <p><b>*Catatan :</b>&nbsp;Pada tabel Sewa satu, hanya bisa mengubah & menghapus data. </p>
                </div>
            </div>


        </div>
    </div>
    <div class="content" id="tanggalfilter">

        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-8">
                <div class="card card-primary shadow-sm border-bottom-primary">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Filter Berdasarkan Tanggal</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url("admin/sewa/filterLaporanLapangan1"); ?>" method="POST" target='_blank'>
                            <input type="hidden" name="nilaifilter" value="1">
                            <input name="valnilai" type="hidden">
                            <div class="form-group">
                                <label for="tgl_pemasukan">Tanggal Awal</label>
                                <input type="date" class="form-control" name="tanggalawal" required="">
                            </div>
                            <div class="form-group">
                                <label for="tgl_pemasukan">Tanggal Akhir</label>
                                <input type="date" class="form-control" name="tanggalakhir" required="">
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;Cetak</button>
                            <button type="reset" name="reset" class="btn btn-dark "><i class="fas fa-sync-alt"></i>&nbsp;Reset</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <!-- /.container-fluid -->
    </div><br>
    <div class="content" id="bulanfilter">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="card card-primary shadow-sm border-bottom-primary">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Filter Berdasarkan Bulan</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url("admin/sewa/filterLaporanLapangan1"); ?>" method="POST" target='_blank'>
                            <input type="hidden" name="nilaifilter" value="2">
                            <input name="valnilai" type="hidden">
                            <div class="form-group">
                                <label for="">Pilih Tahun</label>
                                <select name="tahun1" required="" class="custom-select">
                                    <option value="" selected disabled>Pilih Tahun</option>
                                    <?php foreach ($tahun as $th) : ?>
                                        <option value="<?php echo $th['tahun'] ?>">
                                            <?php echo $th['tahun'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tgl_pemasukan">Bulan Awal</label>
                                <select name="bulanawal" id="bulanawal" class="custom-select" required="">
                                    title="Pilih Bulan">
                                    <option value="" selected disabled>-Pilih-</option>
                                    <option value="1">JANUARI</option>
                                    <option value="2">FEBRUARI</option>
                                    <option value="3">MARET</option>
                                    <option value="4">APRIL</option>
                                    <option value="5">MEI</option>
                                    <option value="6">JUNI</option>
                                    <option value="7">JULI</option>
                                    <option value="8">AGUSTUS</option>
                                    <option value="9">SEPTEMBER</option>
                                    <option value="10">OKTOBER</option>
                                    <option value="11">NOVEMBER</option>
                                    <option value="12">DESEMBER</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_pemasukan">Bulan Akhir</label>
                                <select name="bulanakhir" id="bulanakhir" class="custom-select" required="">
                                    title="Pilih
                                    Bulan">
                                    <option value="" selected disabled>-Pilih-</option>
                                    <option value="1">JANUARI</option>
                                    <option value="2">FEBRUARI</option>
                                    <option value="3">MARET</option>
                                    <option value="4">APRIL</option>
                                    <option value="5">MEI</option>
                                    <option value="6">JUNI</option>
                                    <option value="7">JULI</option>
                                    <option value="8">AGUSTUS</option>
                                    <option value="9">SEPTEMBER</option>
                                    <option value="10">OKTOBER</option>
                                    <option value="11">NOVEMBER</option>
                                    <option value="12">DESEMBER</option>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;Cetak</button>
                            <button type="reset" name="reset" class="btn btn-dark "><i class="fas fa-sync-alt"></i>&nbsp;Reset</button>
                            <!-- <a href="<?php echo base_url("user/laporan"); ?>" class="btn btn-primary"> <i
                class="fas fa-arrow-left"></i>&nbsp;Kembali </a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><br><br>
    <div class="content" id="tahunfilter">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="card card-primary shadow-sm border-bottom-primary">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Filter Berdasarkan Tahun</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url("admin/sewa/filterLaporanLapangan1"); ?>" method="POST" target='_blank'>
                            <input name="valnilai" type="hidden">
                            <input type="hidden" name="nilaifilter" value="3">
                            <div class="form-group">
                                <label for="">Pilih Tahun</label>
                                <select name="tahun2" required="" class="custom-select">
                                    <option value="" selected disabled>Pilih Tahun</option>
                                    <?php foreach ($tahun as $th) : ?>
                                        <option value="<?php echo $th['tahun'] ?>">
                                            <?php echo $th['tahun'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;Cetak</button>
                            <button type="reset" name="reset" class="btn btn-dark "><i class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>