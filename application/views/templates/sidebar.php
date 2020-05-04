<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link <?= $active ?>" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Kelola Data</div>
                <?php foreach ($menu as $m) { ?>
                    <a class="nav-link" href="<?= base_url() . $m[2]; ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        <?= $m[0]; ?>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as :</div>
            <div class="text-capitalize"><?= $this->session->userdata('nama'); ?></div>
        </div>
    </nav>
</div>
<div id="layoutSidenav_content">