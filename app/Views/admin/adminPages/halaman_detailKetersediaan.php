<?= $this->extend('admin/adminLayout/template_biasa') ?>

<?= $this->section('konten') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
                <div class="flashdata-danger" data-flashdata="<?= session()->getFlashdata('danger') ?>"></div>
                <div class="col-sm-6">
                    <h1>Pengecekan Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengecekan Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Catatan:</h5>
                        Hubungi terlebih dahulu kepegawaian perpustakaan Universitas Muhammadiyah
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-book"></i> <?= $member_pengajuan['nama_lengkap'] ?>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Photo</th>
                                            <th>Judul</th>
                                            <th>ISBN ISSN</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($buku as $ambilBuku) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><img src="<?= strlen($ambilBuku['image']) > 34 ? '/assets/img-buku/' : 'http://opac-perpustakaan.ummi.ac.id/images/docs/' ?><?= $ambilBuku['image'] ?>" width="100"></td>
                                                <td><?= $ambilBuku['judul'] ?></td>
                                                <td><?= $ambilBuku['isbn_issn'] ?></td>
                                                <td><?= $ambilBuku['author'] ?></td>
                                                <td><?= ($ambilBuku['status']) == 0 ? '<span class="badge badge-primary w-100">Belum Diperiksa</span>' : (($ambilBuku['status']) == 1 ? '<span class="badge badge-warning w-100">Tersedia</span>' : '<span class="badge badge-danger w-100">Tidak Tersedia</span>'); ?></td>
                                                <td>
                                                    <div class="btn-group dropleft">
                                                        <button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="/admin/simpan_tersedia/<?= $ambilBuku['buku_id'] . '/' . $ambilBuku['user_id'] . '/' . $ambilBuku['id'] ?>">Set Buku Tidak Tersedia</a>
                                                            <a class="dropdown-item" href="/admin/simpan_tidak_tersedia/<?= $ambilBuku['buku_id'] . '/' . $ambilBuku['user_id'] . '/' . $ambilBuku['id'] ?>">Set Buku Tersedia</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <button class="btn btn-success btn-block mb-2" onclick="prosesPeminjaman('<?= $member_pengajuan['user_id'] ?>')"> Proses Peminjaman</button>
                                <form action="/admin/simpan_ajukan_ulang/<?= $member_pengajuan['user_id'] ?>" method="post" id="form-selesai">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-danger btn-selesai btn-block">Ajukan Ulang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="proses-peminjaman" style="display:none"></div>

<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Sweet Alerts -->
<script src="/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>

<script>
    $('.btn-selesai').click(function(event) {
        event.preventDefault();
        const href = $(this.form).attr('action');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Pemeriksaan ketersediaan buku tidak bisa diulangi",
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

    const flash = document.querySelector('.flashdata').dataset.flashdata;
    const flashDanger = document.querySelector('.flashdata-danger').dataset.flashdata;

    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: flash
        })
    } else if (flashDanger) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: flashDanger
        })
    }

    function prosesPeminjaman(id) {
        $.ajax({
            url: '/admin/modal_proses_peminjaman',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if (response.sukses) {
                    $('.proses-peminjaman').html(response.sukses).show();
                    $('#proses-peminjaman').modal('show');
                    $('#nama-peminjam').html(response.peminjam.nama_lengkap);
                    bukuTersedia = '';
                    if (response.buku_dipinjam_tersedia == '') {
                        bukuTersedia += `<p>Tidak Ada</p>`;
                    } else {
                        response.buku_dipinjam_tersedia.forEach((val, i) => {
                            bukuTersedia += `<p>${(i+1)}. ${val.judul}</p>`;
                        })
                    }
                    $('#judul-tersedia').html(bukuTersedia);

                    bukuTdkTersedia = '';
                    if (response.buku_dipinjam_tdk_tersedia == '') {
                        bukuTdkTersedia = '<p>Tidak Ada</p>';
                    } else {
                        response.buku_dipinjam_tdk_tersedia.forEach((val, i) => {
                            bukuTdkTersedia += `<p>${(i+1)}. ${val.judul}</p>`;
                        })
                    }
                    $('#judul-tidak-tersedia').html(bukuTdkTersedia);
                }
            },
            error: function(err) {
                console.log(err);
            }
        })
    }
</script>
<?= $this->endSection() ?>