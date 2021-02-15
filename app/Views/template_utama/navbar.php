<!-- TOP Nav Bar -->
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-menu-bt d-flex align-items-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="las la-bars"></i></div>
                </div>
                <div class="iq-navbar-logo d-flex justify-content-between">
                    <a href="/" class="header-logo">
                        <img src="/assets/banner-logo/logos.png" class="img-fluid rounded-normal" alt="">
                    </a>
                </div>
            </div>
            <div class="navbar-breadcrumb">
                <h5 class="mb-0">MACATONGSIR</h5>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= service('uri')->getSegment(1) == 'pengguna' ? '/pengguna' : '/' ?>"><?= service('uri')->getSegment(1) == 'pengguna' ? 'Pengguna' : 'Home' ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= str_replace('www.webpustaka.id |', ' ', $judul) ?></li>
                    </ul>
                </nav>
            </div>
            <div class="iq-search-bar">
                <form action="/home" method="get" autocomplete="off" class="searchbox">
                    <?= csrf_field() ?>
                    <input type="text" name="keywords" class="text search-input" placeholder="Cari Buku...">
                    <a class="search-link" href="javascript:void(0)"><i class="ri-search-line"></i></a>
                </form>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                <i class="ri-menu-3-line"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list">
                    <li class="nav-item nav-icon search-content">
                        <a href="javascript:void(0)" class="search-toggle iq-waves-effect text-gray rounded">
                            <i class="ri-search-line"></i>
                        </a>
                        <form action="/home" method="get" autocomplete="off" class="search-box p-0">
                            <?= csrf_field() ?>
                            <input type="text" name="keywords" class="text search-input" placeholder="Cari Buku...">
                            <a class="search-link" href="javascript:void(0)"><i class="ri-search-line"></i></a>
                        </form>
                    </li>
                    <li class="nav-item nav-icon dropdown">
                        <a href="javascript:void(0)" class="search-toggle iq-waves-effect text-gray rounded">
                            <i class="ri-heart-2-line"></i>
                            <span class="badge badge-danger count-cart rounded-circle"><?= $jumlah_bookmark ?></span>
                        </a>
                        <div class="iq-sub-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0 toggle-cart-info">
                                    <div class="bg-primary p-3">
                                        <h5 class="mb-0 text-white">Buku Anda<small class="badge  badge-light float-right pt-1"><?= $jumlah_bookmark ?></small></h5>
                                    </div>
                                    <?php foreach ($bookmark as $ambilBuku) : ?>
                                        <a class="iq-sub-card">
                                            <div class="media align-items-center">
                                                <div class="">
                                                    <img class="rounded" src="<?= strlen($ambilBuku['image']) > 34 ? '/assets/img-buku/' : 'https://opac-perpustakaan.ummi.ac.id/images/docs/' ?><?= $ambilBuku['image'] ?>" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 "><?= strlen($ambilBuku['judul']) > 30 ? substr_replace($ambilBuku['judul'], '...', 30) : $ambilBuku['judul'] ?></h6>
                                                    <p class="mb-0"><?= $ambilBuku['author'] ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endforeach ?>
                                    <div class="d-flex align-items-center text-center p-3">
                                        <a class="btn btn-primary mr-2 iq-sign-btn btn-block" href="<?= session()->get('email') ? '/pengguna/peminjaman-buku' : '/masuk' ?>" role="button">Lihat Buku</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php if (session()->get('email')) : ?>
                        <li class="line-height pt-3">
                            <a href="javascript:void(0)" class="search-toggle iq-waves-effect d-flex align-items-center">
                                <img src="/assets/img-pengguna/<?= $pengguna['photo'] ?>" class="img-fluid rounded-circle mr-3" alt="user">
                                <div class="caption">
                                    <h6 class="mb-1 line-height"><?= $pengguna['nama_lengkap'] ?></h6>
                                    <p class="mb-0 text-primary"><?= $pengguna['email'] ?></p>
                                </div>
                            </a>
                            <div class="iq-sub-dropdown iq-user-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white line-height">Hello, <?= $pengguna['nama_lengkap'] ?></h5>
                                            <span class="text-white font-size-12">Online</span>
                                        </div>
                                        <a href="<?= session()->get('role') == 2 ? '/pengguna' : '/admin' ?>" class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-primary">
                                                    <i class="ri-file-user-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0">Profil Saya</h6>
                                                    <p class="mb-0 font-size-12">Lihat detail profil anda.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <?php if (session()->get('role') == 2) : ?>
                                            <a href="/pengguna/ubah-profil" class="iq-sub-card iq-bg-primary-hover">
                                                <div class="media align-items-center">
                                                    <div class="rounded iq-card-icon iq-bg-primary">
                                                        <i class="ri-profile-line"></i>
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Ubah Profil Saya</h6>
                                                        <p class="mb-0 font-size-12">Ubah semua data profil anda.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="/pengguna/peminjaman-buku" class="iq-sub-card iq-bg-primary-hover">
                                                <div class="media align-items-center">
                                                    <div class="rounded iq-card-icon iq-bg-primary">
                                                        <i class="ri-book-mark-fill"></i>
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Peminjaman Buku</h6>
                                                        <p class="mb-0 font-size-12">Lihat Peminjaman Buku Anda.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="/pengguna/ubah-password" class="iq-sub-card iq-bg-primary-hover">
                                                <div class="media align-items-center">
                                                    <div class="rounded iq-card-icon iq-bg-primary">
                                                        <i class="ri-lock-line"></i>
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Pengaturan Privasi</h6>
                                                        <p class="mb-0 font-size-12">Ubah pengaturan privasi password.</p>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php endif ?>
                                        <div class="d-inline-block w-100 text-center p-3">
                                            <a class="bg-primary iq-sign-btn btn-block" href="/masuk/logout" role="button">Keluar<i class="ri-login-box-line ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php else : ?>
                        <li class="nav-item nav-icon dropdown">
                            <a href="javascript:void(0)" class="search-toggle iq-waves-effect text-gray rounded">
                                <i class="ri-map-pin-user-fill"></i>
                            </a>
                            <div class="iq-sub-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 toggle-cart-info">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white">Masuk/Registrasi</h5>
                                        </div>
                                        <div class="d-flex align-items-center text-center p-3">
                                            <a class="btn btn-primary mr-2 iq-sign-btn" href="/masuk" role="button">Masuk</a>
                                            <a class="btn btn-primary iq-sign-btn" href="/masuk/registrasi" role="button">Registrasi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- TOP Nav Bar END -->