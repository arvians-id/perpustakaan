<?= $this->extend('home/homeLayout/template_noBodyClass') ?>

<?= $this->section('konten') ?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <img src="/assets/img-artikel/<?= $artikel['photo'] ?>" class="img-thumbnail mx-auto d-block mb-5" width="700" alt="">
                        <h3><?= $artikel['judul'] ?></h3>
                        <p><i class="ri-time-line"></i> <?= date_format(date_create($artikel['created_at']), 'l, d F Y') ?> &nbsp;&nbsp; <i class="ri-grid-fill"></i> <i class="fas fa-clipboard-list"></i><?= $artikel['kategori'] ?></p>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-md-9">
                                <p><?= $artikel['isi'] ?></p>
                                <hr>
                            </div>
                            <div class="col-12 col-lg-3">
                                <h4 class="mb-2">Kategori</h4>
                                <?php foreach ($kategori as $kat) : ?>
                                    <a href="/home/kategori/<?= urlencode($kat['kategori']) ?>" class="btn btn-danger mb-2"><?= $kat['kategori'] ?></a>
                                <?php endforeach ?>
                                <h4>Artikel Terbaru</h4>
                                <?php foreach ($artikel_lainnya as $art) : ?>
                                    <div class="media mb-3 mt-3">
                                        <img src="/assets/img-artikel/<?= $art['photo'] ?>" class="mr-3 avatar-50" alt="#">
                                        <div class="media-body">
                                            <a href="/home/artikel/<?= $art['slug'] ?>">
                                                <p class=" mt-0 mb-1 text-secondary"><?= $art['judul'] ?></p>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <h4>Ikuti Kami</h4>
                        <div class="mt-3 mb-3">
                            <div class="iq-social d-inline-block align-items-center">
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
                        <h4 class="mb-3">Artikel Terkait</h4>
                        <div class="row">
                            <?php foreach ($semuaArtikel as $art) : ?>
                                <?php similar_text($artikel['judul'], $art['judul'], $persen); ?>
                                <?php if ($persen >= 25) : ?>
                                    <div class="col-12 col-md-6 col-xl-3">
                                        <div class="iq-card bg-dark rounded-0 text-white text-center iq-mb-3">
                                            <img src="/assets/img-artikel/<?= $art['photo'] ?>" height="250" width="300" class="card-img rounded img-terkait" alt="#">
                                            <div class="card-img-overlay p-5">
                                                <h5 style="text-align: left;"><a href="/home/artikel/<?= $art['slug'] ?>" class="text-white"><?= $art['judul'] ?></a> </h5>
                                                <p style="text-align: left;" class="mt-3"><?= date_format(date_create($art['created_at']), 'l, d F Y')  ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Wrapper END -->
<?= $this->endSection() ?>