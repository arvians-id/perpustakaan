<?= $this->extend('home/homeLayout/template_noBodyClass') ?>

<?= $this->section('konten') ?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Detail Buku</h4>
                    </div>
                    <div class="iq-card-body pb-0">
                        <div class="description-contens align-items-top row">
                            <div class="col-md-4">
                                <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body p-0">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <ul id="description-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <img src="http://opac-perpustakaan.ummi.ac.id/images/docs/<?= $apiDetailBuku->image ?>" class="img-fluid w-100 rounded" alt="">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body p-0">
                                        <h3 class="mb-3"><?= $apiDetailBuku->title ?></h3>
                                        <div class="price d-flex align-items-center font-weight-500 mb-2">
                                            <span class="font-size-24 text-dark">ISBN & ISSN - <?= $apiDetailBuku->isbn_issn ?></span>
                                        </div>
                                        <div class="mb-3 d-block">
                                            <span class="font-size-20 text-warning">
                                                <?= $apiDetailBuku->language_name ?>
                                            </span>
                                        </div>
                                        <div class="mb-3">
                                            <?php if (session()->get('email')) : ?>
                                                <form action="/pengguna/simpan_bookmark/<?= $apiDetailBuku->biblio_id ?>" method="post">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="judul" value="<?= $apiDetailBuku->title ?>">
                                                    <input type="hidden" name="isbn_issn" value="<?= $apiDetailBuku->isbn_issn ?>">
                                                    <input type="hidden" name="author" value="<?= $apiDetailBuku->author_name ?>">
                                                    <input type="hidden" name="image" value="<?= $apiDetailBuku->image ?>">
                                                    <button type="submit" class="btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                            <path fill="none" d="M0 0H24V24H0z" />
                                                            <path d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228z" fill="rgba(225,63,63,1)" /></svg> Masukkan ke daftar buku anda</button>
                                                </form>
                                            <?php else : ?>
                                                <a href="/masuk" class="btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                        <path fill="none" d="M0 0H24V24H0z" />
                                                        <path d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228z" fill="rgba(225,63,63,1)" /></svg> Masukkan ke daftar buku anda</a>
                                            <?php endif ?>
                                        </div>
                                        <span class="text-dark pb-4 d-block"><?= $apiDetailBuku->notes ?></span>
                                        <div class="text-primary mb-4 iq-border-bottom">Author: <span class="text-body"><?= $apiDetailBuku->author_name ?></span></div>
                                        <h5 class="mb-3">Kategori Buku</h5>
                                        <form action="/home" method="get" autocomplete="off" class="searchbox">
                                            <?php foreach ($kategori_buku as $kategori) : ?>
                                                <input class="btn btn-primary mb-3" type="submit" name="kategori" value="<?= $kategori['kategori'] ?>"></input>
                                            <?php endforeach ?>
                                        </form>
                                        <div class="iq-social d-flex align-items-center">
                                            <h5 class="mr-2">Ikuti Kami</h5>
                                            <ul class="list-inline d-flex p-0 mb-0 align-items-center">
                                                <li>
                                                    <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="avatar-40 rounded-circle bg-primary pinterest"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
</div>
<!-- Wrapper END -->
<?= $this->endSection() ?>