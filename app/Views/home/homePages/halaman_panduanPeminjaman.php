<?= $this->extend('home/homeLayout/template_noBodyClass') ?>

<?= $this->section('konten') ?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= $apiYoutube['items'][0]['snippet']['thumbnails']['high']['url'] ?>" class="card-img" alt="#">
                        </div>
                        <div class="col-md-8">
                            <div class="iq-card-body">
                                <h4 class="card-title"><?= $apiYoutube['items'][0]['snippet']['title'] ?></h4>
                                <p class="card-text"><?= $apiYoutube['items'][0]['snippet']['description'] ?></p>
                                <div class="g-ytsubscribe" data-channelid="UCyFoGtXyT5maOIY6mNIgCnA" data-layout="default" data-count="default"></div>
                                <div class="card-footer border-0">
                                    <small class="text-muted"><a href="">Lihat Panduan Peminjaman Buku</a></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h4>Gerakan Satu Pustaka</h4>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-mb-3">
                    <div class="iq-card-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/mostst5kSAo" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h4>Video Pembelajaran</h4>
        <hr>
        <div class="row">
            <?php foreach ($apiVideoYoutube['items'] as $youtube) : ?>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-mb-3">
                        <div class="iq-card-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $youtube['snippet']['resourceId']['videoId'] ?>" allowfullscreen></iframe>
                            </div>
                            <h6 class="card-title"><?= $youtube['snippet']['title'] ?></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="col-12 mb-3">
                <a href="https://www.youtube.com/channel/UCyFoGtXyT5maOIY6mNIgCnA/videos" class="btn btn-primary">Liat Video Lainnya</a>
            </div>
        </div>
    </div>
</div>

<script src="https://apis.google.com/js/platform.js"></script>
<?= $this->endSection() ?>