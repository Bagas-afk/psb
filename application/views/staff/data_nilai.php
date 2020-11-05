<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1><strong>Data Penilaian</strong></h1>
            <div class="form-group">
                <label>Plih Tahun Ajaran</label>
                <select class="form-control select" id="tahun_ajaran_pendaftar">
                    <option></option>
                    <?php foreach ($tahun_ajaran as $data) { ?>
                        <option value="<?= $data->id_tahun_ajaran ?>">Tahun Ajaran <?= $data->tahun_ajaran ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3 mt-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fas fa-plus"></i> Tambah Penilaian Pendaftar
                </button>
                <div class="float-right">
                    <a href="#" class="btn btn-success" id="verifikasi_nilai">
                        <i class="fas fa-check"></i> Verifikasi Nilai Pendaftar
                    </a>
                </div>
                <!-- Modal Tambah Penilaian -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Penilaian</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Pilih Pendaftar</label>
                                        <select name="id_pendaftar" id="pilihan_pendaftar" class="form-control select"></select>
                                    </div>
                                    <div id="penilaian"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="simpan" class="btn btn-success" disabled>Simpan Penilaian</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table id="datatable" class="table table-responsive tabel_nilai">
                <thead class="bg-dark text-light">
                    <th class="text-center" style="width: 30px;">No</th>
                    <th class="text-center" style="min-width: 200px;">Tahun Ajaran</th>
                    <th style="min-width: 120px;">NISN</th>
                    <th style="min-width: 300px;">Nama Pendaftar</th>
                    <th style="min-width: 150px;" class="text-center">Nilai Pilihan Ganda</th>
                    <th style="min-width: 180px;" class="text-center">Nilai Baca Tulis Qur'an</th>
                    <th class="text-center" style="min-width: 50px;">Aksi</th>
                </thead>
                <tbody id="data_nilai">
                    <?php $no = 1;
                    foreach ($tampil_nilai as $nilai) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td>Tahun Ajaran <?= $nilai->tahun_ajaran ?></td>
                            <td><?= $nilai->nisn ?></td>
                            <td><?= $nilai->nama_pendaftar ?></td>
                            <td class="text-center"><?= $nilai->pilihan_ganda_benar * 2 ?></td>
                            <td class="text-center"><?= $nilai->nilai_btq ?></td>
                            <td class="text-center">
                                <?php if ($nilai->keterangan_kelulusan == '') { ?>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#staticBackdropEdit<?= $nilai->id_penilaian_pendaftar ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                <?php } else { ?>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#staticBackdropDetail<?= $nilai->id_penilaian_pendaftar ?>">
                                        <i class="fas fa-info"></i>
                                    </button>
                                <?php } ?>
                            </td>
                        </tr>
                        <!-- Modal Edit Tahun Ajaran -->
                        <div class="modal fade" id="staticBackdropEdit<?= $nilai->id_penilaian_pendaftar ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Ubah Nilai Pendaftar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('c_penilaian/update_nilai') ?>" method="post">
                                            <div class="form-group">
                                                <label>Nama Pendaftar</label>
                                                <input type="text" class="form-control" name="nama_pendaftar" value="<?= $nilai->nama_pendaftar ?>" readonly>
                                                <input type="hidden" class="form-control" name="id_penilaian_pendaftar" value="<?= $nilai->id_penilaian_pendaftar ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Pilihan Ganda Benar</label>
                                                <input type="text" class="form-control" name="pilihan_ganda_benar" value="<?= $nilai->pilihan_ganda_benar ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nilai Baca Tulis Qur'an</label>
                                                <input type="text" class="form-control" max="100" name="nilai_btq" value="<?= $nilai->nilai_btq ?>" required>
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
                        <!-- Detail Modal -->
                        <div class="modal fade" id="staticBackdropDetail<?= $nilai->id_penilaian_pendaftar ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Detail Nilai Pendaftar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Pendaftar</label>
                                            <input type="text" class="form-control" name="nama_pendaftar" value="<?= $nilai->nama_pendaftar ?>" readonly>
                                            <input type="hidden" class="form-control" name="id_penilaian_pendaftar" value="<?= $nilai->id_penilaian_pendaftar ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilihan Ganda Benar</label>
                                            <input type="text" class="form-control" name="pilihan_ganda_benar" value="<?= $nilai->pilihan_ganda_benar ?>" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai Baca Tulis Qur'an</label>
                                            <input type="text" class="form-control" name="nilai_btq" value="<?= $nilai->nilai_btq ?>" readonly required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->