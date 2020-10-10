<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Home</h1>
    <a href="<?= base_url('auth/staff') ?>">Staff</a> |
    <a href="<?= base_url('auth/pendaftar') ?>">Pendaftar</a>
    <div>
        Staff : <?= password_hash('staff', PASSWORD_DEFAULT) ?> <br />
        Pendaftar : <?= password_hash('pendaftar', PASSWORD_DEFAULT) ?>
    </div>
</body>

</html>