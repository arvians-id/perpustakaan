<?= $this->extend('admin/adminLayout/templateDaftarDataTables') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Member</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Member</li>
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
                            <h3 class="card-title">Daftar Semua Member</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="member-biasa" class="table table-striped">
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
                                    foreach ($member as $ambilMember) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><img src="/assets/img-pengguna/<?= $ambilMember['photo'] ?>" width="50" class="img img-thumbnail"></td>
                                            <td><?= $ambilMember['nama_lengkap'] ?></td>
                                            <td><?= $ambilMember['email'] ?></td>
                                            <td><?= ($ambilMember['tanggal_lahir'] != 0000 - 00 - 00) ? $ambilMember['tanggal_lahir'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($ambilMember['no_hp'] != null) ? $ambilMember['no_hp'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($ambilMember['jenis_kelamin'] != null) ? $ambilMember['jenis_kelamin'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($ambilMember['status'] != null) ? $ambilMember['status'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td style="text-align:center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <form action="/admin/hapus_penggunaMember/<?= $ambilMember['id_pengguna'] ?>" method="post">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger rounded-0 btn-hapus-member"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Member Yang Sudah Memverifikasi Akun</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="member-verif" class="table table-striped">
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
                                    foreach ($member_verif as $memberVerif) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><img src="/assets/img-pengguna/<?= $memberVerif['photo'] ?>" width="50" class="img img-thumbnail"></td>
                                            <td><?= $memberVerif['nama_lengkap'] ?></td>
                                            <td><?= $memberVerif['email'] ?></td>
                                            <td><?= ($memberVerif['tanggal_lahir'] != 0000 - 00 - 00) ? $memberVerif['tanggal_lahir'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($memberVerif['no_hp'] != null) ? $memberVerif['no_hp'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($memberVerif['jenis_kelamin'] != null) ? $memberVerif['jenis_kelamin'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td><?= ($memberVerif['status'] != null) ? $memberVerif['status'] : '<span class="badge badge-danger">Belum diset</span>' ?></td>
                                            <td style="text-align:center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button onclick="lihat_data('<?= $memberVerif['id_pengguna'] ?>')" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                                    <form action="/admin/hapus_penggunaMemberVerif/<?= $memberVerif['id_pengguna'] ?>" method="post">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger rounded-0 btn-hapus-verif"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
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
        $("#member-biasa").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#member-verif").DataTable({
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
    $('.btn-hapus-verif').click(function(event) {
        event.preventDefault();
        const href = $(this.form).attr('action');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Jika data ini dihapus maka pengguna tersebut tidak lagi terverifikasi, namun akun pengguna akan tetap masih ada",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    })
    $('.btn-level').click(function(event) {
        event.preventDefault();
        const href = $(this.form).attr('action');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin mengubah member ini menjadi admin.",
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

    $('.btn-hapus-member').click(function(event) {
        event.preventDefault();
        const href = $(this.form).attr('action');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Dengan menghapus pengguna ini, tidak dapat membalikan seperti semula",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    })
</script>
<?= $this->endSection() ?>