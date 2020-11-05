<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap.min.css') ?>">
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td style="width: 151px;" valign="center" align="center">
                <img src="<?= base_url('/assets/img/sekolah/') . $logo_sekolah ?>" width="120px" alt="">
            </td>
            <td valign="center">
                <div class="text-center">
                    <p class="font-weight-bold mt-2" style="line-height: 1.2em; font-size: 11pt;">Sekolah Menengah Pertama (SMP)</p>
                    <p class="mt-n3 font-weight-bolder" style="font-size: 20pt; line-height: 1.2em;"><?= $nama_sekolah ?></p>
                    <p class="mt-n3" style="font-size: 10pt; line-height: 2em;"><?= $alamat_sekolah ?></p>
                </div>
            </td>
        </tr>
    </table>
    <hr>
    <table style="width: 95%;">
        <tr>
            <td colspan="4" style="text-align: center;">
                <h4><u>KARTU TANDA BUKTI KELULUSAN</u></h4>
            </td>
        </tr>
        <tr class="mt-3">
            <td rowspan="10" style="width: 180px;" align="center" valign="center"><img style="border: 1px solid;" src="<?= base_url('assets/img/profile/') . $foto ?>" width="150px" height="200px"></td>
            <td style="width: 125px;" valign="center">Nama</td>
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
            <td valign="center">3674010801990005</td>
        </tr>
        <tr>
            <td valign="center">Alamat</td>
            <td valign="center" align="center">:</td>
            <td valign="center" style="text-align: justify;"><?= $user->alamat ?> <?= $user->dusun ?>, Kel. <?= $user->kelurahan ?>, Kec. <?= $user->kecamatan ?>, <?= $user->kota ?>, <?= $user->provinsi ?></td>
        </tr>
        <tr>
            <td valign="center">No. Ijazah</td>
            <td valign="center" align="center">:</td>
            <td valign="center"><?= $user->no_ijazah ?></td>
        </tr>
        <tr>
            <td valign="center">No. SKHUN</td>
            <td valign="center" align="center">:</td>
            <td valign="center"><?= $user->no_skhun ?></td>
        </tr>
        <tr>
            <td valign="center">Tempat Lahir</td>
            <td valign="center" align="center">:</td>
            <td valign="center"><?= $user->tempat_lahir ?></td>
        </tr>
        <tr>
            <td valign="center">Tanggal Lahir</td>
            <td valign="center" align="center">:</td>
            <td valign="center"><?= date('d F Y', strtotime($user->tanggal_lahir)) ?></td>
        </tr>
        <tr>
            <td valign="center">Status Kelulusan</td>
            <td valign="center" align="center">:</td>
            <td valign="center"><?= $penilaian->keterangan_kelulusan ?></td>
        </tr>
    </table>
    <div style="width: 97%;">
        <div class="text-right" style="margin-top: 130px;">
            <p>Gunung Sindur, <?= date('d F Y') ?></p>
        </div>
        <div class="text-right" style="margin-top: 80px;">
            <p class="mr-5">( <?= $kepala_sekolah ?> )</p>
        </div>
    </div>

</body>

</html>