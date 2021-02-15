<?= $this->extend('admin/adminLayout/templateDaftarDataTables') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Riwayat Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Riwayat Peminjaman</li>
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
                            <h3 class="card-title">Daftar Riwayat Semua Member Yang Sudah Melakukan Peminjaman</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($riwayat_peminjaman as $riwayat) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $riwayat['nama_lengkap'] ?></td>
                                            <td><?= $riwayat['email'] ?></td>
                                            <td style="text-align:center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button onclick="lihat_data('<?= $riwayat['id_pengguna'] ?>')" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                                    <a href="/admin/riwayat_peminjaman/<?= $riwayat['id_pengguna'] ?>" class="btn btn-warning"><i class="far fa-eye"></i></a>
                                                </div>
                                            </td>
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
<div class="lihat-data" style="display:none"></div>
<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Sweet Alerts -->
<script src="/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>

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

    function lihat_data(id) {
        $.ajax({
            url: '/admin/modal_lihatDataVerif',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if (response.sukses) {
                    $('.lihat-data').html(response.sukses).show();
                    $('#lihat-data').modal('show');
                    $('#nama-lengkap').html(response.pengajuan_1.nama_lengkap);
                    $('#email').html(response.pengajuan_1.email);
                    $('#no-hp').html(response.pengajuan_1.no_hp);
                    $('#alamat').html(response.pengajuan_1.provinsi + ' ' + response.pengajuan_1.kota + ', Kecamatan ' + response.pengajuan_1.kecamatan + ', Kelurahan ' + response.pengajuan_1.kelurahan + ', ' + response.pengajuan_1.alamat);
                    $('#status').html(response.pengajuan_1.status);
                    $('#pesan').html(response.pengajuan_1.pesan);
                    $('#photo-ktp-kartu-pelajar').attr('src', '/assets/img-pengajuan/' + response.pengajuan_1.photo_ktp_kartu_pelajar);
                }
            },
            error: function(err) {
                console.log(err);
            }
        })
    }
</script>
<?= $this->endSection() ?>