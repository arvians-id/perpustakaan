<?= $this->extend('pengguna/penggunaLayout/template_withoutApi') ?>

<?= $this->section('konten') ?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid checkout-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
                        <div class="iq-header-title">
                            <h4 class="card-title">Kegiatan Yang Anda Ikuti</h4>
                        </div>
                    </div>
                    <div class="flashdata" data-flashdata="<?= session()->getFlashdata('alerts') ?>"></div>
                    <div class="flashdata-danger" data-flashdata="<?= session()->getFlashdata('danger') ?>"></div>
                    <div class="iq-card-body">
                        <ul class="list-inline p-0 m-0">
                            <?php if ($jml_kegiatan > 0) : ?>
                                <?php foreach ($kegiatan as $act) : ?>
                                    <li class="checkout-product">
                                        <div class="row align-items-center">
                                            <div class="col-sm-3 col-lg-2">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-3">
                                                        <form action="/pengguna/hapus_kegiatan/<?= $act['kode_kegiatan'] ?>" method="post">
                                                            <?= csrf_field() ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button class="btn btn-danger btn-hapus"><i class="ri-close-fill"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <span class="checkout-product-img">
                                                            <a href="javascript:void();"><img class="img-fluid rounded" src="/assets/img-kegiatan/<?= $act['photo'] ?>" alt=""></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-lg-4">
                                                <div class="checkout-product-details">
                                                    <h5><?= $act['judul'] ?></h5>
                                                    <div class="price">
                                                        <p>Pementor : <?= $act['mentor'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-6">
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <div class="row align-items-center mt-2">
                                                            <div class="col-sm-7 col-lg-6">
                                                            </div>
                                                            <div class="col-sm-5 col-lg-6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <a href="/home/kegiatan/<?= $act['kode_kegiatan'] ?>"><button type="submit" class="btn btn-primary view-more">Lihat Detail</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                            <?php else : ?>
                                <img src="/assets/banner-logo/no-data.png" class="img mx-auto d-block" width="300" alt="#">
                                <p class="text-center">Belum Mengikuti Kegiatan</p>
                            <?php endif ?>
                        </ul>
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

    $('.btn-hapus').click(function(event) {
        event.preventDefault();
        const href = $(this.form).attr('action');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin menghapus keikutsertaan kegiatan",
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