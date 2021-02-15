<!-- Modal -->
<div class="modal fade" id="tolakPengajuan" tabindex="-1" aria-labelledby="tolakPengajuanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tolakPengajuanLabel">Beri Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/simpan_tolakPengajuan/<?= $pengajuan['user_id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="pengguna-pengajuan" class="col-form-label">Kepada Pengguna</label>
                        <input type="text" class="form-control" id="pengguna-pengajuan" disabled>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Pesan</label>
                        <textarea class="form-control" name="pesan" id="message-text" placeholder="(optional)"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>