<?= $this->extend('admin/adminLayout/template_biasa') ?>

<?= $this->section('konten') ?>
<?= date_default_timezone_set('Asia/Jakarta') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Artikel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Artikel</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Detail Artikel</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0 mt-3">
                            <img src="/assets/img-artikel/<?= $artikel['photo'] ?>" class="img img-thumbnail mx-auto d-block" width="700" alt="">
                            <!-- /.mailbox-controls -->
                            <div class="mailbox-read-message p-5">
                                <h1><strong><?= $artikel['judul'] ?></strong></h1>
                                <i class="fas fa-user"></i> <strong>Macatongsir,</strong> <?= date_format(date_create($artikel['created_at']), 'l, d F Y') ?> - <i class="fas fa-clipboard-list"></i> <?= $artikel['kategori'] ?>
                                <hr>
                                <?= $artikel['isi'] ?>
                            </div>
                            <!-- /.mailbox-read-message -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>