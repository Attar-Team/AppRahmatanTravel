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

<body style="background-color: #E9EAEC;">

<form action="/pemesanan" method="POST">
                        

        <div class="urutan" id="urutan1">
            <div class="box">
                <p class="order-active-p"><span class="order-active">1</span> Detail Pemesanan</p>
                <span class="line"></span>
                <p><span>2</span> Pembayaran</p>
                <span class="line"></span>
                <p><span>3</span> Detail Pemesanan</p>
            </div>
        </div>
        <div class="urutan" id="urutan2" style="display: none;">
            <div class="box">
                <p><span>1</span> Detail Pemesanan</p>
                <span class="line"></span>
                <p class="order-active-p"><span class="order-active">2</span> Pembayaran</p>
                <span class="line"></span>
                <p><span>3</span> Detail Pemesanan</p>
            </div>
        </div>
        <?php
                    foreach($data['keberangkatan'] as $k) : 
                        $termasukHarga = explode(",", $k->termasuk_harga);
                        $tidakTermasukHarga = explode(",", $k->tidak_termasuk_harga);
                        $keunggulan = explode(",", $k->keunggulan);
                        ?>
        <div class="pemesanan" id="form-1">
        <input type="hidden" name="keberangkatan_id" value="<?= $k->keberangkatan_id  ?>">
                <input type="hidden" name="total_tagihan">
            
            <div class="pemesanan-container">
                <div class="detail-pemesanan " id="">
                    <div class="d-flex mb-3" style="justify-content: space-between;">
                        <h2>Data jamaah</h2>
                        <a href="/tambah-jamaah/<?= $k->keberangkatan_id ?>" class="btn btn-orange">Tambah profile Jamaah</a>
                    </div>

                    <div class="inp-group">
                        <div class="customer mb-2">
                            <h3>Jamaah 1</h3>
                            <div class="form-floating my-3">
                                <select class="form-select" name="customer_id[]" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <?php if($data['profile'] == 0) { ?>
                                    <option value="" selected>Belum ada profile harus ditambahkan dahulu</option>
                                    <?php 
                                    }else{
                                    foreach($data['profile'] as $p) : ?>
                                    <option value="<?= $p['NIK'] ?>"><?= $p['nama_customer'] ?></option>
                                    <?php endforeach;} ?>
                                </select>
                                <label for="floatingSelect">Pilih profile</label>
                            </div>

                            <div class="harga">
                                <h3>Variasi Harga</h3>
                                <?php 
                                    foreach($data['harga'] as $h) :
                                ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="1"
                                        value="<?=  $h['nama_jenis'] ?>,<?= $h['harga'] ?>,<?= $h['harga_paket_id'] ?>">
                                    <label class="form-check-label" for="inlineRadio1"><?= $h['nama_jenis'] ?> <br> Rp.
                                        <?= $h['harga'] ?></label>
                                </div>
                                <?php endforeach; ?>
                            </div>

                        </div>

                    </div>
                    <a href="" class="btn btn-orange w-100 mt-3 add-inp">tambah</a>

                    <div class="customer mt-4">
                        <h3>Ringkasan</h3>
                        
                            <!-- <div class="d-flex">
                    <div class="form-floating mb-3 w-100 me-2">
                        <input type="text" class="form-control" id="namaInput" placeholder="Password">
                        <label for="namaInput">Nama</label>
                    </div>
                    <div class="form-floating  w-100">
                        <input type="number" class="form-control" id="noTelpInput" placeholder="Password">
                        <label for="noTelpInput">No telepon</label>
                    </div>
                </div> -->
                            <div class="d-flex mb-3" style="align-items: center; gap: 20px;">
                                <div class="form-floating w-100">
                                    <input type="text" class="form-control" id="kodeReferal" placeholder="Password">
                                    <label for="alamatinput">Kode Referal Agen</label>
                                </div>
                                <div>
                                    <input type="hidden" name="agen_id" id="agenId">
                                        <button type="button" class="btn btn-orange" id="btnCekReferal">Check</button>
                                    <!-- <a href="#" id="btnCekReferal" class="btn btn-orange">Check</a> -->
                                </div>
                            </div>
                            <p id="result-agen"></p>
                            <div class="form-floating mb-3">
                                <textarea name="catatan_pemesanan" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Comments</label>
                            </div>

                            <h4>#Pesanan</h4>
                            <div class="total-group">

