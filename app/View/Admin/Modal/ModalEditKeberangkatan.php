<div class="modal fade" id="ModalEditKeberangkatan<?= $d['keberangkatan_id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/admin/edit-keberangkatan" method="POST">
                <input type="hidden" name="keberangkatan_id" value="<?= $d['keberangkatan_id'] ?>">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Keberangkatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                          <label for="pkt" class="form-label">Pilih Paket</label>
                          <select id="pkt" name="paket_id" class="form-select">
                            <?php foreach ($data['dataPaket'] as $p) : ?>
                              <option <?= ($d['nama'] == $p['nama']) ? 'selected' : '' ?> value="<?= $p['paket_id'] ?>"><?= $p['nama'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="sts" class="form-label">Pilih keberangkatan</label>
                          <select id="sts" name="keberangkatan_dari" class="form-select">
                              <option <?= ($d['keberangkatan_dari'] == "Surabaya") ? 'selected' : '' ?> value="Surabaya">Surabaya</option>
                              <option <?= ($d['keberangkatan_dari'] == "Jakarta") ? 'selected' : '' ?> value="Jakarta">Jakarta</option>
                              <option value="Jakarta">Jakarta</option>
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="sts" class="form-label">Status</label>
                          <select id="sts" name="status" class="form-select">
                                <option <?= ($d['status'] == "Belum Berangkat") ? 'selected' : '' ?> value="Belum Berangkat">Belum Berangkat</option>
                                <option <?= ($d['status'] == "Sedang Berangkat") ? 'selected' : '' ?> value="Sedang Berangkat">Sedang Berangkat</option>
                                <option <?= ($d['status'] == "Selesai Berangkat") ? 'selected' : '' ?> value="Selesai Berangkat">Selesai Berangkat</option>
                          </select>
                        </div>
                
                        <div class="mb-3">
                        <label for="html5-date-input" class=" col-form-label">Tanggal Keberangkatan</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="tanggal" value="<?= $d['tanggal'] ?>" id="html5-date-input" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="html5-date-input" class=" col-form-label">Tanggal Ditutup</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="tanggal_ditutup" value="<?= $d['tanggal_ditutup'] ?>" id="html5-date-input" />
                        </div>
                    </div>
                     
                    <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Seats</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="number" name="seats" value="<?= $d['seats'] ?>" id="basic-icon-default-company" class="form-control" />
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