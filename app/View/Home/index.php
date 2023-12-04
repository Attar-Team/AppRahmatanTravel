

    <div class="nav-image">
        <div class="desc">
            <h3 class="transparan">Rahmatan Travel</h3>
            <h1 id="title">Kami Ada Untuk Melayani <br> Perjalanan Ibadah Anda</h1>
            <h1 style="margin-bottom: 20px;"></h1>
            <p class="transparan" style="margin-bottom: 13px;">Travel dengan pelayanan terbaik dan memiliki sertifikat
                izin.<br>Putusan Izin Travel No. 12460001227810001</p>

            <a class="btn-book fade-in" href="#paket">Pesan Sekarang</a>
            <a class="btn-contact fade-in" href="/about">Tentang Kami</a>

        </div>

    </div>

    <section>
        <div class="welcome">

            <img class="from-left" src="image/welcome.png" alt="">

            <div class="desc from-right">
                <h2 style="font-weight: bolder;">SELAMAT DATANG <br>DI RAHMATAN TRAVEL</h2>
                <h4>Rahmatan Travel Sebuah Platform Untuk
                    Menemani Perjalanan Ibadah Anda
                    Ke Baitullah ataupun Wisata - Wisata Halal. </h4>
                <p>Rahmatan Travel adalah agen perjalanan terkemuka yang
                    menyediakan layanan umroh, haji, dan wisata halal. Mereka
                    menawarkan perjalanan yang berlandaskan pada nilai-nilai
                    keagamaan Islam, dengan tim berpengalaman yang memastikan
                    pengalaman perjalanan yang bermakna dan spiritual. Layanan
                    mereka mencakup paket umroh, haji yang aman, dan wisata
                    halal yang memadai.Rahmatan Travel adalah pilihan terpercaya
                    bagi mereka yang mencari perjalanan yang sesuai dengan
                    prinsip-prinsip agama Islam.</p>
            </div>
        </div>
    </section>

    <!-- <section>
  <h4>SPESIAL TERBAIK UNTUK ANDA</h4>
  <H2>SPESIAL PAKET TRAVEL</H2>
  <div class="paket">
    <div class="box">
      <img src="image/brosur.jpg" alt="">
       
    </div>
  </div>
</section> -->

    <section id="paket">
        <div class="paket">
            <div class="header-content">
                <div class="title">
                    <H2 style="font-weight: bolder;">SPESIAL PAKET TRAVEL</H2>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas ut expedita sint minima corrupti consequatur ex minus? Libero id illum vitae consequatur ducimus ut deserunt doloremque magnam architecto. Placeat, quam.</p>
                </div>

                <div class="btn">
                    <a href="#">Lihat Semua</a>
                </div>
            </div>
            <div class="container fade-in">
                <?php

use Attar\App\Rahmatan\Travel\Util\FormatRupiah;

 foreach($data['dataKeberangkatan'] as $k) : 
                    if($k['available_seat'] > 0) {    
                ?>
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
                                <?= $k['available_seat'] ?>
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

                            <h3>Rp. <?= FormatRupiah::Rupiah($k['harga']) ?></h3>

                        <a href="/detail-paket/<?= $k['keberangkatan_id'] ?>" class="btn">Lihat Selengkapnya</a>
                    </div>
                </div>
                <?php } endforeach; ?>

                
            </div>
        </div>
    </section>

    <section>
    <div class="header-content">
                <div class="title">
                    <H2 style="font-weight: bolder;">GALERY </H2>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas ut expedita sint minima corrupti consequatur ex minus? Libero id illum vitae consequatur ducimus ut deserunt doloremque magnam architecto. Placeat, quam.</p>
                </div>

                <div class="btn">
                    <a href="/galery">Lihat Semua</a>
                </div>
            </div>
        <!-- <h2 class="text-center m-5" style="font-size: 40px;">Galery</h2> -->
        <div class="transparan" style="position: relative; height: 100%;">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                <?php foreach($data['galery'] as $g) : ?>
                    <div class="swiper-slide">
                        <img src="/uploads/foto_galery/<?= $g['foto'] ?>" />
                    </div>
                    <?php endforeach; ?>


                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- <section>
        <div class="pengalaman">
            <h4 class="tittle">Pengalaman Pengguna</h4>
            <H2 class="tittle-desc">Rahmatan Travel</H2>
            <div class="container">
                <div class="box">
                    <p>Travel yang sangat amanah,memberikan pengalaman yang terbaik untuk menjalankan ibadah umroh saya
                    </p>
                    <div class="person">
                        <img src="assets/DSCF1999 (1).jpg" width="80px" alt="">
                        <div class="desc">
                            <h5>Adza Zarif</h5>
                            <div class="col" style="margin-top: -10px;">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <p>Saya Bisa menikmati haji saya dengan hikmat, dan juga nyaman</p>
                    <div class="person">
                        <img src="assets/DSCF1999 (1).jpg" width="80px" alt="">
                        <div class="desc">
                            <h5>Adza Zarif</h5>
                            <div class="col" style="margin-top: -10px;">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <p>Harga yang terjangkau dan memberi pelayanan yg terbaik terbaikkk......</p>
                    <div class="person">
                        <img src="assets/DSCF1999 (1).jpg" width="80px" alt="">
                        <div class="desc">
                            <h5>Adza Zarif</h5>
                            <div class="col" style="margin-top: -10px;">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <p>adipisci ducimus quod a in, temporibus eum dolorum esse voluptatem. Voluptate id a blanditiis!
                        Nam minima rem eos quas.</p>
                    <div class="person">
                        <img src="assets/DSCF1999 (1).jpg" width="80px" alt="">
                        <div class="desc">
                            <h5>Adza Zarif</h5>
                            <div class="col" style="margin-top: -10px;">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section> -->

    <section>
        <div class="artikel">
            <div class="header-content">
                <div class="title">
                    <H2 style="font-weight: bolder;">Artikel</H2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat eius atque natus repellendus nobis repellat voluptate possimus at odio magnam, beatae officia nam exercitationem voluptates rerum nulla culpa, provident aspernatur.</p>
                </div>
                <div class="btn">
                    <a href="/artikel">Lihat Semua</a>
                </div>
            </div>

            <div class="container">

            <?php foreach($data['artikel'] as $k) : ?>
                <div class="box shadow from-left">
                    <img src="/image/artikel.png" alt="">
                    <div class="date">
                    <p class="m-0"><?= $k['tanggal'] ?></p>
                    </div>
                    <h2><?= $k['judul'] ?></h2>
                    <p><?= substr($k['isi'],0,200) ?></p>
                    <a href="/detail-artikel/<?= $k['artikel_id'] ?>" class="btn">Baca Sekarang</a>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </section>


    