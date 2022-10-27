        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">

            <div id="page-head">

                <div class="text-center">
                    <h3>Data Lapangan.</h3>
                    <p>Merekap secara keseluruhan data lapangan yang ada di malang.</p>
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

                                <h4 class="">Tabel Lapangan</h4>
                                <label>Menampilkan daftar lapangan</label> <br>

                                <!-- <a href=" <?= base_url('admin/lapangan/post'); ?>" class="btn btn-primary btn-sm btn-labeled"><i class="btn-label ti-plus"></i>Tambah Lapangan Baru</a> <br><br> -->
                                <!--Small Bootstrap Modal-->
                                <table class=" table" id="active-datatable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lapangan</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <!-- <th>Opsi</th> -->
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

                                                            $link = base_url('assets/images/lapangan/' . $row['gambar_lapangan']);
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
                                                    <!-- <td>
                                                        <a href=":;" data-target="#add-user" data-id="<?php echo $row['id_lapangan']; ?>" data-toggle="modal" class="btn btn-icon"><i class="ti-pencil"></i></a>
                                                        <a href="<?php echo $row['id_lapangan'] ?>" data-target="<?php echo $row['id_lapangan'] ?>" onclick="proses()" data-toggle="modal" class="btn btn-icon"><i class="ti-eye"></i></a>
                                                        <a href="<?php echo base_url('admin/lapangan/proseshapus/' . $row['id_lapangan']) ?>" class="btn btn-icon" onclick="return confirm('Apakah anda yakin ingin menghapus lapangan <?php echo $row['nama_lapangan'] ?>')"><i class="ti-trash"></i></a>
                                                    </td> -->
                                                </tr>

                                                <!--Small Bootstrap Modal-->
                                                <!--===================================================-->
                                                <div class="modal fade" id="add-user">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title">Tambah Dosen Pembimbing</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="box-body">
                                                                    <form enctype="multipart/form-data" action="<?php echo base_url('panitia/dosbing_add'); ?>" method="post">
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <label>Nama</label>
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" class="form-control form-control-sm" name="nama">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <label>NIP</label>
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <input type="number" class="form-control form-control-sm" name="nip" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <label>Username</label>
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" class="form-control form-control-sm" name="username" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <label>Password</label>
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" class="form-control form-control-sm" name="password" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>



                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <label>Kuota</label>
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <input value="1" type="number" class="form-control form-control-sm" name="kuota" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <label>Foto</label>
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <input type='file' name='image' size='20' />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-info mr-2">Simpan Data</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    </form>
                                                                </div>

                                                            </div>
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

        <head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        </head>

        <body>
            <!-- Membuat Tombol Penampil -->
            <button id="cari" name="cari" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center" onclick="proses()">Tampilkan Modal <i class="bi bi-search"></i></button>
        </body>

        </html>

        <script>
            function proses() {
                Swal.fire({
                    width: 500,
                    title: '<strong>DetailPenyewaan</strong>',
                    icon: 'info',
                    html: `
                    <table id="detail" class="table table-bordered table-striped" border=1 responsive>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Lapangan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Opsi</th>
                
                </tr>
            </thead>
            <tbody>

            <?php $nomor = 1;
            foreach ($sewa as $row) : ?>

                <tr>
                ` +
                        '<td>' + "<?php echo $nomor++ ?>" + '</td>' +
                        '<td>' + "<?php echo $row['nama'] ?>" + '</td>' +
                        '<td>' + "<?php echo $row['nama_lapangan'] ?>" + '</td>' +
                        '<td>' + "<?php echo $row['tanggal'] ?>" + '</td>' +
                        '<td>' + "<?php echo "(" . $row['start_time'] . ") - (" . $row['end_time'] . ")" ?>" + '</td>' +
                        '<td>' +
                        "<?php

                            $warnaLabelJadwal = "";
                            $textLabeljadwal  = "";
                            if ($row['status'] == "disetujui") {

                                $warnaLabelJadwal = "label label-success";
                                $textLabeljadwal  = "Disetujui";
                            } else {
                                $warnaLabelJadwal = "label label-default";
                                $textLabeljadwal  = "Belum Disetujui";
                            }
                            ?>" +
                        '<label class ="<?php echo $warnaLabelJadwal ?>"> <?php echo $textLabeljadwal ?> </label>' +
                        '</td>' +
                        '<td> <a href=":;" data-target="#add-user" data-toggle="modal" class="btn btn-icon"><i class="ti-pencil"></i></a> </td>' +
                        '</form>' +
                        `</tr>
                        <?php endforeach; ?>
    </tbody>
    </table>`,
                    showCloseButton: true,
                    showCancelButton: false,
                    focusConfirm: false,
                    confirmButtonAriaLabel: 'Thumbs up, great!',
                    cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
                    cancelButtonAriaLabel: 'Thumbs down'
                })
            }
        </script>