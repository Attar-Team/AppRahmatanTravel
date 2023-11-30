<div class="modal fade" id="ModalTambahGalery" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/admin/tambah-galery" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="galery_id" value="<?= $d['galery_id'] ?>" id="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Galery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Judul</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i
                                            class="bx bx-buildings"></i></span>
                                    <input type="text" name="judul" id="basic-icon-default-company" class="form-control" />
                                </div>
                            </div>

                            <div class="mb-3">
                        <label for="formFile" class="form-label">Foto </label>
                        <img width="200px" class="m-3 rounded shadow" src="" id="outputBrosur" alt="">
                        <input id="imgInpBrosur" class="form-control" type="file" name="foto" />
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