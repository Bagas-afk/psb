<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card shadow p-4">
            <h1><strong>Data Pendaftar</strong></h1>
            <div class="mt-3 mb-3">
                <a href="" class="btn btn-primary" style="width: 180px;"><i class="fas fa-plus"></i> Tambah Pendaftar</a>
                <a href="" target="_blank" rel="noopener noreferrer" style="width: 180px;" class="btn btn-secondary"><i class="fas fa-download"></i> Download</a>
            </div>
            <table id="datatable" class="table table-responsive">
                <thead>
                    <th class="text-center" style="width: 30px;">No</th>
                    <th style="min-width: 250px;">Nama Lengkap</th>
                    <th style="min-width: 200px;">Email</th>
                    <th style="min-width: 300px;">Alamat</th>
                    <th class="text-center" style="min-width: 150px;">Aksi</th>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pendaftar as $data) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?>.</td>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->email ?></td>
                            <td><?= $data->email ?></td>
                            <td class="text-center"><button class="btn btn-info btn-sm" style="width: 35px;"><i class="fas fa-info"></i></button> <a href="<?= base_url('staff/ubah_pendaftar/' . md5($data->id_user)) ?>" class="btn btn-warning btn-sm" style="width: 35px;"><i class="fas fa-edit"></i></a> <button class="btn btn-danger btn-sm" style="width: 35px;"><i class="fas fa-trash"></i></button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->