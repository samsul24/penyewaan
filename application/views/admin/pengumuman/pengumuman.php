    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">

        <div id="page-head">

            <div class="text-center">
                <h3>Data Pengumuman.</h3>
                <p>Merekap secara keseluruhan data Pengumuman yang ada di malang.</p>
            </div>

        </div>


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

                            <h4 class="">Tabel Pengumuman</h4>
                            <label>Menampilkan daftar Pengumuman</label> <br>

                            <a data-toggle="modal" href="<?= base_url('admin/pengumuman/post'); ?>" class="btn btn-primary btn-sm btn-labeled"><i class="btn-label ti-plus"></i>Tambah pengumuman baru</a> <br><br>
                            <!--Small Bootstrap Modal-->
                            <table class=" table" id="active-datatable" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Objek</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($pengumuman->num_rows() > 0) {

                                        $nomor = 1;
                                        foreach ($pengumuman->result_array() as $row) :
                                    ?>
                                            <tr>
                                                <td><?php echo $nomor++ ?></td>
                                                <td><?php echo $row['objek'] ?></td>
                                                <td><?php echo $row['deskripsi'] ?></td>
                                                <td>
                                                    <?php

                                                    $warnaLabel = "";
                                                    $textLabel  = "";
                                                    if ($row['status'] == "selesai") {

                                                        $warnaLabel = "label label-success";
                                                        $textLabel  = "Selesai";
                                                    } else {
                                                        $warnaLabel = "label label-warning";
                                                        $textLabel  = "Proses";
                                                    }
                                                    ?>

                                                    <label class="<?php echo $warnaLabel ?>"><?php echo $textLabel ?></label>
                                                </td>

                                                <td>
                                                    <a href=":;" data-target="#ubah-peng-<?php echo $row['id'] ?>" data-toggle="modal" class="btn btn-icon"><i class="ti-pencil"></i></a>
                                                    <a href="<?php echo base_url('admin/pengumuman/hapus_process/' . $row['id']) ?>" class="btn btn-icon" onclick="return confirm('Apakah anda yakin ingin menghapus Pengumuman <?php echo $row['objek'] ?>')"><i class="ti-trash"></i></a>
                                                </td>
                                            </tr>
                                            <div id="ubah-peng-<?php echo $row['id'] ?>" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                                            <h4 class="modal-title" id="mySmallModalLabel">Sunting Sewa</h4>
                                                        </div>

                                                        <form action="<?php echo base_url('admin/pengumuman/ubah_process/' . $row['id']) ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <p>Isi form dibawah ini untuk menambah data lapangan.</p>

                                                                <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>" readonly />
                                                                <div class="form-group">
                                                                    <label class="text-semibold">Obyek</label>
                                                                    <input type="text" class="form-control" name="objek" value="<?php echo $row['objek'] ?>" placeholder="Masukkan nama " required="" />
                                                                    <small>Berisi Judul</small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-semibold">Deskripsi</label>
                                                                    <input type="text" class="form-control" name="deskripsi" value="<?php echo $row['deskripsi'] ?>" placeholder="Masukkan nama lapangan" required="" />
                                                                    <small>Berisi deskripsi</small>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">

                                                                        <div class="form-group">
                                                                            <label class="text-semibold">Status </label>
                                                                            <div class="radio">

                                                                                <!-- Inline radio buttons -->
                                                                                <input id="demo-inline-form-radio<?php echo $row['id'] ?>" class="magic-radio" type="radio" name="status" value="selesai" <?php if ($row['status']  == "selesai") {
                                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                                            } ?>>
                                                                                <label for="demo-inline-form-radio<?php echo $row['id'] ?>">Selesai</label>

                                                                                <input id="demo-inline-form-radio-2<?php echo $row['id'] ?>" class="magic-radio" type="radio" name="status" value="belum_selesai" <?php if ($row['status']  == "belum_selesai") {
                                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                                    } ?>>
                                                                                <label for="demo-inline-form-radio-2<?php echo $row['id'] ?>">Proses</label> <br>
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