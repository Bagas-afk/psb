<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('/') ?>assets/templates/images/logo.png">
    <title>Tazkia Insani - Form Registration</title>
    <!-- Custom CSS -->
    <link href="<?= base_url('/') ?>assets/templates/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style="background:url(../assets/templates/images/big/auth-bg.jpg) no-repeat center center;">
    <div class="main-wrapper container">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="row align-items-center justify-content-center mb-3">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?= base_url('/') ?>assets/img/sekolah/<?= $logo_sekolah ?>" width="250px" height="230px" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Form Pendaftaran</h2>
                        <p class="text-center">Silahkan Isi Form Pendaftaran.</p>
                        <?= form_open('auth/registrasi', ['method' => 'post']) ?>
                        <div class="form-group">
                            <label class="mb-1" for="inputName">Nama Lengkap</label>
                            <input class="form-control py-4" id="inputName" maxlength="50" type="text" name="nama" value="<?= set_value('nama') ?>" placeholder="Masukan Nama Lengkap" />
                            <small class="text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="inputName">NISN</label>
                            <input class="form-control py-4" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" type="text" name="nisn" value="<?= set_value('nisn') ?>" placeholder="Masukan NISN Pendaftar" />
                            <small class="text-danger"><?php echo form_error('nisn'); ?></small>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-1" for="inputPassword">Password</label>
                                    <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Masukan password" />
                                    <small class="text-danger"><?php echo form_error('password'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-1" for="inputConfirmPassword">Confirm Password</label>
                                    <input class="form-control py-4" id="inputConfirmPassword" name="password_confirm" type="password" placeholder="Masukan ulang password" />
                                    <small class="text-danger"><?php echo form_error('password_confirm'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-dark btn-block">Daftar</button>
                        </div>
                        </form>
                        <div class="mt-3 text-center">Sudah Punya Akun? <a href="<?= base_url('auth/pendaftar') ?>">Masuk</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?= base_url('/') ?>assets/templates/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('/') ?>assets/templates/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="<?= base_url('/') ?>assets/templates/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>