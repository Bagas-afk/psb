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
            <a href="#">Detail Pembayaran</a>
            <!-- <?php if ($this->session->flashdata('notif_perintah') && $this->session->flashdata('notif_pesan')) { ?>
                <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading"><?= $this->session->flashdata('notif_perintah'); ?>!</h3>
                    <hr />
                    <p><?= $this->session->flashdata('notif_pesan'); ?>.</p>
                </div>
            <?php } ?> -->
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
                <button type="submit" class="btn btn-success btn-block">Upload Bukti Pembayaran</button>
            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->