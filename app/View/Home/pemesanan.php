<form action="">
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

    <div class="pemesanan" id="form-1">
        <div class="pemesanan-container">
            <div class="detail-pemesanan " id="">
                <h2>Tambah data jamaah</h2>

                <div class="customer mb-2">
                    <h3>Jamaah 1</h3>
                    <div class="form-floating my-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Belum ada profile harus ditambahkan dahulu</option>
                        </select>
                        <label for="floatingSelect">Pilih profile</label>
                    </div>

                    <div class="harga">
                        <h3>Variasi Harga</h3>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">QUAD <br> Rp. 32,000,000</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio1">QUAD <br> Rp. 32,000,000</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio1">QUAD <br> Rp. 32,000,000</label>
                        </div>
                    </div>



                </div>
                <div class="inp-group">

                </div>
                <a href="" class="btn btn-primary w-100 mt-3 add-inp">tambah</a>

                <div class="customer mt-4">
                    <h3>Ringkasan</h3>
                    <form action="">
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
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="alamatinput" placeholder="Password">
                            <label for="alamatinput">Kode Referal Agen</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Comments</label>
                        </div>

                        <h4>#Pesanan</h4>
                        <div class="d-flex px-3" style="justify-content: space-between;">
                            <p>[Quad] x1</p>
                            <p>Rp. 32,000,000</p>
                        </div>
                        <div class="d-flex px-3" style="justify-content: space-between;">
                            <p>[Triple] x1</p>
                            <p>Rp. 33,000,000</p>
                        </div>

                        <div class="d-flex pt-2" style="justify-content: space-between;border-top: 1px solid #ddd;">
                            <h5>Total</h5>
                            <h5>Rp. 33,000,000</h5>
                        </div>


                    </form>

                </div>
            </div>

            <div class="paket-cont">
                <div class="detail-pkt">
                    <div class="header-detail">
                        <h2>Nama Pakeet</h2>
                        <p><i class="fa-solid fa-calendar-days"></i> Keberangkatan : 20 Desember 2023</p>
                    </div>
                    <div class="body-detail">
                        <div class="ket">
                            <div class="ttl">
                                <i class="fa-solid fa-calendar-days"></i>
                                <p>Jadwal Keberangkatan</p>
                            </div>
                            <div class="isi">
                                15 mar 24
                            </div>
                        </div>
                        <div class="ket">
                            <div class="ttl">
                                <i class="fa-solid fa-clock"></i>
                                <p>Durasi paket</p>
                            </div>
                            <div class="isi">
                                15 hari
                            </div>
                        </div>
                        <div class="ket">
                            <div class="ttl">
                                <i class="fa-solid fa-user"></i>
                                <p>Total Seat</p>
                            </div>
                            <div class="isi">
                                40 pax
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
                            <div class="isi" style="color:#FF6600;">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <div class="ket">
                            <div class="ttl">
                                <i class="fa-solid fa-plane"></i>
                                <p>Maskapai</p>
                            </div>
                            <div class="isi">
                                Garuda
                            </div>
                        </div>
                        <div class="ket">
                            <div class="ttl">
                                <i class="fa-solid fa-plane"></i>
                                <p>Termasuk harga</p>
                            </div>
                            <div class="isi">
                                <ul>
                                    <li>Tiket pesawat</li>
                                    <li>Hotel</li>
                                    <li>Visa</li>
                                    <li>Tiket pesawat</li>
                                    <li>Hotel</li>
                                    <li>Visa</li>
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
                                    <li>Tiket pesawat</li>
                                    <li>Hotel</li>
                                    <li>Visa</li>
                                    <li>Tiket pesawat</li>
                                    <li>Hotel</li>
                                    <li>Visa</li>
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
                                    <li>Tiket pesawat</li>
                                    <li>Hotel</li>
                                    <li>Visa</li>
                                    <li>Tiket pesawat</li>
                                    <li>Hotel</li>
                                    <li>Visa</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5" style="padding: 0 100px;">
            <button class="btn w-100 btn-primary" id="next-1">selanjutnya</button>
        </div>

    </div>
    
    <div class="pembayaran" id="form-2" style="display: none;">
    <div class="total">
        <h2>Total Pembayaran</h2>
        <ul>
            <li>total</li>
            <li>32,000,000</li>
        </ul>
        <ul>
            <li>total</li>
            <li>32,000,000</li>
        </ul>
        <ul>
            <li>total</li>
            <li>32,000,000</li>
        </ul>
    </div>
    
    <div class="pilih-pembayaran">
      <h4 class="mb-4">Pilih pembayaran</h4>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio"  id="checkCash" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        <label class="form-check-label chck" for="inlineRadio1"><i class="fa-solid fa-money-bill"></i> Cash</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" id="checkTransfer" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        <label class="form-check-label chck" for="inlineRadio1"><i class="fa-solid fa-money-bill-transfer"></i> Transfer</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio"  id="checkTalangan" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        <label class="form-check-label chck" for="inlineRadio1"><i class="fa-solid fa-cart-shopping"></i> Talangan</label>
    </div>

    <div class="bank my-3" style="display: none;" id="transfer">
        <h4>Pilih Bank</h4>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
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
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
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
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
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
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
       <img src="image/logo-bca.png" width="50px" alt=""> BCA
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
        <ul>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, provident.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic modi nostrum perferendis tempore architecto officiis qui esse debitis laboriosam obcaecati?</li>
            <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id ducimus expedita molestiae recusandae obcaecati est?</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        BRI
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body">
      <ul>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, provident.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic modi nostrum perferendis tempore architecto officiis qui esse debitis laboriosam obcaecati?</li>
            <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id ducimus expedita molestiae recusandae obcaecati est?</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        BSI
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body">
      <ul>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, provident.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic modi nostrum perferendis tempore architecto officiis qui esse debitis laboriosam obcaecati?</li>
            <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id ducimus expedita molestiae recusandae obcaecati est?</li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
    <script type="text/javascript">
    $(document).ready(function() {
        var max_field = 10;
        var wraper = $(".inp-group");
        var addButton = $(".add-inp");
        var x = 1;
        $(addButton).click(function(e) {
            e.preventDefault();
            if (x < max_field) {
                x++
                console.log(x)
                $(wraper).append(
                    '<div class="customer mb-2"><h3>Jamaah 1</h3><div class="form-floating my-3"><select class="form-select" id="floatingSelect" aria-label="Floating label select example"><option selected>Belum ada profile harus ditambahkan dahulu</option></select><label for="floatingSelect">Pilih profile</label></div><div class="harga"><h3>Variasi Harga</h3><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"><label class="form-check-label" for="inlineRadio1">QUAD <br> Rp. 32,000,000</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"><label class="form-check-label" for="inlineRadio1">QUAD <br> Rp. 32,000,000</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"><label class="form-check-label" for="inlineRadio1">QUAD <br> Rp. 32,000,000</label></div></div><a id="" class="btn btn-danger remove-field" style="color: #fff;">Hapus</a></div>'
                    )
            }
        });
        $(wraper).on("click", ".remove-field", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })

        var form1 = $("#form-1");
        var form2 = $("#form-2");
        var urutan1 = $("#urutan1");
        var urutan2 = $("#urutan2");
        var next1 = $("#next-1");

        $(next1).click(function(e) {
            e.preventDefault();
            $(form1).hide();
            $(urutan1).hide();
            $(form2).show();
            $(urutan2).show();
        });

        $checkTransfer = $("#checkTransfer");
      $checkCash = $("#checkCash");
      $checkTalangan = $("#checkTalangan");
      $transfer = $("#transfer");

      $(checkTransfer).change(function(e){
        e.preventDefault();
        $(transfer).show();
      });

      $($checkCash).change(function(e){
        e.preventDefault();
        $(transfer).hide();
      });

      $($checkTalangan).change(function(e){
        e.preventDefault();
        $(transfer).hide();
      });

    })
    </script>
</form>