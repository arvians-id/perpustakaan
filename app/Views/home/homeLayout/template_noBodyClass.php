<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $judul ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/banner-logo/satu-pustaka.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="/template/utama/css/typography.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/template/utama/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/template/utama/css/responsive.css">
    <!-- My Css -->
    <link rel="stylesheet" href="/plugins/myjscss/css/artikel.css">
    <style>
        .img-responsive {
            width: auto;
            height: 250px;
        }

        @media screen and (max-width: 1600px) and (min-width: 600px) {
            .img-responsive {
                width: auto;
                height: 160px;
            }
        }

        .img-macatongsir {
            width: auto;
            height: 200px;
        }

        @media screen and (max-width: 1600px) and (min-width: 600px) {
            .img-macatongsir {
                width: auto;
                height: 140px;
            }
        }

        .my-bg {
            background-color: #f5f5f5;
        }

        .my-nav:hover {
            background-color: #5be0cb;
        }

        .aktif {
            background-color: #5be0cb;
        }

        .img-terkait {
            filter: brightness(50%);
        }

        .act-btn {
            display: block;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            color: white;
            font-size: 30px;
            font-weight: bold;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            text-decoration: none;
            transition: ease all 0.3s;
            position: fixed;
            right: 30px;
            bottom: 30px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <?= $this->include('template_utama/sidebar') ?>
    <!-- Navbar -->
    <?= $this->include('template_utama/navbar') ?>

    <!-- Konten -->
    <?= $this->renderSection('konten') ?>
    <!-- Floating Action Wa -->
    <a href="https://api.whatsapp.com/send?phone=6285723335339">
        <img src="/assets/banner-logo/wa.png" alt="" class="act-btn">
    </a>
    <!-- Footer -->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6 text-right">
                    Copyright &copy; 2020 <a href="/">Macatongsir</a> - Taman Baca Masyarakat (TBM)
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/template/utama/js/jquery.min.js"></script>
    <script src="/template/utama/js/popper.min.js"></script>
    <script src="/template/utama/js/bootstrap.min.js"></script>
    <!-- Appear JavaScript -->
    <script src="/template/utama/js/jquery.appear.js"></script>
    <!-- Countdown JavaScript -->
    <script src="/template/utama/js/countdown.min.js"></script>
    <!-- Counterup JavaScript -->
    <script src="/template/utama/js/waypoints.min.js"></script>
    <script src="/template/utama/js/jquery.counterup.min.js"></script>
    <!-- Wow JavaScript -->
    <script src="/template/utama/js/wow.min.js"></script>
    <!-- Apexcharts JavaScript -->
    <script src="/template/utama/js/apexcharts.js"></script>
    <!-- Slick JavaScript -->
    <script src="/template/utama/js/slick.min.js"></script>
    <!-- Select2 JavaScript -->
    <script src="/template/utama/js/select2.min.js"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="/template/utama/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="/template/utama/js/jquery.magnific-popup.min.js"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="/template/utama/js/smooth-scrollbar.js"></script>
    <!-- lottie JavaScript -->
    <script src="/template/utama/js/lottie.js"></script>
    <!-- am core JavaScript -->
    <script src="/template/utama/js/core.js"></script>
    <!-- am charts JavaScript -->
    <script src="/template/utama/js/charts.js"></script>
    <!-- am animated JavaScript -->
    <script src="/template/utama/js/animated.js"></script>
    <!-- am kelly JavaScript -->
    <script src="/template/utama/js/kelly.js"></script>
    <!-- am maps JavaScript -->
    <script src="/template/utama/js/maps.js"></script>
    <!-- am worldLow JavaScript -->
    <script src="/template/utama/js/worldLow.js"></script>
    <!-- Raphael-min JavaScript -->
    <script src="/template/utama/js/raphael-min.js"></script>
    <!-- Morris JavaScript -->
    <script src="/template/utama/js/morris.js"></script>
    <!-- Morris min JavaScript -->
    <script src="/template/utama/js/morris.min.js"></script>
    <!-- Flatpicker Js -->
    <script src="/template/utama/js/flatpickr.js"></script>
    <!-- Style Customizer -->
    <script src="/template/utama/js/style-customizer.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="/template/utama/js/chart-custom.js"></script>
    <!-- Custom JavaScript -->
    <script src="/template/utama/js/custom.js"></script>
</body>

</html>