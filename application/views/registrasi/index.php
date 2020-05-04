<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="PSB Tazkia Insani" />
    <meta name="author" content="Muhammad Ilham Fhadilah" />
    <title>Register - PSB Tazkia Insani</title>
    <link href="<?= base_url('/') ?>assets/templates/dist/css/styles.css" rel="stylesheet" />
    <script src="<?= base_url('/') ?>assets/fontawesome/js/all.min.js"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Pendaftaran - PSB Tazkia Insani</h3>
                                </div>
                                <div class="card-body">
                                    <?= form_open('auth/registrasi', ['method' => 'post']) ?>
                                    <div class="form-group">
                                        <label class="mb-1" for="inputName">Nama Lengkap</label>
                                        <input class="form-control py-4" id="inputName" type="text" name="nama" value="<?= set_value('nama') ?>" placeholder="Masukan Nama Lengkap" />
                                        <small class="text-danger"><?php echo form_error('nama'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-4" id="inputEmailAddress" name="email" type="text" value="<?= set_value('email') ?>" aria-describedby="emailHelp" placeholder="Masukan Email" />
                                        <small class="text-danger"><?php echo form_error('email'); ?></small>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Masukan password" />
                                                <small class="text-danger"><?php echo form_error('password'); ?></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                <input class="form-control py-4" id="inputConfirmPassword" name="password_confirm" type="password" placeholder="Masukan ulang password" />
                                                <small class="text-danger"><?php echo form_error('password_confirm'); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Daftar</button></div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="<?= base_url('auth') ?>">Sudah ada akun? Login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer" class="mt-5">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Tazkia Insani 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url('/') ?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url('/') ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url('/') ?>assets/templates/dist/js/scripts.js"></script>
</body>

</html>