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
            <div class="mb-3 mt-3">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fas fa-edit"></i> Ubah Profile Sekolah
                </button>
                <!-- Modal Ubah Profile -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-justify">
                <div class="col-7">
                    <div class="row pb-2">
                        <div class="col-4">Nama Sekolah</div>
                        <div class="col-1">:</div>
                        <div class="col-7">SMP TAZKIA INSANI</div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4">Alamat Sekolah</div>
                        <div class="col-1">:</div>
                        <div class="col-7">Jalan Bhakti Ibu No. XX Kel. Pengasinan Kec. Gunung Sindur, Bogor</div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4">Deskripsi Sekolah</div>
                        <div class="col-1">:</div>
                        <div class="col-7">Sekolah yang didirikan di dalam pesantren Daarut Tazkia</div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4">Kepala Sekolah</div>
                        <div class="col-1">:</div>
                        <div class="col-7">Sutisna, S.E.</div>
                    </div>
                </div>
                <div class="col-5 d-flex justify-content-center">
                    <img src="<?= base_url('/assets/templates/images/logo.png') ?>" width="60%">
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->