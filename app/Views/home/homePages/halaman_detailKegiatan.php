<?= $this->extend('home/homeLayout/template_noBodyClass') ?>

<?= $this->section('konten') ?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
            <div class="flashdata-danger" data-flashdata="<?= session()->getFlashdata('danger') ?>"></div>
            <div class="col-sm-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Detail Kegiatan</h4>
                    </div>
                    <div class="iq-card-body pb-0">
                        <div class="description-contens align-items-top row">
                            <div class="col-12 col-md-4">
                                <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body p-0">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <ul id="description-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <img src="/assets/img-kegiatan/<?= $kegiatan['photo'] ?>" class="img-fluid w-100 rounded" alt="">
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
                                        <h3 class="mb-3"><?= $kegiatan['judul'] ?></h3>
                                        <div class="price d-flex align-items-center font-weight-500 mb-2">
                                            <span class="font-size-24 text-dark"><i class="ri-price-tag-2-line"></i> <?= $kegiatan['biaya'] != null ? 'Rp ' . number_format($kegiatan['biaya'], 2, '.', ',') : 'Gratis'  ?> &nbsp;&nbsp; <i class="ri-home-smile-line"></i> <?= $kegiatan['kuota'] != null ? $kegiatan['kuota'] . ' Orang' : 'Tidak Terbatas'  ?></span>
                                        </div>
                                        <div class="mb-3 d-block">
                                            <span class="font-size-20 text-warning"><i class="ri-map-pin-line"></i> <?= $kegiatan['tempat'] ?></span>
                                        </div>
                                        <span class="text-dark mb-4 pb-4 iq-border-bottom d-block"><?= $kegiatan['isi'] ?></span>
                                        <div class="text-primary">Pementor: <span class="text-body"><?= $kegiatan['mentor'] ?></span></div>
                                        <div class="mb-3">
                                            <a href="/pengguna/simpan_bookmark" class="text-body text-center">Dimulai <?= date_format(date_create($kegiatan['kegiatan_dimulai']), 'd F') . ' - ' . date_format(date_create($kegiatan['kegiatan_selesai']), 'd F Y') ?> </span></a>
                                        </div>
                                        <div class="iq-social d-flex align-items-center">
                                            <?php if ($status == 'Ditutup') : ?>
                                                <button class="btn btn-danger"><?= $status; ?></button>
                                            <?php else : ?>
                                                <?php if (!session()->get('id')) : ?>
                                                    <a href="/masuk" class="btn btn-primary"><?= $status; ?></a>
                                                <?php else : ?>
                                                    <?php if (session()->get('role') == 1) : ?>
                                                    <?php else : ?>
                                                        <?php if ($cek_formulir) : ?>
                                                            <form action="/pengguna/batalkan_form_kegiatan/<?= $kegiatan['kode_kegiatan'] ?>" method="post">
                                                                <?= csrf_field() ?>
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger btn-batalkan">Batalkan</button>
                                                            </form>
                                                        <?php else : ?>
                                                            <button class="btn btn-primary" data-toggle="modal" data-target="#detail-kegiatan"><?= $status; ?></button>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Wrapper END -->
<!-- Modal Formulir Peserta Kegiatan Macatongsir -->
<div class="modal fade" id="detail-kegiatan" tabindex="-1" aria-labelledby="detail-kegiatanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detail-kegiatanLabel"><?= $kegiatan['kode_kegiatan'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Kode Kegiatan</label>
                    <input type="text" class="form-control" value="<?= $kegiatan['kode_kegiatan'] ?>" readonly>
                </div>
                <form action="/pengguna/simpan_form_kegiatan/<?= $kegiatan['kode_kegiatan'] ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Nama Peserta</label>
                        <input type="text" name="nama_peserta" class="form-control <?= $validasi->hasError('nama_peserta') ? 'is-invalid' : '' ?>" value="<?= old('nama_peserta') ? old('nama_peserta') : '' ?>" placeholder="Udin Markudin">
                        <div class="invalid-feedback">
                            <?= $validasi->getError('nama_peserta') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Email Peserta</label>
                        <input type="text" name="email_peserta" class="form-control <?= $validasi->hasError('email_peserta') ? 'is-invalid' : '' ?>" value="<?= old('email_peserta') ? old('email_peserta') : '' ?>" placeholder="udin@gmail.com">
                        <div class="invalid-feedback">
                            <?= $validasi->getError('email_peserta') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">No Handphone Peserta</label>
                        <input type="text" name="no_hp_peserta" class="form-control <?= $validasi->hasError('no_hp_peserta') ? 'is-invalid' : '' ?>" value="<?= old('no_hp_peserta') ? old('no_hp_peserta') : '' ?>" placeholder="08xx xxxx xxxx">
                        <div class="invalid-feedback">
                            <?= $validasi->getError('no_hp_peserta') ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>