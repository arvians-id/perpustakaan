<?= date_default_timezone_set('Asia/Jakarta'); ?>
<!-- Modal -->
<div class="modal fade" id="proses-peminjaman" tabindex="-1" aria-labelledby="proses-peminjamanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="proses-peminjamanLabel">Data Pengajuan Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr style="text-align:center" class="thead-dark">
                        <th width="50%">Format</th>
                        <th width="50%">Data Peminjaman</th>
                    </tr>
                    <tr>
                        <td style="text-align:center">Nama Lengkap</td>
                        <td id="nama-peminjam"></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">Buku Tersedia</td>
                        <td id="judul-tersedia"></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">Buku Tidak Tersedia</td>
                        <td id="judul-tidak-tersedia"></td>
                    </tr>
                </table>

                <form action="/admin/simpan_peminjaman/<?= $pengajuan['user_id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tanggal Input</label>
                        <input type="text" class="form-control" disabled value="<?= date('m/d/Y H:i:s') ?>">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Tanggal Buku Bisa Dibawa</label>
                        <input type="date" class="form-control" name="tanggal_dibawa" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Tanggal Buku Dikembalikan</label>
                        <input type="date" class="form-control" name="tanggal_dikembalikan" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-proses"><i class="far fa-check-square"></i> Proses Peminjaman</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("tanggal_dibawa")[0].setAttribute('min', today);
    document.getElementsByName("tanggal_dikembalikan")[0].setAttribute('min', today);
</script>