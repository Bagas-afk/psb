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
    <title>Pendaftar - Login Page</title>
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
                        <div class="d-flex justify-content-center">
                            <img src="<?= base_url('/') ?>assets/templates/images/logo.png" width="250px" height="230px" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Tazkia Insani - Halaman Login Pendaftar</h2>
                        <p class="text-center">Silahkan Login Untuk Mengakses Website.</p>
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
                        <?= form_open('auth/pendaftar', ['method' => 'post']) ?>
                        <div class="form-group">
                            <label class="mb-1" for="inputEmailAddress">Email</label>
                            <input class="form-control py-4" id="inputEmailAddress" name="email" value="<?= set_value('email') ?>" type="text" placeholder="Masukan Email Terdaftar">
                            <small class="text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="inputPassword">Password</label>
                            <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Masukan Password" />
                            <small class="text-danger"><?= form_error('password'); ?></small>
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <a class="small" href="password.html#">Forgot Password?</a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-dark btn-block">Masuk</button>
                        </div>
                        </form>
                        <div class="mt-3 text-center">Belum Punya Akun? <a href="<?= base_url('auth/registrasi') ?>">Daftar</a></div>
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