<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SMP Tazkia Insani Online Registration">
    <meta name="author" content="Muhammad Ilham Fhadilah">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('/') ?>assets/templates/images/logo.png">
    <?php if ($this->session->userdata('id_role') == 1) { ?>
        <title>Staff - <?= $judul ?></title>
    <?php } else { ?>
        <title>Pendaftar - <?= $judul ?></title>
    <?php } ?>
    <!-- Custom CSS -->
    <link href="<?= base_url('/') ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('/') ?>assets/templates/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="<?= base_url('/') ?>assets/templates/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?= base_url('/') ?>assets/templates/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="<?= base_url('/') ?>assets/fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="<?= base_url('/') ?>assets/datatables/datatables.css" rel="stylesheet" />
    <link href="<?= base_url('/') ?>assets/select2/css/select2.css" rel="stylesheet" />
    <link href="<?= base_url('/') ?>assets/select2/css/select2-bootstrap4.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?= base_url('/') ?>assets/templates/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url('/') ?>assets/css/yearpicker.css" rel="stylesheet">
    <!-- My CSS -->
    <link href="<?= base_url('/') ?>assets/css/my_css.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">