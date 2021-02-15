<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Halaman Tidak Ditemukan</title>
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
</head>

<body>
  <!-- Wrapper Start -->
  <div class="wrapper">
    <div class="container p-0">
      <div class="row no-gutters height-self-center">
        <div class="col-sm-12 text-center align-self-center">
          <div class="iq-error position-relative">
            <img src="/template/utama/images/error/404.png" class="img-fluid iq-error-img" alt="" />
            <?php if (!empty($message) && $message !== '(null)') : ?>
              <?= esc($message) ?>
            <?php else : ?>
              <h2 class="mb-0 mt-4">Halaman Yang Kamu Minta Tidak Ditemukan</h2>
              <p>Pastikan halaman yang kamu tuju benar ya.</p>
            <?php endif ?>
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