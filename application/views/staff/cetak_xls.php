<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <?php
    // fungsi header dengan mengirimkan raw data excel
    header("Content-type: application/vnd-ms-excel");
    // membuat nama file ekspor "export-to-excel.xls"
    $time = time();
    header("Content-Disposition: attachment; filename=$judul - $time.xls");
    ?>
</head>

<body>
    <table>
        <tr>
            <td colspan="36">
                <p style="font-size: 25pt;"><b><?= $nama_sekolah ?></b></p>
            </td>
        </tr>
        <tr>
            <td colspan="36">
                <p style="font-size: 15pt;"><?= $alamat_sekolah ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="36"></td>
        </tr>
        <tr>
            <td colspan="36">
                <p style="font-size: 12pt;"><b>Tahun Ajaran : <?= $tahun_ajaran->tahun_ajaran ?></b></p>
            </td>
        </tr>
        <tr>
            <td colspan="36"></td>
        </tr>
    </table>
    <table border="1" style="font-size: 12pt;">
        <thead>
            <th style="min-width: 30px;">No.</th>
            <th style="min-width: 100px;">No. Registrasi</th>
            <th style="min-width: 250px;">Nama</th>
            <th style="min-width: 200px;">Email</th>
            <th style="min-width: 100px;">Jenis Kelamin</th>
            <th style="min-width: 100px;">NISN</th>
            <th style="min-width: 100px;">NIS</th>
            <th style="min-width: 150px;">No. Ijazah</th>
            <th style="min-width: 150px;">No. SKHUN</th>
            <th style="min-width: 150px;">No. UN</th>
            <th style="min-width: 150px;">NIK</th>
            <th style="min-width: 150px;">Tempat Lahir</th>
            <th style="min-width: 100px;">Tanggal Lahir</th>
            <th style="min-width: 50px;">Agama</th>
            <th style="min-width: 170px;">Berkebutuhan Khusus</th>
            <th style="min-width: 200px;">Alamat</th>
            <th style="min-width: 150px;">Dusun</th>
            <th style="min-width: 150px;">Kelurahan</th>
            <th style="min-width: 150px;">Kecamatan</th>
            <th style="min-width: 150px;">Kabupaten / Kota</th>
            <th style="min-width: 150px;">Provinsi</th>
            <th style="min-width: 150px;">Jenis Tinggal</th>
            <th style="min-width: 120px;">No. Telepon</th>
            <th style="min-width: 120px;">No. HP</th>
            <th style="min-width: 50px;">KPS</th>
            <th style="min-width: 150px;">No. KPS</th>
            <th style="min-width: 100px;">Tinggi Badan</th>
            <th style="min-width: 200px;">Jarak Tempuh Ke Sekolah</th>
            <th style="min-width: 200px;">Waktu Tempuh Ke Sekolah</th>
            <th style="min-width: 190px;">Jumlah Saudara Kandung</th>
            <th style="min-width: 150px;">Status Pembayaran</th>
            <th style="min-width: 180px;">Keterangan Pembayaran</th>
            <th style="min-width: 150px;">Nilai Pilihan Ganda</th>
            <th style="min-width: 170px;">Nilai Baca Tulis Qur'an</th>
            <th style="min-width: 120px;">Score Penilaian</th>
            <th style="min-width: 170px;">Keterangan Kelulusan</th>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($cetak as $data) { ?>
                <tr>
                    <td align="center"><?= $no++ ?>.</td>
                    <td align="center"><?= $data->no_reg ?></td>
                    <td><?= ucfirst($data->nama_pendaftar) ?></td>
                    <td><?= $data->email_pendaftar ?></td>
                    <td align="center"><?= $data->jenis_kelamin ?></td>
                    <td align="center">'<?= $data->nisn ?></td>
                    <td><?= $data->nis ?></td>
                    <td align="center"><?= $data->no_ijazah ?></td>
                    <td align="center"><?= $data->no_skhun ?></td>
                    <td align="center"><?= $data->no_un ?></td>
                    <td align="center">'<?= $data->nik ?></td>
                    <td><?= ucfirst($data->tempat_lahir) ?></td>
                    <td align="center"><?= date('d-m-Y', strtotime($data->tanggal_lahir)) ?></td>
                    <td align="center"><?= $data->agama ?></td>
                    <td align="center"><?= $data->berkebutuhan_khusus ?></td>
                    <td><?= $data->alamat ?></td>
                    <td><?= $data->dusun ?></td>
                    <td><?= ucfirst($data->kelurahan) ?></td>
                    <td><?= ucfirst($data->kecamatan) ?></td>
                    <td><?= ucfirst($data->kota) ?></td>
                    <td><?= ucfirst($data->provinsi) ?></td>
                    <td><?= ucfirst($data->jenis_tinggal) ?></td>
                    <td>'<?= $data->no_telp ?></td>
                    <td>'<?= $data->no_hp ?></td>
                    <td align="center"><?= $data->kps ?></td>
                    <td>'<?= $data->no_kps ?></td>
                    <td align="center"><?= $data->tinggi_badan ?> cm</td>
                    <td align="center"><?= $data->jarak ?> Km</td>
                    <td align="center"><?= $data->waktu ?> Menit</td>
                    <td align="center"><?= $data->jumlah_saudara_kandung ?></td>
                    <td align="center"><?= $data->status_pembayaran ?></td>
                    <td align="center"><?= $data->keterangan_pembayaran ?></td>
                    <td align="center"><?= $data->pilihan_ganda_benar ?></td>
                    <td align="center"><?= $data->nilai_btq ?></td>
                    <td align="center"><?= $data->score_penilaian ?></td>
                    <td align="center"><?= $data->keterangan_kelulusan ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>