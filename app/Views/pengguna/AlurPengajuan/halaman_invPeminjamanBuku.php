<?= $this->extend('pengguna/penggunaLayout/template_withoutApi') ?>

<?= $this->section('konten') ?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <div class="row">
                            <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
                            <div class="flashdata-danger" data-flashdata="<?= session()->getFlashdata('danger') ?>"></div>
                            <div class="col-lg-6">
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <?php if ($member_menunggu) : ?>
                                    <h4 class="mb-0 float-right bg-info rounded p-1">Menunggu</h4>
                                <?php elseif ($member_meminjam) : ?>
                                    <h4 class="mb-0 float-right bg-primary rounded p-1">Dalam Peminjaman</h4>
                                <?php elseif ($member_telat) : ?>
                                    <h4 class="mb-0 float-right bg-secondary rounded p-1">Telat Mengembalikan</h4>
                                <?php endif ?>
                            </div>
                            <div class="col-sm-12">
                                <hr class="mt-3">
                                <h5 class="mb-0">Hello, <?= $pengguna['nama_lengkap'] ?></h5>
                                <p>Ini adalah halaman buku-buku yang ingin anda pinjam, mohon bersabar untuk menunggu konfirmasi dari maca tongsir.</p>
                                <?php if ($member_menunggu) : ?>
                                    <?php if ($cekStatus) : ?>
                                        <div class="alert text-white bg-danger" role="alert">
                                            <div class="iq-alert-icon">
                                                <i class="ri-information-line"></i>
                                            </div>
                                            <div class="iq-alert-text">Untuk sementara waktu peminjaman buku tidak tersedia hingga <?= $cekStatus['tanggal_selesai'] == 0000 - 00 - 00 ? 'batas waktu yang tidak ditentukan' : date_format(date_create($cekStatus['tanggal_selesai']), 'l, d F Y') ?>. <?= $cekStatus['pesan'] != null ? 'Peminjaman buku ditutup dikarenakan ' . $cekStatus['pesan'] : '' ?> Jika perlu bantuan <a href="mailto:macatongsir.id@gmail.com" class="text-dark">Hubungi Kami</a></div>
                                        </div>
                                    <?php else : ?>
                                        <div class="alert text-white bg-info" role="alert">
                                            <div class="iq-alert-icon">
                                                <i class="ri-user-smile-line"></i>
                                            </div>
                                            <div class="iq-alert-text">Buku anda sedang dipersiapkan oleh macatongsir, selalu periksa secara berkala agar tidak lupa untuk mengambil buku ke macatongsir.
                                            </div>
                                        </div>
                                    <?php endif ?>
                                <?php elseif ($member_meminjam) : ?>
                                    <div class="alert text-white bg-primary" role="alert">
                                        <div class="iq-alert-icon">
                                            <i class="ri-star-half-line"></i>
                                        </div>
                                        <div class="iq-alert-text">
                                            Buku anda sudah dapat dipinjam sekarang, hubungi pihak macatongsir atau datang langsung ketempat macatongsir. <br>
                                            * Note : bila buku tidak juga diambil, waktu peminjaman akan terus berjalan, jadi manfaatkan waktu untuk segera datang ke macatongsir.
                                        </div>
                                    </div>
                                <?php elseif ($member_telat) : ?>
                                    <div class="alert text-white bg-secondary" role="alert">
                                        <div class="iq-alert-icon">
                                            <i class="ri-alert-line"></i>
                                        </div>
                                        <div class="iq-alert-text">
                                            Anda sedang dalam keadaan telat meminjam, dimohon untuk segera mengembalikan buku anda ke macatongsir.
                                        </div>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive-sm">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Lokasi Maca Tongsir</th>
                                                <th scope="col">Data Pengajuan Anda</th>
                                                <th scope="col">Tanggal Input</th>
                                                <th scope="col">Tanggal Bisa Dibawa</th>
                                                <th scope="col">Tanggal Dikembalikan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p class="mb-0">Jawa Barat, Kabupaten Sukabumi<br> Kp.Gentong Pasir RT 04/01<br>
                                                        Kecamatan Sukaraja Kabupaten Sukabumi<br>
                                                        FAKSI yang berada di Kantor BPMPKB Kota Sukabumi<br>
                                                        Taman Bacaan Masyarakat Gentong pasir (TBM Maca Tongsir)<br>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="mb-0"><?= $data_pengajuan['nama_lengkap'] . ', ' . $data_pengajuan['provinsi'] . ' ' . $data_pengajuan['kota'] . ' ' . $data_pengajuan['kecamatan'] . ' ' . $data_pengajuan['kelurahan'] ?><br><?= $data_pengajuan['alamat'] ?><br>
                                                        No Handphone: <?= $data_pengajuan['no_hp'] ?><br>
                                                        Email: <?= $data_pengajuan['email'] ?><br>
                                                        Status: <?= $data_pengajuan['status'] ?>
                                                    </p>
                                                </td>
                                                <td><span class="badge badge-primary"><?= $satuBarisPinjaman['tanggal_input'] ?></span></td>
                                                <td><span class="badge badge-primary"><?= date_format(date_create($satuBarisPinjaman['tanggal_dibawa']), 'l, d F Y')  ?></span></td>
                                                <td><span class="badge badge-primary"><?= date_format(date_create($satuBarisPinjaman['tanggal_dikembalikan']), 'l, d F Y') ?></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Detail Peminjaman Buku Anda</h5>
                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" scope="col">No</th>
                                                <th scope="col">Judul Buku</th>
                                                <th class="text-center" scope="col">Photo</th>
                                                <th class="text-center" scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($bookmark as $ambilBuku) : ?>
                                                <tr>
                                                    <th class="text-center" scope="row"><?= $i++ ?></th>
                                                    <td>
                                                        <h6 class="mb-0"><?= $ambilBuku['author'] ?></h6>
                                                        <p class="mb-0"><?= $ambilBuku['judul'] ?></p>
                                                    </td>
                                                    <td class="text-center"><img src="<?= strlen($ambilBuku['image']) > 34 ? '/assets/img-buku/' : 'http://opac-perpustakaan.ummi.ac.id/images/docs/' ?><?= $ambilBuku['image'] ?>" width="70" alt=""></td>
                                                    <td class="text-center"><?= $ambilBuku['status'] == 1 ? '<b class="badge badge-primary">Tersedia</b>' : '<b class="badge badge-danger">tidak tersedia</b>' ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                            <?php if (!$member_meminjam && !$member_telat) : ?>
                                <div class="col-sm-6 text-right">
                                    <form action="/pengguna/batalkan_pinjam_sekarang" method="post">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-danger btn-lg btn-batalkan">Batalkan</button>
                                    </form>
                                </div>
                            <?php endif ?>
                            <div class="col-sm-12 mt-5">
                                <hr>
                                <b class="text-danger">Catatan</b>
                                <p>Buku bisa saja benar benar tidak tersedia atau sebaliknya. Buku dikolektifkan oleh maca tongsir setiap hari sabtu, untuk selengkapnya baca <a href="">Pedoman Peminjaman Maca Tongsir</a> <br> Pengajuan anda hingga proses menjadi berhasil, memakan waktu selama 3x24 jam, mohon bersabar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Wrapper END -->
<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Sweet Alerts -->
<script src="/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>
<script>
    const flash = document.querySelector('.flashdata').dataset.flashdata;
    const flashDanger = document.querySelector('.flashdata-danger').dataset.flashdata;

    $('.btn-batalkan').click(function(event) {
        event.preventDefault();
        const href = $(this.form).attr('action');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin membatalan proses peminjaman buku",
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
</script>
<?= $this->endSection() ?>