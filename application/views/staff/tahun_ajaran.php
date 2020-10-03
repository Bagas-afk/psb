<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1><strong>Tahun Ajaran</strong></h1>
            <div class="mb-3 mt-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fas fa-plus"></i> Tambah Tahun Ajaran
                </button>
                <!-- Modal Tambah Tahun Ajaran -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Tahun Ajaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('c_tahun_ajaran/simpan_tahun_ajaran') ?>" method="post">
                                    <div class="form-group">
                                        <label>Tahun Ajaran</label>
                                        <input type="text" class="form-control" name="tahun_ajaran" value="<?= $tahun_ajaran_sekarang ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pembukaan Pendaftaran</label>
                                        <input type="date" class="form-control" name="tanggal_pembukaan" min="<?= date('Y-m-d', strtotime('+3 month', strtotime(date('Y-m-d', strtotime($tahun_ajaran_sebelum->tanggal_pengumuman))))) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Penutupan Pendaftaran</label>
                                        <input type="date" class="form-control" name="tanggal_penutupan" min="<?= date('Y-m-d', strtotime('+4 month', strtotime(date('Y-m-d', strtotime($tahun_ajaran_sebelum->tanggal_pengumuman))))) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pengumuman Kelulusan</label>
                                        <input type="date" class="form-control" name="tanggal_pengumuman" min="<?= date('Y-m-d', strtotime('+5 month', strtotime(date('Y-m-d', strtotime($tahun_ajaran_sebelum->tanggal_pengumuman))))) ?>">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($this->session->flashdata('berhasil')) { ?>
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('berhasil') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } elseif ($this->session->flashdata('gagal')) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('gagal') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <table id="datatable" class="table table-responsive">
                <thead class="bg-dark text-light">
                    <th class="text-center" style="width: 30px;">No</th>
                    <th class="text-center" style="min-width: 250px;">Tahun Ajaran</th>
                    <th class="text-center" style="min-width: 130px;">Mulai</th>
                    <th class="text-center" style="min-width: 130px;">Akhir</th>
                    <th class="text-center" style="min-width: 180px;">Pengumuman</th>
                    <th class="text-center">Aksi</th>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($tampil_tahun_ajaran as $data) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?>.</td>
                            <td class="text-center">Tahun Ajaran <?= $data->tahun_ajaran ?></td>
                            <td class="text-center"><?= date('d M Y', strtotime($data->tanggal_pembukaan_pendaftaran)) ?></td>
                            <td class="text-center"><?= date('d M Y', strtotime($data->tanggal_penutup_pendaftaran)) ?></td>
                            <td class="text-center"><?= date('d M Y', strtotime($data->tanggal_pengumuman)) ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#staticBackdropEdit<?= $data->id_tahun_ajaran ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal Tambah Tahun Ajaran -->
                        <div class="modal fade" id="staticBackdropEdit<?= $data->id_tahun_ajaran ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Tahun Ajaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('c_tahun_ajaran/update_tahun_ajaran') ?>" method="post">
                                            <div class="form-group">
                                                <label>Tahun Ajaran</label>
                                                <input type="text" class="form-control" name="tahun_ajaran" value="<?= $data->tahun_ajaran ?>" readonly>
                                                <input type="hidden" class="form-control" name="id_tahun_ajaran" value="<?= $data->id_tahun_ajaran ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Pembukaan Pendaftaran</label>
                                                <input type="date" class="form-control" name="tanggal_pembukaan" value="<?= date('Y-m-d', strtotime($data->tanggal_pembukaan_pendaftaran)) ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Penutupan Pendaftaran</label>
                                                <input type="date" class="form-control" name="tanggal_penutupan" value="<?= date('Y-m-d', strtotime($data->tanggal_penutup_pendaftaran)) ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Pengumuman Kelulusan</label>
                                                <input type="date" class="form-control" name="tanggal_pengumuman" value="<?= date('Y-m-d', strtotime($data->tanggal_pengumuman)) ?>">
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
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->