<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1 class="mb-3"><strong>Ubah Data Pendaftar</strong></h1>
            <div class="card shadow">
                <div class="card-body">
                    <form id="regForm" action="<?= base_url('c_pendaftar/update_data_pendaftar') ?>" enctype="multipart/form-data" method="post">
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">
                            <h2 class="text-center">Identitas Peserta Didik</h2>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="hidden" name="id_pendaftar" value="<?= $data_pendaftar->id_pendaftar ?>" class="form-control" readonly>
                                <input type="text" name="nama_pendaftar" value="<?= $data_pendaftar->nama_pendaftar ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email_pendaftar" maxlength="50" value="<?= $data_pendaftar->email_pendaftar ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="text" name="nisn" value="<?= $data_pendaftar->nisn ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control select">
                                    <?php if ($data_pendaftar->jenis_kelamin == 'L') { ?>
                                        <option value="L" selected>Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    <?php } else if ($data_pendaftar->jenis_kelamin == 'P') { ?>
                                        <option value="L">Laki - Laki</option>
                                        <option value="P" selected>Perempuan</option>
                                    <?php } else { ?>
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nomor Induk Sekolah</label>
                                <input type="text" name="nis" maxlength="15" value="<?= $data_pendaftar->nis ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nomor Ijazah</label>
                                <input type="text" name="no_ijazah" maxlength="15" value="<?= $data_pendaftar->no_ijazah ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nomor SKHUN</label>
                                <input type="text" name="no_skhun" maxlength="15" value="<?= $data_pendaftar->no_skhun ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nomor Ujian Nasional</label>
                                <input type="text" name="no_un" maxlength="21" value="<?= $data_pendaftar->no_un ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nomor Induk Keluarga</label>
                                <input type="text" name="nik" maxlength="16" value="<?= $data_pendaftar->nik ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" maxlength="30" value="<?= $data_pendaftar->tempat_lahir ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir_pendaftar" value="<?= date('Y-m-d', strtotime($data_pendaftar->tanggal_lahir)) ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <select name="agama" class="form-control select">
                                    <option value="Islam" <?= $agama[0] ?>>Islam</option>
                                    <option value="Kristen" <?= $agama[1] ?>>Kristen</option>
                                    <option value="Budha" <?= $agama[2] ?>>Budha</option>
                                    <option value="Hindu" <?= $agama[3] ?>>Hindu</option>
                                    <option value="Lainnya" <?= $agama[4] ?>>Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Berkebutuhan Khusus</label>
                                <select name="berkebutuhan_khusus_pendaftar" class="form-control select">
                                    <?php if ($data_pendaftar->berkebutuhan_khusus == 'Ya') { ?>
                                        <option value="Ya" selected>Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    <?php } else { ?>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak" selected>Tidak</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" value="<?= $data_pendaftar->alamat ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Dusun</label>
                                <input type="text" name="dusun" value="<?= $data_pendaftar->dusun ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <input type="text" name="kelurahan" maxlength="30" value="<?= $data_pendaftar->kelurahan ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" name="kecamatan" maxlength="30" value="<?= $data_pendaftar->kecamatan ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Kabupaten / Kota</label>
                                <input type="text" name="kota" maxlength="30" value="<?= $data_pendaftar->kota ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" name="provinsi" maxlength="30" value="<?= $data_pendaftar->provinsi ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Transportasi</label>
                                <input type="text" name="transportasi" value="<?= $data_pendaftar->transportasi ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Jenis Tempat Tinggal</label>
                                <input type="text" name="jenis_tinggal" value="<?= $data_pendaftar->jenis_tinggal ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="number" name="no_telp" maxlength="13" value="<?= $data_pendaftar->no_telp ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nomor Handphone</label>
                                <input type="number" name="no_hp" maxlength="13" value="<?= $data_pendaftar->no_hp ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>KPS</label>
                                <select name="kps" class="form-control select">
                                    <?php if ($data_pendaftar->kps == 'Y') { ?>
                                        <option value="Y" selected>Ya</option>
                                        <option value="N">Tidak</option>
                                    <?php } else { ?>
                                        <option value="Y">Ya</option>
                                        <option value="N" selected>Tidak</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nomor KPS</label>
                                <input type="number" name="no_kps" maxlength="16" value="<?= $data_pendaftar->no_kps ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Foto (Background Merah Ukuran 3x4)</label> <br />
                                <div>
                                    <img src="<?= base_url('assets/img/profile/') . $data_pendaftar->foto ?>" width="150px" height="200px" class="mb-2">
                                    <p id="hasil" hidden>Preview Update Foto</p>
                                    <img id="preview" class="mb-3 rounded" hidden />
                                </div>
                                <input type="file" class="form-control-file" value="" name="foto" id="gambar" accept=".jpg, .png, .jpeg" onchange="tampilkanPreview(this,'preview')">
                            </div>
                        </div>

                        <div class="tab">
                            <div class="atas mb-3">
                                <h2 class="text-center">Catatan Prestasi Peserta Didik</h2>
                                <button type="button" onclick="tambahPrestasi()" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Prestasi</button>
                            </div>
                            <?php foreach ($prestasi_pendaftar as $data) { ?>
                                <div class="mb-3 isi_data" id="isi_prestasi" data-id="<?= $data->id_prestasi_pendaftar ?>">
                                    <hr>
                                    <h3 class="mb-2">Data Prestasi <sup><a class="hapus_prestasi badge badge-danger text-light"><i class="fas fa-trash"></i> Hapus Prestasi</a></sup></h3>
                                    <div class="form-inline row mb-2">
                                        <div class="col-2 d-flex justify-content-start">
                                            <label class="text-left">Nama Prestasi</label>
                                        </div>
                                        <div class="col-10">
                                            <input type="hidden" name="id_prestasi[]" class="form-control w-100" value="<?= $data->id_prestasi_pendaftar ?>">
                                            <input type="text" name="nama_prestasi[]" class="form-control w-100" value="<?= $data->nama_prestasi ?>">
                                        </div>
                                    </div>
                                    <div class="form-inline row mb-2">
                                        <div class="col-2 d-flex justify-content-start">
                                            <label>Jenis Prestasi</label>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" name="jenis_prestasi[]" class="form-control w-100" value="<?= $data->jenis_prestasi ?>">
                                        </div>
                                    </div>
                                    <div class="form-inline row mb-2">
                                        <div class="col-2 d-flex justify-content-start">
                                            <label>Tingkat Prestasi</label>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" name="tingkat_prestasi[]" class="form-control w-100" value="<?= $data->tingkat ?>">
                                        </div>
                                    </div>
                                    <div class="form-inline row mb-2">
                                        <div class="col-2 d-flex justify-content-start">
                                            <label>Tahun Prestasi</label>
                                        </div>
                                        <div class="col-10">
                                            <input type="number" name="tahun_prestasi[]" class="year form-control w-100" placeholder="contoh : 2019" value="<?= $data->tahun ?>">
                                        </div>
                                    </div>
                                    <div class="form-inline row mb-2">
                                        <div class="col-2 d-flex justify-content-start">
                                            <label>Penyelenggara</label>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" name="penyelenggara_prestasi[]" class="form-control w-100" value="<?= $data->penyelenggara ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div id="field_prestasi"></div>
                        </div>

                        <div class="tab">
                            <h2 class="text-center">Beasiswa Peserta Didik</h2>
                            <div class="atas mb-3">
                                <button type="button" onclick="tambahBeasiswa()" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Beasiswa</button>
                            </div>
                            <?php foreach ($beasiswa_pendaftar as $data) { ?>
                                <div class="mb-3" id="isi_beasiswa" data-id="<?= $data->id_beasiswa_pendaftar ?>">
                                    <hr>
                                    <h3 class="mb-2">Data Beasiswa <sup><a class="hapus_beasiswa badge badge-danger text-light"><i class="fas fa-trash"></i> Hapus Beasiswa</a></sup></h3>
                                    <div class="form-inline row mb-2">
                                        <div class="col-2 d-flex justify-content-start">
                                            <label class="text-left">Nama Beasiswa</label>
                                        </div>
                                        <div class="col-10">
                                            <input type="hidden" name="id_beasiswa[]" class="form-control w-100" value="<?= $data->id_beasiswa_pendaftar ?>">
                                            <input type="text" name="nama_beasiswa[]" class="form-control w-100" value="<?= $data->nama_beasiswa ?>">
                                        </div>
                                    </div>
                                    <div class="form-inline row mb-2">
                                        <div class="col-2 d-flex justify-content-start">
                                            <label>Jenis Beasiswa</label>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" name="jenis_beasiswa[]" class="form-control w-100" value="<?= $data->jenis_beasiswa ?>">
                                        </div>
                                    </div>
                                    <div class="form-inline row mb-2">
                                        <div class="col-2 d-flex justify-content-start">
                                            <label>Penyelenggara Beasiswa</label>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" name="penyelenggara_beasiswa[]" class="form-control w-100" value="<?= $data->penyelenggara ?>">
                                        </div>
                                    </div>
                                    <div class="form-inline row mb-2">
                                        <div class="col-2 d-flex justify-content-start">
                                            <label>Tahun Mulai</label>
                                        </div>
                                        <div class="col-10">
                                            <input type="number" name="tahun_mulai[]" class="form-control w-100" placeholder="contoh : 2019" value="<?= $data->tahun_mulai ?>">
                                        </div>
                                    </div>
                                    <div class="form-inline row mb-2">
                                        <div class="col-2 d-flex justify-content-start">
                                            <label>Tahun Selesai</label>
                                        </div>
                                        <div class="col-10">
                                            <input type="number" name="tahun_selesai[]" class="form-control w-100" placeholder="contoh : 2019" value="<?= $data->tahun_selesai ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div id="field_beasiswa"></div>
                        </div>

                        <div class="tab">
                            <h2 class="text-center">Data Periodik Peserta Didik</h2>
                            <div class="form-group">
                                <label>Tinggi Badan (cm)</label>
                                <input type="number" name="tinggi_badan" class="form-control" value="<?= $data->tinggi_badan ?>">
                            </div>
                            <div class="form-group">
                                <label>Jarak (Km)</label>
                                <input type="number" name="jarak" class="form-control" value="<?= $data->jarak ?>">
                            </div>
                            <div class="form-group">
                                <label>Waktu (Menit)</label>
                                <input type="number" name="waktu" class="form-control" value="<?= $data->waktu ?>">
                            </div>
                            <div class="form-group">
                                <label>Jumlah Saudara Kandung</label>
                                <input type="number" name="jumlah_saudara" class="form-control" value="<?= $data->jumlah_saudara_kandung ?>">
                            </div>
                        </div>

                        <div class="tab">
                            <h2 class="text-center">Data Pengasuh Peserta Didik</h2>
                            <div class="form-inline">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" onclick="ayah()" id="ayahCheck" <?= $checked_ayah ?>>
                                    <label class="form-check-label">
                                        Ayah
                                    </label>
                                </div>
                                <div class="form-check ml-3 mr-3">
                                    <input class="form-check-input" type="checkbox" onclick="ibu()" id="ibuCheck" <?= $checked_ibu ?>>
                                    <label class="form-check-label">
                                        Ibu
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" onclick="wali()" id="waliCheck" <?= $checked_wali ?>>
                                    <label class="form-check-label">
                                        Wali
                                    </label>
                                </div>
                            </div>
                            <hr />
                            <?php if ($ayah) { ?>
                                <div id="ayahForm">
                                    <h2>Data Ayah</h2>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" id="nama_ayah" name="nama_pengasuh[]" class="form-control" value="<?= $ayah->nama ?>">
                                        <input type="hidden" name="id_pengasuh[]" value="<?= $ayah->id_pengasuh_pendaftar ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Lahir</label>
                                        <input type="date" name="tanggal_lahir_pengasuh[]" class="form-control" value="<?= $ayah->tanggal_lahir ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Berkebutuhan Khusus</label>
                                        <input type="text" name="berkebutuhan_khusus_pengasuh[]" class="form-control" value="<?= $ayah->berkebutuhan_khusus ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input type="text" name="pekerjaan[]" class="form-control" value="<?= $ayah->pekerjaan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <input type="text" name="pendidikan[]" class="form-control" value="<?= $ayah->pendidikan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Penghasilan</label>
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" name="penghasilan[]" class="form-control" value="<?= number_format($ayah->penghasilan, 0, '', '.') ?>">
                                    </div>
                                    <hr />
                                </div>
                            <?php } ?>
                            <div class="ayahDiv"></div>
                            <?php if ($ibu) { ?>
                                <div id="ibuForm">
                                    <h2>Data Ibu</h2>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" id="nama_ibu" name="nama_pengasuh[]" class="form-control" value="<?= $ibu->nama ?>">
                                        <input type="hidden" name="id_pengasuh[]" value="<?= $ibu->id_pengasuh_pendaftar ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Lahir</label>
                                        <input type="date" name="tanggal_lahir_pengasuh[]" class="form-control" value="<?= $ibu->tanggal_lahir ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Berkebutuhan Khusus</label>
                                        <input type="text" name="berkebutuhan_khusus_pengasuh[]" class="form-control" value="<?= $ibu->berkebutuhan_khusus ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input type="text" name="pekerjaan[]" class="form-control" value="<?= $ibu->pekerjaan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <input type="text" name="pendidikan[]" class="form-control" value="<?= $ibu->pendidikan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Penghasilan</label>
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" name="penghasilan[]" class="form-control" value="<?= number_format($ibu->penghasilan, 0, '', '.') ?>">
                                    </div>
                                    <hr />
                                </div>
                            <?php } ?>
                            <div class="ibuDiv"></div>
                            <?php if ($wali) { ?>
                                <div id="waliForm">
                                    <h2>Data Wali</h2>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" id="nama_wali" name="nama_pengasuh[]" class="form-control" value="<?= $wali->nama ?>">
                                        <input type="hidden" name="id_pengasuh[]" value="<?= $wali->id_pengasuh_pendaftar ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Lahir</label>
                                        <input type="date" name="tanggal_lahir_pengasuh[]" class="form-control" value="<?= $wali->tanggal_lahir ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Berkebutuhan Khusus</label>
                                        <input type="text" name="berkebutuhan_khusus_pengasuh[]" class="form-control" value="<?= $wali->berkebutuhan_khusus ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input type="text" name="pekerjaan[]" class="form-control" value="<?= $wali->pekerjaan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <input type="text" name="pendidikan[]" class="form-control" value="<?= $wali->pendidikan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Penghasilan</label>
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" name="penghasilan[]" class="form-control" value="<?= number_format($wali->penghasilan, 0, '', '.') ?>">
                                    </div>
                                    <hr />
                                </div>
                            <?php } ?>
                            <div class="waliDiv"></div>
                        </div>

                        <div style="overflow:auto;">
                            <div class="text-right">
                                <button type="button" style="min-width: 100px;" id="prevBtn" class="btn btn-success" onclick="nextPrev(-1)"><i class="fas fa-arrow-left"></i></button>
                                <button type="button" style="min-width: 100px;" id="nextBtn" class="btn btn-success" onclick="nextPrev(1)"><i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>

                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->