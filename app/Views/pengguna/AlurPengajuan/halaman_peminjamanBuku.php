<?= $this->extend('pengguna/penggunaLayout/template_withoutApi') ?>

<?= $this->section('konten') ?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid checkout-content">
        <div class="row">
            <div id="cart" class="card-block show p-0 col-12">
                <div class="row align-item-center">
                    <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
                    <div class="flashdata-danger" data-flashdata="<?= session()->getFlashdata('danger') ?>"></div>
                    <?php if ($pengguna['status_pengajuan_member'] == 3) : ?>
                        <div class="col-lg-8">
                            <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Peminjaman Buku</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-home-tab-fill" data-toggle="pill" href="#pills-home-fill" role="tab" aria-controls="pills-home" aria-selected="true">Peminjaman Anda</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab-fill" data-toggle="pill" href="#pills-profile-fill" role="tab" aria-controls="pills-profile" aria-selected="false">Riwayat Peminjaman Anda</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent-1">
                                        <div class="tab-pane fade show active" id="pills-home-fill" role="tabpanel" aria-labelledby="pills-home-tab-fill">
                                            <?php if ($cekStatus) : ?>
                                                <div class="alert text-white bg-danger" role="alert">
                                                    <div class="iq-alert-icon">
                                                        <i class="ri-information-line"></i>
                                                    </div>
                                                    <div class="iq-alert-text">Untuk sementara waktu peminjaman buku tidak tersedia hingga <?= $cekStatus['tanggal_selesai'] == 0000 - 00 - 00 ? 'batas waktu yang tidak ditentukan' : date_format(date_create($cekStatus['tanggal_selesai']), 'l, d F Y') ?>. <?= $cekStatus['pesan'] != null ? 'Peminjaman buku ditutup dikarenakan ' . $cekStatus['pesan'] : '' ?> Jika perlu bantuan <a href="mailto:macatongsir.id@gmail.com" class="text-dark">Hubungi Kami</a></div>
                                                </div>
                                            <?php else : ?>
                                                <?php if ($pengguna['status_ketersediaan_buku'] == 1) : ?>
                                                    <div class="alert text-white bg-warning" role="alert">
                                                        <div class="iq-alert-icon">
                                                            <i class="ri-information-line"></i>
                                                        </div>
                                                        <div class="iq-alert-text">Buku anda sedang diperiksa oleh maca tongsir. proses ini memakan waktu paling lama 2x24 jam. <br> Jika terdapat kendala <a href="mailto:macatongsir.id@gmail.com" class="text-dark">Hubungi Kami</a></div>
                                                    </div>
                                                <?php elseif ($pengguna['status_ketersediaan_buku'] == 3) : ?>
                                                    <div class="alert text-white bg-danger" role="alert">
                                                        <div class="iq-alert-icon">
                                                            <i class="ri-information-line"></i>
                                                        </div>
                                                        <div class="iq-alert-text">Pengajuan anda ditolak. Dikarenakan dari salah satu buku anda ada yang tidak tersedia atau memang buku tersebut sudah ada yang pinjam. Jika terdapat kekeliruan <a href="mailto:macatongsir.id@gmail.com" class="text-dark">Hubungi Kami</a></div>
                                                    </div>
                                                <?php endif ?>
                                            <?php endif ?>
                                            <?php if (empty($bookmark)) : ?>
                                                <img src="/assets/banner-logo/no-data.png" class="img mx-auto d-block" width="300" alt="#">
                                                <p class="text-center">Tidak Ada Buku Yang Dipinjam</p>
                                            <?php else : ?>
                                                <?php foreach ($bookmark as $book) : ?>
                                                    <div class="iq-card-body">
                                                        <ul class="list-inline p-0 m-0">
                                                            <li class="checkout-product">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-2">
                                                                        <span class="checkout-product-img">
                                                                            <a href="/home/buku/<?= $book['buku_id'] ?>"><img class="img-fluid rounded" src="<?= strlen($book['image']) > 34 ? '/assets/img-buku/' : 'http://opac-perpustakaan.ummi.ac.id/images/docs/' ?><?= $book['image'] ?>" alt=""></a>
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="checkout-product-details">
                                                                            <h5><a href="/home/buku/<?= $book['buku_id'] ?>" class="text-secondary"><?= strlen($book['judul']) > 60 ? substr_replace($book['judul'], '...', 60) : $book['judul'] ?></a> </h5>
                                                                            <p class="text-success"><?= $book['author'] ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-10">
                                                                                <div class="row align-items-center mt-2">
                                                                                    <div class="col-sm-7 col-md-6">
                                                                                    </div>
                                                                                    <div class="col-sm-5 col-md-6">
                                                                                        <span class="product-price"><?= ($book['status'] == 0 ? '<span class="badge badge-warning w-auto">Buku Belum Diperiksa</span>' : (($book['status'] == 1 ? '<span class="badge badge-primary w-auto">Buku Sedang Tersedia</span>' : '<span class="badge badge-danger w-auto">Buku Tidak Tersedia</span>')));  ?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <?php if ($pengguna['status_ketersediaan_buku'] != 1) : ?>
                                                                                    <form action="/pengguna/hapus_bookmark/<?= $book['id'] ?>">
                                                                                        <?= csrf_field() ?>
                                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                                        <button type="submit" class="btn text-dark font-size-20"><i class="ri-delete-bin-7-fill"></i></button>
                                                                                    </form>
                                                                            </div>
                                                                        <?php endif ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile-fill" role="tabpanel" aria-labelledby="pills-profile-tab-fill">
                                            <?php if ($riwayat_bookmark == null) : ?>
                                                <img src="/assets/banner-logo/no-data.png" class="img mx-auto d-block" width="300" alt="#">
                                                <p class="text-center">Tidak Ada Riwayat Peminjaman</p>
                                            <?php else : ?>
                                                <div class="iq-card-body">
                                                    <ul class="iq-timeline">
                                                        <?php foreach ($riwayat_bookmark as $riwayat) : ?>
                                                            <li>
                                                                <div class="timeline-dots border-secondary"><i class="ri-bookmark-3-fill"></i></div>
                                                                <h6 class="float-left mb-1"><?= strlen($riwayat['judul']) > 30 ? substr_replace($riwayat['judul'], '...', 30) : $riwayat['judul'] ?></h6>
                                                                <small class="float-right mt-1"><?= date_format(date_create($riwayat['created_at']), 'd F Y') ?></small>
                                                                <div class="d-inline-block w-100">
                                                                    <p><?= $riwayat['author'] ?></p>
                                                                </div>
                                                            </li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="iq-card">
                                <div class="iq-card-body">
                                    <div class="alert alert-primary" role="alert">
                                        <div class="iq-alert-text">
                                            <h5 class="alert-heading">Anda Sekarang Anggota Macatongsir</h5>
                                            <p>Anda sudah bisa melakukan peminjaman buku dengan maksimal 3 buku selama 1 minggu. <br> Peminjaman buku dilakukan setiap hari sabtu, jadi pastikan anda sudah memeriksa ketersediaan buku sebelum hari sabtu.
                                            </p>
                                            <hr>
                                            <p class="mb-0"> Untuk selengkapnya baca panduan <a href="/home/panduan-peminjaman" class="text-warning">Pedoman Peminjaman Buku</a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Belum Diperiksa</span>
                                        <span><?= $bd ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Buku Tersedia</span>
                                        <span><?= $t ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Buku Tidak Tersedia</span>
                                        <span><?= $tt ?></span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-dark"><strong>Total Buku</strong></span>
                                        <span class="text-dark"><strong><?= $jumlah_bookmark ?></strong></span>
                                    </div>
                                    <hr>
                                    <?php if ($pengguna['status_ketersediaan_buku'] == 1) : ?>
                                        <form action="/pengguna/batalkan_periksa_ketersediaan" method="post">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger d-block mt-3 btn-block btn-batalkan">Batalkan Sekarang</button>
                                        </form>
                                    <?php else : ?>
                                        <?php if ($cekStatus) : ?>
                                            <button type="button" class="btn btn-info d-block mt-3 btn-block disabled">Cek Ketersediaan Buku</button>
                                        <?php else : ?>
                                            <form action="/pengguna/simpan_periksa_ketersediaan" method="post">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-info d-block mt-3 btn-block <?= ($tt) ? 'btn-ketersediaan' : '' ?>">Cek Ketersediaan Buku</button>
                                            </form>
                                        <?php endif ?>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="iq-card ">
                                <div class="card-body iq-card-body p-0 iq-checkout-policy">
                                    <ul class="p-0 m-0">
                                        <li class="d-flex align-items-center">
                                            <div class="iq-checkout-icon">
                                                <i class="ri-home-heart-line"></i>
                                            </div>
                                            <h6><a href="/home/macatongsir">Lihat Profil Macatongsir</a></h6>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="iq-checkout-icon">
                                                <i class="ri-movie-2-line"></i>
                                            </div>
                                            <h6><a href="/home/panduan-peminjaman">Lihat Video Cara Peminjaman Buku</a></h6>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="iq-checkout-icon">
                                                <i class="ri-questionnaire-line"></i>
                                            </div>
                                            <h6><a href="/home/faq">Lihat FAQ</a></h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
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

    $('.btn-ketersediaan').click(function(event) {
        event.preventDefault();
        const href = $(this.form).attr('action');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin melanjutkan walaupun buku tidak tersedia",
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
    $('.btn-batalkan').click(function(event) {
        event.preventDefault();
        const href = $(this.form).attr('action');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin membatalan pemriksaan buku",
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