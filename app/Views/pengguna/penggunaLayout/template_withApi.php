<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $judul ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/banner-logo/satu-pustaka.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="/template/utama/css/typography.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/template/utama/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/template/utama/css/responsive.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- Ajax jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- My Css -->
    <link href="/plugins/myjscss/css/mycss.css" rel="stylesheet">
    <style>
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

<body class="sidebar-main-active right-column-fixed">

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
    <!-- Style Customizer -->
    <script src="/template/utama/js/style-customizer.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="/template/utama/js/chart-custom.js"></script>
    <!-- Custom JavaScript -->
    <script src="/template/utama/js/custom.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- Sweet Alerts -->
    <script src="/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>
    <script>
        const flash = document.querySelector('.flashdata').dataset.flashdata;

        if (flash) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: flash
            })
        }
        const provinsi = document.querySelector('select[name=provinsi]');
        const kota = document.querySelector('select[name=kota]');
        const kecamatan = document.querySelector('select[name=kecamatan]');
        const kelurahan = document.querySelector('select[name=kelurahan]');
        fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi')
            .then(response => response.json())
            .then(dataProvinsi => {
                let data = '';
                dataProvinsi.provinsi.forEach((val, i) => {
                    data += `<option id="${val.id}" value="${val.nama}"> ${val.nama} </option>`;
                    provinsi.innerHTML = data;
                })
            })
        // $('option:selected', this).attr('id')
        provinsi.addEventListener('change', function() {
            let id_provinsi = this.options[this.selectedIndex].getAttribute('id');
            let kotaKabupaten = document.querySelector('#kota');
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' + id_provinsi)
                .then(response => response.json())
                .then(dataKota => {
                    let dataKot = '';
                    dataKota.kota_kabupaten.forEach((val, i) => {
                        dataKot += `<option id="${val.id}" value="${val.nama}"> ${val.nama} </option>`;
                        kota.innerHTML = dataKot;
                    })
                })
        })
        kota.addEventListener('change', function() {
            let id_kota = this.options[this.selectedIndex].getAttribute('id');
            let kecamatanSelect = document.querySelector('#kecamatan');
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' + id_kota)
                .then(response => response.json())
                .then(dataKecamatan => {
                    let dataKec = '';
                    dataKecamatan.kecamatan.forEach((val, i) => {
                        dataKec += `<option id="${val.id}" value="${val.nama}"> ${val.nama} </option>`;
                        kecamatanSelect.innerHTML = dataKec;
                    })
                })
        })

        kecamatan.addEventListener('change', function() {
            let id_kecamatan = this.options[this.selectedIndex].getAttribute('id');
            let kelurahanSelect = document.querySelector('#kelurahan');
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' + id_kecamatan)
                .then(response => response.json())
                .then(dataKelurahan => {
                    let dataKel = '';
                    dataKelurahan.kelurahan.forEach((val, i) => {
                        dataKel += `<option id="${val.id}" value="${val.nama}"> ${val.nama} </option>`;
                        kelurahanSelect.innerHTML = dataKel;
                    })
                })
        })
    </script>
</body>

</html>