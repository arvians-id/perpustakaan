<?= $this->extend('admin/adminLayout/template_profilAdmin') ?>

<?= $this->section('konten') ?>
<!-- Content Wrapper. Contains page content -->

<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profil</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><?= $pengguna['role_keterangan'] ?> Profil</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="/assets/img-pengguna/<?= $pengguna['photo'] ?>" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"><?= $pengguna['nama_lengkap'] ?></h3>

                                <p class="text-muted text-center"><?= $pengguna['role_keterangan'] ?></p>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-at"></i> Email</strong>

                                    <p class="text-muted"><?= $pengguna['email'] ?></p>

                                    <hr>

                                    <strong><i class="fas fa-calendar-alt"></i> Tanggal Lahir</strong>

                                    <p class="text-muted"><?= ($pengguna['tanggal_lahir'] != 0000 - 00 - 00) ? $pengguna['tanggal_lahir'] : 'Belum diset' ?></p>

                                    <hr>

                                    <strong><i class="fas fa-phone-square-alt"></i> No Handphone</strong>

                                    <p class="text-muted"><?= ($pengguna['no_hp'] != null) ? $pengguna['no_hp'] : 'Belum diset' ?></p>

                                    <hr>

                                    <strong><i class="fas fa-venus-mars"></i> Jenis Kelamin</strong>

                                    <p class="text-muted"><?= ($pengguna['jenis_kelamin'] != null) ? $pengguna['jenis_kelamin'] : 'Belum diset' ?></p>

                                    <hr>
                                    <strong><i class="fas fa-briefcase"></i> Status</strong>

                                    <p class="text-muted"><?= ($pengguna['status'] != null) ? $pengguna['status'] : 'Belum diset' ?></p>

                                    <hr>
                                </div>
                                <!-- /.card-body -->

                                <a href="/admin/daftar_admin" class="btn btn-primary btn-block"><b> Lihat Daftar Admin</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Ubah Profil</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Ubah Password</a></li>
                                </ul>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="settings">
                                        <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
                                        <div class="flashdata-danger" data-flashdata="<?= session()->getFlashdata('danger') ?>"></div>
                                        <form action="/admin/edit_profil/" method="post" class="form-horizontal" enctype="multipart/form-data">
                                            <?= csrf_field() ?>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Name Lengkap</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-white"><i class="far fa-address-card"></i></span>
                                                        </div>
                                                        <input name="nama_lengkap" type="text" class="form-control <?= ($validasi->hasError('nama_lengkap')) ? 'is-invalid' : '' ?>" value="<?= (old('nama_lengkap')) ? old('nama_lengkap') : $pengguna['nama_lengkap'] ?>">
                                                        <div class="invalid-feedback">
                                                            <?= $validasi->getError('nama_lengkap')  ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-white"><i class="fas fa-calendar"></i></span>
                                                        </div>
                                                        <input name="tanggal_lahir" type="date" class="form-control <?= ($validasi->hasError('tanggal_lahir')) ? 'is-invalid' : '' ?>" value="<?= (old('tanggal_lahir')) ? old('tanggal_lahir') : $pengguna['tanggal_lahir'] ?>">
                                                        <div class="invalid-feedback">
                                                            <?= $validasi->getError('tanggal_lahir')  ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">No Handphone</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-white"><i class="fas fa-phone-square-alt"></i></span>
                                                        </div>
                                                        <input name="no_hp" type="text" class="form-control <?= ($validasi->hasError('no_hp')) ? 'is-invalid' : '' ?>" value="<?= (old('no_hp')) ? old('no_hp') : $pengguna['no_hp'] ?>" placeholder="+62 xxxx xxxx">
                                                        <div class="invalid-feedback">
                                                            <?= $validasi->getError('no_hp')  ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-10">
                                                    <!-- radio -->
                                                    <div class="form-group clearfix">
                                                        <div class="icheck-primary d-inline">
                                                            <input name="jenis_kelamin" value="Laki-laki" type="radio" id="radioPrimary1" <?= ($pengguna['jenis_kelamin'] == 'Laki-laki') ? 'checked' : '' ?>>
                                                            <label for="radioPrimary1">Laki-laki</label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input name="jenis_kelamin" value="Perempuan" type="radio" id="radioPrimary2" <?= ($pengguna['jenis_kelamin'] == 'Perempuan') ? 'checked' : '' ?>>
                                                            <label for="radioPrimary2">Perempuan</label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input name="jenis_kelamin" value="Lainnya" type="radio" id="radioPrimary3" <?= ($pengguna['jenis_kelamin'] == 'Lainnya') ? 'checked' : '' ?>>
                                                            <label for="radioPrimary3">Lainnya</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Status</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-white"><i class="fas fa-briefcase"></i></span>
                                                        </div>
                                                        <select class="custom-select" name="status">
                                                            <option <?= ($pengguna['status'] == 'Sudah Bekerja') ? 'selected' : '' ?>>Sudah Bekerja</option>
                                                            <option <?= ($pengguna['status'] == 'Mahasiswa') ? 'selected' : '' ?>>Mahasiswa</option>
                                                            <option <?= ($pengguna['status'] == 'Pelajar') ? 'selected' : '' ?>>Pelajar</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Photo Profil</label>
                                                <div class="col-sm-10">
                                                    <div class="custom-file">
                                                        <input type="file" name="photo" class="custom-file-input <?= ($validasi->hasError('photo')) ? 'is-invalid' : '' ?>">
                                                        <img src="/assets/img-pengguna/<?= $pengguna['photo'] ?>" width="70" class="img-thumbnail mt-2 <?= ($validasi->hasError('photo')) ? '' : 'mb-5' ?>">
                                                        <label class="custom-file-label">Choose file...</label>
                                                        <div class="invalid-feedback">
                                                            <?= $validasi->getError('photo')  ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Ubah</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="password">
                                        <form action="/admin/ubah_password/" method="post" class="form-horizontal">
                                            <?= csrf_field() ?>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Password Saat Ini</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-white"><i class="fas fa-key"></i></span>
                                                        </div>
                                                        <input name="cpassword" type="password" class="form-control <?= ($validasi->hasError('cpassword')) ? 'is-invalid' : '' ?>">
                                                        <div class="invalid-feedback">
                                                            <?= $validasi->getError('cpassword')  ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Password Baru</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-white"><i class="fas fa-unlock-alt"></i></span>
                                                        </div>
                                                        <input name="npassword" type="password" class="form-control <?= ($validasi->hasError('npassword')) ? 'is-invalid' : '' ?>">
                                                        <div class="invalid-feedback">
                                                            <?= $validasi->getError('npassword')  ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Ulang Password</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-white"><i class="fas fa-lock"></i></span>
                                                        </div>
                                                        <input name="rpassword" type="password" class="form-control <?= ($validasi->hasError('rpassword')) ? 'is-invalid' : '' ?>">
                                                        <div class="invalid-feedback">
                                                            <?= $validasi->getError('npassword')  ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Ubah</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
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