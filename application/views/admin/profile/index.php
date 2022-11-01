<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil</h1>
        <small>
            <div class="text-muted"> Beranda &nbsp; / &nbsp; <a href="<?php echo base_url("admin/profile"); ?>">Profilku</a>
            </div>
        </small>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card mb-3  shadow-sm border-bottom-primary" style="max-width: 700px;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profil akun</h6>
        </div>
        <div class="row no-gutters">
            <div class="col-md-4">
                <?php $no = 1;
                foreach ($user as $row) : ?>
                    <img src="<?= base_url('assets/images/admin.png') ?>" class="card-img" alt="..." width="200%">
            </div>


            <div class="col-md-8">
                <div class="card-body">

                    <h5 class="card-title text-dark">Nama&nbsp;: <?= $row->nama_lengkap ?></h5>
                    <h5 class="card-title text-dark">Email &nbsp;: <?= $row->email ?></h5>
                    <h5 class="card-title text-dark">Tlp &nbsp;: <?= $row->no_telp ?></h5>
                    <h5 class="card-title text-dark">Hak Akses &nbsp;: <?= $row->level ?></h5>
                    <hr>
                    <a data-target="#ubah-data-<?php echo $row->id_user ?>" data-toggle="modal" class="btn btn-primary" style="color:white ;"> <i class="fas fa-pen" style="color:white ;"></i>&nbsp;Edit</a>
                    <a href="<?php echo base_url("admin/Change_Password"); ?>" class="btn btn-primary"> <i class="fas fa-key"></i>&nbsp;Ubah Password</a>

                    </p>
                </div>
                <div id="ubah-data-<?php echo $row->id_user ?>" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                <h4 class="modal-title" id="mySmallModalLabel">Sunting Sewa</h4>
                            </div>

                            <form action="<?php echo base_url('admin/home/ubah_process/' . $row->id_user) ?>" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <p>Isi form dibawah ini untuk menambah data lapangan.</p>

                                    <input type="hidden" class="form-control" name="username" value="<?php echo $row->username ?>" readonly />
                                    <input type="hidden" class="form-control" name="password" value="<?php echo $row->password ?>" readonly />
                                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $row->id_user ?>" readonly />
                                    <div class="form-group">
                                        <label class="text-semibold">Status </label>
                                        <input type="text" class="form-control" name="level" value="<?php echo $row->level ?>" readonly placeholder="Masukkan nama " required="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">Nama </label>
                                        <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $row->nama_lengkap ?>" placeholder="Masukkan nama " required="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">Email </label>
                                        <input type="text" class="form-control" name="email" value="<?php echo $row->email ?>" placeholder="Masukkan nama " required="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">No Telpon </label>
                                        <input type="text" class="form-control" name="no_telp" value="<?php echo $row->no_telp ?>" placeholder="Masukkan nama " required="" />
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
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->