<!-- loader Start
<div id="loading">
    <div id="loading-center">
    </div>
</div> -->
<!-- loader END -->
<!-- Wrapper Start -->
<div class="wrapper">
    <!-- Sidebar  -->
    <div class="iq-sidebar">
        <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="index.html" class="header-logo">
                <img src="/assets/banner-logo/logos.png" class="img-fluid rounded-normal" alt="">
                <!-- <div class="logo-title">
                    <span class="text-primary text-uppercase">Maca Tongsir</span>
                </div> -->
            </a>
            <div class="iq-menu-bt-sidebar">
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="iq-menu">
                    <li class="<?= service('uri')->getSegment(1) == '' || service('uri')->getSegment(1) == 'home' ? 'active active-menu' : '' ?>">
                        <a href="#utama" class="iq-waves-effect" data-toggle="collapse" aria-expanded="<?= service('uri')->getSegment(1) == '' || service('uri')->getSegment(1) == 'home' ? 'true' : 'false' ?>">
                            <span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i>
                            <span>Halaman Utama</span>
                            <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                        </a>
                        <ul id="utama" class="iq-submenu collapse <?= service('uri')->getSegment(1) == '' || service('uri')->getSegment(1) == 'home' ? 'show' : '' ?>" data-parent="#iq-sidebar-toggle">
                            <li class="<?= $judul == 'TBM Macatongsir | Halaman Utama' ? 'active' : '' ?>"><a href="/"><i class="las la-house-damage"></i>Utama</a></li>
                            <li class="<?= $judul == 'TBM Macatongsir | Panduan Peminjaman' ? 'active' : '' ?>"><a href="/home/panduan-peminjaman"><i class="ri-film-line"></i>Video Pembelajaran</a></li>
                            <li class="<?= $judul == 'TBM Macatongsir | Artikel' ? 'active' : '' ?>"><a href="/home/artikel"><i class="ri-newspaper-line"></i>Artikel</a></li>
                            <li class="<?= $judul == 'TBM Macatongsir | Kegiatan Macatongsir' ? 'active' : '' ?>"><a href="/home/kegiatan"><i class="ri-open-arm-line"></i>Kegiatan</a></li>
                            <li class="<?= $judul == 'TBM Macatongsir | Daftar Buku Macatongsir' ? 'active' : '' ?>"><a href="/home/daftar-buku"><i class="ri-book-fill"></i>Daftar Buku</a></li>
                            <li class="<?= $judul == 'TBM Macatongsir | FAQ' ? 'active' : '' ?>"><a href="/home/faq"><i class="ri-question-fill"></i>FAQ</a></li>
                            <li class="<?= $judul == 'TBM Macatongsir | Profil Macatongsir' ? 'active' : '' ?>"><a href="/home/macatongsir"><i class="ri-building-fill"></i>Tentang</a></li>
                        </ul>
                    </li>
                    <?php if (session()->get('email') && session()->get('role') != 1) : ?>
                        <li class="<?= service('uri')->getSegment(1) == 'pengguna' ? 'active active-menu' : '' ?>">
                            <a href="#pengguna" class="iq-waves-effect" data-toggle="collapse" aria-expanded="<?= service('uri')->getSegment(1) == 'pengguna' ? 'true' : 'false' ?>">
                                <span class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i>
                                <span>Pengguna</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul id="pengguna" class="iq-submenu collapse <?= service('uri')->getSegment(1) == 'pengguna' ? 'show' : '' ?>" data-parent="#iq-sidebar-toggle">
                                <li class="<?= $judul == 'TBM Macatongsir | Pengguna' ? 'active' : '' ?>"><a href="/pengguna"><i class="las la-id-card-alt"></i>Profil Anda</a></li>
                                <li class="<?= $judul == 'TBM Macatongsir | Ubah Profil Anda' ? 'active' : '' ?>"><a href="/pengguna/ubah-profil"><i class="las la-edit"></i>Ubah Profil</a></li>
                                <li class="<?= $judul == 'TBM Macatongsir | Ubah Password' ? 'active' : '' ?>"><a href="/pengguna/ubah-password"><i class="ri-lock-password-fill"></i>Ubah Password</a></li>
                                <li class="<?= $judul == 'TBM Macatongsir | Peminjaman Buku' ? 'active' : '' ?>"><a href="/pengguna/peminjaman-buku"><i class="ri-book-mark-fill"></i>Peminjaman Anda</a></li>
                                <li class="<?= $judul == 'TBM Macatongsir | Kegiatan Anda' ? 'active' : '' ?>"><a href="/pengguna/kegiatan"><i class="ri-run-fill"></i>Kegiatan Anda</a></li>
                                <li class="<?= $judul == 'TBM Macatongsir | Buat Donasi' ? 'active' : '' ?>"><a href="/pengguna/donasi"><i class="ri-exchange-cny-fill"></i>Donasi</a></li>
                            </ul>
                        </li>
                    <?php endif ?>
                </ul>
            </nav>
            <hr>
            <div id="sidebar-bottom" class="position-relative">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <div class="sidebarbottom-content">
                            <p>Jumlah Kasus Covid di Indonesia Saat Ini</p>
                            <li class="nav-item nav-icon dropdown text-secondary" style="list-style-type: none;">
                                <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                                    <i class="ri-hotel-bed-line"></i>
                                    <span class="bg-secondary dots"></span>
                                </a>
                                &nbsp; Dalam Perawatan: <?= $apiCovid['active'] ?>
                            </li>
                            <li class="nav-item nav-icon dropdown text-primary" style="list-style-type: none;">
                                <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                                    <i class="ri-emotion-happy-line"></i>
                                    <span class="bg-primary dots"></span>
                                </a>
                                &nbsp; Sembuh: <?= $apiCovid['recovered'] ?>
                            </li>
                            <li class="nav-item nav-icon dropdown text-danger" style="list-style-type: none;">
                                <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                                    <i class="ri-skull-line"></i>
                                    <span class="bg-danger dots"></span>
                                </a>
                                &nbsp; Meninggal: <?= $apiCovid['deaths'] ?>
                            </li>
                            <li class="nav-item nav-icon dropdown text-info" style="list-style-type: none;">
                                <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                                    <i class="ri-group-line"></i>
                                    <span class="bg-info dots"></span>
                                </a>
                                &nbsp; Terkonfirmasi: <?= $apiCovid['confirmed'] ?>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>