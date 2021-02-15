<?= $this->extend('admin/adminLayout/templateDaftarDataTables') ?>

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
                    <h1>Daftar Donasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Donasi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Donasi Terverifikasi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="donasi-terverifikasi" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Donatur</th>
                                        <th>No Hp Donatur</th>
                                        <th>Alamat Donatur</th>
                                        <th>Jenis Donasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($donasi_verif as $verif) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $verif['nama'] ?></td>
                                            <td><?= $verif['no_hp'] ?></td>
                                            <td><?= $verif['alamat'] ?></td>
                                            <td><?= $verif['donasi'] ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button onclick="ubahDonatur('<?= $verif['id'] ?>')" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                                    <form action="/admin/hapus_donatur/<?= $verif['id'] ?>" method="post">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger rounded-0 btn-hapus"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                    <?php if ($validasi->getErrors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $validasi->listErrors() ?>
                        </div>
                    <?php endif ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Donasi Dalam Proses</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="donasi-proses" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Donatur</th>
                                        <th>No Hp Donatur</th>
                                        <th>Alamat Donatur</th>
                                        <th>Jenis Donasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($donasi_proses as $proses) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $proses['nama'] ?></td>
                                            <td><?= $proses['no_hp'] ?></td>
                                            <td><?= $proses['alamat'] ?></td>
                                            <td><?= $proses['donasi'] ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button onclick="periksaProses('<?= $proses['id'] ?>')" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                                    <form action="/admin/hapus_donatur/<?= $proses['id'] ?>" method="post">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger rounded-0 btn-hapus"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
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
<div class="prosesDonasi" style="display:none"></div>
<div class="ubahDonatur" style="display:none"></div>
<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Sweet Alerts -->
<script src="/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>

<script>
    const flash = document.querySelector('.flashdata').dataset.flashdata;
    const flashDanger = document.querySelector('.flashdata-danger').dataset.flashdata;

    $(function() {
        $("#donasi-terverifikasi").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#donasi-proses").DataTable({
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
    } else if (flashDanger) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: flashDanger,
        })
    }

    function ubahDonatur(id) {
        $.ajax({
            url: '/admin/modal_ubah_donatur',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if (response.sukses) {
                    $('.ubahDonatur').html(response.sukses).show();
                    $('#ubahDonatur').modal('show');
                }
            },
            error: function(err) {
                console.log(err);
            }
        })
    }

    function periksaProses(id) {
        $.ajax({
            url: '/admin/modal_proses_donasi',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if (response.sukses) {
                    $('.prosesDonasi').html(response.sukses).show();
                    $('#prosesDonasi').modal('show');
                    $('#nama-donatur').html(response.donasi_proses.nama);
                    $('#email-donatur').html(response.donasi_proses.email);
                    $('#hp-donatur').html(response.donasi_proses.no_hp);
                    $('#alamat-donatur').html(response.donasi_proses.alamat);
                    $('#jenis-donasi').html(response.donasi_proses.donasi);
                    $('#keterangan').html(response.donasi_proses.keterangan);
                }
            },
            error: function(err) {
                console.log(err);
            }
        })
    }


    $('.btn-hapus').click(function(event) {
        event.preventDefault();
        const href = $(this.form).attr('action');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Dengan menghapus kegiatan ini, tidak dapat membalikan seperti semula",
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