<?= $this->extend('admin/adminLayout/templateDaftarDataTables') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
                <div class="col-sm-6">
                    <h1>Dalam Proses Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengajuan Proses Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-primary" role="alert">
                                DAFTAR MEMBER YANG SEDANG DALAM PEMINJAMAN
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dalam-peminjaman" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Photo</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No Handphone</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($member_meminjam as $meminjam) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><img src="/assets/img-pengguna/<?= $meminjam['photo'] ?>" width="50" class="img img-thumbnail"></td>
                                            <td><?= $meminjam['nama_lengkap'] ?></td>
                                            <td><?= $meminjam['email'] ?></td>
                                            <td><?= ($meminjam['tanggal_lahir'] != 0000 - 00 - 00) ? $meminjam['tanggal_lahir'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($meminjam['no_hp'] != null) ? $meminjam['no_hp'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($meminjam['jenis_kelamin'] != null) ? $meminjam['jenis_kelamin'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($meminjam['status'] != null) ? $meminjam['status'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td style="text-align:center"><a href="/admin/detail_dalam_proses_peminjaman/<?= $meminjam['id_pengguna'] ?>" class="btn btn-danger"><i class="fas fa-eye"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-danger" role="alert">
                                DAFTAR MEMBER YANG TELAT MENGEMBALIKAN
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="telat-mengembalikan" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Photo</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No Handphone</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($member_telat as $telat) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><img src="/assets/img-pengguna/<?= $telat['photo'] ?>" width="50" class="img img-thumbnail"></td>
                                            <td><?= $telat['nama_lengkap'] ?></td>
                                            <td><?= $telat['email'] ?></td>
                                            <td><?= ($telat['tanggal_lahir'] != 0000 - 00 - 00) ? $telat['tanggal_lahir'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($telat['no_hp'] != null) ? $telat['no_hp'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($telat['jenis_kelamin'] != null) ? $telat['jenis_kelamin'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($telat['status'] != null) ? $telat['status'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td style="text-align:center"><a href="/admin/detail_dalam_proses_peminjaman/<?= $telat['id_pengguna'] ?>" class="btn btn-danger"><i class="fas fa-eye"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-info" role="alert">
                                DAFTAR MEMBER YANG SEDANG MENUNGGU PEMINJAMAN DIMULAI
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="sedang-menunggu" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Photo</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No Handphone</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($member_menunggu as $menunggu) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><img src="/assets/img-pengguna/<?= $menunggu['photo'] ?>" width="50" class="img img-thumbnail"></td>
                                            <td><?= $menunggu['nama_lengkap'] ?></td>
                                            <td><?= $menunggu['email'] ?></td>
                                            <td><?= ($menunggu['tanggal_lahir'] != 0000 - 00 - 00) ? $menunggu['tanggal_lahir'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($menunggu['no_hp'] != null) ? $menunggu['no_hp'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($menunggu['jenis_kelamin'] != null) ? $menunggu['jenis_kelamin'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($menunggu['status'] != null) ? $menunggu['status'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td style="text-align:center"><a href="/admin/detail_dalam_proses_peminjaman/<?= $menunggu['id_pengguna'] ?>" class="btn btn-danger"><i class="fas fa-eye"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-success" role="alert">
                                DAFTAR MEMBER YANG INGIN MENGAJUKAN PEMINJAMAN
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="pengajuan-peminjaman" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Photo</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No Handphone</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($member_pengajuan as $pengajuan) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><img src="/assets/img-pengguna/<?= $pengajuan['photo'] ?>" width="50" class="img img-thumbnail"></td>
                                            <td><?= $pengajuan['nama_lengkap'] ?></td>
                                            <td><?= $pengajuan['email'] ?></td>
                                            <td><?= ($pengajuan['tanggal_lahir'] != 0000 - 00 - 00) ? $pengajuan['tanggal_lahir'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($pengajuan['no_hp'] != null) ? $pengajuan['no_hp'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($pengajuan['jenis_kelamin'] != null) ? $pengajuan['jenis_kelamin'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($pengajuan['status'] != null) ? $pengajuan['status'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td style="text-align:center"><a href="/admin/detail_ketersediaan/<?= $pengajuan['id_pengguna'] ?>" class="btn btn-danger"><i class="fas fa-eye"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- <div class="lihat-data" style="display:none"></div> -->
<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Sweet Alerts -->
<script src="/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>

<script>
    const flash = document.querySelector('.flashdata').dataset.flashdata;

    $(function() {
        $("#dalam-peminjaman").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#telat-mengembalikan").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#pengajuan-peminjaman").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#sedang-menunggu").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: flash
        })
    }
</script>
<?= $this->endSection() ?>