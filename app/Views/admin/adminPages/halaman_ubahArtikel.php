<?= $this->extend('admin/adminLayout/template_ubahArtikel') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buat Artikel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Buat Artikel</li>
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
                            <h3 class="card-title">Buat Artikel Anda</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="/admin/simpan_ubah_artikel/<?= $artikel['id'] ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-map"></i></span>
                                        </div>
                                        <select class="custom-select <?= $validasi->hasError('kategori') ? 'is-invalid' : '' ?>" name="kategori">
                                            <option disabled value="">Pilih Kategori...</option>
                                            <?php foreach ($kategori as $kat) : ?>
                                                <option <?= $kat['kategori'] == $artikel['kategori'] ? 'selected' : ''  ?>><?= old('kategori') ? old('kategori') : $kat['kategori'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('kategori') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-newspaper"></i></span>
                                        </div>
                                        <input type="text" class="form-control <?= $validasi->hasError('judul') ? 'is-invalid' : '' ?>" name="judul" value="<?= old('judul') ? old('judul') : $artikel['judul'] ?>" placeholder="Judul Artikel">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('judul') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-camera-retro"></i></span>
                                        </div>
                                        <input type="file" class="form-control <?= $validasi->hasError('photo') ? 'is-invalid' : '' ?>" name="photo">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('photo') ?>
                                        </div>
                                    </div>
                                    <img src="/assets/img-artikel/<?= $artikel['photo'] ?>" width="200" class="img img-thumbnail mt-2" alt="">
                                </div>
                                <div class="form-group">
                                    <textarea id="isi-artikel" name="isi" class="form-control <?= $validasi->hasError('isi') ? 'is-invalid' : '' ?>" style="height: 300px"><?= old('isi') ? old('isi') : $artikel['isi'] ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validasi->getError('isi') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="float-right">
                                    <button type="button" class="btn btn-default"><i class="fas fa-swatchbook"></i> Simpan Ke Draft</button>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Publikasikan</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Reset</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
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


<?= $this->endSection(); ?>