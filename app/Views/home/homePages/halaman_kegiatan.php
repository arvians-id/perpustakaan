<?= $this->extend('home/homeLayout/template_noBodyClass') ?>

<?= $this->section('konten') ?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
            <div class="flashdata-danger" data-flashdata="<?= session()->getFlashdata('danger') ?>"></div>
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Kegiatan Yang Sedang Berlangsung</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <p>Anda bisa mengikuti kegiatan yang sedang aktif dengan mengisi formulir yang sudah disediakan disetiap kegiatan.</p>
                        <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-kegiatan-aktif-tab-fill" data-toggle="pill" href="#pills-kegiatan-aktif-fill" role="tab" aria-controls="pills-kegiatan-aktif" aria-selected="true">Kegiatan Aktif</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-kegiatan-aktif-lainnya-tab-fill" data-toggle="pill" href="#pills-kegiatan-aktif-lainnya-fill" role="tab" aria-controls="pills-kegiatan-aktif-lainnya" aria-selected="false">Kegiatan Aktif Lainnya</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent-1">
                            <div class="tab-pane fade show active" id="pills-kegiatan-aktif-fill" role="tabpanel" aria-labelledby="pills-kegiatan-aktif-tab-fill">
                                <?php if ($jml_keg_aktif > 0) : ?>
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="/assets/img-kegiatan/<?= $kegiatan_aktif_1['photo'] ?>" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="iq-card-body">
                                                <h4 class="card-title"><?= $kegiatan_aktif_1['judul'] ?></h4>
                                                <p class="card-text"><?= strlen($kegiatan_aktif_1['isi']) > 30 ? substr_replace(strip_tags($kegiatan_aktif_1['isi']), '...', 400) : strip_tags($kegiatan_aktif_1['isi']) ?></p>
                                                <p class="card-text"><small class="text-muted">Pementor : <?= $kegiatan_aktif_1['mentor'] ?></small></p>
                                                <span class="btn bg-primary">Harga : <?= $kegiatan_aktif_1['biaya'] ? 'Rp ' . number_format($kegiatan_aktif_1['biaya'], 2, '.', ',') : 'Gratis'  ?></span>
                                                <span class="btn bg-primary">Slot : <?= $kegiatan_aktif_1['kuota'] ? $kegiatan_aktif_1['kuota'] . ' Orang' : 'Tidak Terbatas'  ?></span>
                                                <a href="/home/kegiatan/<?= $kegiatan_aktif_1['kode_kegiatan'] ?>" class="btn btn-danger">Detail</a>
                                            </div>
                                            <div class="card-footer bg-white">
                                                <small class="text-muted">Kegiatan Berlangsung Hingga : <?= date_format(date_create($kegiatan_aktif_1['kegiatan_dimulai']), 'd F Y') ?> - <?= date_format(date_create($kegiatan_aktif_1['kegiatan_selesai']), 'd F Y') ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <img src="/assets/banner-logo/no-data.png" class="img mx-auto d-block" width="300" alt="#">
                                    <p class="text-center">Tidak Ada Kegiatan</p>
                                <?php endif ?>
                            </div>
                            <div class="tab-pane fade" id="pills-kegiatan-aktif-lainnya-fill" role="tabpanel" aria-labelledby="pills-kegiatan-aktif-lainnya-tab-fill">
                                <?php if ($jml_keg_aktif > 0) : ?>
                                    <?php foreach ($kegiatan_aktif as $keg_aktif) : ?>
                                        <ul class="iq-timeline">
                                            <li>
                                                <div class="timeline-dots border-warning"><i class="ri-open-arm-line"></i></div>
                                                <h6 class="float-left mb-1"><a href="/home/kegiatan/<?= $keg_aktif['kode_kegiatan'] ?>"><?= $keg_aktif['judul'] ?></a></h6>
                                                <small class="float-right mt-1"><?= date_format(date_create($keg_aktif['kegiatan_selesai']), 'd F Y') ?></small>
                                                <div class="d-inline-block w-100">
                                                    <p><span class="badge badge-warning">Aktif</span> Pementor <?= $keg_aktif['mentor'] ?> </p>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <img src="/assets/banner-logo/no-data.png" class="img mx-auto d-block" width="300" alt="#">
                                    <p class="text-center">Tidak Ada Kegiatan</p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="iq-card border-danger border-left border-right iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Kegiatan Berlalu</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <?php if ($jml_keg_berlalu > 0) : ?>
                            <?php foreach ($kegiatan_berlalu as $keg_berlalu) : ?>
                                <ul class="iq-timeline">
                                    <li>
                                        <div class="timeline-dots border-danger"><i class="ri-emotion-unhappy-line"></i></div>
                                        <h6 class="float-left mb-1"><a href="/home/kegiatan/<?= $keg_berlalu['kode_kegiatan'] ?>"><?= strlen($keg_berlalu['judul']) > 20 ? substr_replace($keg_berlalu['judul'], '...', 20) : $keg_berlalu['judul'] ?></a></h6>
                                        <small class="float-right mt-1"><?= date_format(date_create($keg_berlalu['kegiatan_selesai']), 'd F Y') ?></small>
                                        <div class="d-inline-block w-100">
                                            <p><span class="badge badge-danger">Selesai</span> Pementor <?= $keg_berlalu['mentor'] ?> </p>
                                        </div>
                                    </li>
                                </ul>
                            <?php endforeach ?>
                        <?php else : ?>
                            <img src="/assets/banner-logo/no-data.png" class="img mx-auto d-block" width="300" alt="#">
                            <p class="text-center">Tidak Ada Kegiatan</p>
                        <?php endif ?>
                    </div>
                    <div class="card-footer bg-white border-0 mt-auto">
                        <?= $pager->links('kegiatan_berlalu', 'kegiatan_pagination') ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="iq-card border-primary border-left border-right iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Kegiatan Mendatang</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <?php if ($jml_keg_mendatang > 0) : ?>
                            <?php foreach ($kegiatan_mendatang as $keg_mendatang) : ?>
                                <ul class="iq-timeline">
                                    <li>
                                        <div class="timeline-dots"><i class="ri-emotion-happy-line"></i></div>
                                        <h6 class="float-left mb-1"><a href="/home/kegiatan/<?= $keg_mendatang['kode_kegiatan'] ?>"><?= strlen($keg_mendatang['judul']) > 20 ? substr_replace($keg_mendatang['judul'], '...', 20) : $keg_mendatang['judul'] ?></a></h6>
                                        <small class="float-right mt-1"><?= date_format(date_create($keg_mendatang['kegiatan_dimulai']), 'd F Y') ?></small>
                                        <div class="d-inline-block w-100">
                                            <p><span class="badge badge-primary">Menunggu</span> <?= $keg_mendatang['mentor'] ?> </p>
                                        </div>
                                    </li>
                                </ul>
                            <?php endforeach ?>
                        <?php else : ?>
                            <img src="/assets/banner-logo/no-data.png" class="img mx-auto d-block" width="300" alt="#">
                            <p class="text-center">Tidak Ada Kegiatan</p>
                        <?php endif ?>
                    </div>
                    <div class="card-footer bg-white border-0 mt-auto">
                        <?= $pagers->links('kegiatan_mendatang', 'kegiatan_pagination') ?>
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