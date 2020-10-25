<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1><strong>Data Kelulusan</strong></h1>
            <div class="form-group">
                <label>Plih Tahun Ajaran</label>
                <select class="form-control select" id="tahun_ajaran_kelulusan">
                    <option></option>
                    <?php foreach ($tahun_ajaran as $data) { ?>
                        <option value="<?= $data->id_tahun_ajaran ?>">Tahun Ajaran <?= $data->tahun_ajaran ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-3">
                <table id="datatable" class="table table-responsive tabel_kelulusan">
                    <thead class="bg-dark text-light">
                        <th class="text-center" style="width: 30px;">No</th>
                        <th class="text-center" style="min-width: 180px;">Tahun Ajaran</th>
                        <th class="text-center" style="min-width: 150px;">NISN</th>
                        <th style="min-width: 300px;">Nama Pendaftar</th>
                        <th style="min-width: 130px;">Score Kelulusan</th>
                        <th style="min-width: 100px;">Keterangan</th>
                        <th style="min-width: 100px;" class="text-center">Aksi</th>
                        <!-- <th class="text-center" style="min-width: 100px;">Aksi</th> -->
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tampil_kelulusan as $kelulusan) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td>Tahun Ajaran <?= $kelulusan->tahun_ajaran ?></td>
                                <td class="text-center"><?= $kelulusan->nisn ?></td>
                                <td><?= $kelulusan->nama_pendaftar ?></td>
                                <td class="text-center"><?= $kelulusan->score_penilaian ?></td>
                                <?php if ($kelulusan->keterangan_kelulusan == 'Lulus') { ?>
                                    <td class="text-center bg-success text-light"><?= $kelulusan->keterangan_kelulusan ?></td>
                                <?php } else { ?>
                                    <td class="text-center bg-danger text-light"><?= $kelulusan->keterangan_kelulusan ?></td>
                                <?php } ?>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#staticBackdropEdit<?= $kelulusan->id_penilaian_pendaftar ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal Tambah Tahun Ajaran -->
                            <div class="modal fade" id="staticBackdropEdit<?= $kelulusan->id_penilaian_pendaftar ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Kelulusan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('c_penilaian/update_kelulusan') ?>" method="post">
                                                <div class="form-group">
                                                    <label>Nama Pendaftar</label>
                                                    <input type="text" class="form-control" name="nama_pendaftar" value="<?= $kelulusan->nama_pendaftar ?>" readonly>
                                                    <input type="hidden" class="form-control" name="id_penilaian_pendaftar" value="<?= $kelulusan->id_penilaian_pendaftar ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Score Kelulusan</label>
                                                    <input type="text" class="form-control" name="score_penilaian" value="<?= $kelulusan->score_penilaian ?>" readonly required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Bobot Nilai Baca Tulis Qur'an</label>
                                                    <select name="keterangan_kelulusan" class="form-control select">
                                                        <?php if ($kelulusan->keterangan_kelulusan == 'Tidak Lulus') { ?>
                                                            <option value="Tidak Lulus" selected>Tidak Lulus</option>
                                                            <option value="Lulus">Lulus</option>
                                                        <?php } else { ?>
                                                            <option value="Tidak Lulus" selected>Tidak Lulus</option>
                                                            <option value="Lulus" selected>Lulus</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Ubah Data Kelulusan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->