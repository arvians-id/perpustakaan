<?= $this->extend('home/homeLayout/template_noBodyClass') ?>

<?= $this->section('konten') ?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card-transparent mb-0">
                    <div class="d-block text-center">
                        <h2 class="mb-3">Buku Macatongsir</h2>
                        <div class="w-100 iq-search-filter">
                            <ul class="list-inline p-0 m-0 row justify-content-center search-menu-options">
                                <li class="search-menu-opt">
                                    <div class="iq-search-bar search-book d-flex align-items-center justify-content-center">
                                        <form action="/home/daftar-buku" method="get" autocomplete="off" class="searchbox" autocomplete="off">
                                            <?= csrf_field() ?>
                                            <input type="text" name="keywords" class="text search-input" placeholder="Cari Buku Di Macatongsir...">
                                            <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
                <div class="flashdata-danger" data-flashdata="<?= session()->getFlashdata('danger') ?>"></div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                        <div class="iq-header-title">
                            <h4 class="card-title mb-0">Daftar Buku Macatongsir</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle btn-sm view-more" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Kategori Buku
                                </button>
                                <form action="/home/daftar-buku" method="get" autocomplete="off" class="searchbox">
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <?php foreach ($kategori_buku as $kategori) : ?>
                                            <input class="dropdown-item" type="submit" name="kategori" value="<?= $kategori['kategori'] ?>"></input>
                                        <?php endforeach ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <?php if ($buku_macatongsir != null) : ?>
                            <div class="row">
                                <?php foreach ($buku_macatongsir as $buku) : ?>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                            <div class="iq-card-body p-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="col-6 p-0 position-relative image-overlap-shadow">
                                                        <a href="javascript:void();"><img class="img-fluid rounded w-100 img-responsive" src="/assets/img-buku/<?= $buku['photo'] ?>" alt=""></a>
                                                        <div class="view-book">
                                                            <a href="/home/daftar-buku/<?= $buku['kode_buku'] ?>" class="btn btn-sm btn-white">View Book</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-2">
                                                            <h6 class="mb-1"><?= $buku['judul'] ?></h6>
                                                            <p class="font-size-13 line-height mb-1"><?= $buku['author'] ?></p>
                                                            <div class="d-block line-height">
                                                            </div>
                                                        </div>
                                                        <div class="iq-product-action">
                                                            <?php if (session()->get('email')) : ?>
                                                                <form action="/pengguna/simpan_bookmarks/<?= $buku['kode_buku'] ?>" method="post">
                                                                    <?= csrf_field() ?>
                                                                    <button href="javascript:void();" class="btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                                            <path fill="none" d="M0 0H24V24H0z" />
                                                                            <path d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228z" fill="rgba(225,63,63,1)" /></svg></button>
                                                                </form>
                                                            <?php else : ?>
                                                                <a href="/masuk" class="btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                                        <path fill="none" d="M0 0H24V24H0z" />
                                                                        <path d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228z" fill="rgba(225,63,63,1)" /></svg></a>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        <?php else : ?>
                            <img src="/assets/banner-logo/no-data.png" class="img mx-auto d-block" width="300" alt="#">
                            <p class="text-center">Tidak Ada Buku</p>
                        <?php endif ?>
                        <?= $pager->links('buku_macatongsir', 'macatongsir_pagination') ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between align-items-center position-relative mb-0 similar-detail">
                        <div class="iq-header-title">
                            <h4 class="card-title mb-0">Buku Terfavorit</h4>
                        </div>
                    </div>
                    <div class="iq-card-body similar-contens">
                        <ul id="similar-slider" class="list-inline p-0 mb-0 row">
                            <?php foreach ($favorit_buku as $macatongsir) : ?>
                                <li class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <div class="col-5 p-0 position-relative image-overlap-shadow">
                                            <a href="javascript:void();"><img class="img-fluid rounded w-100 img-macatongsir" src="/assets/img-buku/<?= $macatongsir['photo'] ?>" alt=""></a>
                                            <div class="view-book">
                                                <a href="/home/daftar-buku/<?= $macatongsir['kode_buku'] ?>" class="btn btn-sm btn-white">View Book</a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <h6 class="mb-1"><?= $macatongsir['judul'] ?></h6>
                                                <p class="font-size-13 line-height mb-1"><?= $macatongsir['author'] ?></p>
                                                <div class="d-block line-height">
                                                </div>
                                            </div>
                                            <div class="iq-product-action">
                                                <?php if (session()->get('email')) : ?>
                                                    <form action="/pengguna/simpan_bookmarks/<?= $macatongsir['kode_buku'] ?>" method="post">
                                                        <?= csrf_field() ?>
                                                        <button type="submit" class="btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                                <path fill="none" d="M0 0H24V24H0z" />
                                                                <path d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228z" fill="rgba(225,63,63,1)" /></svg></button>
                                                    </form>
                                                <?php else : ?>
                                                    <a href="/masuk" class="btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                            <path fill="none" d="M0 0H24V24H0z" />
                                                            <path d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228z" fill="rgba(225,63,63,1)" /></svg></a>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wrapper END -->
<!-- Sweet Alerts -->
<script src="/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>
<script>
    const flash = document.querySelector('.flashdata').dataset.flashdata;
    const flashDanger = document.querySelector('.flashdata-danger').dataset.flashdata;

    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: flash
        })
    } else if (flashDanger) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: flashDanger,
        })
    }
</script>
<?= $this->endSection() ?>