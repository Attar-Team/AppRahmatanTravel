<?php
    foreach($data['dataCustomer'] as $d):
?>
<div class="container-xxl flex-grow-1 container-p-y">
<?php
    if(isset($data['error'])){ ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
                        <?= $data['error'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
    <?php } ?>
<form method="POST" action="/admin/edit-customer" enctype="multipart/form-data">
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
                                    <input type="hidden" name="NIK" value="<?= $d->NIK ?>" >
                            <input disabled value="<?= $d->NIK ?>" type="text" class="form-control"
                                id="basic-icon-default-fullname" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Nama</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-user"></i></span>
                            <input type="text" name="nama" value="<?= $d->nama_customer ?>"  class="form-control"
                                id="basic-icon-default-fullname" />
                        </div>
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Email</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-user"></i></span>
                            <input type="text" name="email" value="<?= $d->email ?>"  class="form-control"
                                id="basic-icon-default-fullname" />
                        </div>
                    </div> -->
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Jenis Kelamin</label>
                        <div class="input-group input-group-merge">
                            <div class="form-check me-3 mt-3">
                                <input name="jenis_kelamin" class="form-check-input" type="radio" <?= ($d->jenis_kelamin == "Laki - Laki") ? "checked" : "" ?> value="Laki - Laki"
                                    id="defaultRadio1" />
                                <label class="form-check-label " for="defaultRadio1"> Laki - Laki </label>
                            </div>
                            <div class="form-check me-3 mt-3">
                                <input name="jenis_kelamin" class="form-check-input" type="radio" <?= ($d->jenis_kelamin == "Perempuan") ? "checked" : "" ?> value="Perempuan"
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
                            <input  type="number" name="no_telp" value="<?= $d->no_telp ?>" id="basic-icon-default-company" class="form-control" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Tempat Lahir</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bx-buildings"></i></span>
                            <input type="text" name="tempat_lahir" value="<?= $d->tempat_lahir ?>"  id="basic-icon-default-company"
                                class="form-control" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="tanggal_lahir"  value="<?= $d->tanggal_lahir ?>" id="html5-date-input" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Pekerjaan</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bx-buildings"></i></span>
                            <input type="text"  name="pekerjaan" value="<?= $d->pekerjaan ?>" id="basic-icon-default-company"
                                class="form-control" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Ukuran Baju</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bx-buildings"></i></span>
                            <input type="text" name="ukuran_baju" value="<?= $d->ukuran_baju ?>"  id="basic-icon-default-company"
                                class="form-control" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-message">Alamat</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"><i
                                    class="bx bx-comment"></i></span>
                            <textarea id="basic-icon-default-message" class="form-control"
                                name="alamat"><?= $d->alamat ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Customer</label>
                        <img id="outputCustomer" width="200px" class="m-3 rounded shadow" src="/uploads/foto_customer/<?= $d->foto ?>"  alt="">
                        <input type="hidden" name="foto_asli[customer]" value="<?= $d->foto ?>">
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
                            <input type="number"  name="nomor_pasport" value="<?= $d->nomor_pasport ?>" class="form-control"
                                id="basic-icon-default-fullname" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Nama Pasport</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-user"></i></span>
                            <input name="nama_pasport" value="<?= $d->nama_pasport ?>" type="text"  class="form-control"
                                id="basic-icon-default-fullname" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Tempat Penerbitan</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-user"></i></span>
                            <input type="text" name="tempat_penerbitan" value="<?= $d->tempat_penerbitan ?>"  class="form-control"
                                id="basic-icon-default-fullname" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal Penerbitan</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="tanggal_penerbitan"  value="<?= $d->tgl_penerbitan ?>" id="html5-date-input" />
                        </div>
                    </div>
             
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Pasport</label>
                        <img width="200px" class="m-3 rounded shadow" src="/uploads/foto_paspor/<?= $d->foto_paspor ?>" id="outputPasport" alt="">
                        <input type="hidden" name="foto_asli[paspor]" value="<?= $d->foto_paspor ?>">
                        <input class="form-control" type="file" name="foto_lama[paspor]" id="imgInpPasport" />
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Pasport Hal2</label>
                        <input type="hidden" name="foto_asli[paspor2]" value="<?= $d->foto_paspor_hal2 ?>">
                        <img width="200px" class="m-3 rounded shadow" src="/uploads/foto_paspor2/<?= $d->foto_paspor_hal2 ?>" id="outputPasport2" alt="">
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
                        <input type="hidden" name="foto_asli[ktp]" value="<?= $d->foto_ktp ?>">
                        <img width="200px" class="m-3 rounded shadow" src="/uploads/foto_ktp/<?= $d->foto_ktp ?>" id="outputKtp" alt="">
                        <input class="form-control" type="file" name="foto[ktp]" id="imgInpKtp" />
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Kartu Keluarga</label>
                        <input type="hidden" name="foto_asli[keluarga]" value="<?= $d->foto_kartu_keluarga ?>">
                        <img width="200px" class="m-3 rounded shadow" src="/uploads/foto_keluarga/<?= $d->foto_kartu_keluarga ?>" id="outputKk" alt="">
                        <input class="form-control" type="file" name="foto[keluarga]" id="imgInpKk" />
                      </div>

                       <!-- <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Kartu Rekening</label>
                        <input class="form-control" type="file" name="foto_kartu_keluarga" id="formFile" />
                      </div> -->

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Akta kelahiran</label>
                        <input type="hidden" name="foto_asli[akte]" value="<?= $d->foto_akte_kelahiran ?>">
                        <img width="200px" class="m-3 rounded shadow" src="/uploads/foto_akte/<?= $d->foto_akte_kelahiran ?>" id="outputAkte" alt="">
                        <input class="form-control" type="file" name="foto[akte]" id="imgInpAkte" />
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Buku rekening</label>
                        <input type="hidden" name="foto_asli[rekening]" value="<?= $d->foto_buku_rekening ?>">
                        <img width="200px" class="m-3 rounded shadow" src="/uploads/foto_rekening/<?= $d->foto_buku_rekening ?>" id="outputRekening" alt="">
                        <!-- <img width="200px" class="m-3 rounded shadow" src="" id="outputBpjs" alt="/uploads/foto_bpjs/<?= $d->foto_bpjs ?>"> -->
                        <input class="form-control" type="file" name="foto[rekening]" id="imgInpRekening" />
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Buku Pernikahan</label>
                        <input type="hidden" name="foto_asli[pernikahan]" value="<?= $d->foto_buku_pernikahan ?>">
                        <img width="200px" class="m-3 rounded shadow" src="/uploads/foto_pernikahan/<?= $d->foto_buku_pernikahan ?>" id="outputAkte" alt="">
                        <!-- <img width="200px" class="m-3 rounded shadow" src="" id="outputBpjs" alt="/uploads/foto_bpjs/<?= $d->foto_bpjs ?>"> -->
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
<?php endforeach; ?>

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