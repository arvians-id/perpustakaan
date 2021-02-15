<?= $this->extend('admin/adminLayout/templateDaftarDataTables') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Admin</li>
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
                            <h3 class="card-title">Daftar Semua Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Photo</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Status Aktif</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No Handphone</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($admin as $ambilAdmin) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><img src="/assets/img-pengguna/<?= $ambilAdmin['photo'] ?>" width="50" class="img img-thumbnail"></td>
                                            <td><?= $ambilAdmin['nama_lengkap'] ?></td>
                                            <td><?= $ambilAdmin['email'] ?></td>
                                            <td><?= $ambilAdmin['aktif_keterangan'] ?></td>
                                            <td><?= ($ambilAdmin['tanggal_lahir'] != 0000 - 00 - 00) ? $ambilAdmin['tanggal_lahir'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($ambilAdmin['no_hp'] != null) ? $ambilAdmin['no_hp'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($ambilAdmin['jenis_kelamin'] != null) ? $ambilAdmin['jenis_kelamin'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($ambilAdmin['status'] != null) ? $ambilAdmin['status'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
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
<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
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
</script>
<?= $this->endSection() ?>