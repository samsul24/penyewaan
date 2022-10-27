    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">

        <div id="page-head">

            <div class="text-center">
                <h3>Data Pengumuman.</h3>
                <p>Merekap secara keseluruhan data pengumuman yang ada di malang.</p>
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
                                        <form action="<?php echo base_url('admin/pengumuman/tambah_process') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <h4 class="">Tambah Data Pengumuman</h4>
                                                <p>Isi form dibawah ini untuk menambah data pengumuman.</p>

                                                <div class="form-group">
                                                    <label class="text-semibold">Subject</label>
                                                    <input type="text" class="form-control" name="objek" placeholder="Masukkan nama lapangan" required="" />
                                                    <small>Berisi judul permasalahan</small>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-semibold">Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control" placeholder="Masukkan deskripsi lapangan . . ."></textarea>
                                                    <small>Berisi deskripsi Pengumuman</small>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-semibold">Status Lapangan</label>
                                                            <div class="radio">
                                                                <!-- Inline radio buttons -->
                                                                <input id="demo-inline-form-radio" class="magic-radio" type="radio" name="status" value="elesai" checked>
                                                                <label for="demo-inline-form-radio">Selesai</label>

                                                                <input id="demo-inline-form-radio-2" class="magic-radio" type="radio" name="status" value="belum_selesai">
                                                                <label for="demo-inline-form-radio-2">Proses</label> <br>
                                                                <small>Pilih status pengumuman saat ini</small>
                                                            </div>
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