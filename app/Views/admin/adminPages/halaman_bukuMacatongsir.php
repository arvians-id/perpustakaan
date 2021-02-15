<?= $this->extend('admin/adminLayout/templateDaftarDataTables') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Buku</li>
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
                            <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
                            <h3 class="card-title">Daftar Buku Macatongsir</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="buku-macatongsir" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Buku</th>
                                        <th>Nama Buku</th>
                                        <th>ISSN/ISBN</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($buku_macatongsir as $macatongsir) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $macatongsir['kode_buku'] ?></td>
                                            <td><?= $macatongsir['judul'] ?></td>
                                            <td><?= $macatongsir['isbn_issn'] ?></td>
                                            <td style="text-align:center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="/admin/buku_macatongsir/<?= $macatongsir['kode_buku'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    <a href="/admin/ubah_bukuMacatongsir/<?= $macatongsir['kode_buku'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <form action="/admin/hapus_buku/<?= $macatongsir['kode_buku'] ?>" method="post">
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
        $("#buku-macatongsir").DataTable({
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
            text: "Dengan menghapus buku ini, tidak dapat membalikan seperti semula",
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