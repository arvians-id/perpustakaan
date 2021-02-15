<?= $this->extend('home/homeLayout/template_noBodyClass') ?>

<?= $this->section('konten') ?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="row">
        <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
        <div class="flashdata-danger" data-flashdata="<?= session()->getFlashdata('danger') ?>"></div>
        <div class="col-sm-12">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/assets/banner-logo/6.png" class="d-block w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav justify-content-center my-bg mb-5 shadow-sm bg-white rounde border-primary border-bottom">
        <li class="nav-item my-nav">
            <a class="nav-link my-link text-dark" href="/home/artikel">Semua</a>
        </li>
        <?php foreach ($kategori as $kat) : ?>
            <li class="nav-item my-nav">
                <a class="nav-link my-link text-dark <?= service('uri')->getSegment(3) == $kat['kategori'] ? 'aktif' : '' ?>" href="/home/kategori/<?= urlencode($kat['kategori']) ?>"><?= $kat['kategori'] ?></a>
            </li>
        <?php endforeach ?>
    </ul>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <p class="mb-3"><strong>Kategori :</strong> <?= $jenis_kategori ?> &nbsp;&nbsp; <strong>Ditemukan :</strong> <?= $jumlah_artikel ?></p>
                <hr>
            </div>
            <?php foreach ($artikel as $art) : ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-mb-3">
                        <img src="/assets/img-artikel/<?= $art['photo'] ?>" height="250" class="card-img-top" alt="#">
                        <div class="iq-card-body">
                            <h6 class="card-title"><a href="/home/artikel/<?= $art['slug'] ?>"><?= strlen($art['judul']) > 80 ? substr_replace($art['judul'], '...', 80) : $art['judul'] ?></a> </h6>
                            <p class="card-text"><?= strlen($art['isi']) > 30 ? substr_replace(strip_tags($art['isi']), '...', 150) : strip_tags($art['isi']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <?= $pager->links('artikel', 'artikel_pagination') ?>
    </div>
</div>
</div>
<!-- Wrapper END -->
<?= $this->endSection() ?>