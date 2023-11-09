<div class="container-xxl flex-grow-1 container-p-y">
<form method="POST" action="/admin/tambah-agen" enctype="multipart/form-data">
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data diri</h5>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">NIK</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-user"></i></span>
                            <input type="text" name="NIK" class="form-control"
                                id="basic-icon-default-fullname" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Nama</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-user"></i></span>
                            <input type="text" name="nama" class="form-control"
                                id="basic-icon-default-fullname" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Email</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-user"></i></span>
                            <input type="text" name="email" class="form-control"
                                id="basic-icon-default-fullname" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Jenis Kelamin</label>
                        <div class="input-group input-group-merge">
                            <div class="form-check me-3 mt-3">
                                <input name="jenis_kelamin" class="form-check-input" type="radio" value="Laki - Laki"
                                    id="defaultRadio1" />
                                <label class="form-check-label " for="defaultRadio1"> Laki - Laki </label>
                            </div>

                            <div class="form-check me-3 mt-3">
                                <input name="jenis_kelamin" class="form-check-input" type="radio" value="Perempuan"
                                    id="defaultRadio1" />
                                <label class="form-check-label" for="defaultRadio1"> Perempuan </label>
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">No telepon</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bx-buildings"></i></span>
                            <input type="number" name="no_telp" id="basic-icon-default-company" class="form-control" />
                        </div>
                    </div>

                    <div class="mb-3">

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-message">Alamat</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"><i
                                    class="bx bx-comment"></i></span>
                            <textarea id="basic-icon-default-message" class="form-control"
                                name="alamat"></textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Agen</label>
                        <img id="outputAgen" width="200px" class="m-3 rounded shadow" src=""  alt="">
                        <input class="form-control" id="imgInpAgen" type="file" name="foto_agen" />
                      </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
      <button type="submit" id="" class="btn btn-primary">Simpan <i class='bx bx-save' ></i></button>
    </div>
</form>
</div>

<script>
    imgInpAgen.onchange = evt => {
    const [file] = imgInpAgen.files
    if (file) {
      outputAgen.src = URL.createObjectURL(file)
    }
  }
  </script>