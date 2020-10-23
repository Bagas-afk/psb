<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1 class="mb-3"><strong>Dashboard</strong></h1>
            <div class="card shadow pb-5">
                <div class="d-flex justify-content-center mb-3">
                    <img src="<?= base_url('assets/img/sekolah/') . $logo_sekolah ?>" class="w-25">
                </div>
                <div class="d-flex justify-content-center">
                    <h2><?= $nama_sekolah ?></h2>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-5 card-body shadow">
                        <p>Visi</p>
                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit magni soluta officia alias, laborum unde, odio perferendis voluptatem consequuntur optio itaque aliquam harum corporis similique. Illum, optio ab. Nulla, debitis?</p>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-5 card-body shadow">
                        <p>Misi</p>
                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit magni soluta officia alias, laborum unde, odio perferendis voluptatem consequuntur optio itaque aliquam harum corporis similique. Illum, optio ab. Nulla, debitis?</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">
                            <h3>Staff Pendaftaran</h3>
                            <p><?= $jumlah_staff ?> Orang</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">
                            <h3>Data Pendaftar</h3>
                            <p><?= $jumlah_pendaftar ?> Pendaftar</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">
                            <h3>Pendaftar Telah Bayar</h3>
                            <p><?= $jumlah_pendaftar_telah_bayar ?> Pendaftar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->