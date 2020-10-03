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
    <title>Staff - Forgot Password</title>
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
        <div class="flash-data-notif" data-flashdata="<?= $this->session->flashdata('notif'); ?>"></div>
        <div class="flash-data-perintah" data-flashdata="<?= $this->session->flashdata('perintah'); ?>"></div>
        <div class="flash-data-pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
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
                            <img src="<?= base_url('/') ?>assets/templates/images/logo.png" width="250px" height="230px" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Form Pengajuan Lupa Password</h2>
                        <p class="text-center">Silahkan Isi Form Pengajuan Lupa Password.</p>
                        <form action="<?= base_url('auth/staff_password_aksi') ?>" method="post">
                            <div class="form-group">
                                <label class="mb-1" for="inputEmailAddress">Email</label>
                                <input class="form-control py-4" name="email" type="email" placeholder="Masukan Email Terdaftar" />
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-dark btn-block">Ajukan Ganti Password</button>
                            </div>
                        </form>
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
    <script src="<?= base_url('/') ?>assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('/') ?>assets/js/my_swal.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>