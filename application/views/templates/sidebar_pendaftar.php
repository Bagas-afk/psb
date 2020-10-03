<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item <?= $selected[0] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[0] ?>" href="<?= base_url('pendaftar') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="list-divider"></li>

                <li class="nav-small-cap">
                    <span class="hide-menu">Menu</span>
                </li>

                <li class="sidebar-item <?= $selected[1] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[1] ?>" href="<?= base_url('pendaftar/data_pendaftar') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Data Pendaftar</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $selected[2] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[2] ?>" href="<?= base_url('pendaftar/pembayaran') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Pembayaran</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $selected[3] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[3] ?>" href="<?= base_url('pendaftar/cetak_kartu_ujian') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Cetak Kartu Ujian</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $selected[4] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[4] ?>" href="<?= base_url('pendaftar/pengumuman') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Pengumuman</span>
                    </a>
                </li>

                <li class="list-divider"></li>

                <li class="nav-small-cap">
                    <span class="hide-menu">Auth</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="<?= base_url('auth/logout') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->