<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $judul ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/banner-logo/satu-pustaka.ico" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css" />
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css" />
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/template/admin/index2.html"><b>MACA</b>TONGSIR</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">www.macatongsir.id</p>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesan') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <input type="hidden" value="<?= old('') ?>">
                <form action="/masuk/simpan_masuk" method="post">
                    <?= csrf_field() ?>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control <?= ($validasi->hasError('email')) ? 'is-invalid' : '' ?>" placeholder="Masukkan email" value="<?= old('email') ?>" />
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
                        <input type="password" name="password" class="form-control <?= ($validasi->hasError('password')) ? 'is-invalid' : '' ?>" placeholder="Masukkan password" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validasi->getError('password')  ?>
                        </div>
                    </div>
                    <div class="social-auth-links text-center mb-3">
                        <button type="submit" class="btn btn-block btn-primary">
                            <i class="fa fa-door-open mr-2"></i> Masuk
                        </button>
                    </div>
                </form>
                <p class="mb-1">
                    <a href="/masuk/lupa-password">Lupa password</a>
                </p>
                <p class="mb-0">
                    <a href="/masuk/registrasi" class="text-center">Registrasi pengguna</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="/template/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/template/admin/dist/js/adminlte.min.js"></script>
</body>

</html>