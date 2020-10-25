<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1><strong>Cetak Kartu Ujian</strong></h1>
            <?php if ($this->session->flashdata('notif_perintah') && $this->session->flashdata('notif_pesan')) { ?>
                <div class="alert alert-<?= $this->session->flashdata('notif_color') ?>" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading"><?= $this->session->flashdata('notif_perintah'); ?>!</h3>
                    <hr />
                    <p><?= $this->session->flashdata('notif_pesan'); ?>.</p>
                </div>
            <?php } else { ?>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="<?= base_url('c_export/cetak_kartu_ujian') ?>" class="btn btn-secondary">Download</a>
                        </div>
                        <div class="card shadow p-3">
                            <div>
                                <table class="w-100">
                                    <tr>
                                        <td width="70px">
                                            <img src="<?= base_url('assets/img/sekolah/') . $logo_sekolah ?>" width="70px" height="70px">
                                        </td>
                                        <td class="pt-3">
                                            <h3 class="ml-3" style="letter-spacing: 0.75px;">SMP TAZKIA INSANI</h3>
                                            <p class="ml-3">PENERIMAAN SISWA BARU</p>
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                <table class="w-100">
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <h3>KARTU TANDA PESERTA UJIAN</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="6" style="min-width: 150px;"><img src="<?= base_url('assets/img/profile/') . $foto ?>" width="150px" height="200px"></td>
                                        <td style="min-width: 70px;">Nama</td>
                                        <td>:</td>
                                        <td>Muhammad Ilham Fhadilah</td>
                                    </tr>
                                    <tr>
                                        <td>NISN</td>
                                        <td>:</td>
                                        <td>9989132727</td>
                                    </tr>
                                    <tr>
                                        <td>NIK</td>
                                        <td>:</td>
                                        <td>3674010801990005</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>Kp. Setu Rt. 02 / 01 Kel. Buaran, Kec. Serpong, Tangerang Selatan, Banten</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="border-style: solid; padding: 7px;">
                                            Catatan : <br />
                                            1. Peserta Membawa Alat Tulis dan Memakai Seragam Sekolah Masing - Masing <br />
                                            2. Peserta Wajib Datang 30 Menit Sebelum Ujian Dilaksanakan
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!--==============================================================-->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->