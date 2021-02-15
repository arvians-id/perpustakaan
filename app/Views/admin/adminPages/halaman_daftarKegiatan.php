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
                    <h1>Daftar Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Kegiatan</li>
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
                            <h3 class="card-title">Kegiatan Sedang Aktif</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="aktif-kegiatan" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Kegiatan</th>
                                        <th>Pementor Kegiatan</th>
                                        <th>No Hp Pementor</th>
                                        <th>Status Kegiatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($kegiatan_aktif as $keg_aktif) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= strlen($keg_aktif['judul']) > 50 ? substr_replace($keg_aktif['judul'], '...', 50) : $keg_aktif['judul'] ?></td>
                                            <td><?= $keg_aktif['mentor'] ?></td>
                                            <td><?= $keg_aktif['no_hp_pementor'] != null ? '0' . $keg_aktif['no_hp_pementor'] : 'Tidak Ada' ?></td>
                                            <td><?= $keg_aktif['status'] ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="/admin/kegiatan/<?= $keg_aktif['kode_kegiatan'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    <a href="/admin/ubah_kegiatan/<?= $keg_aktif['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <form action="/admin/hapus_kegiatan/<?= $keg_aktif['kode_kegiatan'] ?>" method="post">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger rounded-0 btn-hapus"><i class="fas fa-trash-alt"></i></button>
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
                <div class="col-md-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kegiatan Berlalu</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="berlalu-kegiatan" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Kegiatan</th>
                                        <th>Pementor Kegiatan</th>
                                        <th>No Hp Pementor</th>
                                        <th>Status Kegiatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($kegiatan_berlalu as $keg_berlalu) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= strlen($keg_berlalu['judul']) > 30 ? substr_replace($keg_berlalu['judul'], '...', 30) : $keg_berlalu['judul'] ?></td>
                                            <td><?= $keg_berlalu['mentor'] ?></td>
                                            <td><?= $keg_berlalu['no_hp_pementor'] != null ? '0' . $keg_berlalu['no_hp_pementor'] : 'Tidak Ada' ?></td>
                                            <td><span class="badge badge-danger"><?= $keg_berlalu['status'] == 1 ? 'Selesai' : '' ?></span></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="/admin/kegiatan/<?= $keg_berlalu['kode_kegiatan'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    <a href="/admin/ubah_kegiatan/<?= $keg_berlalu['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <form action="/admin/hapus_kegiatan/<?= $keg_berlalu['kode_kegiatan'] ?>" method="post">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger rounded-0 btn-hapus"><i class="fas fa-trash-alt"></i></button>
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
                <div class="col-md-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kegiatan Mendatang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="mendatang-kegiatan" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Kegiatan</th>
                                        <th>Pementor Kegiatan</th>
                                        <th>No Hp Pementor</th>
                                        <th>Status Kegiatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($kegiatan_mendatang as $keg_mendatang) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= strlen($keg_mendatang['judul']) > 30 ? substr_replace($keg_mendatang['judul'], '...', 30) : $keg_mendatang['judul'] ?></td>
                                            <td><?= $keg_mendatang['mentor'] ?></td>
                                            <td><?= $keg_mendatang['no_hp_pementor'] != null ? '0' . $keg_mendatang['no_hp_pementor'] : 'Tidak Ada' ?></td>
                                            <td><span class="badge badge-primary"><?= $keg_mendatang['status'] == 0 ? 'Menunggu' : '' ?></span></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="/admin/kegiatan/<?= $keg_mendatang['kode_kegiatan'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    <a href="/admin/ubah_kegiatan/<?= $keg_mendatang['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <form action="/admin/hapus_kegiatan/<?= $keg_mendatang['kode_kegiatan'] ?>" method="post">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger rounded-0 btn-hapus"><i class="fas fa-trash-alt"></i></button>
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

<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Sweet Alerts -->
<script src="/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>

<script>
    const flash = document.querySelector('.flashdata').dataset.flashdata;

    $(function() {
        $("#aktif-kegiatan").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#mendatang-kegiatan").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#berlalu-kegiatan").DataTable({
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