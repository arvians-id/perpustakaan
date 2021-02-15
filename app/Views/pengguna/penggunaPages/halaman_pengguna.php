<?= $this->extend('pengguna/penggunaLayout/template_withoutApi') ?>

<?= $this->section('konten') ?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row profile-content">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="iq-card">
                    <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
                    <div class="iq-card-body profile-page">
                        <div class="profile-header">
                            <div class="cover-container text-center">
                                <img src="/assets/img-pengguna/<?= $pengguna['photo'] ?>" width="100" height="100" alt="profile-bg" class="rounded-circle">
                                <div class="profile-detail mt-3">
                                    <h3><?= $pengguna['nama_lengkap'] ?></h3>
                                    <p class="text-primary"><?= $pengguna['email'] ?></p>
                                    <p>Semakin banyak kamu membaca, semakin banyak hal pula yang kamu ketahui. Semakin banyak kamu belajar, semakin banyak tempat yang akan kamu kunjungi. -Dr. Seuss-</p>
                                </div>
                                <div class="iq-social d-inline-block align-items-center">
                                    <ul class="list-inline d-flex p-0 mb-0 align-items-center">
                                        <li>
                                            <img src="/assets/banner-logo/kata.png" class="img-fluid" width="200" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                        <div class="iq-header-title">
                            <h4 class="card-title mb-0">Detail Profil Anda</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul class="list-inline p-0 mb-0">
                            <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                    <div class="col-sm-6">
                                        <h6>Tanggal Lahir</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="mb-0"><?= ($pengguna['tanggal_lahir'] == 0000 - 00 - 00) ? 'Belum diset' : $pengguna['tanggal_lahir'] ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                    <div class="col-sm-6">
                                        <h6>No Handphone</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="mb-0"><?= ($pengguna['no_hp'] == null) ? 'Belum diset' : $pengguna['no_hp'] ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                    <div class="col-sm-6">
                                        <h6>Email</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="mb-0"><?= $pengguna['email'] ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                    <div class="col-sm-6">
                                        <h6>Status Saat Ini</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="mb-0"><?= ($pengguna['status'] == null) ? 'Belum diset' : $pengguna['status'] ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row align-items-center justify-content-between mb-3">
                                    <div class="col-sm-6">
                                        <h6>Jenis Kelamin</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="mb-0"><?= $pengguna['jenis_kelamin'] ?></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!-- Wrapper END -->
<!-- Sweet Alerts -->
<script src="/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>
<script>
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