<?= $this->extend('admin/adminLayout/templateDaftarDataTables') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengajuan Member</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">Pengajuan Member</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Pengguna Yang Mengajukan Menjadi Member Terverifikasi</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Terverifikasi</span>
                                        <span class="info-box-number text-center text-muted mb-0"><?= $jumlah_terverifikasi ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Dalam Proses</span>
                                        <span class="info-box-number text-center text-muted mb-0"><?= $jumlah_proses ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Ditolak</span>
                                        <span class="info-box-number text-center text-muted mb-0"><?= $jumlah_ditolak ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Daftar Pengajuan Terakhir</h3>
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
                                                    <th>No Handphone</th>
                                                    <th>Status</th>
                                                    <th>Dikirim Pada</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($member as $ambilMember) : ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><img src="/assets/img-pengguna/<?= $ambilMember['photo'] ?>" width="50" class="img img-thumbnail"></td>
                                                        <td><?= $ambilMember['nama_pengguna'] ?></td>
                                                        <td><?= $ambilMember['email_pengguna'] ?></td>
                                                        <td><?= $ambilMember['no_hp'] ?></td>
                                                        <td><?= $ambilMember['status'] ?></td>
                                                        <td><?= $ambilMember['pengajuan_dibuat'] ?></td>
                                                        <td><button class="btn btn-danger btn-sm" onclick="pengajuan('<?= $ambilMember['id_pengguna'] ?>')"><i class="fas fa-eye"></i></button></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i> SATU PUSTAKA</h3>
                        <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">Client Company
                                <b class="d-block">Maca Tongsir</b>
                            </p>
                            <p class="text-sm">Project Leader
                                <b class="d-block">Diyo Sukma</b>
                            </p>
                            <p class="text-sm">Web Development
                                <b class="d-block">Widdy Arfiansyah</b>
                            </p>
                            <p class="text-sm">Reports and Analysis
                                <b class="d-block">Nurahsiap Ramadani & Willy Oktaviani</b>
                            </p>
                            <p class="text-sm">Animated Video Editor
                                <b class="d-block">Bangga Angkasa</b>
                            </p>
                        </div>

                        <h5 class="mt-5 text-muted">Project files</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="fa fa-fw fa-book"></i> Buku Pedoman</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="fa fa-fw fa-code"></i> Website Satu Pustaka</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-newspaper"></i> Laporan & Karya Ilmiah</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="fa fa-fw fa-video "></i> Video Tutorial</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="pengajuanMember" style="display:none"></div>
<div class="tolakPengajuan" style="display:none"></div>
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

    function pengajuan(id) {
        $.ajax({
            url: '/admin/modal_pengajuan',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if (response.sukses) {
                    $('.pengajuanMember').html(response.sukses).show();
                    $('#pengajuanMember').modal('show');
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

    function tolakPengajuan(id) {
        $.ajax({
            url: '/admin/modal_tolak_pengajuan',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if (response.sukses) {
                    $('.tolakPengajuan').html(response.sukses).show();
                    $('#tolakPengajuan').modal('show');
                    $('#pengguna-pengajuan').val(response.pengajuan_1.nama_lengkap + ': ' + response.pengajuan_1.email)
                }
            },
            error: function(err) {
                console.log(err);
            }
        })
    }
    const flash = document.querySelector('.flashdata').dataset.flashdata;

    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: flash
        })
    }
</script>
<?= $this->endSection() ?>