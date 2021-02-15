<?= $this->extend('home/homeLayout/template_noBodyClass') ?>

<?= $this->section('konten') ?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="/assets/banner-logo/tbm.jpg" class="card-img" alt="#">
                                </div>
                                <div class="col-md-8">
                                    <div class="iq-card-body">
                                        <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-profil-tab-fill" data-toggle="pill" href="#pills-profil-fill" role="tab" aria-controls="pills-profil" aria-selected="true">Profil Macatongsir</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-mitra-tab-fill" data-toggle="pill" href="#pills-mitra-fill" role="tab" aria-controls="pills-mitra" aria-selected="false">Mitra</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-tbm-tab-fill" data-toggle="pill" href="#pills-tbm-fill" role="tab" aria-controls="pills-tbm" aria-selected="false">Daftar TBM Lainnya</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent-1">
                                            <div class="tab-pane fade show active" id="pills-profil-fill" role="tabpanel" aria-labelledby="pills-profil-tab-fill">
                                                <div class="overflow-auto">
                                                    <p class="card-text" style="text-align: justify;">Taman Bacaan Masyarakat Gentong Pasir disingkat Macatongsir terletak di Kampung Gentong Pasir RT 04 RW 01 Desa Langensari Kecamatan Sukaraja Kabupaten Sukabumi. Taman bacaan ini didirikan oleh Roni Fardiansyah dan Mimin Mintarsih yang berprofesi sebagai guru. Melihat keseharian masyarakat terutama anak-anak yang kurang memiliki kegiatan-kegiatan positif ditambah pula kurangnya minat baca masyarakat dikarenakan tidak ada sarana yang memadai di sekitar meraka. Karena itulah TBM Macatongsir didirikan dengan tujuan awalnya memberikan layanan minat baca dan belajar yang relevan dengan kebutuhan masyarakat.</p>
                                                    <p class="card-text">Macatongsir memiliki misi, diantaranya:</p>
                                                    <ul type="a">
                                                        <li>Menciptakan Rumah Baca yang menarik, kreatif, dan inovatif.</li>
                                                        <li>Menjadikan Rumah Baca menjadi sebagai tempat belajar, berkomunikasi, berkreasi, dan berprestasi.</li>
                                                        <li>Mendidik anak-anak dan remaja untuk memanfaatkan waktu luang dengan membaca dan belajar.</li>
                                                        <li>Memperluas wawasan masyarakat dalam dunia literasi.</li>
                                                        <li>Memberikan sumbangsih dan kegiatan positif kepada masyarakat</li>
                                                        <li>Membantu masyarakat meningkatkan keterampilannya.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-mitra-fill" role="tabpanel" aria-labelledby="pills-mitra-tab-fill">
                                                <div class="media mb-4">
                                                    <img src="/assets/banner-logo/ummi.png" class="align-self-start avatar-80 mr-3" alt="#">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">UMMI</h5>
                                                        <p>Universitas Muhammadiyah Sukabumi</p>
                                                    </div>
                                                </div>
                                                <div class="card-footer border-0">
                                                    <small class="text-muted">Tertarik untuk bermitra dengan kami? <a href="mailto:macatongsir.id@gmail.com">Hubungi Kami</a></small>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-tbm-fill" role="tabpanel" aria-labelledby="pills-tbm-tab-fill">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-header d-flex justify-content-between mb-0">
                                <div class="iq-header-title">
                                    <h4 class="card-title mb-0">Daftar Pendonasi</h4>
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle p-0 text-body" id="dropdownMenuButton3" data-toggle="dropdown">
                                            Periksa Berdasarkan<i class="ri-arrow-down-s-fill"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right shadow-none" aria-labelledby="dropdownMenuButton3">
                                            <a class="dropdown-item" href="/home/macatongsir"><i class="ri-list-check-2"></i> Semua</a>
                                            <a class="dropdown-item" href="/home/macatongsir/<?= date('Y') ?>/<?= date('m') ?>"><i class="ri-calendar-todo-fill"></i> Bulan Ini</a>
                                            <a class="dropdown-item" href="/home/macatongsir/<?= date('Y') ?>"><i class="ri-calendar-line"></i> Tahun Ini</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <?php if ($jumlah_donasi > 0) : ?>
                                    <ul class="list-inline row mb-0 align-items-start iq-scrollable-block">
                                        <?php foreach ($donasi as $bantuan) : ?>
                                            <li class="col-sm-3 col-sm-6 col-lg-3 d-flex mb-3 align-items-start">
                                                <div class="icon iq-icon-box mr-3">
                                                    <a href="javascript:void();"><img class="img-fluid avatar-60 rounded-circle" src="/assets/img-donatur/<?= $bantuan['photo_donatur'] ?>" alt=""></a>
                                                </div>
                                                <div class="mt-1">
                                                    <h6><?= $bantuan['nama'] ?></h6>
                                                    <p class="mb-0 text-primary">Jenis Donasi: <span class="text-body"><?= $bantuan['donasi'] ?></span></p>
                                                </div>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                <?php else : ?>
                                    <img src="/assets/banner-logo/no-data.png" class="img mx-auto d-block" width="300" alt="#">
                                    <p class="text-center">Tidak Ada Donasi</p>
                                <?php endif ?>
                                <a href="<?= session()->get('email') ? '/pengguna/donasi' : '/masuk' ?>" class="btn btn-primary mt-2">Donasi Sekarang</a>
                                <?php if (service('uri')->getSegment(3)) : ?>
                                    <a class="float-right btn btn-primary mt-2 text-white"><?= 'Tahun : ' . $tahun ?><?= $bulan ? '&nbsp;&nbsp;&nbsp; Bulan : ' . $bulan : '' ?></a>
                                    <small class="align-bottom">Ditemukan : <?= $jumlah_donasi ?></small>
                                <?php endif ?>
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