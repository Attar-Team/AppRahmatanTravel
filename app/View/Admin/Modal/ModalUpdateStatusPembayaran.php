<div class="modal fade" id="ModalEditStatusPembayaran<?= $d['detail_pemesanan_id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/admin/edit-status-pembayaran" method="POST">
                <input type="hidden" name="pemesanan_id" value="<?= $d['pemesanan_id'] ?>" id="">
                <input type="hidden" name="detail_pemesanan_id" value="<?= $d['detail_pemesanan_id'] ?>">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Keberangkatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Jumlah Uang Masuk</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i
                                            class="bx bx-buildings"></i></span>
                                    <input type="number" name="jumlah_bayar" id="basic-icon-default-company" required class="form-control" />
                                </div>
                            </div>

                        <div class="mb-3">
                          <label for="sts" class="form-label">Status</label>
                          <select id="sts" name="status_verivikasi" class="form-select">
                                <option <?= ($d['status_verivikasi'] == "belum verivikasi") ? 'selected' : '' ?> value="belum verivikasi">Belum Verivikasi</option>
                                <option <?= ($d['status_verivikasi'] == "terverivikasi") ? 'selected' : '' ?> value="terverivikasi">Terverivikasi</option>
                                <option <?= ($d['status_verivikasi'] == "ditolak") ? 'selected' : '' ?> value="ditolak">DItolak</option>
                          </select>
                        </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>