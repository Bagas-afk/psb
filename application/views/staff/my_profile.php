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
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" value="<?= ucwords($user->nama) ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $user->email ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password_confirm">
                </div>
                <div class="form-group">
                    <label>Foto</label> <br />
                    <img src="<?= base_url('/') ?>assets/img/profile/<?= $user->foto ?>" width="150px" height="150px" alt="Foto profile" class="mb-2">
                    <input type="file" class="form-control-file" name="foto">
                </div>
                <button type="submit" class="btn btn-success btn-block shadow">Simpan Data</button>
            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->