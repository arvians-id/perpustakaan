<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Terjadi Kesalahan</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/satu-pustaka.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/template/utama/css/bootstrap.min.css" />
    <!-- Typography CSS -->
    <link rel="stylesheet" href="/template/utama/css/typography.css" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="/template/utama/css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/template/utama/css/responsive.css" />
    <style type="text/css">
        <?= preg_replace('#[\r\n\t ]+#', ' ', file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'debug.css')) ?>
    </style>
</head>

<body>
    <!-- Wrapper Start -->
    <div class="wrapper">
        <div class="container p-0">
            <div class="row no-gutters height-self-center">
                <div class="col-sm-12 text-center align-self-center">
                    <div class="iq-error position-relative">
                        <img src="/template/utama/images/error/500.png" class="img-fluid iq-error-img" alt="">
                        <h1 class="text-in-box">500</h1>
                        <h2 class="mb-0">Oops! Sepertinya halaman tidak berfungsi.</h2>
                        <p>Silahkan kembali lagi nanti ya.</p>
                        <a class="btn btn-primary mt-3" href="/"><i class="ri-home-4-line"></i>Kembali Kehalaman</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper END -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/template/utama/js/jquery.min.js"></script>
    <script src="/template/utama/js/popper.min.js"></script>
    <script src="/template/utama/js/bootstrap.min.js"></script>
</body>

</html>