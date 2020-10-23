<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1><strong>My Profile</strong></h1>
            <div class="mt-3 mb-3">
                <form action="<?= base_url('c_user/update_my') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" value="<?= $user->nama_pendaftar ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>NISN</label>
                        <input type="text" name="nisn" value="<?= $user->nisn ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?= $user->email_pendaftar ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control password">
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirm" class="form-control password">
                    </div>
                    <div class="form-group">
                        <label>Foto (Background Merah Ukuran 3x4)</label> <br />
                        <div>
                            <img src="<?= base_url('assets/img/profile/') . $user->foto ?>" width="150px" height="200px" class="mb-2">
                            <p id="hasil" hidden>Preview Update Foto</p>
                            <img id="preview" class="mb-3 rounded" hidden />
                        </div>
                        <input type="file" class="form-control-file" name="foto" id="gambar" accept=".jpg, .png, .jpeg" onchange="tampilkanPreview(this,'preview')">
                    </div>
                    <button type="submit" class="btn btn-block btn-success">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->