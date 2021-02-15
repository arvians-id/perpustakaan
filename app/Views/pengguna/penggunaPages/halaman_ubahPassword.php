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
                            <h4 class="card-title">Ubah Password</h4>
                        </div>
                    </div>
                    <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
                    <div class="flashdata-danger" data-flashdata="<?= session()->getFlashdata('danger') ?>"></div>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert text-white bg-danger m-3" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text"> <?= session()->getFlashdata('pesan') ?></div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="iq-card-body">
                        <form action="/pengguna/simpan_ubah_password" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="cpass">Password Awal</label>
                                <input type="Password" name="cpassword" class="form-control <?= ($validasi->hasError('cpassword')) ? 'is-invalid' : '' ?>" id="cpass">
                                <div class="invalid-feedback">
                                    <?= $validasi->getError('cpassword') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="npass">Password Baru</label>
                                <input type="Password" name="npassword" class="form-control <?= ($validasi->hasError('npassword')) ? 'is-invalid' : '' ?>" id="npass">
                                <div class="invalid-feedback">
                                    <?= $validasi->getError('npassword') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vpass">Ulangi Password</label>
                                <input type="Password" name="rpassword" class="form-control <?= ($validasi->hasError('rpassword')) ? 'is-invalid' : '' ?>" id="vpass">
                                <div class="invalid-feedback">
                                    <?= $validasi->getError('rpassword') ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn iq-bg-danger">Cancel</button>
                        </form>
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