<div class="header-image">
   <div class="tl fade-in">
   <h1>Paket Umrah</h1>
    <!-- <p>Travel Haji dan Umrah berizin resmi</p> -->
   </div>
</div>

<form action="/search-paket" method="POST">
<div class="filter-paket">
    <div class="filter-pkt-container">

    <div class="box">
      <i class="fa-solid fa-clock-rotate-left"></i>
      <div class="w-100">
         <p>Menu</p>
         <select name="menu" class="w-100" id="">
            <option value="">Pilih </option>
            <option value="Umrah">Umrah</option>
            <option value="Haji">Haji</option>
         </select>
      </div>
      </div>


      <div class="box">
      <i class="fa-solid fa-plane-departure"></i>
      <div class="w-100">
         <p>Start</p>
         <select name="start" class="w-100" id="">
            <option value="">Pilih </option>
            <option value="Surabaya">Surabaya</option>
            <option value="Jakarta">Jakarta</option>
         </select>
      </div>
      </div>

      <div class="box">
      <i class="fa-solid fa-calendar-days"></i>
      <div class="w-100">
         <p>Pilih Keberangkatan</p>
         <input type="month" id="start" name="keberangkatan" min="2022-03" />
      </div>
      </div>


      <div class="box">
      <i class="fa-solid fa-money-bill"></i>
      <div class="w-100">
         <p>Start Harga</p>
         <select name="start_harga" class="w-100" id="">
            <option value="">Pilih </option>
            <option value="30000000,32000000">30.000.00 - 32.000.000</option>
            <option value="33000000,34000000">33.000.00 - 34.000.000</option>
            <option value="35000000,37000000">35.000.00 - 37.000.000</option>
         </select>
      </div>
      </div>

      <div class="box" style="width: 100px;" >
         <button type="submit" class="btn btn-orange">Search</button>
      </div>
    </div>
</div>
</form>

        <div class="paket" style="position: relative;" >
            <div class="container fade-in">
                <?php foreach($data['dataKeberangkatan'] as $k) : ?>
                <div class="box">
                    <div class="image">
                        <img src="image/brosur.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="body">
                        <h5 class="card-title"><?= $k['nama'] ?></h5>
                        <div class="ket">
                            <div class="ttl">
                                <i class="fa-solid fa-calendar-days"></i>
                                <p>Jadwal Keberangkatan</p>
                            </div>
                            <div class="isi">
                            <?= $k['tanggal'] ?>
                            </div>
                        </div>
                        <div class="ket">
                            <div class="ttl">
                            <i class="fa-solid fa-plane-departure"></i>
                                <p>Keberangkatan Dari</p>
                            </div>
                            <div class="isi">
                            <?= $k['keberangkatan_dari'] ?>
                            </div>
                        </div>
                        <div class="ket">
                            <div class="ttl">
                            <i class="fa-solid fa-clock"></i>
                                <p>Durasi paket</p>
                            </div>
                            <div class="isi">
                            <?= $k['lama_hari'] ?>
                            </div>
                        </div>
                        <div class="ket">
                            <div class="ttl">
                            <i class="fa-solid fa-user"></i>
                                <p>Total Seat</p>
                            </div>
                            <div class="isi">
                            <?= $k['seats'] ?> pax
                            </div>
                        </div>
                        <div class="ket">
                            <div class="ttl">
                            <i style="font-weight: bolder; color:#13C100" class="fa-solid fa-user"></i>
                                <p style="font-weight: bolder; color:#13C100">Available Seat</p>
                            </div>
                            <div class="isi "style="font-weight: bolder; color:#13C100">
                                20 pax
                            </div>
                        </div>
                        <div class="ket">
                            <div class="ttl">
                            <i class="fa-solid fa-hotel"></i>
                                <p>Hotel</p>
                            </div>
                            <div class="isi" style="color:#FF6600;">
                            <?php
                                if($k['bintang'] == 1) { ?>
                                <i class="fa-solid fa-star"></i>
                                <?php }else if($k['bintang'] == 2){?>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                <?php }else if($k['bintang'] == 3){?>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                <?php }else if($k['bintang'] == 4){?>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                <?php }else if($k['bintang'] == 5){?>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <?php } ?>
                            
                            
                            </div>
                        </div>
                        <div class="ket">
                            <div class="ttl">
                                <i class="fa-solid fa-plane"></i>
                                <p>Maskapai</p>
                            </div>
                            <div class="isi">
                            <?= $k['maskapai'] ?>
                            </div>
                        </div>

                            <h3>Rp. <?= $k['harga'] ?></h3>

                        <a href="/detail-paket/<?= $k['keberangkatan_id'] ?>" class="btn">Lihat Selengkapnya</a>
                    </div>
                </div>
                <?php endforeach; ?>

                
                <!-- <div class="box">
                    <div class="image">
                        <img src="image/brosur.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="body">
                        <h5 class="card-title">Paket Umrah Ramadhan</h5>
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
                                <i class="fa-solid fa-calendar-days"></i>
                                <p>Durasi paket</p>
                            </div>
                            <div class="isi">
                                15 hari
                            </div>
                        </div>
                        <div class="ket">
                            <div class="ttl">
                                <i class="fa-solid fa-calendar-days"></i>
                                <p>Total Seat</p>
                            </div>
                            <div class="isi">
                                40 pax
                            </div>
                        </div>
                        <div class="ket">
                            <div class="ttl">
                                <i class="fa-solid fa-calendar-days"></i>
                                <p>Berangkat dari</p>
                            </div>
                            <div class="isi">
                                Jakarta
                            </div>
                        </div>
                        <a href="#" class="btn">Lihat Selengkapnya</a>
                    </div>
                </div> -->
            </div>
        </div>