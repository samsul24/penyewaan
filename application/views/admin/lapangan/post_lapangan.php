    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">

        <div id="page-head">

            <div class="text-center">
                <h3>Data Lapangan.</h3>
                <p>Merekap secara keseluruhan data lapangan yang ada di malang.</p>
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
                            <div>
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <form action="<?php echo base_url('admin/lapangan/tambah_process') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <h4 class="">Tambah Data Lapangan</h4>
                                                <p>Isi form dibawah ini untuk menambah data lapangan.</p>

                                                <div class="form-group">
                                                    <label class="text-semibold">Nama Lapangan</label>
                                                    <input type="text" class="form-control" name="nama_lapangan" placeholder="Masukkan nama lapangan" required="" />
                                                    <small>Berisi nama lapangan</small>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-semibold">Deskripsi Lapangan</label>
                                                    <textarea name="deskripsi_lapangan" class="form-control" placeholder="Masukkan deskripsi lapangan . . ."></textarea>
                                                    <small>Berisi deskripsi lapangan</small>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-semibold">Status Lapangan</label>
                                                            <div class="radio">
                                                                <!-- Inline radio buttons -->
                                                                <input id="demo-inline-form-radio" class="magic-radio" type="radio" name="status" value="tersedia" checked>
                                                                <label for="demo-inline-form-radio">Tersedia</label>

                                                                <input id="demo-inline-form-radio-2" class="magic-radio" type="radio" name="status" value="tidak_tersedia">
                                                                <label for="demo-inline-form-radio-2">Tidak Tersedia</label> <br>
                                                                <small>Pilih status lapangan saat ini</small>
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
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                                <button class="btn btn-primary">Tambahkan dan Simpan</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>