<div class="container-xxl flex-grow-1 container-p-y">
<form method="POST" action="/admin/tambah-customer" enctype="multipart/form-data">
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
                        <label class="form-label" for="basic-icon-default-company">Tempat Lahir</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bx-buildings"></i></span>
                            <input type="text" name="tempat_lahir" id="basic-icon-default-company"
                                class="form-control" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="tanggal_lahir" id="html5-date-input" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Pekerjaan</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bx-buildings"></i></span>
                            <input type="text" name="pekerjaan" id="basic-icon-default-company"
                                class="form-control" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Ukuran Baju</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bx-buildings"></i></span>
                            <input type="text" name="ukuran_baju" id="basic-icon-default-company"
                                class="form-control" />
                        </div>
                    </div>

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
                        <label for="formFile" class="form-label">Foto Customer</label>
                        <img id="outputCustomer" width="200px" class="m-3 rounded shadow" src=""  alt="">
                        <input class="form-control" id="imgInpCustomer" type="file" name="foto[customer]" />
                      </div>

                </div>
            </div>
        </div>

        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Pasport</h5>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Nomor Pasport</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-user"></i></span>
                            <input type="number" name="nomor_pasport" class="form-control"
                                id="basic-icon-default-fullname" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Nama Pasport</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-user"></i></span>
                            <input type="text" name="nama_pasport" class="form-control"
                                id="basic-icon-default-fullname" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Tempat Penerbitan</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-user"></i></span>
                            <input type="text" name="tempat_penerbitan" class="form-control"
                                id="basic-icon-default-fullname" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal Penerbitan</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="tanggal_penerbitan" id="html5-date-input" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Pasport</label>
                        <img width="200px" class="m-3 rounded shadow" src="" id="outputPasport" alt="">
                        <input class="form-control" type="file" name="foto[paspor]" id="imgInpPasport" />
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Pasport Hal2</label>
                        <img width="200px" class="m-3 rounded shadow" src="" id="outputPasport2" alt="">
                        <input class="form-control" type="file" name="foto[paspor2]" id="imgInpPasport2" />
                      </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Dokument</h5>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto KTP</label>
                        <img width="200px" class="m-3 rounded shadow" src="" id="outputKtp" alt="">
                        <input class="form-control" type="file" name="foto[ktp]" id="imgInpKtp" />
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Kartu Keluarga</label>
                        <img width="200px" class="m-3 rounded shadow" src="" id="outputKk" alt="">
                        <input class="form-control" type="file" name="foto[keluarga]" id="imgInpKk" />
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Buku Rekening</label>
                        <img width="200px" class="m-3 rounded shadow" src="" id="outputRekening" alt="">
                        <input class="form-control" type="file" name="foto[rekening]" id="imgInpRekening" />
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Akta kelahiran</label>
                        <img width="200px" class="m-3 rounded shadow" src="" id="outputAkte" alt="">
                        <input class="form-control" type="file" name="foto[akte]" id="imgInpAkte" />
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Buku Pernikahan</label>
                        <img width="200px" class="m-3 rounded shadow" src="" id="outputPernikahan" alt="">
                        <input class="form-control" type="file" name="foto[pernikahan]" id="imgInpPernikahan" />
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
    imgInpCustomer.onchange = evt => {
    const [file] = imgInpCustomer.files
    if (file) {
      outputCustomer.src = URL.createObjectURL(file)
    }
  }
  imgInpPasport.onchange = evt => {
    const [file] = imgInpPasport.files
    if (file) {
      outputPasport.src = URL.createObjectURL(file)
    }
  }
  imgInpPasport2.onchange = evt => {
    const [file] = imgInpPasport2.files
    if (file) {
      outputPasport2.src = URL.createObjectURL(file)
    }
  }
  imgInpKtp.onchange = evt => {
    const [file] = imgInpKtp.files
    if (file) {
      outputKtp.src = URL.createObjectURL(file)
    }
  }
  imgInpKk.onchange = evt => {
    const [file] = imgInpKk.files
    if (file) {
      outputKk.src = URL.createObjectURL(file)
    }
  }
  imgInpAkte.onchange = evt => {
    const [file] = imgInpAkte.files
    if (file) {
      outputAkte.src = URL.createObjectURL(file)
    }
  }
  imgInpBpjs.onchange = evt => {
    const [file] = imgInpBpjs.files
    if (file) {
      outputBpjs.src = URL.createObjectURL(file)
    }
  }
</script>