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

                                <a href=" <?= base_url('admin/lapangan/post'); ?>" class="btn btn-primary btn-sm btn-labeled"><i class="btn-label ti-plus"></i>Tambah Lapangan Baru</a> <br><br>
                                <!--Small Bootstrap Modal-->
                                <table class=" table" id="active-datatable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lapangan</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
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
                                                    <td>
                                                        <a href=":;" data-target="#ubah-lapangan-<?php echo $row['id_lapangan'] ?>" data-toggle="modal" class="btn btn-icon"><i class="ti-pencil"></i></a>
                                                        <a href="@" data-target="#lihat-lapangan-<?php echo $row['id_lapangan'] ?>" onclick="proses()" data-toggle="modal" class="btn btn-icon"><i class="ti-eye"></i></a>
                                                        <a href="<?php echo base_url('admin/lapangan/proseshapus/' . $row['id_lapangan']) ?>" class="btn btn-icon" onclick="return confirm('Apakah anda yakin ingin menghapus lapangan <?php echo $row['nama_lapangan'] ?>')"><i class="ti-trash"></i></a>
                                                    </td>
                                                </tr>

                                                <!--Small Bootstrap Modal-->
                                                <!--===================================================-->
                                                <div id="lihat-lapangan-<?php echo $row['id_lapangan'] ?>" class="modal fade" tabindex="-1">
                                                    <?php if ($row['id_lapangan'] == 1) { ?>
                                                        <div class="modal-dialog modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                                                    <h4 class="modal-title" id="mySmallModalLabel">Jadwal</h4>
                                                                </div>

                                                                <form action="<?php echo base_url('admin/lapangan/prosesupdate/' . $row['id_lapangan']) ?>" method="POST" enctype="multipart/form-data">
                                                                    <div class="modal-body table-responsive">
                                                                        <div class="listing-item" style="width:390px ;">
                                                                            <table id="detail" class="table table-bordered table-striped" border=1 responsive>
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>No</th>
                                                                                        <th>Nama Lapangan</th>
                                                                                        <th>Deskripsi</th>
                                                                                        <th>Status</th>
                                                                                        <th>Opsi</th>

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php $nomor = 1;
                                                                                    foreach ($sewa as $row) : ?>
                                                                                        <tr>
                                                                                            <td> <?php echo $nomor++ ?> </td>
                                                                                            <td> <?php echo $row['nama'] ?> </td>
                                                                                            <td> <?php echo $row['nama_lapangan'] ?> </td>
                                                                                            <td> <?php echo "(" . $row['start_time'] . ") - (" . $row['end_time'] . ")" ?> </td>
                                                                                            `
                                                                                        </tr>
                                                                                    <?php endforeach; ?>
                                                                                </tbody>
                                                                            </table>

                                                                        </div>
                                                                    <?php } ?>

                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                                                        <button class="btn btn-primary">Simpan dan Perbarui</button>
                                                                    </div>
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
                                <button id="cari" name="cari" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">Tampilkan Modal <i class="bi bi-search"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        </head>
        <script>
            function proses() {
                Swal.fire({
                    width: 800,
                    title: '<strong>Data Ditemukan</strong>',
                    icon: 'info',
                    html: `
                    <table id="detail" class="table table-bordered table-responsive" border=1 responsive>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lapangan</th>
                    <th>Deskripsi</th>
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
                        '<td>' + "<?php echo "(" . $row['start_time'] . ") - (" . $row['end_time'] . ")" ?>" + '</td>' +
                        `</tr>
    </tbody>
    </table>` + ` </tbody> </table>`,
                    showCloseButton: true,
                    showCancelButton: false,
                    focusConfirm: false,
                    confirmButtonAriaLabel: 'Thumbs up, great!',
                    cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
                    cancelButtonAriaLabel: 'Thumbs down'
                })
            }
            <?php endforeach; ?>
        </script>