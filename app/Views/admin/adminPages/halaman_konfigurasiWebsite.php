<?= $this->extend('admin/adminLayout/template_biasa') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Konfigurasi Website</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Konfigurasi Website</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Menu Website Macatongsir</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="/admin/konfigurasi_website" class="nav-link <?= service('uri')->getSegment(3) == '' ? 'active rounded-0' : '' ?>">
                                    <i class="fas fa-icons"></i> Ubah Media
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/konfigurasi_website/peminjaman_buku" class="nav-link <?= service('uri')->getSegment(3) == 'peminjaman_buku' ? 'active rounded-0' : '' ?>">
                                    <i class="fas fa-swatchbook"></i> Ubah Status Peminjaman Buku
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/konfigurasi_website/profil_macatongsir" class="nav-link <?= service('uri')->getSegment(3) == 'profil_macatongsir' ? 'active rounded-0' : '' ?>">
                                    <i class="fas fa-id-card"></i> Ubah Profil Macatongsir
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-9">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Ubah Photo Macatongsir</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <!-- Custom Tabs -->
                                <div class="card">
                                    <div class="card-header d-flex p-0">
                                        <h3 class="card-title p-3">Media Macatongsir</h3>
                                        <ul class="nav nav-pills ml-auto p-2">
                                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Carousel Halaman Utama</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Header Photo Halaman Kegiatan</a></li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1">
                                                <div class="callout callout-warning">
                                                    <h5>Carousel Halaman Utama (Dalam Perbaikan)</h5>
                                                    <p>Ini form khusus carousel di halaman utama</p>
                                                </div>
                                                <h5>Carousel Pertama</h5>
                                                <form action="" method="post">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Judul (optional)</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Deskripsi (optional)</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Photo Carousel</label>
                                                                <input type="file" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h5>Carousel Kedua</h5>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Judul (optional)</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Deskripsi (optional)</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Photo Carousel</label>
                                                                <input type="file" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h5>Carousel Ketiga</h5>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Judul (optional)</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Deskripsi (optional)</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Photo Carousel</label>
                                                                <input type="file" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                                </form>
                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="tab_2">
                                                <div class="callout callout-info">
                                                    <h5>Photo Header Halaman Kegiatan (Dalam Perbaikan)</h5>
                                                    <p>Ini form khusus header photo di halaman Kegiatan</p>
                                                </div>
                                                <form action="" method="post">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Judul (optional)</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Deskripsi (optional)</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Photo</label>
                                                                <input type="file" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                                </form>
                                            </div>
                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- ./card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection() ?>