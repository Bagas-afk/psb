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
                <?php } ?>
                <div class="card shadow">
                    <div class="card-body">
                        <form id="regForm" action="" method="post">
                            <!-- One "tab" for each step in the form: -->
                            <div class="tab">
                                <h2 class="text-center">Data Siswa</h2>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama" value="<?= $user->nama ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?= $user->email ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" name="nisn" value="<?= $user->nisn ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control select required">
                                        <?php if ($user->jenis_kelamin == 'L') { ?>
                                            <option value="L" selected>Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        <?php } else if ($user->jenis_kelamin == 'P') { ?>
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
                                    <input type="text" name="nis" value="<?= $user->nis ?>" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Ijazah</label>
                                    <input type="text" name="no_ijazah" value="<?= $user->no_ijazah ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nomor SKHUN</label>
                                    <input type="text" name="no_skhun" value="<?= $user->no_skhun ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Ujian Nasional</label>
                                    <input type="text" name="no_un" value="<?= $user->no_un ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Induk Keluarga</label>
                                    <input type="text" name="nik" value="<?= $user->nik ?>" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" value="<?= $user->tempat_lahir ?>" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="<?= date('Y-m-d', strtotime($user->tanggal_lahir)) ?>" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select name="agama" class="form-control select required">
                                        <option value="Islam" <?= $agama[0] ?>>Islam</option>
                                        <option value="Kristen" <?= $agama[1] ?>>Kristen</option>
                                        <option value="Budha" <?= $agama[2] ?>>Budha</option>
                                        <option value="Hindu" <?= $agama[3] ?>>Hindu</option>
                                        <option value="Lainnya" <?= $agama[4] ?>>Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Berkebutuhan Khusus</label>
                                    <input type="text" name="berkebutuhan_khusus" value="<?= $user->berkebutuhan_khusus ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" value="<?= $user->alamat ?>" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Dusun</label>
                                    <input type="text" name="dusun" value="<?= $user->dusun ?>" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <input type="text" name="kelurahan" value="<?= $user->kelurahan ?>" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" name="kecamatan" value="<?= $user->kecamatan ?>" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Kabupaten / Kota</label>
                                    <input type="text" name="kota" value="<?= $user->kota ?>" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input type="text" name="provinsi" value="<?= $user->provinsi ?>" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Transportasi</label>
                                    <input type="text" name="transportasi" value="<?= $user->transportasi ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Tempat Tinggal</label>
                                    <input type="text" name="jenis_tinggal" value="<?= $user->jenis_tinggal ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="text" name="no_telp" value="<?= $user->no_telp ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Handphone</label>
                                    <input type="text" name="no_hp" value="<?= $user->no_hp ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>KPS</label>
                                    <input type="text" name="kps" value="<?= $user->kps ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nomor KPS</label>
                                    <input type="text" name="no_kps" value="<?= $user->no_kps ?>" class="form-control">
                                </div>
                            </div>

                            <div class="tab">
                                <h2 class="text-center">Data Periodik Siswa</h2>
                                <p><input placeholder="E-mail..." oninput="this.className = ''"></p>
                                <p><input placeholder="Phone..." oninput="this.className = ''"></p>
                            </div>

                            <div class="tab">
                                <h2 class="text-center">Data Periodik Siswa</h2>
                                <p><input placeholder="dd" oninput="this.className = ''"></p>
                                <p><input placeholder="mm" oninput="this.className = ''"></p>
                                <p><input placeholder="yyyy" oninput="this.className = ''"></p>
                            </div>

                            <div class="tab">
                                <h2 class="text-center">Data Periodik Siswa</h2>
                                <p><input placeholder="Username..." oninput="this.className = ''"></p>
                                <p><input placeholder="Password..." oninput="this.className = ''"></p>
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
                            </div>

                        </form>
                    </div>
                </div>
                <!-- <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" value="<?= $user->nama ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>NISN</label>
                        <input type="text" name="nisn" value="<?= $user->nisn ?>" class="form-control">
                    </div>
                </form> -->
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->