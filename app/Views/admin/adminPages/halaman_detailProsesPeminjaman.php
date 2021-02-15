<?= $this->extend('admin/adminLayout/template_biasa') ?>

<?= $this->section('konten') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
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
                                    <i class="fas fa-book"></i> <?= $member['nama_lengkap'] ?>
                                    <small class="float-right">Hari Ini: <?= date("D Y-m-d") ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-6 invoice-col">
                                <strong>Data Admin</strong>
                                <address>
                                    <?= $pengguna['nama_lengkap'] ?><br>
                                    Tanggal Lahir: <?= $pengguna['tanggal_lahir'] ?><br>
                                    Jenis Kelamin: <?= $pengguna['jenis_kelamin'] ?><br>
                                    Handphone: <?= $pengguna['no_hp'] ?><br>
                                    Email: <?= $pengguna['email'] ?>
                                </address>
                            </div>
                            <div class="col-sm-6 invoice-col">
                                <strong>Data Pengajuan Pengguna</strong>
                                <address>
                                    <?= $pengguna_pengajuan['nama_lengkap'] ?><br>
                                    Daerah: <?= $pengguna_pengajuan['provinsi'] . ', ' . $pengguna_pengajuan['kota'] . ', Kecamatan ' . $pengguna_pengajuan['kecamatan'] . ', Kelurahan ' . $pengguna_pengajuan['kelurahan'] ?><br>
                                    Alamat Lengkap: <?= $pengguna_pengajuan['alamat'] ?><br>
                                    Handphone: <?= $pengguna_pengajuan['no_hp'] ?><br>
                                    Email: <?= $pengguna_pengajuan['email'] ?>
                                </address>
                            </div>
                        </div>
                        <!-- /.row -->

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
                                                <td><?= $ambilBuku['status'] == 1 ? '<b class="badge badge-warning">Tersedia</b>' : '<b class="badge badge-danger">tidak tersedia</b>' ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-12">
                                <p class="lead">Peminjaman Buku</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Status</th>
                                            <?php if ($member['status_ketersediaan_buku'] == 0) : ?>
                                                <td class="bg-danger">Dibatalkan</td>
                                            <?php else : ?>
                                                <?php if ($member_menunggu) : ?>
                                                    <td class="bg-info">Menunggu</td>
                                                <?php elseif ($member_meminjam) : ?>
                                                    <td class="bg-success">Dalam Peminjaman</td>
                                                <?php elseif ($member_telat) : ?>
                                                    <td class="bg-secondary">Telat Mengembalikan</td>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </tr>
                                        <tr>
                                            <th style="width:50%">Tanggal Input</th>
                                            <td><?= date_format(date_create($data_pinjam['tanggal_input']), 'l, d F Y') ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Di Bawa Pengguna</th>
                                            <td><?= date_format(date_create($data_pinjam['tanggal_dibawa']), 'l, d F Y') ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Di Kembalikan</th>
                                            <td><?= date_format(date_create($data_pinjam['tanggal_dikembalikan']), 'l, d F Y')  ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <?php if ($member_menunggu) : ?>
                            <div class="row no-print">
                                <div class="col-12">
                                    <form action="/admin/batalkan_proses_peminjaman/<?= $member['id'] ?>" method="post" id="form-selesai">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-danger btn-batalkan btn-block">Batalkan Proses Peminjaman</button>
                                    </form>
                                </div>
                            </div>
                        <?php else : ?>
                            <?php if ($member['status_ketersediaan_buku'] != 0) : ?>
                                <div class="row no-print">
                                    <div class="col-12">
                                        <form action="/admin/peminjaman_selesai/<?= $member['id'] ?>" method="post" id="form-selesai">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-success btn-selesaikan btn-block">Selesaikan Peminjaman</button>
                                        </form>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Sweet Alerts -->
<script src="/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>

<script>
    $('.btn-batalkan').click(function(event) {
        event.preventDefault();
        const href = $(this.form).attr('action');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Pengajuan peminjaman benar-benar akan dibatalkan",
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

    $('.btn-selesaikan').click(function(event) {
        event.preventDefault();
        const href = $(this.form).attr('action');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Bahwa buku benar-benar sudah dikembalikan ke macatongsir",
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
<?= $this->endSection() ?>