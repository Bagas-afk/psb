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
                <select class="form-control select" id="tahun_ajaran_pendaftar">
                    <option></option>
                    <option value="1">Tahun Ajaran 2020 / 2021</option>
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
                                            <input type="text" name="nama_pendaftar" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>NISN</label>
                                            <input type="text" name="nisn" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" name="password_confirm" class="form-control">
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
            <table id="datatable" class="table table-responsive">
                <thead class="bg-dark text-light">
                    <th class="text-center" style="width: 30px;">No</th>
                    <th style="min-width: 250px;">Nama Lengkap</th>
                    <th style="min-width: 300px;">Email</th>
                    <th style="min-width: 130px;">NISN</th>
                    <th style="min-width: 300px;">Alamat</th>
                    <th style="min-width: 100px;">Pembayaran</th>
                    <th class="text-center" style="min-width: 150px;">Aksi</th>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pendaftar as $data) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?>.</td>
                            <td><?= $data->nama_pendaftar ?></td>
                            <td><?= $data->email_pendaftar ?></td>
                            <td><?= $data->nisn ?></td>
                            <?php if ($data->alamat && $data->dusun && $data->kelurahan && $data->kecamatan && $data->kota && $data->provinsi) { ?>
                                <td><?= $data->alamat ?> <?= $data->dusun ?>, Kel. <?= $data->kelurahan ?>, Kec. <?= $data->kecamatan ?>, <?= $data->kota ?>, <?= $data->provinsi ?></td>
                            <?php } else { ?>
                                <td>Alamat Belum Lengkap</td>
                            <?php } ?>
                            <?php $status = $data->status;
                            if ($status == 'Verified') { ?>
                                <td class="bg-success text-center">
                                    <a class="text-light" data-toggle="modal" data-target="#staticBackdropVerified<?= $data->nisn ?>">Verified</a>
                                </td>
                            <?php } elseif ($status == 'Processing') { ?>
                                <td class="bg-warning text-center">
                                    <a class="text-light" data-toggle="modal" data-target="#staticBackdropProcessing<?= $data->nisn ?>">Processing</a>
                                </td>
                            <?php } else { ?>
                                <td class="bg-danger text-light text-center">
                                    Belum Dibayar
                                </td>
                            <?php } ?>
                            <td class="text-center">
                                <button class="btn btn-info btn-sm" style="width: 35px;"><i class="fas fa-info"></i></button>
                                <a href="<?= base_url('staff/ubah_pendaftar/' . md5($data->id_pendaftar)) ?>" class="btn btn-warning btn-sm" style="width: 35px;"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-danger btn-sm" style="width: 35px;"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php if ($status == 'Verified') { ?>
                            <!-- Modal Pembayaran Verifikasi -->
                            <div class="modal fade" id="staticBackdropVerified<?= $data->nisn ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="container">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="staticBackdropLabel">Pembayaran Verified</h3>
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
                                                    <label>NISN</label>
                                                    <input type="text" name="nisn" value="<?= $data->nisn ?>" readonly oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" class="form-control">
                                                </div>
                                                <?php if ($data->keterangan == 'Non Tunai') { ?>
                                                    <div class="form-group">
                                                        <label>Bukti Pembayaran</label>
                                                        <img src="" alt="Bukti Pembayaran - <?= $data->nisn ?>">
                                                    </div>
                                                <?php } ?>
                                                <div class="form-group">
                                                    <label>Verified By</label>
                                                    <input type="text" name="verifiedby" value="<?= $data->nama_staff ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <!-- Modal Pembayaran Processing -->
                            <div class="modal fade" id="staticBackdropProcessing<?= $data->nisn ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                <form action="<?= base_url('c_pendaftar/simpan_pendaftar') ?>" method="post">
                                                    <div class="form-group">
                                                        <label>Nama Pendaftar</label>
                                                        <input type="text" name="nama_pendaftar" value="<?= $data->nama_pendaftar ?>" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>NISN</label>
                                                        <input type="text" name="nisn" value="<?= $data->nisn ?>" readonly oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" class="form-control">
                                                    </div>
                                                    <?php if ($data->keterangan_pembayaran == 'Non Tunai') { ?>
                                                        <div class="form-group">
                                                            <label>Bukti Pembayaran</label>
                                                            <img src="" alt="Bukti Pembayaran - <?= $data->nisn ?>">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="form-group">
                                                        <label>Verified By</label>
                                                        <input type="text" name="verifiedby" value="<?= $data->nama_staff ?>" class="form-control">
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
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->