</div>
                            

                            <div class="d-flex pt-2" style="justify-content: space-between;border-top: 1px solid #ddd;">
                                <h5>Total</h5>
                                <h5 id="total">0</h5>
                            </div>


     

                    </div>
                </div>
              

                <div class="paket-cont">
                    <div class="detail-pkt">
                        <div class="header-detail">
                            <img src="/uploads/foto_brosur/<?= $k->foto_brosur ?>" class="rounded shadow" width="150px"
                                alt="">
                            <h2><?= $k->nama ?></h2>

                        </div>
                        <div class="body-detail">
                            <div class="ket">
                                <div class="ttl">
                                    <i class="fa-solid fa-plane-departure"></i>
                                    <p>Keberangkatan Dari</p>
                                </div>
                                <div class="isi">
                                    <?= $k->keberangkatan_dari ?>
                                </div>
                            </div>
                            <div class="ket">
                                <div class="ttl">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <p>Jadwal Keberangkatan</p>
                                </div>
                                <div class="isi">
                                    <?= $k->tanggal ?>
                                </div>
                            </div>
                            <div class="ket">
                                <div class="ttl">
                                    <i class="fa-solid fa-clock"></i>
                                    <p>Durasi paket</p>
                                </div>
                                <div class="isi">
                                    <?= $k->lama_hari ?> hari
                                </div>
                            </div>
                            <div class="ket">
                                <div class="ttl">
                                    <i class="fa-solid fa-user"></i>
                                    <p>Total Seat</p>
                                </div>
                                <div class="isi">
                                    <?= $k->seats ?> pax
                                </div>
                            </div>
                            <div class="ket">
                                <div class="ttl">
                                    <i style="font-weight: bolder; color:#13C100" class="fa-solid fa-user"></i>
                                    <p style="font-weight: bolder; color:#13C100">Available Seat</p>
                                </div>
                                <div class="isi " style="font-weight: bolder; color:#13C100">
                                    20 pax
                                </div>
                            </div>
                            <div class="ket">
                                <div class="ttl">
                                    <i class="fa-solid fa-hotel"></i>
                                    <p>Hotel</p>
                                </div>
                                <?php foreach($data['bintang'] as $b) : ?>
                                <div class="isi" style="color:#FF6600;">
                                    <?php  if($b['bintang'] == 1) { ?>
                                    <i class="fa-solid fa-star"></i>
                                    <?php }else if($b['bintang'] == 2){?>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <?php }else if($b['bintang'] == 3){?>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <?php }else if($b['bintang'] == 4){?>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <?php }else if($b['bintang'] == 5){?>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <?php } ?>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="ket">
                                <div class="ttl">
                                    <i class="fa-solid fa-plane"></i>
                                    <p>Maskapai</p>
                                </div>
                                <div class="isi">
                                    <?= $k->maskapai ?>
                                </div>
                            </div>
                            <div class="ket">
                                <div class="ttl">
                                    <i class="fa-solid fa-plane"></i>
                                    <p>Termasuk harga</p>
                                </div>
                                <div class="isi">
                                    <ul>
                                        <?php foreach($termasukHarga as $t){ ?>
                                        <li><?= $t ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="ket">
                                <div class="ttl">
                                    <i class="fa-solid fa-plane"></i>
                                    <p>Tidak Termasuk harga</p>
                                </div>
                                <div class="isi">
                                    <ul>
                                        <?php foreach($tidakTermasukHarga as $t){ ?>
                                        <li><?= $t ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="ket">
                                <div class="ttl">
                                    <i class="fa-solid fa-plane"></i>
                                    <p>Keunggulan</p>
                                </div>
                                <div class="isi">
                                    <ul>
                                        <?php foreach($keunggulan as $t){ ?>
                                        <li><?= $t ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>

            <div class="mb-5" style="padding: 0 100px;">
                <button class="btn w-100 btn-orange" id="next-1">selanjutnya</button>
            </div>

        </div>
        <?php endforeach; ?>

        <div class="pembayaran" id="form-2" style="display: none;">
            <div class="total">
            
                <h4>Rincian Pembayaran</h4>
              
                <div id="total-pembayaran">

                </div>

                <ul class="p-0" style="font-size: 23px;font-weight: bolder;">
                    <li>total</li>
                    <li id="total-bayar">0</li>
                </ul>
            </div>

            <div class="pilih-pembayaran">
                <h4 class="mb-4">Pilih pembayaran</h4>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="checkCash" name="jenis_pembayaran"
                        id="inlineRadio1" value="cash">
                    <label class="form-check-label chck" for="inlineRadio1"><i class="fa-solid fa-money-bill"></i>
                        Cash</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="checkTransfer" type="radio" name="jenis_pembayaran"
                        id="inlineRadio1" value="transfer">
                    <label class="form-check-label chck" for="inlineRadio1"><i
                            class="fa-solid fa-money-bill-transfer"></i> Transfer</label>
                </div>


                <div class="bank my-3" style="display: none;" id="transfer">
                    <h4>Pilih Bank</h4>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="option1">
                        <label class="form-check-label" for="inlineRadio1">
                            <div class="d-flex align-items-center">
                                <img src="/image/logo-bca.png" width="150px" alt="">
                                <div class="ms-3">
                                    <h5>BCA</h5>
                                    <p class="m-0">3453453452464</p>
                                    <p class="m-0">Rahmatan Travel</p>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="option1">
                        <label class="form-check-label" for="inlineRadio1">
                            <div class="d-flex align-items-center">
                                <img src="/image/logo-bca.png" width="150px" alt="">
                                <div class="ms-3">
                                    <h5>BCA</h5>
                                    <p class="m-0">3453453452464</p>
                                    <p class="m-0">Rahmatan Travel</p>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="option1">
                        <label class="form-check-label" for="inlineRadio1">
                            <div class="d-flex align-items-center">
                                <img src="/image/logo-bca.png" width="150px" alt="">
                                <div class="ms-3">
                                    <h5>BCA</h5>
                                    <p class="m-0">3453453452464</p>
                                    <p class="m-0">Rahmatan Travel</p>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>





            <div class="accordion my-5" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            <img src="/image/logo-bca.png" width="50px" alt=""> Transfer
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <ul>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, provident.</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic modi nostrum
                                    perferendis tempore architecto officiis qui esse debitis laboriosam obcaecati?</li>
                                <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id ducimus expedita
                                    molestiae recusandae obcaecati est?</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo">
                            Cash
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <ul>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, provident.</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic modi nostrum
                                    perferendis tempore architecto officiis qui esse debitis laboriosam obcaecati?</li>
                                <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id ducimus expedita
                                    molestiae recusandae obcaecati est?</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                            Talangan
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <ul>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, provident.</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic modi nostrum
                                    perferendis tempore architecto officiis qui esse debitis laboriosam obcaecati?</li>
                                <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id ducimus expedita
                                    molestiae recusandae obcaecati est?</li>
                            </ul>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="mb-5" style="padding: 0 100px;">
                <button type="button" class="btn w-100 btn-warning mb-3" id="back-1">Kembali</button>
                <button type="submit" class="btn w-100 btn-orange" >Pesan</button>
            </div>
       
        </div>
    </form>
    <script type="text/javascript">
    $(document).ready(function() {
        
        var max_field = 10;
        var wraper = $(".inp-group");
        var addButton = $(".add-inp");
        var wraperTotal = $(".total-group");
        var x = 1;
        $(addButton).click(function(e) {
            e.preventDefault();
            if (x < max_field) {
                x++
                console.log(x)
                $(wraper).append(
                    '<div class="customer mb-2"><h3>Jamaah ' + x +
                    '</h3><div class="form-floating my-3"><select class="form-select" name="customer_id[]" id="floatingSelect"aria-label="Floating label select example"><?php if($data["profile"] == 0) { ?><option value="" selected>Belum ada profile harus ditambahkan dahulu</option><?php }else{foreach($data['profile'] as $p) : ?><option value="<?= $p['NIK'] ?>"><?= $p['nama_customer'] ?></option><?php endforeach;} ?></select><label for="floatingSelect">Pilih profile</label></div><div class="harga"><h3>Variasi Harga</h3><?php foreach($data['harga'] as $h) :?><div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="add_box" name="' +
                    x +
                    '"  value="<?=  $h['nama_jenis'] ?>,<?=  $h['harga'] ?>,<?= $h['harga_paket_id'] ?>"><label class="form-check-label" for="inlineRadio1"><?= $h['nama_jenis'] ?> <br> Rp. <?= $h['harga'] ?></label></div><?php endforeach; ?></div><a href="" class="btn btn-danger remove-field" id="hps">hapus</a></div>'
                )
            }
        });
        $(wraper).on("click", ".remove-field", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })

        var sum = 0;
        var total = 0;
        var result = [];
        var arr = [];

        $(wraper).on("change", $(":input[type=radio]"), function() {
            result.length = 0
            var a = $(":input[type=radio][id=add_box]:checked");
            console.log(a.length);
            for (var i = 0; i <= a.length; i++) {
                var no = i + 1;
                var string = $(":input[type=radio][name=" + no + "]:checked").val();
                arr = string.split(',');
                result.push(arr);
            }
            tampilTotal();
        })
        //function untuk menambahkan total 
        function tampilTotal() {
            $(wraperTotal).children().remove();
            for (var i = 0; i < result.length; i++) {
                $(wraperTotal).append(
                    '<div class="d-flex px-3" id="list" style="justify-content: space-between;"><p>'+result[i][0]+'</p><p>'+result[i][1]+'</p></div>'
                    );
                    }
                    sum = 0;
            for (var i = 0; i < result.length; i++) {
                sum += parseInt(result[i][1]) ;
            }
            $("#total").html(sum);
        }
        var btnCheck = $("#btnCekReferal");
        $(btnCheck).click(function(){
            var xhr = new XMLHttpRequest();
            xhr.onload = function(){  
                var data = xhr.responseText;     
                var hasil = data.split(',');
                $("#result-agen").html(hasil[0])

                if(xhr.responseText != "tidak ada"){
                    $("#agenId").val(hasil[1]);
                }
            }
            var url;
            if($("#kodeReferal").val() == ""){
                url = 'http://rahmatan.travel/check-referal/1';
            }else{
                url = 'http://rahmatan.travel/check-referal/'+$("#kodeReferal").val();
            }    
            xhr.open('GET', url, true);
            xhr.send();
        })

        $(wraper).on("click", "#hps", function() {
            result.length = 0
            var a = $(":input[type=radio][id=add_box]:checked");
            console.log(a.length);
            for (var i = 0; i <= a.length; i++) {
                var no = i + 1;
                var string = $(":input[type=radio][name=" + no + "]:checked").val();
                arr = string.split(',');
                result.push(arr);
            }
            tampilTotal();
        })

        function totalPembayaran()
        {
            $("#total-pembayaran").children().remove();
            for (var i = 0; i < result.length; i++) {
                $("#total-pembayaran").append(
                    '<ul><li>'+result[i][0]+'</li><li>'+result[i][1]+'</li></ul>'
                    );
                    }
                    $("#total-bayar").html(sum);
                    $("input[type=hidden][name=total_tagihan]").val(sum);
        }
        var form1 = $("#form-1");
        var form2 = $("#form-2");
        var urutan1 = $("#urutan1");
        var urutan2 = $("#urutan2");
        var next1 = $("#next-1");
        var back1 = $("#back-1");

        $(next1).click(function(e) {
            totalPembayaran();
            e.preventDefault();
            $(form1).hide();
            $(urutan1).hide();
            $(form2).show();
            $(urutan2).show();
        });

        $(back1).click(function(e){
            e.preventDefault();
            $(form1).show();
            $(urutan1).show();
            $(form2).hide();
            $(urutan2).hide();
        })

        $checkTransfer = $("#checkTransfer");
        $checkCash = $("#checkCash");
        $checkTalangan = $("#checkTalangan");
        $transfer = $("#transfer");

        $(checkTransfer).change(function(e) {
            e.preventDefault();
            $(transfer).show();
        });

        $($checkCash).change(function(e) {
            e.preventDefault();
            $(transfer).hide();
        });

        $($checkTalangan).change(function(e) {
            e.preventDefault();
            $(transfer).hide();
        });

       

    })
    </script>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- <script src="/script.js"></script> -->
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>