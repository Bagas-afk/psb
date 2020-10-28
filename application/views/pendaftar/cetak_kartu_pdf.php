<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td width="90px" align="center">
                <img src="<?= base_url('assets/img/sekolah/') . $logo_sekolah ?>" width="70px" height="70px">
            </td>
            <td style="padding-left: 10px;">
                <h3 style="margin-left: 10px; letter-spacing: 1.1px;"><?= $nama_sekolah ?></h3>
                <p style="margin-left: 10px;">PENERIMAAN SISWA BARU</p>
            </td>
        </tr>
    </table>
    <hr>
    <table style="width: 99%;">
        <tr>
            <td colspan="4" style="text-align: center;">
                <h3><u>KARTU TANDA PESERTA UJIAN</u></h3>
            </td>
        </tr>
        <tr>
            <td rowspan="6" style="width: 180px;" align="center" valign="center"><img style="border: 1px solid;" src="<?= base_url('assets/img/profile/') . $foto ?>" width="150px" height="200px"></td>
            <td style="width: 100px;" valign="center">Nama</td>
            <td style="width: 5px;" align="center" valign="center">:</td>
            <td valign="center"><?= $user->nama_pendaftar ?></td>
        </tr>
        <tr>
            <td valign="center">NISN</td>
            <td align="center" valign="center">:</td>
            <td valign="center"><?= $user->nisn ?></td>
        </tr>
        <tr>
            <td valign="center">No. Registrasi</td>
            <td valign="center" align="center">:</td>
            <td valign="center"><?= $no_reg->no_reg ?></td>
        </tr>
        <tr>
            <td valign="center">Alamat</td>
            <td valign="center" align="center" valign="center">:</td>
            <td valign="center" style="text-align: justify;"><?= $user->alamat ?> <?= $user->dusun ?>, Kel. <?= $user->kelurahan ?>, Kec. <?= $user->kecamatan ?>, <?= $user->kota ?>, <?= $user->provinsi ?></td>
        </tr>
        <tr>
            <td>
                <p style="color: white;">a</p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="border-style: solid; padding: 7px;" valign="center">
                Catatan : <br />
                1. Peserta Membawa Alat Tulis dan Memakai Seragam Sekolah Masing - Masing <br />
                2. Peserta Wajib Datang 30 Menit Sebelum Ujian Dilaksanakan
            </td>
        </tr>
    </table>
    <div style="border-bottom:3px  dashed #000; text-align: center; font-size: 12pt; margin-top: 4em;">Gunting Disini</div>
</body>

</html>