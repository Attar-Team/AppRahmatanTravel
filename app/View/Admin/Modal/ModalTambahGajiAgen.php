<div class="modal fade" id="ModalTambahGaji<?= $d['pemesanan_id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/admin/tambah-gaji-agen" method="POST">
                <input type="hidden" name="pemesanan_id" value="<?= $d['pemesananId'] ?>" id="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Keberangkatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Bonus</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i
                                            class="bx bx-buildings"></i></span>
                                    <input type="number" name="jumlah_bonus" id="basic-icon-default-company" class="form-control" />
                                </div>
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