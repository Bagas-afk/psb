<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1><strong>Pengumuman Kelulusan</strong></h1>
            <div class="mt-3 mb-3">
                <?php if ($this->session->flashdata('notif_perintah') && $this->session->flashdata('notif_pesan')) { ?>
                    <div class="alert alert-info" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="alert-heading"><?= $this->session->flashdata('notif_perintah'); ?>!</h3>
                        <hr />
                        <p><?= $this->session->flashdata('notif_pesan'); ?>.</p>
                    </div>
                    <?php } else {
                    if (strtotime($tanggal_pengumuman->tanggal_pengumuman) > strtotime(date('Y-m-d'))) { ?>
                        <b>Pengumuman Kelulusan Akan Diberitahukan Tanggal <?= date('d M Y', strtotime($tanggal_pengumuman->tanggal_pengumuman)) ?></b>
                    <?php } else { ?>
                        <?php $score = 89;
                        $batas_lulus = 70;
                        if ($score > $batas_lulus) { ?>
                            <p>Selamat anda dinyatakan <b>Lulus</b> dengan score penilaian <b><?= $score ?></b>.</p>
                            <a href="" class="btn btn-secondary">Download Bukti Kelulusan</a>
                        <?php } else { ?>
                            <p>Mohon maaf anda dinyatakan <b>Tidak Lulus</b> dengan score penilaian <b><?= $score ?></b>.</p>
                            <a href="" class="btn btn-secondary">Lihat Data Nilai</a>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->