<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lapangan</h1>
        <small>
            <div class="text-muted"> Manajemen Data &nbsp;/&nbsp; <a href="<?php echo base_url("admin/lapangan"); ?>">Lapangan</a>
            </div>
        </small>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data lapangan</h6>
        </div>
        <div class="card-body border-bottom-primary">
            <?= $this->session->flashdata('message'); ?>
            <p>

            <div class="table-responsive">
                <table class="table table-bordered table-striped " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary" style=" text-align: center;">No.</th>
                            <th class="text-primary" style=" text-align: center;">Nama lapangan</th>
                            <th class="text-primary" style=" text-align: center;">Deskripsi</th>
                            <th class="text-primary" style=" text-align: center;">Status</th>
                            <th class="text-primary" style=" text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($lapangan->result_array() as $row) : ?>
                            <tr>
                                <td style=" text-align: center;"><?= $no++ ?></td>
                                <td><?= $row['nama_lapangan'] ?>
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
                                <td><?php echo $row['deskripsi_lapangan'] ?></td>
                                <?php if ($row['status_lapangan'] == "tersedia") : ?>
                                    <td class="project-state" style=" text-align: center;">
                                        <span class="badge badge-success">Tersedia</span>
                                    </td>
                                <?php else : ?>
                                    <td class="project-state" style=" text-align: center;">
                                        <span class="badge badge-danger">Ditutup</span>
                                    </td>
                                <?php endif ?>



                                <td style=" text-align: center;">
                                    <a class=' btn-circle btn-primary' data-target="#ubah-data-<?php echo $row['id_lapangan'] ?>" data-toggle="modal">
                                        <i class="fas fa-PEN" aria-hidden="true" style="color: white;"></i>
                                    </a>
                                </td>
                            </tr>

                            <div id="ubah-data-<?php echo $row['id_lapangan'] ?>" class="modal fade" tabindex="-1">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="mySmallModalLabel">Sunting Lapangan</h4>
                                        </div>
                                        <form action="<?php echo base_url('admin/lapangan/ubah_process/' . $row['id_lapangan']) ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <p>Isi form dibawah ini untuk menambah data lapangan.</p>

                                                <input type="hidden" class="form-control" name="id_lapangan" value="<?php echo $row['id_lapangan'] ?>" readonly />
                                                <input type="hidden" class="form-control" name="date" value="<?php echo $row['date'] ?>" readonly />

                                                <div class="form-group">
                                                    <label class="text-semibold">Nama Lapangan</label>
                                                    <input type="text" class="form-control" name="nama_lapangan" value="<?php echo $row['nama_lapangan'] ?>" placeholder="Masukkan nama lapangan" required="" />
                                                    <small>Berisi nama lapangan</small>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-semibold">Deskripsi</label>
                                                    <input type="text" class="form-control" name="deskripsi_lapangan" value="<?php echo $row['deskripsi_lapangan'] ?>" required="" />
                                                    <small>Berisi deskripsi lapangan</small>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label class="text-semibold">Status Lapangan</label>
                                                            <div class="radio">

                                                                <!-- Inline radio buttons -->
                                                                <input id="demo-inline-form-radio<?php echo $row['id_lapangan'] ?>" class="magic-radio" type="radio" name="status_lapangan" value="tersedia" <?php if ($row['status_lapangan']  == "tersedia") {
                                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                                } ?>>
                                                                <label for="demo-inline-form-radio<?php echo $row['id_lapangan'] ?>">Tersedia</label>

                                                                <input id="demo-inline-form-radio-2<?php echo $row['id_lapangan'] ?>" class="magic-radio" type="radio" name="status_lapangan" value="tidak_tersedia" <?php if ($row['status_lapangan']  == "tidak_tersedia") {
                                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                                        } ?>>
                                                                <label for="demo-inline-form-radio-2<?php echo $row['id_lapangan'] ?>">Belum Tersedia</label> <br>
                                                                <small>Pilih status Sewa saat ini</small>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-semibold">Gambar</label>
                                                        <input type="file" class="form-control" name="userfile" />
                                                        <small>Pilih gambar</small>
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
                        <?php endforeach ?>
                    </tbody>
                </table>
                <br>
                <div class="alert alert-primary" role="alert">
                    <p><b>*Catatan :</b>&nbsp;Pada tabel lapangan hanya bisa mengubah data. </p>
                </div>
            </div>
        </div>
    </div>
</div>