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
                        <input class="form-control" type="file" name="foto[customer]" id="formFile" />
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
                        <label for="formFile" class="form-label">Foto Paspor</label>
                        <input class="form-control" type="file" name="foto[paspor]" id="formFile" />
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Paspor Hal2</label>
                        <input class="form-control" type="file" name="foto[paspor2]" id="formFile" />
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
                        <input class="form-control" type="file" name="foto[ktp]" id="formFile" />
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Kartu Keluarga</label>
                        <input class="form-control" type="file" name="foto[keluarga]" id="formFile" />
                      </div>

                       <!-- <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Kartu Rekening</label>
                        <input class="form-control" type="file" name="foto_kartu_keluarga" id="formFile" />
                      </div> -->

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Akta kelahiran</label>
                        <input class="form-control" type="file" name="foto[akte]" id="formFile" />
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Foto BPJS</label>
                        <input class="form-control" type="file" name="foto[bpjs]" id="formFile" />
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