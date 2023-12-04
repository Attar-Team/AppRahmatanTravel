<div class="modal fade" id="ModalTambahArtikel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Artikel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/tambah-artikel" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="JudulArtikel" class="form-label">Judul Artikel</label>
                        <input type="text" name="judul_artikel" id="JudulArtikel" class="form-control" placeholder="Enter Name" />
                    </div>
                </div>

                <div class="row">
                <div class="col mb-0">
                        <label for="Foto" class="form-label">Foto</label>
                        <input type="file" id="Foto" name="foto" class="form-control" placeholder="xxxx@xxx.xx" />
                    </div>
                </div>
                
                <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-message">Isi deskripsi</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"
                              ><i class="bx bx-comment"></i
                            ></span>
                            <textarea
                              id="basic-icon-default-message"
                              class="form-control"
                              name="isi"
                            ></textarea>
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