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
    <title><?= $title ?></title>
    <!-- Custom CSS -->
    <link href="<?= base_url('/') ?>assets/templates/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
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
        <!-- Navbar -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <div class="navbar-brand">
                    <img src="<?= base_url('/assets/img/sekolah/') . $logo_sekolah ?>" alt="Logo" style="width: 50px; height: 50px;" class="mr-2">
                    <?= $nama_sekolah ?>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= base_url('auth/staff') ?>">Staff</a>
                                <a class="dropdown-item" href="<?= base_url('auth/pendaftar') ?>">Pendaftar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ============================================================== -->
        <!-- End Navbar -->
        <!-- ============================================================== -->
        <div class="container mt-5 pt-5">
            <div class="d-flex justify-content-center">
                <img src="<?= base_url('/assets/img/sekolah/') . $logo_sekolah ?>" alt="Logo" class="w-25">
            </div>
            <h1 class="text-center mt-3"><b><?= $nama_sekolah ?></b></h1>
            <p class="text-center"><?= $alamat_sekolah ?></p>
            <p class="text-justify"><?= $deskripsi_sekolah ?></p>
            <div class="row">
                <div class="col-3">
                    <img src="<?= base_url('/assets/img/sekolah/') . $foto_kepala_sekolah ?>" alt="Foto Kepala Sekolah" class="shadow w-100">
                </div>
                <div class="col-9">
                    <p class="text-justify"><?= $sambutan_kepala_sekolah ?></p>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="p-4">
            <footer class="footer text-center text-muted">
                Copyright &copy; 2020 <?= date('Y') == 2020 ? '' : ' - ' . date('Y') ?> SMP Tazkia Insani. All Rights Reserved.
            </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End footer -->
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
    <script src="<?= base_url('/') ?>assets/js/bootstrap-show-password.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
        $('#password').password()
    </script>
</body>

</html>