<?= $this->extend('pengguna/penggunaLayout/template_withoutApi') ?>

<?= $this->section('konten') ?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Donasi</h4>
                        </div>
                    </div>
                    <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
                    <div class="flashdata-danger" data-flashdata="<?= session()->getFlashdata('danger') ?>"></div>
                    <?php if (!$donasi) : ?>
                        <div class="iq-card-body">
                            <?php if ($ucapan) : ?>
                                <div class="alert text-white bg-primary" role="alert">
                                    <div class="iq-alert-icon">
                                        <i class="ri-heart-2-line"></i>
                                    </div>
                                    <div class="iq-alert-text">
                                        Terimakasih atas donasi yang telah Anda berikan, Insya Allah donasi akan kami gunakan sebaik-baiknya dan juga anda sudah ikut berkontribusi untuk meningkatkan budaya literasi anak bangsa,<br>
                                        Semoga menjadi Amal Jariyah dan Allah memberi keberkahan atas apa yang Anda berikan Amin.
                                    </div>
                                </div>
                            <?php endif ?>
                            <p>Sebuah langkah kecil dengan manfaat yang sangat besar. Jadilah philantrophy untuk meningkatkan budaya literasi anak bangsa melalui laman Webpustaka. Satu buku sangat berarti bagi mereka.</p>
                            <form action="/pengguna/simpan_donasi" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <label>Nama Donatur</label>
                                    <input name="nama" type="text" class="form-control <?= ($validasi->hasError('nama')) ? 'is-invalid' : '' ?>" value="<?= old('nama') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validasi->getError('nama') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="text" class="form-control <?= ($validasi->hasError('email')) ? 'is-invalid' : '' ?>" value="<?= old('email') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validasi->getError('email') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>No Handphone Aktif</label>
                                    <input name="no_hp" type="text" class="form-control <?= ($validasi->hasError('no_hp')) ? 'is-invalid' : '' ?>" value="<?= old('no_hp') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validasi->getError('no_hp') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Lengkap</label>
                                    <input name="alamat" type="text" class="form-control <?= ($validasi->hasError('alamat')) ? 'is-invalid' : '' ?>" value="<?= old('alamat') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validasi->getError('alamat') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Donasi</label>
                                    <select name="donasi" class="form-control mb-3 <?= ($validasi->hasError('donasi')) ? 'is-invalid' : '' ?>">
                                        <option selected value="">Pilih Donasi</option>
                                        <option value="Buku">Buku</option>
                                        <option value="Uang">Uang</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validasi->getError('donasi') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" type="text" class="form-control <?= ($validasi->hasError('keterangan')) ? 'is-invalid' : '' ?>"><?= old('keterangan') ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validasi->getError('keterangan') ?>
                                    </div>
                                </div>
                                <div class="checkbox mb-3">
                                    <label><input type="checkbox" required> Saya menyatakan bahwa data saya benar-benar asli</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                <button type="reset" class="btn iq-bg-danger">Reset</button>
                            </form>
                        </div>
                    <?php else : ?>
                        <div class="m-3">
                            <div class="alert alert-primary" role="alert">
                                Formulir anda sedang diperiksa oleh macatongsir. Pemeriksaan membutuhkan waktu selambat-lambatnya 3x24 Jam. Mohon bersabar hingga pihak dari macatongsir menghubungi anda.
                            </div>
                            <img src="/assets/banner-logo/check-donasi.png" class="img mx-auto d-block" width="300" alt="#">
                        </div>
                    <?php endif ?>
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
    const flashDanger = document.querySelector('.flashdata-danger').dataset.flashdata;

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