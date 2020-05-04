<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="PSB Tazkia Insani" />
    <meta name="author" content="Muhammad Ilham Fhadilah" />
    <title>Login - PSB Tazkia Insani</title>
    <link href="<?= base_url('/') ?>assets/templates/dist/css/styles.css" rel="stylesheet" />
    <script src="<?= base_url('/') ?>assets/fontawesome/js/all.min.js"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login - PSB Tazkia Insani</h3>
                                </div>
                                <div class="card-body">
                                    <?php if ($this->session->flashdata('berhasil')) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= $this->session->flashdata('berhasil') ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php } elseif ($this->session->flashdata('gagal')) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $this->session->flashdata('gagal') ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php } ?>
                                    <?= form_open('auth', ['method' => 'post']) ?>
                                    <div class="form-group">
                                        <label class="mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-4" id="inputEmailAddress" name="email" value="<?= set_value('email') ?>" type="text" placeholder="Masukan Email Terdaftar">
                                        <small class="text-danger"><?php echo form_error('email'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1" for="inputPassword">Password</label>
                                        <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Masukan Password" />
                                        <small class="text-danger"><?php echo form_error('password'); ?></small>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="password.html#">Forgot Password?</a>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="<?= base_url('auth/registrasi') ?>">Belum mendaftar? Daftar!</a></div>
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
    <script src="<?= base_url('/') ?>assets/js/bootstrap.js"></script>
    <script src="<?= base_url('/') ?>assets/templates/dist/js/scripts.js"></script>
</body>

</html>