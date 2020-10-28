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
                    <div class="alert alert-<?= $this->session->flashdata('notif_color'); ?>" role="alert">
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
                        <?php
                        $score = $penilaian->score_penilaian;
                        // $batas_lulus = $tahun_ajaran->;
                        if ($penilaian->keterangan_kelulusan == 'Lulus') { ?>
                            <p>Selamat anda dinyatakan <b class="bg-success text-light">Lulus</b>. Silahkan cetak bukti kelulusan.</p>
                            <a href="<?= base_url('c_export/cetak_bukti_kelulusan') ?>" class="btn btn-success">Download Bukti Kelulusan</a>
                        <?php } else { ?>
                            <p>Mohon maaf, anda dinyatakan <b class="bg-danger text-light">Tidak Lulus</b> dalam penilaian kriteria kelulusan.</p>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->