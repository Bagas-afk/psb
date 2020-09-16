<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1><strong>Cetak Laporan</strong></h1>
            <div class="mt-3">
                <strong>Pilih Tahun Ajaran</strong>
                <select class="form-control select" id="pilih_cetak">
                    <option></option>
                    <?php foreach ($tahun_ajaran as $data) { ?>
                        <option value="<?= $data->id_tahun_ajaran ?>">Tahun Ajaran <?= $data->tahun_ajaran ?></option>
                    <?php } ?>
                </select>
                <div id="div_cetak_laporan" class="mb-3 mt-3" hidden>
                    <table id="datatable" class="table table-responsive">
                        <thead class="bg-dark text-light">
                            <th class="text-center" style="width: 30px;">No.</th>
                            <th class="text-center" style="min-width: 150px;">NISN</th>
                            <th style="min-width: 300px;">Nama Pendaftar</th>
                            <th class="text-center" style="min-width: 150px;">Score Penilaian</th>
                            <th class="text-center" style="min-width: 200px;">Keterangan</th>
                        </thead>
                        <tbody id="isi_table_cetak_laporan"></tbody>
                    </table>
                    <a class="btn btn-block btn-info shadow mt-3" href="" target="_blank" rel="noopener noreferrer">Cetak Laporan</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->