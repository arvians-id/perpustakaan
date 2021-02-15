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
                            <h4 class="card-title">Ubah Profil</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="/pengguna/simpan_ubah_profil" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-group row align-items-center">
                                <div class="col-md-12">
                                    <div class="profile-img-edit">
                                        <img class="profile-pic" src="/assets/img-pengguna/<?= $pengguna['photo'] ?>" width="150" height="150" alt="profile-pic">
                                        <div class="p-image">
                                            <i class="ri-pencil-line upload-button"></i>
                                            <input class="file-upload <?= ($validasi->hasError('photo')) ? 'is-invalid' : '' ?>" type="file" name="photo" accept="image/*" />
                                            <div class="invalid-feedback">
                                                <?= $validasi->getError('photo')  ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" row align-items-center">
                                <div class="form-group col-sm-6">
                                    <label for="fname">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control <?= ($validasi->hasError('nama_lengkap')) ? 'is-invalid' : '' ?>" id="fname" placeholder="Otong Surotong" value="<?= (old('nama_lengkap')) ? old('nama_lengkap') : $pengguna['nama_lengkap'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $validasi->getError('nama_lengkap')  ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="lname">No Handphone:</label>
                                    <input type="text" name="no_hp" class="form-control <?= ($validasi->hasError('no_hp')) ? 'is-invalid' : '' ?>" id="lname" placeholder="08xxxx xxxx" value="<?= (old('no_hp')) ? old('no_hp') : $pengguna['no_hp'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $validasi->getError('no_hp')  ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="d-block">Jenis Kelamin</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadio6" value="Laki-laki" name="jenis_kelamin" class="custom-control-input" <?= ($pengguna['jenis_kelamin'] == 'Laki-laki') ? 'checked' : '' ?>>
                                        <label class="custom-control-label" for="customRadio6"> Laki-laki </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadio7" value="Perempuan" name="jenis_kelamin" class="custom-control-input" <?= ($pengguna['jenis_kelamin'] == 'Perempuan') ? 'checked' : '' ?>>
                                        <label class="custom-control-label" for="customRadio7"> Perempuan </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadio8" value="Lainnya" name="jenis_kelamin" class="custom-control-input" <?= ($pengguna['jenis_kelamin'] == 'Lainnya') ? 'checked' : '' ?>>
                                        <label class="custom-control-label" for="customRadio8"> Lainnya </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="dob">Tanggal Lahir</label>
                                    <input type="date" class="form-control <?= ($validasi->hasError('tanggal_lahir')) ? 'is-invalid' : '' ?>" name="tanggal_lahir" id="dob" value="<?= (old('tanggal_lahir')) ? old('tanggal_lahir') : $pengguna['tanggal_lahir'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $validasi->getError('tanggal_lahir')  ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Status</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="status">
                                        <option <?= ($pengguna['status'] == 'Sudah Bekerja') ? 'selected' : '' ?>>Sudah Bekerja</option>
                                        <option <?= ($pengguna['status'] == 'Mahasiswa') ? 'selected' : '' ?>>Mahasiswa</option>
                                        <option <?= ($pengguna['status'] == 'Pelajar') ? 'selected' : '' ?>>Pelajar</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Wrapper END -->
<?= $this->endSection() ?>