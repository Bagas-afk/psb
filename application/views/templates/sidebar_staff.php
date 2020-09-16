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
                    <a class="sidebar-link sidebar-link <?= $active[0] ?>" href="<?= base_url('staff') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="list-divider"></li>

                <li class="nav-small-cap">
                    <span class="hide-menu">Menu</span>
                </li>

                <li class="sidebar-item <?= $selected[1] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[1] ?>" href="<?= base_url('staff/profile_sekolah') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Profile Sekolah</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $selected[2] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[2] ?>" href="<?= base_url('staff/tahun_ajaran') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Tahun Ajaran</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $selected[3] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[3] ?>" href="<?= base_url('staff/data_pendaftar') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Data Pendaftar</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $selected[4] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[4] ?>" href="<?= base_url('staff/data_nilai') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Data Nilai</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $selected[5] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[5] ?>" href="<?= base_url('staff/data_kelulusan') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Data Kelulusan</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $selected[6] ?>">
                    <a class="sidebar-link sidebar-link <?= $active[6] ?>" href="<?= base_url('staff/cetak_laporan') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Cetak Laporan</span>
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