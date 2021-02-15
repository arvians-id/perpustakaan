<?= $this->extend('pengguna/penggunaLayout/template_withApi') ?>

<?= $this->section('konten') ?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Pengajuan Menjadi Member Macatongsir</h4>
                        </div>
                    </div>
                    <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
                    <?php if ($pengguna['status_pengajuan_member'] == 1) : ?>
                        <?php if ($pengajuan_ditolak) : ?>
                            <div class="alert alert-danger m-3" role="alert">
                                <div class="iq-alert-text">
                                    <h5 class="alert-heading">Pengajuan Ditolak!</h5>
                                    <p>Data anda kami tolak. Data ditolak dikarenakan terdapat data yang palsu, kurang atau tidak jelas. Mohon upload ulang pengajuan Member Maca Tongsir
                                    </p>
                                    <hr>
                                    <p class="mb-0"> Jika terdapat kekeliruan terkait pengajuan member maca tongsir <a href="mailto:macatongsir.id@gmail.com" class="text-primary">Hubungi Kami</a>
                                        <?= $pengajuan_ditolak['pesan'] ? '<br>*Pesan Dari Maca Tongsir : ' . $pengajuan_ditolak['pesan'] : '' ?>
                                    </p>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="iq-card-body">
                            <div class="stepwizard ">
                                <?php if ($validation->getErrors()) : ?>
                                    <div class="alert text-white bg-danger" role="alert">
                                        <div class="iq-alert-icon">
                                            <i class="ri-information-line"></i>
                                        </div>
                                        <div class="iq-alert-text">
                                            <?= $validation->listErrors() ?>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <div class="stepwizard-row setup-panel">
                                    <div id="user" class="wizard-step active">
                                        <a href="#informasi-pengguna" class="active btn">
                                            <i class="ri-user-2-fill text-primary"></i><span>Informasi Pengguna</span>
                                        </a>
                                    </div>
                                    <div id="document" class="wizard-step">
                                        <a href="#informasi-alamat" class="btn btn-default disabled">
                                            <i class="ri-map-pin-5-line text-danger"></i><span>Informasi Alamat</span>
                                        </a>
                                    </div>
                                    <div id="bank" class="wizard-step">
                                        <a href="#informasi-pribadi" class="btn btn-default disabled">
                                            <i class="ri-lock-unlock-line text-success"></i><span>Informasi Pribadi</span>
                                        </a>
                                    </div>
                                    <div id="confirm" class="wizard-step">
                                        <a href="#berhasil" class="btn btn-default disabled">
                                            <i class="ri-check-double-line text-warning"></i><span>Selesai</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <form class="form" action="/pengguna/simpan_pengajuan" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row setup-content" id="informasi-pengguna">
                                    <div class="col-sm-12">
                                        <div class="col-md-12 p-0">
                                            <h3 class="mb-4">Informasi Pengguna</h3>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Nama Lengkap</label>
                                                    <input maxlength="100" type="text" name="nama_lengkap" required="required" class="form-control" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Email</label>
                                                    <input maxlength="100" type="email" name="email" required="required" class="form-control" />
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="uname" class="control-label">No Handphone</label>
                                                    <input type="text" class="form-control" id="uname" required="required" name="no_hp">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="exampleFormControlSelect1" class="control-label">Status Saat Ini</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="status" required="required">
                                                        <option>Pekerja</option>
                                                        <option>Mahasiswa</option>
                                                        <option>Pelajar</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Selanjutnya</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="informasi-alamat">
                                    <div class="col-sm-12">
                                        <div class="col-md-12 p-0">
                                            <h3 class="mb-4">Informasi Alamat</h3>
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label>Provinsi</label>
                                                    <select class="form-control" id="provinsi" name="provinsi" title="Pilih Provinsi">
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>Kota</label>
                                                    <select class="form-control" id="kota" name="kota" title="Pilih Kota">
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>Kecamatan</label>
                                                    <select class="form-control" id="kecamatan" name="kecamatan" title="Pilih Kecamatan">
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>Kelurahan</label>
                                                    <select class="form-control" id="kelurahan" name="kelurahan" title="Pilih Kelurahan">
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="cadd" class="control-label">Alamat Lengkap</label>
                                                        <textarea name="alamat" required="required" id="cadd" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Selanjutnya</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="informasi-pribadi">
                                    <div class="col-sm-12">
                                        <div class="col-md-12 p-0">
                                            <h3 class="mb-4">Informasi Pribadi</h3>
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <label for="accno">Photo Tanda Pengenal *Photo Max 1MB</label>
                                                    <input type="file" class="form-control-file" id="accno" name="photo_ktp_kartu_pelajar" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="cadd" class="control-label">Pesan Anda</label>
                                                        <textarea name="pesan" required="required" id="cadd" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-danger btn-lg pull-right" type="submit">Kirim Pengajuan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php elseif ($pengguna['status_pengajuan_member'] == 2) : ?>
                        <div class="iq-card-body">
                            <div class="stepwizard mt-4">
                                <div class="stepwizard-row setup-panel">
                                    <div id="user" class="wizard-step active">
                                        <a href="#berhasil" class="active btn">
                                            <i class="ri-user-2-fill text-primary"></i><span>Informasi Pengguna</span>
                                        </a>
                                    </div>
                                    <div id="document" class="wizard-step">
                                        <a href="#berhasil" class="btn btn-default active">
                                            <i class="ri-map-pin-5-line text-danger"></i><span>Informasi Alamat</span>
                                        </a>
                                    </div>
                                    <div id="bank" class="wizard-step">
                                        <a href="#berhasil" class="btn btn-default active">
                                            <i class="ri-lock-unlock-line text-success"></i><span>Informasi Pribadi</span>
                                        </a>
                                    </div>
                                    <div id="confirm" class="wizard-step">
                                        <a href="#berhasil" class="btn btn-default active">
                                            <i class="ri-check-double-line text-warning"></i><span>Selesai</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row setup-content" id="berhasil">
                                <div class="col-sm-12">
                                    <div class="col-md-12 p-0">
                                        <div class="alert alert-primary" role="alert">
                                            <div class="iq-alert-text">
                                                <h5 class="alert-heading">Berhasil Dikirm!</h5>
                                                <p>Data anda sedang kami proses, proses ini memakan waktu paling lama 3x24 jam.
                                                </p>
                                                <hr>
                                                <p class="mb-0"> Jika ada pertanyaan terkait pengajuan member maca tongsir <a href="mailto:macatongsir.id@gmail.com" class="text-warning">Hubungi Kami</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-8"> <img src="/assets/banner-logo/check-done.png" class="fit-image" alt="img-success"> </div>
                                        </div>
                                    </div>
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
<?= $this->endSection() ?>