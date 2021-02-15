<?= $this->extend('admin/adminLayout/template_biasa') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Buku</li>
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
                            <img src="http://opac-perpustakaan.ummi.ac.id/images/docs/<?= $apiDetailBuku->image ?>" class="product-image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"><?= $apiDetailBuku->title ?></h3>
                        <p><?= $apiDetailBuku->notes ?></p>

                        <hr>

                        <table class="table table-bordered">
                            <tr>
                                <th>AUTHOR</th>
                                <td><?= $apiDetailBuku->author_name ?></td>
                            </tr>
                            <tr>
                                <th>ISSN-ISBN</th>
                                <td><?= $apiDetailBuku->isbn_issn ?></td>
                            </tr>
                            <tr>
                                <th>EDISI</th>
                                <td><?= $apiDetailBuku->edition ?></td>
                            </tr>
                            <tr>
                                <th>DIPUBLIKASIKAN</th>
                                <td><?= $apiDetailBuku->publish_year ?></td>
                            </tr>
                            <tr>
                                <th>KOLASI</th>
                                <td><?= $apiDetailBuku->collation ?></td>
                            </tr>
                            <tr>
                                <th>JUDUL SERIES</th>
                                <td><?= $apiDetailBuku->series_title ?></td>
                            </tr>
                            <tr>
                                <th>NO HANDHPHONE</th>
                                <td><?= $apiDetailBuku->call_number ?></td>
                            </tr>
                            <tr>
                                <th>BAHASA</th>
                                <td><?= $apiDetailBuku->language_name ?></td>
                            </tr>
                            <tr>
                                <th>KLASIFIKASI</th>
                                <td><?= $apiDetailBuku->classification ?></td>
                            </tr>
                            <tr>
                                <th>GRAMEDIA</th>
                                <td><?= $apiDetailBuku->gmd_name ?></td>
                            </tr>
                            <tr>
                                <th>NAMA & PUBLIKASI</th>
                                <td><?= $apiDetailBuku->publisher_name ?> : <?= $apiDetailBuku->place_name ?></td>
                            </tr>
                            <tr>
                                <th>SUBJEK</th>
                                <td><?= $apiDetailBuku->topic ?></td>
                            </tr>
                        </table>

                        <div class="mt-4">
                            <div class="btn btn-primary btn-lg btn-flat">
                                <i class="fa fa-pen fa-lg mr-2"></i>
                                Input Pada : <?= $apiDetailBuku->input_date ?>
                            </div>

                            <div class="btn btn-default btn-lg btn-flat">
                                <i class="fa fa-edit fa-lg mr-2"></i>
                                Terakhir Diubah : <?= $apiDetailBuku->last_update ?>
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
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection() ?>