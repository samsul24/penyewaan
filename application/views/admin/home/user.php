<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
        <small>
            <div class="text-muted"> Beranda &nbsp;/&nbsp; <a href="<?php echo base_url("admin/lapangan"); ?>">User</a>
            </div>
        </small>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data User</h6>
        </div>
        <div class="card-body border-bottom-primary">
            <?= $this->session->flashdata('msg'); ?>
            <p>

            <div class="table-responsive">
                <table class="table table-bordered table-striped " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary" style=" text-align: center;">No.</th>
                            <th class="text-primary" style=" text-align: center;">Nama lengkap</th>
                            <th class="text-primary" style=" text-align: center;">Username</th>
                            <th class="text-primary" style=" text-align: center;">Email</th>
                            <th class="text-primary" style=" text-align: center;">No Telpon</th>
                            <th class="text-primary" style=" text-align: center;">Level</th>
                            <th class="text-primary" style=" text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($user->result_array() as $row) : ?>
                            <tr>
                                <td style=" text-align: center;"><?= $no++ ?></td>
                                <td><?= $row['nama_lengkap'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['no_telp'] ?></td>
                                <td><?php echo $row['level'] ?></td>
                                <td style=" text-align: center;">
                                    <a class=' btn-circle btn-primary' data-target="#ubah-data-<?php echo $row['id_user'] ?>" data-toggle="modal">
                                        <i class="fas fa-PEN" aria-hidden="true" style="color: white;"></i>
                                    </a>
                                    <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/home/hapus_process/' . $row['id_user']) ?>')" class='btn btn-circle btn-danger'>
                                        <i class="fas fa-trash" aria-hidden="true" style="color: white;"></i>
                                    </a>
                                </td>
                            </tr>

                            <div id="ubah-data-<?php echo $row['id_user'] ?>" class="modal fade" tabindex="-1">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="mySmallModalLabel">Sunting Sewa</h4>
                                        </div>

                                        <form action="<?php echo base_url('admin/home/ubah_process_user/' . $row['id_user']) ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <p>Isi form dibawah ini untuk Mengubah data .</p>

                                                <input type="hidden" class="form-control" name="username" readonly value="<?php echo $row['username'] ?>" readonly />
                                                <input type="hidden" class="form-control" name="password" readonly value="<?php echo $row['password'] ?>" readonly />
                                                <input type="hidden" class="form-control" name="id_user" readonly value="<?php echo $row['id_user'] ?>" readonly />
                                                <div class="form-group">
                                                    <label class="text-semibold">Status </label>
                                                    <input type="text" class="form-control" name="level" readonly value="<?php echo $row['level'] ?>" readonly placeholder="Masukkan nama " required="" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-semibold">Nama </label>
                                                    <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $row['nama_lengkap'] ?>" placeholder="Masukkan nama " required="" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-semibold">Email </label>
                                                    <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" placeholder="Masukkan nama " required="" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-semibold">No Telpon </label>
                                                    <input type="text" class="form-control" name="no_telp" value="<?php echo $row['no_telp'] ?>" placeholder="Masukkan nama " required="" />
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