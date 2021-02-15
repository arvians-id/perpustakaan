<?= $this->extend('admin/adminLayout/template_biasa') ?>

<?= $this->section('konten') ?>
<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Sweet Alerts -->
<script src="/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>
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
                        <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ubah Status Peminjaman</h3>
                    </div>
                    <?php if ($cekStatus) : ?>
                        <div class="callout callout-danger m-4">
                            <h5>Peminjaman Buku Sedang Tutup</h5>
                            <p>Anda sedang menutup peminjaman buku hingga <?= $cekStatus['tanggal_selesai'] == 0000 - 00 - 00 ? 'batas waktu yang tidak ditentukan' : date_format(date_create($cekStatus['tanggal_selesai']), 'l, d F Y') ?></p>
                            <p>Pesan : <?= $cekStatus['pesan'] == null ? 'Anda tidak memberi pesan' : $cekStatus['pesan'] ?></p>
                        </div>
                        <form action="/admin/buka_peminjaman" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-primary rounded-0 btn-buka btn-block"><i class="fas fa-door-open"></i> Buka Peminjaman Buku</button>
                        </form>
                        <script>
                            $('.btn-buka').click(function(event) {
                                event.preventDefault();
                                const href = $(this.form).attr('action');
                                Swal.fire({
                                    title: 'Apakah Anda Yakin?',
                                    text: "Ingin membuka peminjaman buku",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Selesai'
                                }).then((result) => {
                                    if (result.value) {
                                        document.location.href = href;
                                    }
                                })
                            })
                        </script>
                    <?php else : ?>
                        <!-- /.card-header -->
                        <form action="/admin/simpan_tutup_peminjaman" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tanggal Selesai (optional)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-calendar-day"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="tanggal_selesai" value="<?= old('tanggal_selesai') ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pesan (optional)</label>
                                    <textarea name="pesan" class="form-control" style="height: 150px" placeholder="Peminjaman buku ditutup dikarenakan..."><?= old('pesan') ?></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary btn-tutup"><i class="fas fa-door-closed"></i> Tutup Peminjaman</button>
                                </div>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                        <script>
                            var today = new Date().toISOString().split('T')[0];
                            document.getElementsByName("tanggal_selesai")[0].setAttribute('min', today);
                        </script>
                    <?php endif ?>
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