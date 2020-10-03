<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1><strong>Data Penilaian</strong></h1>
            <div class="form-group">
                <label>Plih Tahun Ajaran</label>
                <select class="form-control select" id="tahun_ajaran_pendaftar">
                    <option></option>
                    <option value="1">Tahun Ajaran 2020 / 2021</option>
                </select>
            </div>
            <div class="mb-3 mt-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fas fa-plus"></i> Tambah Penilaian Pendaftar
                </button>
                <!-- Modal Tambah Penilaian -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Input Nilai</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table id="datatable" class="table table-responsive">
                <thead>
                    <th class="text-center" style="width: 30px;">No</th>
                    <th class="text-center" style="min-width: 150px;">Tahun Ajaran</th>
                    <th style="min-width: 120px;">NISN</th>
                    <th style="min-width: 300px;">Nama Pendaftar</th>
                    <th style="min-width: 70px;">Nilai 1</th>
                    <th style="min-width: 70px;">Nilai 2</th>
                    <th class="text-center" style="min-width: 100px;">Aksi</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->