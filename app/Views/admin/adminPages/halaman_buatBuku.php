<?= $this->extend('admin/adminLayout/template_buatBuku') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
                <div class="col-sm-6">
                    <h1>Buat Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Buat Buku</li>
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
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#tambahKategori">Buat Kategori Baru</button>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/simpan_buku" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Buku</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-skating"></i></span>
                                        </div>
                                        <input name="kode_buku" type="text" class="form-control" value="KBMT<?= sprintf("%04s", $kode_buku) ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-skating"></i></span>
                                        </div>
                                        <input name="judul" type="text" class="form-control <?= $validasi->hasError('judul') ? 'is-invalid' : '' ?>" value="<?= old('judul') ?>" placeholder="cth: Tips Buat Kamu Yang Sering Kamping Di Dalam Laut">
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
                                        <input name="isbn_issn" type="text" class="form-control <?= $validasi->hasError('isbn_issn') ? 'is-invalid' : '' ?>" value="<?= old('isbn_issn') ?>" placeholder="cth: 978-623-7372-04-2">
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
                                        <input name="bahasa" type="text" class="form-control <?= $validasi->hasError('bahasa') ? 'is-invalid' : '' ?>" value="<?= old('bahasa') ?>" placeholder="cth: Indonesia">
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
                                        <input name="author" type="text" class="form-control <?= $validasi->hasError('author') ? 'is-invalid' : '' ?>" value="<?= old('author') ?>" placeholder="cth: Udin Markudin">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('author') ?>
                                        </div>
                                    </div>
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
                                                <option value="<?= $kat['kategori'] ?>"><?= $kat['kategori'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('kategori') ?>
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
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Buku</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-align-left"></i></span>
                                        </div>
                                        <textarea name="deskripsi" type="text" class="form-control <?= $validasi->hasError('deskripsi') ? 'is-invalid' : '' ?>"><?= old('deskripsi') ?></textarea>
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


<!-- Modal Tambah Kategori -->
<div class="modal fade" id="tambahKategori" tabindex="-1" aria-labelledby="tambahKategoriLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKategoriLabel">Buat Kategori Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/buat_kategori_buku" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label class="col-form-label">Kategori Baru</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white"><i class="fas fa-map"></i></span>
                            </div>
                            <input type="text" name="kategori_baru" class="form-control" placeholder="cth: Novel" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat Kategori</button>
                </form>
                <hr>
                <h4>Semua Kategori</h4>
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($kategori_buku as $kategori) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $kategori['kategori'] ?></td>
                                <td>
                                    <form action="/admin/hapus_kategori_buku/<?= $kategori['id'] ?>" method="post" id="form-hapus">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger rounded-0" id="btn-hapus"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Sweet Alerts -->
<script src="/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>

<script>
    const flash = document.querySelector('.flashdata').dataset.flashdata;

    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: flash
        })
    }
</script>
<?= $this->endSection() ?>