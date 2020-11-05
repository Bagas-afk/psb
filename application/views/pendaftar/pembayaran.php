<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1 class="mb-3"><strong>Upload Bukti Pembayaran</strong></h1>
            <a type="button" class="text-info" data-toggle="modal" data-target="#staticBackdropDetail">
                <i class="fas fa-info"></i> Detail Pembayaran
            </a>
            <!-- Modal Tambah Penilaian -->
            <div class="modal fade" id="staticBackdropDetail" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Detail Pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Pendaftar</label>
                                <input value="<?= $detail_pembayaran->nama_pendaftar ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>NISN</label>
                                <input value="<?= $detail_pembayaran->nisn ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Status Pembayaran</label>
                                <?php if ($detail_pembayaran->status_pembayaran == 'Diterima') { ?>
                                    <input value="<?= $detail_pembayaran->status_pembayaran ?>" class="form-control bg-success text-light" readonly>
                                <?php } else if ($detail_pembayaran->status_pembayaran == 'Processing') { ?>
                                    <input value="<?= $detail_pembayaran->status_pembayaran ?>" class="form-control bg-warning text-light" readonly>
                                <?php } else if ($detail_pembayaran->status_pembayaran == 'Ditolak') { ?>
                                    <input value="<?= $detail_pembayaran->status_pembayaran ?>" class="form-control bg-danger text-light" readonly>
                                <?php } else { ?>
                                    <input value="Belum Dibayar" class="form-control bg-secondary text-light" readonly>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <?php if ($detail_pembayaran->bukti_upload) { ?>
                                    <label>Bukti Upload</label>
                                    <img src="<?= base_url('/assets/img/bukti_pembayaran/') . $detail_pembayaran->bukti_upload ?>" class="w-100" alt="Bukti - <?= $detail_pembayaran->nisn ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($this->session->flashdata('notif_perintah') && $this->session->flashdata('notif_pesan')) { ?>
                <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading"><?= $this->session->flashdata('notif_perintah'); ?>!</h3>
                    <hr />
                    <p><?= $this->session->flashdata('notif_pesan'); ?>.</p>
                </div>
            <?php } ?>
            <form action="<?= base_url('c_pembayaran/pembayaran') ?>" class="mt-3" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="hidden" name="id_pendaftar" value="<?= $this->session->userdata('id_user') ?>" readonly required class="form-control">
                    <input type="text" value="<?= $user->nama_pendaftar ?>" readonly class="form-control">
                </div>
                <div class="form-group">
                    <label>NISN</label>
                    <input type="text" class="form-control" value="<?= $user->nisn ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Upload Bukti Pembayaran</label> <br />
                    <div id="hasil" hidden>
                        <img id="preview" class="mb-3 rounded" hidden />
                    </div>
                    <input type="file" class="form-control-file" name="foto" id="gambar" accept=".jpg, .png, .jpeg" onchange="tampilkanPreview(this,'preview')">
                </div>
                <?php if ($detail_pembayaran->status_pembayaran == 'Diterima') { ?>
                    <button type="submit" disabled class="btn btn-success btn-block">Upload Bukti Pembayaran</button>
                <?php } else { ?>
                    <button type="submit" class="btn btn-success btn-block">Upload Bukti Pembayaran</button>
                <?php } ?>
            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->