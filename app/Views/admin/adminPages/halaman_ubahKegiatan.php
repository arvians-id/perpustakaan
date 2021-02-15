<?= $this->extend('admin/adminLayout/template_ubahKegiatan') ?>

<?= $this->section('konten') ?>
<?= date_default_timezone_set('Asia/Jakarta'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buat Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Buat Kegiatan</li>
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
                            <h3 class="card-title">Kegiatan Acara Di Macatongsir</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/simpan_ubah_kegiatan/<?= $kegiatan['id'] ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Kegiatan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-skating"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $kegiatan['kode_kegiatan'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Judul Kegiatan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-skating"></i></span>
                                        </div>
                                        <input name="judul" type="text" class="form-control <?= $validasi->hasError('judul') ? 'is-invalid' : '' ?>" value="<?= old('judul') ? old('judul') : $kegiatan['judul'] ?>" placeholder="cth: Kamping di sungai">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('judul') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pementor Kegiatan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="far fa-id-card"></i></span>
                                        </div>
                                        <input name="mentor" type="text" class="form-control <?= $validasi->hasError('judul') ? 'is-invalid' : '' ?>" value="<?= old('mentor') ? old('mentor') : $kegiatan['mentor'] ?>" placeholder="cth: Widdy Arfi">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('mentor') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kuota Kegiatan (optional)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-users"></i></span>
                                        </div>
                                        <input name="kuota" type="text" class="form-control <?= $validasi->hasError('kuota') ? 'is-invalid' : '' ?>" value="<?= old('kuota') ? old('kuota') : $kegiatan['kuota'] ?>" placeholder="cth: 30">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('kuota') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Biaya Administrasi (optional)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-money-bill-wave"></i></span>
                                        </div>
                                        <input name="biaya" type="text" class="form-control <?= $validasi->hasError('biaya') ? 'is-invalid' : '' ?>" value="<?= old('biaya') ? old('biaya') : $kegiatan['biaya'] ?>" placeholder="cth: 25000">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('biaya') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Kegiatan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input name="tempat" type="text" class="form-control <?= $validasi->hasError('tempat') ? 'is-invalid' : '' ?>" value="<?= old('tempat') ? old('tempat') : $kegiatan['tempat'] ?>" placeholder="cth: Jalan Sukaraja No xx">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('tempat') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>No Hp Pementor</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white">+62</span>
                                        </div>
                                        <input name="no_hp_pementor" type="text" class="form-control <?= $validasi->hasError('no_hp_pementor') ? 'is-invalid' : '' ?>" value="<?= old('no_hp_pementor') ? old('no_hp_pementor') : $kegiatan['no_hp_pementor'] ?>" placeholder="cth: 823 xxx xxxx">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('no_hp_pementor') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kegiatan Dimulai</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="far fa-calendar-plus"></i></span>
                                        </div>
                                        <input name="kegiatan_dimulai" type="date" class="form-control <?= $validasi->hasError('kegiatan_dimulai') ? 'is-invalid' : '' ?>" value="<?= old('kegiatan_dimulai') ? old('kegiatan_dimulai') : $kegiatan['kegiatan_dimulai'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('kegiatan_dimulai') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kegiatan Selesai</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="far fa-calendar-minus"></i></span>
                                        </div>
                                        <input name="kegiatan_selesai" type="date" class="form-control <?= $validasi->hasError('kegiatan_selesai') ? 'is-invalid' : '' ?>" value="<?= old('kegiatan_selesai') ? old('kegiatan_selesai') : $kegiatan['kegiatan_selesai'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('kegiatan_selesai') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Isi Kegiatan</label>
                                    <textarea id="isi-kegiatan" name="isi" class="form-control <?= $validasi->hasError('isi') ? 'is-invalid' : '' ?>" cols="30" rows="10"><?= old('isi') ? old('isi') : $kegiatan['isi'] ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validasi->getError('isi') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Photo Kegiatan (optional)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-camera-retro"></i></span>
                                        </div>
                                        <input type="file" class="form-control <?= $validasi->hasError('photo') ? 'is-invalid' : '' ?>" name="photo">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('photo') ?>
                                        </div>
                                    </div>
                                    <img src="/assets/img-kegiatan/<?= $kegiatan['photo'] ?>" width="200" class="img img-thumbnail mt-2" alt="<?= $kegiatan['photo'] == null ? 'Tidak Ada Foto' : $kegiatan['photo'] ?>">
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