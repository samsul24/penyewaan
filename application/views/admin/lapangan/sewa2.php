        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">

            <div id="page-head">

                <div class="text-center">
                    <h3>Data Lapangan 2.</h3>
                    <p>Merekap secara keseluruhan data sewa lapangan 2 </p>
                </div>

            </div>
            <?php
            // var_dump($sewa2);
            // exit; 
            ?>

            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <!--Start-->
                        <!--===================================================-->
                        <div class="panel">
                            <!--Chart information-->
                            <div class="panel-body">

                                <?php echo $this->session->flashdata('msg') ?>

                                <h4 class="">Tabel Lapangan 2</h4>
                                <label>Menampilkan daftar lapangan</label> <br>

                                <!-- <a href=" <?= base_url('admin/lapangan/post'); ?>" class="btn btn-primary btn-sm btn-labeled"><i class="btn-label ti-plus"></i>Tambah Lapangan Baru</a> <br><br> -->
                                <!--Small Bootstrap Modal-->
                                <table class=" table" id="active-datatable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lapangan</th>
                                            <th>Nama Pemesan</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($sewa > 0) {

                                            $nomor = 1;
                                            foreach ($sewa as $row) :
                                        ?>
                                                <tr>
                                                    <td><?php echo $nomor++ ?></td>
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
                                                    <td><?php echo $row['nama'] ?>
                                                    <td><?php echo $row['tanggal'] ?></td>
                                                    <td><?php echo "(" . $row['start_time'] . ") - (" . $row['end_time'] . ")" ?></td>
                                                    <td>
                                                        <?php

                                                        $warnaLabel = "";
                                                        $textLabel  = "";
                                                        if ($row['status'] == "disetujui") {

                                                            $warnaLabel = "label label-success";
                                                            $textLabel  = "Disetujui";
                                                        } else {
                                                            $warnaLabel = "label label-default";
                                                            $textLabel  = "Belum Disetujui";
                                                        }
                                                        ?>

                                                        <label class="<?php echo $warnaLabel ?>"><?php echo $textLabel ?></label>
                                                    </td>
                                                    <td>
                                                        <a href=":;" data-target="#ubah-sewa-<?php echo $row['id_sewa'] ?>" data-toggle="modal" class="btn btn-icon"><i class="ti-pencil"></i></a>

                                                        <a href="<?php echo base_url('admin/lapangan/proseshapus/' . $row['id_sewa']) ?>" class="btn btn-icon" onclick="return confirm('Apakah anda yakin ingin menghapus lapangan <?php echo $row['nama_lapangan'] ?>')"><i class="ti-trash"></i></a>
                                                    </td>
                                                </tr>

                                                <!--Small Bootstrap Modal-->
                                                <!--===================================================-->
                                                <div id="ubah-sewa-<?php echo $row['id_sewa'] ?>" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                                                <h4 class="modal-title" id="mySmallModalLabel">Sunting Sewa</h4>
                                                            </div>

                                                            <form action="<?php echo base_url('admin/lapangan/ubah_process/' . $row['id_sewa']) ?>" method="POST" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <p>Isi form dibawah ini untuk menambah data lapangan.</p>

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
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input type="text" style="text-align: center;" class="form-control" name="start_time" value="<?php echo $row['start_time'] ?>" required="" readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input type="text" style="text-align: center;" class="form-control" value="s/d" readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input type="text" style="text-align: center;" class="form-control" name="end_time" value="<?php echo $row['end_time'] ?>" required="" readonly />
                                                                        </div>
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

                                                                                    <input id="demo-inline-form-radio-2<?php echo $row['id_sewa'] ?>" class="magic-radio" type="radio" name="status" value="tidak_disetujui" <?php if ($row['status']  == "tidak_disetujui") {
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
                                                <!--===================================================-->
                                                <!--End Small Bootstrap Modal-->
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