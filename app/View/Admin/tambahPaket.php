
<div class="container-xxl flex-grow-1 container-p-y">
<form method="POST" action="/admin/tambah-paket" enctype="multipart/form-data">
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
                '<div style="border: 1px solid #ddd; margin-bottom: 10px; padding: 10px 20px;"><h5>jenis '+x+'</h5><div class="mb-3"><label class="form-label" for="basic-icon-default-fullname">Nama Jenis</label><div class="input-group input-group-merge"><span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-spreadsheet"></i></span><input type="text" class="form-control" name="nama_jenis[]" id="basic-icon-default-fullname"/></div></div><div class="mb-3"><label class="form-label" for="basic-icon-default-company">Diskon</label><div class="input-group input-group-merge"><span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-money"></i></span><input type="number" id="basic-icon-default-company" name="diskon[]" class="form-control"/></div></div><div class="mb-3"><label class="form-label" for="basic-icon-default-company">Harga</label><div class="input-group input-group-merge"><span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-money"></i></span><input type="number" id="basic-icon-default-company" name="harga[]" class="form-control"/></div></div><a id="" class="btn btn-danger remove-field" style="color: #fff;"><i class="bx bx-trash"></i></a></div>'
                )
        }
    });
    $(wraper).on("click",".remove-field",function(e){
      e.preventDefault();
      $(this).parent('div').remove();
      x--;
    })

})
</script>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Paket</h5>
                </div>
                <div class="card-body">
                    
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Nama paket</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" name="nama_paket" class="form-control" id="basic-icon-default-fullname" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Menu</label>
                            <div class="input-group input-group-merge">
                                <div class="form-check me-3 mt-3">
                                    <input name="menu" class="form-check-input" type="radio" value="Umrah"
                                        id="defaultRadio1" />
                                    <label class="form-check-label " for="defaultRadio1"> Umrah </label>
                                </div>
                                <div class="form-check me-3 mt-3">
                                    <input name="menu" class="form-check-input" type="radio" value="Haji"
                                        id="defaultRadio1" />
                                    <label class="form-check-label" for="defaultRadio1"> Haji </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input name="menu" class="form-check-input" type="radio" value="Wisata Halal"
                                        id="defaultRadio1" />
                                    <label class="form-check-label" for="defaultRadio1"> Wisata Halal </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Durasi</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="number" id="basic-icon-default-company" name="durasi" class="form-control" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Minim DP</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="number" name="minim_dp" id="basic-icon-default-company" class="form-control" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Maskapai</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" name="maskapai" id="basic-icon-default-company" class="form-control" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Harga termasuk </label>
                            <div class="input-group input-group-merge" style="flex-direction: column;">
                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="harga_termasuk[]" value="Tiket Pesawat Ekonomi PP" id="defaultCheck1" />
                                    <label class="form-check-label" for="defaultCheck1"> Tiket Pesawat Ekonomi PP
                                    </label>
                                </div>

                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="harga_termasuk[]" value="Manasik Umrah" id="manasik" />
                                    <label class="form-check-label" for="manasik"> Manasik Umrah </label>
                                </div>

                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="harga_termasuk[]" value="Visa" id="visa" />
                                    <label class="form-check-label" for="visa"> Visa </label>
                                </div>

                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="harga_termasuk[]" value="Handling Bandara+Airport Tax" id="bandara" />
                                    <label class="form-check-label" for="bandara"> Handling Bandara+Airport Tax
                                    </label>
                                </div>

                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="harga_termasuk[]" value="Hotel di Saudi (Sesuai
                                        Itinerary)" id="hotelsaudi" />
                                    <label class="form-check-label" for="hotelsaudi"> Hotel di Saudi (Sesuai
                                        Itinerary) </label>
                                </div>
                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="harga_termasuk[]" value="Perlengkapan Fullset" id="perlengkapan" />
                                    <label class="form-check-label" for="perlengkapan"> Perlengkapan Fullset </label>
                                </div>
                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="harga_termasuk[]" value="Transportasi BUS di Saudi Full Ac" id="transport" />
                                    <label class="form-check-label" for="transport"> Transportasi BUS di Saudi Full
                                        Ac </label>
                                </div>

                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Harga Tidak termasuk </label>
                            <div class="input-group input-group-merge" style="flex-direction: column;">
                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="tidak_termasuk_harga[]" value="Pengeluaran pribadi Jemaah" id="pengeluaran" />
                                    <label class="form-check-label" for="pengeluaran"> Pengeluaran pribadi Jemaah
                                    </label>
                                </div>

                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="tidak_termasuk_harga[]" value="Paspor & Kartu Kuning (Meningitis)" id="pasport" />
                                    <label class="form-check-label" for="pasport"> Paspor & Kartu Kuning
                                        (Meningitis) </label>
                                </div>

                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="tidak_termasuk_harga[]" value="Upgrade tiket Business Class" id="upgrade" />
                                    <label class="form-check-label" for="upgrade"> Upgrade tiket Business Class
                                    </label>
                                </div>

                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="tidak_termasuk_harga[]" value="Force majure" id="force" />
                                    <label class="form-check-label" for="force"> Force majure </label>
                                </div>

                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Keunggulan </label>
                            <div class="input-group input-group-merge" style="flex-direction: column;">
                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="keunggulan[]" value="Kereta Cepat" id="kereta" />
                                    <label class="form-check-label" for="kereta"> Kereta Cepat </label>
                                </div>

                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="keunggulan[]" value="Free Tour Thaif " id="thaif" />
                                    <label class="form-check-label" for="thaif"> Free Tour Thaif </label>
                                </div>  

                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="keunggulan[]" value="Free Tour Ula" id="ula" />
                                    <label class="form-check-label" for="ula"> Free Tour Ula </label>
                                </div>

                                <div class="form-check me-3 mt-3">
                                    <input class="form-check-input" type="checkbox" name="keunggulan[]" value="Free Tour UIM" id="uim" />
                                    <label class="form-check-label" for="uim"> Free Tour UIM </label>
                                </div>

                            </div>
                        </div>

                        <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Brosur</label>
                        <input class="form-control" type="file" name="foto_brosur" id="formFile" />
                      </div>
                        
                </div>
            </div>
        </div>
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Harga</h5>
                </div>
                <div class="card-body">
                    
                        <div style="margin-bottom: 10px; border: 1px solid #ddd; padding: 10px 20px;">
                            <h5>jenis 1</h5>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Nama Jenis</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class='bx bx-spreadsheet'></i></span>
                                    <input type="text" class="form-control" name="nama_jenis[]" id="basic-icon-default-fullname"/>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Diskon</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text">
                                    <i class='bx bx-money'></i></span>
                                    <input type="number" id="basic-icon-default-company" name="diskon[]" class="form-control"/>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Harga</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text">
                                      <i class='bx bx-money'></i></span>
                                    <input type="number" id="basic-icon-default-company" name="harga[]" class="form-control"/>
                                </div>
                            </div>
                        </div>

                        <div class="inp-group" id="inp-group">

                        </div>
                        <a id="" style="color: #fff;" class="btn btn-primary add-inp"><i class='bx bx-plus'></i></a>
                        <!-- <button type="submit">s</button> -->
                    
                </div>
            </div>
            
            <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Hotel di Mekkah</h5>
                    </div>
                    <div class="card-body">
                    <input type="hidden" name="lokasi[]" value="Mekkah">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Nama hotel</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class='bx bx-spreadsheet'></i></span>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-icon-default-fullname"
                              name="nama_hotel[]"
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Bintang</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class='bx bx-star' ></i></span>
                            <input
                              type="number"
                              id="basic-icon-default-company"
                              class="form-control"
                              name="bintang[]"
                            />
                          </div>
                        </div>

                        <!-- <div class="mb-3 row">
                        <label for="html5-date-input" class="col-md-2 col-form-label">Check In</label>
                        <div class="col-md-10">
                          <input class="form-control" type="date" name="checkin[]"  id="html5-date-input" />
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="html5-date-input" class="col-md-2 col-form-label">Check Out</label>
                        <div class="col-md-10">
                          <input class="form-control" type="date" name="checkout[]"  id="html5-date-input" />
                        </div>
                      </div> -->
                 
                        <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Hotel</label>
                        <input class="form-control" name="foto_hotel[]" type="file" id="formFile" />
                      </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-message">Deskripsi</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"
                              ><i class="bx bx-comment"></i
                            ></span>
                            <textarea
                              id="basic-icon-default-message"
                              class="form-control"
                              name="deskripsi[]"
                            ></textarea>
                          </div>
                        </div>
                        
               
                    </div>

                    <div class="card-header d-flex " style="margin-top: -40px;">
                      <h5 class="m-0">Hotel di Madinah</h5>
                    </div>
                    <div class="card-body">
                      <input type="hidden" name="lokasi[]" value="Madinah">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Nama hotel</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class='bx bx-spreadsheet'></i></span>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-icon-default-fullname"
                              name="nama_hotel[]"
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Bintang</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class='bx bx-star' ></i></span>
                            <input
                              type="number"
                              id="basic-icon-default-company"
                              class="form-control"
                              name="bintang[]"
                            />
                          </div>
                        </div>
                 
                        <!-- <div class="mb-3 row">
                        <label for="html5-date-input" class="col-md-2 col-form-label">Check In</label>
                        <div class="col-md-10">
                          <input class="form-control" type="date" name="checkin[]"  id="html5-date-input" />
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="html5-date-input" class="col-md-2 col-form-label">Check Out</label>
                        <div class="col-md-10">
                          <input class="form-control" type="date" name="checkout[]"  id="html5-date-input" />
                        </div>
                      </div> -->

                        <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Hotel</label>
                        <input class="form-control" type="file" name="foto_hotel[]" id="formFile" />
                      </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-message">Deskripsi</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"
                              ><i class="bx bx-comment"></i
                            ></span>
                            <textarea
                              id="basic-icon-default-message"
                              class="form-control"
                              name="deskripsi[]"
                            ></textarea>
                          </div>
                        </div>
                        
                      
                    </div>
                  </div>
        </div>
    </div>
    <div class="row">
      <button type="submit" id="" class="btn btn-primary">Simpan <i class='bx bx-save' ></i></button>
      </form>
    </div>
</div>