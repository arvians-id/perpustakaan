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
                            <img src="/assets/img-buku/<?= $buku_macatongsir['photo'] ?>" class="product-image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"><?= $buku_macatongsir['judul'] ?></h3>
                        <p><?= $buku_macatongsir['deskripsi'] ?></p>

                        <hr>

                        <table class="table table-bordered">
                            <tr>
                                <th>KODE BUKU</th>
                                <td><?= $buku_macatongsir['kode_buku'] ?></td>
                            </tr>
                            <tr>
                                <th>AUTHOR</th>
                                <td><?= $buku_macatongsir['author'] ?></td>
                            </tr>
                            <tr>
                                <th>ISSN-ISBN</th>
                                <td><?= $buku_macatongsir['isbn_issn'] ?></td>
                            </tr>
                            <tr>
                                <th>BAHASA</th>
                                <td><?= $buku_macatongsir['bahasa'] ?></td>
                            </tr>
                            <tr>
                                <th>STATUS</th>
                                <td><?= $buku_macatongsir['status'] ?></td>
                            </tr>
                        </table>

                        <div class="mt-4">
                            <div class="btn btn-primary btn-lg btn-flat">
                                <i class="fa fa-pen fa-lg mr-2"></i>
                                Input Pada : <?= $buku_macatongsir['created_at'] ?>
                            </div>

                            <div class="btn btn-default btn-lg btn-flat">
                                <i class="fa fa-edit fa-lg mr-2"></i>
                                Terakhir Diubah : <?= $buku_macatongsir['updated_at'] ?>
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