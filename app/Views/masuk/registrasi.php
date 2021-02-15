<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/banner-logo/satu-pustaka.ico" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="/template/admin/index2.html"><b>MACA</b>TONGSIR</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">www.macatongsir.id</p>
                <input type="hidden" value="<?= old('') ?>">
                <form action="/masuk/simpan_registrasi" method="post">
                    <?= csrf_field() ?>
                    <div class="input-group mb-3">
                        <input type="text" name="nama_lengkap" class="form-control <?= ($validasi->hasError('nama_lengkap')) ? 'is-invalid' : '' ?>" value="<?= old('nama_lengkap') ?>" placeholder="Masukkan nama lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validasi->getError('nama_lengkap')  ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control <?= ($validasi->hasError('email')) ? 'is-invalid' : '' ?>" placeholder="Masukkan email" value="<?= old('email') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validasi->getError('email')  ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control <?= ($validasi->hasError('password')) ? 'is-invalid' : '' ?>" placeholder="Masukkan password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validasi->getError('password')  ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="rpassword" class="form-control <?= ($validasi->hasError('rpassword')) ? 'is-invalid' : '' ?>" placeholder="Masukkan ulang password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validasi->getError('rpassword')  ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">
                        <i class="fa fa-pen-alt mr-2"></i>
                        Registrasi
                    </button>
                </form>
                <p class="mb-0">
                    <a href="/masuk" class="text-center">Sudah punya akun? login</a>
                </p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- Sweet Alerts -->
    <script src="/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>
    <!-- jQuery -->
    <script src="/template/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/template/admin/dist/js/adminlte.min.js"></script>

</body>

</html>