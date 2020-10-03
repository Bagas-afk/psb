<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1><strong>Data Kelulusan</strong></h1>
            <div class="form-group">
                <label>Plih Tahun Ajaran</label>
                <select class="form-control select" id="tahun_ajaran_pendaftar">
                    <option></option>
                    <option value="1">Tahun Ajaran 2020 / 2021</option>
                </select>
            </div>
            <div class="mt-3">
                <table id="datatable" class="table table-responsive">
                    <thead>
                        <th class="text-center" style="width: 30px;">No</th>
                        <th class="text-center" style="min-width: 150px;">Tahun Ajaran</th>
                        <th class="text-center" style="min-width: 150px;">NISN</th>
                        <th style="min-width: 300px;">Nama Pendaftar</th>
                        <th style="min-width: 130px;">Score Kelulusan</th>
                        <th style="min-width: 100px;">Keterangan</th>
                        <!-- <th class="text-center" style="min-width: 100px;">Aksi</th> -->
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->