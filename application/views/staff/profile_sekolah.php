<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1><strong>Profile Sekolah</strong></h1>
            <div class="row text-justify">
                <div class="col-7">
                    <div class="row pb-2">
                        <div class="col">
                            <div class="mb-3 mt-3">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#staticBackdrop">
                                    <i class="fas fa-edit"></i> Ubah Profile Sekolah
                                </button>
                                <!-- Modal Ubah Profile -->
                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="container">

                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="staticBackdropLabel">Ubah Profile Sekolah</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('c_sekolah/ubah_profile_sekolah') ?>" enctype="multipart/form-data" method="post">
                                                        <div class="form-group">
                                                            <label>Nama Sekolah</label>
                                                            <input type="text" name="nama_sekolah" class="form-control" value="<?= $sekolah->nama_sekolah ?>">
                                                            <input type="hidden" name="id_sekolah" class="form-control" value="<?= $sekolah->id_sekolah ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat Sekolah</label>
                                                            <textarea name="alamat_sekolah" rows="3" class="form-control"><?= $sekolah->alamat_sekolah ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Deskripsi Sekolah</label>
                                                            <textarea name="deskripsi_sekolah" rows="4" class="form-control"><?= $sekolah->deskripsi_sekolah ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kepala Sekolah</label>
                                                            <input type="text" name="kepala_sekolah" class="form-control" value="<?= $sekolah->deskripsi_sekolah ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sambutan Kepala Sekolah</label>
                                                            <textarea name="sambutan_kepala_sekolah" rows="5" class="form-control"><?= $sekolah->deskripsi_sekolah ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Logo Sekolah</label>
                                                            <div class="mb-3 mt-2">
                                                                <img src="<?= base_url('/assets/img/sekolah/' . $sekolah->logo_sekolah) ?>" alt="Logo Sekolah" width="180px">
                                                            </div>
                                                            <input type="file" name="logo_sekolah" class="form-control-file">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Ubah Data</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4">Nama Sekolah</div>
                        <div class="col-1">:</div>
                        <div class="col-7"><?= $sekolah->nama_sekolah ?></div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4">Alamat Sekolah</div>
                        <div class="col-1">:</div>
                        <div class="col-7"><?= $sekolah->alamat_sekolah ?></div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4">Deskripsi Sekolah</div>
                        <div class="col-1">:</div>
                        <div class="col-7"><?= $sekolah->deskripsi_sekolah ?></div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4">Kepala Sekolah</div>
                        <div class="col-1">:</div>
                        <div class="col-7"><?= $sekolah->kepala_sekolah ?></div>
                    </div>
                </div>
                <div class="col-5 text-center my-auto">
                    <img src="<?= base_url('/assets/img/sekolah/' . $sekolah->logo_sekolah) ?>" width="60%" height="80%">
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->