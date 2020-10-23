<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1 class="mb-3"><strong>Detail Data Pendaftar</strong></h1>
            <div class="row">
                <div class="col-3"><label>Nama Pendaftar</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->nama_pendaftar ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>Email</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->email_pendaftar ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>Tanggal Daftar</label></div>
                <div class="col-9">
                    <p><?= date('d M Y', strtotime($detail_pendaftar->date_created)) ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>Jenis Kelamin</label></div>
                <div class="col-9">
                    <p>
                        <?php if ($detail_pendaftar->jenis_kelamin == 'L') { ?>
                            Laki - Laki
                        <?php } else if ($detail_pendaftar->jenis_kelamin == 'P') { ?>
                            Perempuan
                        <?php } else { ?>
                            Belum Dipilih
                        <?php } ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>NISN</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->nisn ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>NIS</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->nis ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>No. Ijazah</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->no_ijazah ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>No. SKHUN</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->no_skhun ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>No. Ujian Nasional</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->no_un ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>No. Induk Keluarga</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->nik ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>Tempat, Tanggal Lahir</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->tempat_lahir . ', ' . date('d M Y', strtotime($detail_pendaftar->tanggal_lahir)) ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>Agama</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->agama ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>Berkebutuhan Khusus</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->berkebutuhan_khusus ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>Alamat</label></div>
                <div class="col-9">
                    <?php if ($detail_pendaftar->alamat && $detail_pendaftar->dusun && $detail_pendaftar->kelurahan && $detail_pendaftar->kecamatan && $detail_pendaftar->kota && $detail_pendaftar->provinsi) { ?>
                        <p><?= $detail_pendaftar->alamat ?> <?= $detail_pendaftar->dusun ?>, Kel. <?= $detail_pendaftar->kelurahan ?>, Kec. <?= $detail_pendaftar->kecamatan ?>, <?= $detail_pendaftar->kota ?>, <?= $detail_pendaftar->provinsi ?></p>
                    <?php } else { ?>
                        <p>Alamat Belum Lengkap</p>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>Transportasi</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->transportasi ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>Jenis Tempat Tinggal</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->jenis_tinggal ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>No. Telephone</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->no_telp ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>No. Handphone</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->no_hp ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>KPS</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->kps ?></p>
                </div>
            </div>
            <?php if ($detail_pendaftar->kps == 'Y') { ?>
                <div class="row">
                    <div class="col-3"><label>No. KPS</label></div>
                    <div class="col-9">
                        <p><?= $detail_pendaftar->no_kps ?></p>
                    </div>
                </div>
            <?php } ?>
            <div class="row mt-3">
                <div class="col">
                    <h3>Data Periodik Pendaftar</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>Tinggi Badan</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->tinggi_badan ?> cm</p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>Jarak Ke Sekolah</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->jarak ?> Km</p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>Waktu Ke Sekolah</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->waktu ?> Menit</p>
                </div>
            </div>
            <div class="row">
                <div class="col-3"><label>Jumlah Saudara</label></div>
                <div class="col-9">
                    <p><?= $detail_pendaftar->jumlah_saudara_kandung ?> Orang</p>
                </div>
            </div>
            <div class="row mt-3 mb-1">
                <div class="col">
                    <h3>Data Orang Tua Pendaftar</h3>
                </div>
            </div>
            <?php foreach ($pengasuh_pendaftar as $data) { ?>
                <div class="row">
                    <?php if ($data->keterangan == 'Ayah') { ?>
                        <div class="col-3"><label>Nama Ayah</label></div>
                    <?php } else if ($data->keterangan == 'Ibu') { ?>
                        <div class="col-3"><label>Nama Ibu</label></div>
                    <?php } else if ($data->keterangan == 'Wali') { ?>
                        <div class="col-3"><label>Nama Wali</label></div>
                    <?php } ?>
                    <div class="col-9">
                        <p><?= $data->nama ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3"><label>Tangal Lahir</label></div>
                    <div class="col-9">
                        <p><?= date('d M Y', strtotime($data->tanggal_lahir)) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3"><label>Berkebutuhan Khusus</label></div>
                    <div class="col-9">
                        <p><?= $data->berkebutuhan_khusus ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3"><label>Pekerjaan</label></div>
                    <div class="col-9">
                        <p><?= $data->pekerjaan ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3"><label>Pendidikan</label></div>
                    <div class="col-9">
                        <p><?= $data->pendidikan ?></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3"><label>Penghasilan</label></div>
                    <div class="col-9">
                        <p><?= $data->penghasilan > 0 ? 'Rp. ' . number_format($data->penghasilan, 0, ',', '.') : '-' ?></p>
                    </div>
                </div>
            <?php } ?>
            <div class="row mb-1">
                <div class="col">
                    <h3>Data Prestasi Pendaftar</h3>
                </div>
            </div>
            <table class="table table-striped">
                <thead class="bg-dark text-light">
                    <th>No.</th>
                    <th style="min-width: 200px;">Nama Prestasi</th>
                    <th>Jenis Prestasi</th>
                    <th>Tingkat</th>
                    <th>Tahun</th>
                    <th>Penyelenggara</th>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($prestasi_pendaftar as $data) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->nama_prestasi ?></td>
                            <td><?= $data->jenis_prestasi ?></td>
                            <td><?= $data->tingkat ?></td>
                            <td><?= $data->tahun ?></td>
                            <td><?= $data->penyelenggara ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="row mt-3 mb-1">
                <div class="col">
                    <h3>Data Beasiswa Pendaftar</h3>
                </div>
            </div>
            <table class="table table-striped">
                <thead class="bg-dark text-light">
                    <th>No.</th>
                    <th style="min-width: 200px;">Nama Beasiswa</th>
                    <th>Jenis Beasiswa</th>
                    <th>Penyelenggara</th>
                    <th>Tahun Mulai</th>
                    <th>Tahun Selesai</th>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($beasiswa_pendaftar as $data) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->nama_beasiswa ?></td>
                            <td><?= $data->jenis_beasiswa ?></td>
                            <td><?= $data->penyelenggara ?></td>
                            <td><?= $data->tahun_mulai ?></td>
                            <td><?= $data->tahun_selesai ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->