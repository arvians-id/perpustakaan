<?= $this->extend('admin/adminLayout/template_ubahBuku') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Ubah Buku</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ubah Buku Khusus Macatongsir</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/simpan_ubah_bukuMacatongsir/<?= $buku_macatongsir['kode_buku'] ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Buku</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-skating"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $buku_macatongsir['kode_buku'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-skating"></i></span>
                                        </div>
                                        <input name="judul" type="text" class="form-control <?= $validasi->hasError('judul') ? 'is-invalid' : '' ?>" value="<?= old('judul') ? old('judul') : $buku_macatongsir['judul'] ?>" placeholder="cth: Tips Buat Kamu Yang Sering Kamping Di Dalam Laut">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('judul') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>ISSN/ISBN</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-sort-numeric-down"></i></span>
                                        </div>
                                        <input name="isbn_issn" type="text" class="form-control <?= $validasi->hasError('isbn_issn') ? 'is-invalid' : '' ?>" value="<?= old('isbn_issn') ? old('isbn_issn') : $buku_macatongsir['isbn_issn'] ?>" placeholder="cth: 978-623-7372-04-2">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('isbn_issn') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Bahasa</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-globe-europe"></i></span>
                                        </div>
                                        <input name="bahasa" type="text" class="form-control <?= $validasi->hasError('bahasa') ? 'is-invalid' : '' ?>" value="<?= old('bahasa') ? old('bahasa') : $buku_macatongsir['bahasa'] ?>" placeholder="cth: Indonesia">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('bahasa') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Author</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-user-secret"></i></span>
                                        </div>
                                        <input name="author" type="text" class="form-control <?= $validasi->hasError('author') ? 'is-invalid' : '' ?>" value="<?= old('author') ? old('author') : $buku_macatongsir['author'] ?>" placeholder="cth: Udin Markudin">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('author') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Photo Buku</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-camera-retro"></i></span>
                                        </div>
                                        <input name="photo" type="file" class="form-control <?= $validasi->hasError('photo') ? 'is-invalid' : '' ?>">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('photo') ?>
                                        </div>
                                    </div>
                                    <img src="/assets/img-buku/<?= $buku_macatongsir['photo'] ?>" class="img-thumbnail mt-3" width="100">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-tag"></i></span>
                                        </div>
                                        <select class="custom-select <?= $validasi->hasError('kategori') ? 'is-invalid' : '' ?>" name="kategori" id="validationCustom04">
                                            <option selected disabled value="">Pilih Kategori</option>
                                            <?php foreach ($kategori_buku as $kat) : ?>
                                                <option <?= $kat['kategori'] == $buku_macatongsir['kategori'] ? 'selected' : ''  ?>><?= old('kategori') ? old('kategori') : $kat['kategori'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('kategori') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Buku</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-align-left"></i></span>
                                        </div>
                                        <textarea name="deskripsi" type="text" class="form-control <?= $validasi->hasError('deskripsi') ? 'is-invalid' : '' ?>"><?= old('deskripsi') ? old('deskripsi') : $buku_macatongsir['deskripsi'] ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('deskripsi') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>