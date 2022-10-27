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
                                                    <a href=":;" data-target="#ubah-lapangan-<?php echo $row['id'] ?>" data-toggle="modal" class="btn btn-icon"><i class="ti-pencil"></i></a>
                                                    <a href="<?php echo base_url('admin/lapangan/proseshapus/' . $row['id']) ?>" class="btn btn-icon" onclick="return confirm('Apakah anda yakin ingin menghapus lapangan <?php echo $row['objek'] ?>')"><i class="ti-trash"></i></a>
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