<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rahmatan Travel</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


</head>

<body>
    <div class="urutan" style="padding-top: 30px!important;height: 100px;" id="urutan1">
        <div class="box">
            <p class="order-active-p"><span class="order-active">1</span> Biodata</p>
            <span class="line"></span>
            <p><span>2</span> Pasport</p>
            <span class="line"></span>
            <p><span>3</span>Dokument</p>
        </div>
    </div>

    <div class="urutan" style="padding-top: 30px!important;height: 100px;display: none;" id="urutan2">
        <div class="box">
            <p><span>1</span> Biodata</p>
            <span class="line"></span>
            <p class="order-active-p"><span class="order-active">2</span> Pasport</p>
            <span class="line"></span>
            <p><span>3</span>Dokument</p>
        </div>
    </div>

    <div class="urutan" style="padding-top: 30px!important;height: 100px; display: none;" id="urutan3">
        <div class="box">
            <p><span>1</span> Biodata</p>
            <span class="line"></span>
            <p><span>2</span> Pasport</p>
            <span class="line"></span>
            <p class="order-active-p"><span class="order-active">3</span>Dokument</p>
        </div>
    </div>

    <div class="tambah-customer">
        <form action="tambah-jamaah-user" method="POST" enctype="multipart/form-data">
            <div class="container" id="step1">
             <div class="d-flex" style="gap: 10px;">
             <div class="form-floating w-100 mb-3">
                    <input type="number" id="NIK" name="NIK" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">NIK</label>

                </div>
                <div class="form-floating w-100 mb-3">
                    <input type="text" id="nama" name="nama" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Nama</label>
                </div>
             </div>
                <label for="">Jenis Kelamin</label><br>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki - Laki"
                        id="jenis_kelamin" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Laki - Laki</label>
                </div>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="" id="jenis_kelamin"
                        value="option2">
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" id="no_telp" name="no_telp" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Nomor Telepon</label>
                </div>
                <div class="d-flex" style="gap: 10px;">
                <div class="form-floating w-100 mb-3">
                    <input type="text" id="lahir" name="tempat_lahir" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Tempat Lahir</label>
                </div>
                <div class="form-floating w-100 mb-3">
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Tanggal Lahir</label>
                </div>
                </div>
                <div class="form-floating mb-3">
                    <textarea id="alamat" name="alamat" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Alamat</label>
                </div>
                <div class="d-flex" style="gap: 10px;">
             <div class="form-floating w-100 mb-3">
                    <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Pekerjaan</label>

                </div>
                <div class="form-floating w-100 mb-3">
                    <input type="text" id="ukuran_baju" name="ukuran_baju" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Ukuran Baju</label>
                </div>
             </div>
             <label for="">Foto</label>
             <img id="outputCustomer" width="200px" class="m-1 rounded shadow" src=""  alt="">
                <div class="input-group mb-3">
                    <input type="file" class="form-control foto" name="foto[customer]" id="imgInpCustomer">
                </div>

                <button class="btn btn-primary"  id="next1">Selanjutnya</button>
            </div>

            <div class="container" id="step2" style="display: none;">
            <div class="d-flex" style="gap: 10px;">
            <div class="form-floating mb-3 w-100">
                    <input type="number" class="form-control" name="nomor_pasport" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Nomor Pasport</label>
                    <div class="requir" style="color: red;">
                        <small>* Tidak wajib di isi</small>
                    </div>
                </div>
                <div class="form-floating mb-3 w-100">
                    <input type="text" class="form-control" name="nama_pasport" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Nama Pasport</label>
                    <div class="requir" style="color: red;">
                        <small>* Tidak wajib di isi</small>
                    </div>
                </div>
             </div>
                
             <div class="d-flex" style="gap: 10px;">
                
             <div class="form-floating mb-3 w-100">
                 <input type="text"  name="tempat_penerbitan" class="form-control" id="floatingPassword" placeholder="Password">
                 <label for="floatingPassword">Tempat Penerbitan</label>
                 <div class="requir" style="color: red;">
                     <small>* Tidak wajib di isi</small>
                 </div>
             </div>
             <div class="form-floating mb-3 w-100">
                 <input type="date" name="tanggal_penerbitan" class="form-control" id="floatingPassword" placeholder="Password">
                 <label for="floatingPassword">Tanggal Penerbit</label>
                 <div class="requir" style="color: red;">
                     <small>* Tidak wajib di isi</small>
                 </div>
             </div>
             </div>

             <div class="d-flex" style="gap: 10px;">
            <div class="d-flex mb-3" style="flex-direction: column;">
            <label for="">Foto Pasport</label>
            <img id="outputPasport" width="200px" class="m-1 rounded shadow" src=""  alt="">
                    <div class="input-group">
                        <input type="file" name="foto[paspor]" class="form-control"id="imgInpPasport" >
                    </div>
                    <div style="color: red;">
                        <small>* Tidak wajib di isi</small>
                    </div>
                </div>

                <div class="d-flex mb-3" style="flex-direction: column;">
                <label for="">Foto Pasport hal 2</label>
                <img id="outputPasport2" width="200px" class="m-1 rounded shadow" src=""  alt="">
                    <div class="input-group">
                        <input type="file" class="form-control" name="foto[paspor2]" id="imgInpPasport2">
                    </div>
                    <div style="color: red;">
                        <small>* Tidak wajib di isi</small>
                    </div>
                </div>
        </div>
                <button class="btn btn-primary" id="back1">Kembali</button>
                <button class="btn btn-primary" id="next2">Selanjutnya</button>

            </div>

            <div class="container" id="step3" style="display: none;">

            <div class="d-flex" style="gap: 10px;">
            <div class="d-flex mb-3" style="flex-direction: column;">
            <label for="">Foto KTP</label>
            <img id="outputKtp" width="200px" class="m-1 rounded shadow" src=""  alt="">
                    <div class="input-group">
                        <input type="file" name="foto[ktp]" class="form-control" id="imgInpKtp">
                    </div>
                    <div style="color: red;">
                        <small>* Tidak wajib di isi</small>
                    </div>
                </div>

                <div class="d-flex mb-3" style="flex-direction: column;">
                <label for="">Foto kartu keluarga</label>
                <img id="outputKk" width="200px" class="m-1 rounded shadow" src=""  alt="">
                    <div class="input-group">
                        <input type="file" class="form-control" name="foto[keluarga]" id="imgInpKk">
                    </div>
                    <div style="color: red;">
                        <small>* Tidak wajib di isi</small>
                    </div>
                </div>
        </div>

        <div class="d-flex" style="gap: 10px;">
            <div class="d-flex mb-3" style="flex-direction: column;">
            <label for="">Foto buku rekening</label>
            <img id="outputRekening" width="200px" class="m-1 rounded shadow" src=""  alt="">
                    <div class="input-group">
                        <input type="file" name="foto[rekening]" class="form-control" id="imgInpRekening">
                    </div>
                    <div style="color: red;">
                        <small>* Tidak wajib di isi</small>
                    </div>
                </div>

                <div class="d-flex mb-3" style="flex-direction: column;">
                <label for="">Foto akte kelahiran</label>
                <img id="outputAkte" width="200px" class="m-1 rounded shadow" src=""  alt="">
                    <div class="input-group">
                        <input type="file" class="form-control" name="foto[kelahiran]" id="imgInpAkte">
                    </div>
                    <div style="color: red;">
                        <small>* Tidak wajib di isi</small>
                    </div>
                </div>
        </div>
               
        <div class="d-flex mb-3" style="flex-direction: column;">
                <label for="">Foto buku pernikahan</label>
                <img id="outputPernikahan" width="200px" class="m-1 rounded shadow" src=""  alt="">
                    <div class="input-group">
                        <input type="file" class="form-control" name="foto[pernikahan]" id="imgInpPernikahan">
                    </div>
                    <div style="color: red;">
                        <small>* Tidak wajib di isi</small>
                    </div>
                </div>

             


                <button class="btn btn-primary" id="back2">Kembali</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
    $(document).ready(function() {
        var step1 = $("#step1");
        var step2 = $("#step2");
        var step3 = $("#step3");
        var urutan1 = $("#urutan1");
        var urutan2 = $("#urutan2");
        var urutan3 = $("#urutan3");
        var next1 = $("#next1");
        var next2 = $("#next2");
        var back1 = $("#back1");
        var back2 = $("#back2");

        $(next1).click(function(e) {
            e.preventDefault();
            $(step1).hide();
            $(urutan1).hide();
            $(step2).show();
            $(urutan2).show();
        });

        $(next2).click(function(e) {
            e.preventDefault();
            $(step2).hide();
            $(urutan2).hide();
            $(step3).show();
            $(urutan3).show();
        });

        $(back1).click(function(e) {
            e.preventDefault();
            $(step1).show();
            $(urutan1).show();
            $(step2).hide();
            $(urutan2).hide();
        });
        $(back2).click(function(e) {
            e.preventDefault();
            $(step2).show();
            $(urutan2).show();
            $(step3).hide();
            $(urutan3).hide();
        });
    })
    </script>

    <script>
    // const nextButton1 = document.getElementById("next1");
    const step1Inputs = [document.getElementById("nama"), document.getElementById("NIK"), document.getElementById(
            "no_telp"), document.getElementById("lahir"), document.getElementById("alamat"), document
        .getElementById("jenis_kelamin"), document.getElementsByClassName("foto"), document.getElementById("tanggal_lahir"),document.getElementById("pekerjaan"),document.getElementById("ukuran_baju"),
    ];

    // function isStepFormValid(inputs) {
    //     return inputs.every(input => input.value.trim() !== "");
    // }

    // step1Inputs.forEach(input => {
    //     input.addEventListener("input", () => {
    //         nextButton1.disabled = !isStepFormValid(step1Inputs);
    //     });
    // });
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
  imgInpPernikahan.onchange = evt => {
    const [file] = imgInpPernikahan.files
    if (file) {
      outputPernikahan.src = URL.createObjectURL(file)
    }
  }
  imgInpRekening.onchange = evt => {
    const [file] = imgInpRekening.files
    if (file) {
      outputRekening.src = URL.createObjectURL(file)
    }
  }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/script.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>