<div class="modal fade" id="ModalTambahKeberangkatan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/admin/tambah-keberangkatan" method="POST">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Keberangkatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                          <label for="sts" class="form-label">Pilih Paket</label>
                          <select id="sts" name="paket_id" class="form-select">
                            <?php foreach ($data['dataPaket'] as $d) : ?>
                              <option value="<?= $d['paket_id'] ?>"><?= $d['nama'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="sts" class="form-label">Pilih keberangkatan</label>
                          <select id="sts" name="keberangkatan_dari" class="form-select">
                              <option value="Surabaya">Surabaya</option>
                              <option value="Jakarta">Jakarta</option>
                          </select>
                        </div>
                
                        <div class="mb-3">
                        <label for="html5-date-input" class=" col-form-label">Tanggal Keberangkatan</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="tanggal_keberangkatan" id="html5-date-input" />
                        </div>
                    </div>
         
                    <div class="mb-3">
                        <label for="html5-date-input" class=" col-form-label">Tanggal Ditutup</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="tanggal_ditutup" id="html5-date-input" />
                        </div>
                    </div>

                    <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Seats</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="number" name="seats" id="basic-icon-default-company" class="form-control" />
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