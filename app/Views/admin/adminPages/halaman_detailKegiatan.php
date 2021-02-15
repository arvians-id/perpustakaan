<?= $this->extend('admin/adminLayout/template_biasa') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Kegiatan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img src="/assets/img-kegiatan/<?= $kegiatan['photo'] ?>" class="product-image img-thumbnail" alt="<?= $kegiatan['photo'] == null ? 'Tidak Ada Foto' : $kegiatan['photo'] ?>">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"><?= $kegiatan['judul'] ?></h3>
                        <p class="text-secondary">Pementor : <?= $kegiatan['mentor'] ?> <br> No Hp : <?= $kegiatan['no_hp_pementor'] ?> <br> Tempat : <?= $kegiatan['tempat'] ?></p>

                        <hr>
                        <h4>Status Kegiatan</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <?php if ($kegiatan['status'] == 0) : ?>
                                <label class="btn btn-default text-center active">
                                    <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                                    Aktif
                                    <br>
                                    <i class="fas fa-circle fa-2x text-green"></i>
                                </label>
                            <?php else : ?>
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                                    Selesai
                                    <br>
                                    <i class="fas fa-circle fa-2x text-red"></i>
                                </label>
                            <?php endif ?>
                        </div>

                        <h4 class="mt-3">Kuota Peserta</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                <span class="text-xl"><?= $kegiatan['kuota'] != null ? $kegiatan['kuota'] . ' Orang' : 'Tidak Ada Batasan' ?></span>
                                <br>
                            </label>
                        </div>

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                Harga Mengikuti Kegiatan
                            </h2>
                            <h4 class="mt-0">
                                <small><?= $kegiatan['biaya'] != null ? 'Rp ' . number_format($kegiatan['biaya'], 2, '.', ',') : 'Gratis' ?> </small>
                            </h4>
                        </div>

                        <div class="mt-4">
                            <div class="btn btn-primary btn-lg btn-flat">
                                Dimulai: <?= date_format(date_create($kegiatan['kegiatan_dimulai']), 'l, d F Y') ?>
                            </div>

                            <div class="btn btn-default btn-lg btn-flat">
                                Selesai: <?= date_format(date_create($kegiatan['kegiatan_selesai']), 'l, d F Y')  ?>
                            </div>
                        </div>

                        <div class="mt-4 product-share">
                            <a href="#" class="text-gray">
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fab fa-twitter-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-envelope-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-rss-square fa-2x"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="kegiatan-tab" role="tablist">
                            <a class="nav-item nav-link active" id="desk-kegiatan" data-toggle="tab" href="#kegiatan" role="tab" aria-controls="kegiatan" aria-selected="true">Deksripsi Kegiatan</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="kegiatan" role="tabpanel" aria-labelledby="desk-kegiatan"><?= $kegiatan['isi'] ?> </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection() ?>