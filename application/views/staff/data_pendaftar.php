<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1><strong>Data Pendaftar</strong></h1>
            <div class="form-group">
                <label>Plih Tahun Ajaran</label>
                <select class="form-control select" id="tahun_ajaran">
                    <option></option>
                    <?php foreach ($tahun_ajaran as $data) { ?>
                        <option value="<?= $data->id_tahun_ajaran ?>">Tahun Ajaran <?= $data->tahun_ajaran ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-3 mb-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fas fa-plus"></i> Tambah Pendaftar
                </button>
                <!-- Modal Ubah Profile -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="container">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="staticBackdropLabel">Tambah Data Pendaftar</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('c_pendaftar/simpan_pendaftar') ?>" method="post">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" maxlength="50" name="nama_pendaftar" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>NISN</label>
                                            <input type="text" maxlength="10" name="nisn" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" minlength="8" name="password" class="form-control password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" minlength="8" name="password_confirm" class="form-control password" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Simpan Data Pendaftar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table id="datatable" class="table table-responsive tabel_pendaftar">
                <thead class="bg-dark text-light">
                    <th class="text-center" style="width: 30px;">No</th>
                    <th style="min-width: 250px;">Tahun Ajaran</th>
                    <th style="min-width: 250px;">Nama Lengkap</th>
                    <th style="min-width: 300px;">Email</th>
                    <th style="min-width: 130px;">NISN</th>
                    <th style="min-width: 300px;">Alamat</th>
                    <th style="min-width: 100px;">Pembayaran</th>
                    <th class="text-center" style="min-width: 150px;">Aksi</th>
                </thead>
                <tbody id="data_pendaftar">
                    <?php $no = 1;
                    foreach ($pendaftar as $data) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?>.</td>
                            <td>Tahun Ajaran <?= $data->tahun_ajaran ?></td>
                            <td><?= $data->nama_pendaftar ?></td>
                            <td><?= $data->email_pendaftar ?></td>
                            <td><?= $data->nisn ?></td>
                            <?php if ($data->alamat && $data->dusun && $data->kelurahan && $data->kecamatan && $data->kota && $data->provinsi) { ?>
                                <td><?= $data->alamat ?> <?= $data->dusun ?>, Kel. <?= $data->kelurahan ?>, Kec. <?= $data->kecamatan ?>, <?= $data->kota ?>, <?= $data->provinsi ?></td>
                            <?php } else { ?>
                                <td>Alamat Belum Lengkap</td>
                            <?php } ?>
                            <?php $status = $data->status_pembayaran;
                            if ($status == 'Diterima') { ?>
                                <td class="bg-success text-center">
                                    <a class="text-light" data-toggle="modal" data-target="#staticBackdropVerified<?= $data->nisn ?>">Diterima</a>
                                </td>
                            <?php } elseif ($status == 'Processing') { ?>
                                <td class="bg-warning text-center">
                                    <a class="text-light" data-toggle="modal" data-target="#staticBackdropProcessingTolak<?= $data->nisn ?>">Processing</a>
                                </td>
                            <?php } elseif ($status == 'Ditolak') { ?>
                                <td class="bg-danger text-center">
                                    <a class="text-light" data-toggle="modal" data-target="#staticBackdropProcessingTolak<?= $data->nisn ?>">Ditolak</a>
                                </td>
                            <?php } else { ?>
                                <td class="bg-secondary text-light text-center">
                                    <a class="text-light" data-toggle="modal" data-target="#staticBackdropBelumDibayar<?= $data->nisn ?>">Belum Dibayar</a>
                                </td>
                            <?php } ?>
                            <td class="text-center">
                                <a href="<?= base_url('staff/detail_pendaftar/' . md5($data->id_pendaftar)) ?>" class="btn btn-info btn-sm" style="width: 35px;"><i class="fas fa-info"></i></a>
                                <a href="<?= base_url('staff/ubah_pendaftar/' . md5($data->id_pendaftar)) ?>" class="btn btn-warning btn-sm" style="width: 35px;"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-danger btn-sm" id="tombol" onclick="hapus_data('<?= $data->nama_pendaftar ?>','<?= base_url('c_pendaftar/hapus_pendaftar/') . md5($data->id_pendaftar) ?>')" style="width: 35px;"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php if ($status == 'Diterima') { ?>
                            <!-- Modal Pembayaran Verifikasi -->
                            <div class="modal fade" id="staticBackdropVerified<?= $data->nisn ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="container">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="staticBackdropLabel">Pembayaran Terverifikasi</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Pendaftar</label>
                                                    <input type="text" name="nama_pendaftar" value="<?= $data->nama_pendaftar ?>" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>No. Registrasi</label>
                                                    <input type="text" name="no_reg" value="<?= $data->no_reg ?>" readonly oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" class="form-control">
                                                </div>
                                                <?php if ($data->keterangan_pembayaran == 'Non Tunai') { ?>
                                                    <div class="form-group">
                                                        <label>Bukti Pembayaran</label>
                                                        <img src="<?= base_url('assets/img/bukti_pembayaran/') . $data->bukti_upload ?>" alt="Bukti Pembayaran - <?= $data->nisn ?>" class="w-100">
                                                    </div>
                                                <?php } ?>
                                                <div class="form-group">
                                                    <label>Verified By</label>
                                                    <input type="text" name="verifiedby" readonly value="<?= $data->nama_staff ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else if ($status == 'Processing' || $status == 'Ditolak') { ?>
                            <!-- Modal Pembayaran Processing Dan Ditolak -->
                            <div class="modal fade" id="staticBackdropProcessingTolak<?= $data->nisn ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="container">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="staticBackdropLabel">Verifikasi Pembayaran</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('c_pembayaran/verifikasi_pembayaran') ?>" method="post">
                                                    <div class="form-group">
                                                        <label>Nama Pendaftar</label>
                                                        <input type="text" name="nama_pendaftar" value="<?= $data->nama_pendaftar ?>" class="form-control" readonly>
                                                        <input type="hidden" name="id_pendaftar" value="<?= $data->id_pendaftar ?>" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>NISN</label>
                                                        <input type="text" name="nisn" value="<?= $data->nisn ?>" readonly oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" class="form-control">
                                                    </div>
                                                    <?php if ($data->keterangan_pembayaran == 'Non Tunai') { ?>
                                                        <div class="form-group">
                                                            <label>Bukti Pembayaran</label> <br />
                                                            <img src="<?= base_url('assets/img/bukti_pembayaran/') . $data->bukti_upload ?>" alt="Bukti Pembayaran - <?= $data->nisn ?>" class="w-100">
                                                        </div>
                                                    <?php } ?>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="<?= base_url('c_pembayaran/tolak_pembayaran/') . md5($data->id_pendaftar) ?>" class="btn btn-danger"><i class="fas fa-times"></i> Tolak</a>
                                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Verifikasi</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <!-- Modal Pembayaran Processing -->
                            <div class="modal fade" id="staticBackdropBelumDibayar<?= $data->nisn ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="container">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="staticBackdropLabel">Verifikasi Pembayaran</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('c_pembayaran/verifikasi_pembayaran') ?>" method="post">
                                                    <div class="form-group">
                                                        <label>Nama Pendaftar</label>
                                                        <input type="hidden" name="id_pendaftar" value="<?= $data->id_pendaftar ?>" class="form-control" readonly>
                                                        <input type="text" name="nama_pendaftar" value="<?= $data->nama_pendaftar ?>" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>NISN</label>
                                                        <select name="status_pembayaran" class="form-control select">
                                                            <option value=" ">Belum Dibayar</option>
                                                            <option value="Diterima">Sudah Dibayar</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-close"></i> Close</button>
                                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Verifikasi</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->