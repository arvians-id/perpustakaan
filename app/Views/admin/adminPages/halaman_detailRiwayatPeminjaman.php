<?= $this->extend('admin/adminLayout/template_detailRiwayatPeminjaman') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Riwayat Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Riwayat Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-user"></i> <?= $member['nama_lengkap'] ?>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table id="example1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Photo Buku</th>
                                            <th>Kode Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Dikembalikan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($riwayat_peminjaman as $riwayat) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><img src="<?= strlen($riwayat['image']) > 34 ? '/assets/img-buku/' : 'http://opac-perpustakaan.ummi.ac.id/images/docs/' ?><?= $riwayat['image'] ?>" width="50"></td>
                                                <td><?= $riwayat['buku_id'] ?></td>
                                                <td><?= $riwayat['judul'] ?></td>
                                                <td><?= date_format(date_create($riwayat['tanggal_dikembalikan']), 'l, d F Y h:i')  ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <p class="lead">Detail Riwayat Peminjaman</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Total Peminjaman Bulan Ini</th>
                                            <td><?= $r_bulan_ini ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total Peminjaman Tahun Ini</th>
                                            <td><?= $r_tahun_ini ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total Semua Peminjaman:</th>
                                            <td><?= $r_total ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>