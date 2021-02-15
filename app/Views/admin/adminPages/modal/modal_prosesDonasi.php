<!-- Modal -->
<div class="modal fade" id="prosesDonasi" tabindex="-1" aria-labelledby="prosesDonasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="prosesDonasiLabel">Data Donatur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr style="text-align:center" class="thead-dark">
                        <th width="50%">Format Donasi</th>
                        <th width="50%">Data Donatur</th>
                    </tr>
                    <tr>
                        <td style="text-align:center">Nama Donatur</td>
                        <td id="nama-donatur"></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">Email Donatur</td>
                        <td id="email-donatur"></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">No Hp Donatur</td>
                        <td id="hp-donatur"></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">Alamat Donatur</td>
                        <td id="alamat-donatur"></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">Jenis Donasi</td>
                        <td id="jenis-donasi"></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">Keterangan</td>
                        <td id="keterangan"></td>
                    </tr>
                </table>

                <form action="/admin/simpan_donasi/<?= $donasi['id'] ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Nama Donatur <small class="text-secondary">*Jangan Di isi jika tidak ingin diketahui</small></label>
                        <input type="text" class="form-control" name="nama" value="<?= $donasi['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Photo Donatur <small class="text-secondary">*Jangan Di isi jika tidak ingin diketahui</small></label>
                        <input type="file" class="form-control" name="photo_donatur">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Tanggal Diterima</label>
                        <input type="date" class="form-control" name="tanggal_terima" required>
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