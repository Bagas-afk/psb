<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="index.html">
                    <b class="logo-icon">
                        <!-- Dark Logo icon -->
                        <img src="<?= base_url('/') ?>assets/templates/images/logo_with_text.png" width="230px" alt="homepage" class="dark-logo mt-2 ml-n3" />
                    </b>
                    <!--End Logo icon -->
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav ml-auto float-right">
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php if ($user->foto == 'default.jpg') { ?>
                            <i class="fas fa-user fa-2x"></i>
                        <?php } else { ?>
                            <img src="<?= base_url('/') ?>assets/img/profile/<?= $user->foto ?>" width="45px" height="45px" />
                        <?php } ?>
                        <?php if ($this->session->userdata('id_role') == 1) { ?>
                            <span class="ml-2 d-none d-lg-inline-block"><span>Selamat Datang,</span>
                                <span class="text-dark"><?= ucwords($user->nama_staff) ?></span>
                                <i data-feather="chevron-down" class="svg-icon"></i>
                            </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="<?= base_url('staff/my_profile') ?>">
                            <i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                            My Profile
                        </a>
                    <?php } else { ?>
                        <span class="ml-2 d-none d-lg-inline-block"><span>Selamat Datang,</span>
                            <span class="text-dark"><?= ucwords($user->nama_pendaftar) ?></span>
                            <i data-feather="chevron-down" class="svg-icon"></i>
                        </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                            <a class="dropdown-item" href="<?= base_url('pendaftar/my_profile') ?>">
                                <i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                                My Profile
                            </a>
                        <?php } ?>
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                            <i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                            Logout
                        </a>
                        </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->