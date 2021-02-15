<!-- Modal -->
<div class="modal fade" id="ubahDonatur" tabindex="-1" aria-labelledby="ubahDonaturLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ubahDonaturLabel">Ubah Data Donatur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/simpan_ubah_donasi/<?= $donasi['id'] ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Nama Donatur <small class="text-secondary">*Jangan Di isi jika tidak ingin diketahui</small></label>
                        <input type="text" class="form-control" name="nama" value="<?= $donasi['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Photo Donatur <small class="text-secondary">*Jangan Di isi jika tidak ingin diketahui</small></label>
                        <input type="file" class="form-control" name="photo_donatur">
                        <img src="/assets/img-donatur/<?= $donasi['photo_donatur'] ?>" width="100" class="img-thumbnail mt-2">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Tanggal Diterima</label>
                        <input type="date" class="form-control" value="<?= $donasi['tanggal_terima'] ?>" readonly>
                        <small class="text-secondary">note: Pastikan donasi benar benar sudah diterima oleh pihak macatongsir</small>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-proses"><i class="far fa-check-square"></i> Upload Ke Website</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>