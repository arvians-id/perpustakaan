<?= $this->extend('admin/adminLayout/template_buatArtikel') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
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
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahKategori">Buat Kategori Baru</button>
                        </div>
                        <!-- /.card-header -->
                        <form action="/admin/simpan_artikel" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-map"></i></span>
                                        </div>
                                        <select class="custom-select <?= $validasi->hasError('kategori') ? 'is-invalid' : '' ?>" name="kategori">
                                            <option selected disabled value="">Pilih Kategori...</option>
                                            <?php foreach ($kategori as $kat) : ?>
                                                <option value="<?= $kat['kategori'] ?>"><?= $kat['kategori'] ?></option>
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
                                        <input type="text" class="form-control <?= $validasi->hasError('judul') ? 'is-invalid' : '' ?>" name="judul" value="<?= old('judul') ?>" placeholder="Judul Artikel">
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
                                </div>
                                <div class="form-group">
                                    <textarea id="isi-artikel" name="isi" class="form-control <?= $validasi->hasError('isi') ? 'is-invalid' : '' ?>" style="height: 300px"><?= old('isi') ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validasi->getError('isi') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="float-right">
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
                <form action="/admin/buat_kategori" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label class="col-form-label">Kategori Baru</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white"><i class="fas fa-map"></i></span>
                            </div>
                            <input type="text" name="kategori_baru" class="form-control" placeholder="cth: Politik">
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
                        foreach ($kategori as $kat) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $kat['kategori'] ?></td>
                                <td>
                                    <form action="/admin/hapus_kategori/<?= $kat['id'] ?>" method="post" id="form-hapus">
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
    $(document).ready(function() {
        $('#isi-artikel').summernote({
            height: "600px",
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });

        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: '/admin/upload_image_artikel',
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(url) {
                    $('#isi-artikel').summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {
                    src: src
                },
                type: "POST",
                url: '/admin/delete_image_artikel',
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }
    })
</script>
<?= $this->endSection(); ?>