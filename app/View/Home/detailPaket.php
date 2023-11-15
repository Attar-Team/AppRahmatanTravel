<?php 
foreach($data['keberangkatan'] as $k) : 
    $termasukHarga = explode(",", $k->termasuk_harga);
    $tidakTermasukHarga = explode(",", $k->tidak_termasuk_harga);
    $keunggulan = explode(",", $k->keunggulan);
    ?>
<div class="header-image">
    <div class="tl fade-in">
        <h1><?= $k->nama; ?></h1>
    </div>
</div>

<div class="detail-paket">
    <div class="header-detail">
        <img src="/image/brosur.jpg" alt="">
        <div class="desc">
            <h2><?= $k->nama; ?></h2>
            <div class="d-flex" style="justify-content: flex-start;">
                <?php foreach($data['bintang'] as $b) : ?>
                <div class="me-3" style="color: #FCCC29;">
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
                <div>
                    <p style="color:#FF6600;">| Tersisa 50 Seats</p>
                </div>
            </div>
            <h4 style="font-size: 25px; font-weight: bolder;">Harga Paket</h4>
            <?php foreach( $data['harga'] as $key => $h) : ?>

            <?php if($key == 0){ ?>
            <h3 class="harga">Rp <?= $h['harga']?>,- <?= $h['nama_jenis']?></h3>
            <div class="harga-detail">
                <?php } ?>
                <?php if($key > 0){ ?>
                <h4>Rp.<?= $h['harga']?>,- <?= $h['nama_jenis']?></h4>
                <?php } ?>
                <?php endforeach; ?>
            </div>
            <div class="d-flex my-3" style="font-size: 22px;font-weight: bolder; color: #FF6600; align-items: center;">
                <i class="fa-solid fa-calendar-days me-3"></i>
                <p class="m-0">Keberangkatan <?= $k->tanggal; ?></p>

            </div>
            <div class="d-flex my-3" style="font-size: 22px; align-items: center;">
                <i class="fa-solid fa-location-dot me-3"></i>
                <p class="m-0">Start Penerbangan <?= $k->keberangkatan_dari; ?></p>

            </div>
            <div class="d-flex">
                <a class="btn-admin" href="#"><i class="fa-brands fa-whatsapp"></i> Tanya Admin</a>
                <a class="btn-booking" href="/login"><i class="fa-solid fa-right-to-bracket"></i> Login untuk booking</a>
                <!-- <a class="btn-booking" href="/pemesanan/<?= $k->keberangkatan_id ?>"><i class="fa-solid fa-share-from-square"></i></i> Pesan sekarang</a> -->
            </div>
        </div>
    </div>
</div>

<div class="desc-detail">
    <div class="desc">
        <h2>Deskripsi</h2>
        <h4>Paket Umrah Ramadhan</h4>
        <div class="d-flex mb-2" style="align-items: center;">
            <i class="fa-solid fa-plane me-3"></i>
            <p class="m-0"><?= $k->maskapai; ?></p>
        </div>
        <div class="d-flex mb-2" style="align-items: center;">
            <i class="fa-solid fa-money-bill me-3"></i>
            <p class="m-0">DP hanya Rp <?= $k->minim_dp; ?></p>
        </div>
        <div class="d-flex mb-2" style="align-items: center;">
            <i class="fa-solid fa-clock me-3"></i>
            <p class="m-0">Program <?= $k->lama_hari; ?> hari</p>
        </div>

        <h4>Paket Kamar</h4>
        <ul>
            <?php foreach( $data['harga'] as $key => $h) : ?>
            <li>Rp <?= $h['harga']?>,- <?= $h['nama_jenis']?></li>
            <?php endforeach; ?>
        </ul>

        <h4>Harga Termasuk</h4>
        <ul>

            <?php foreach($termasukHarga as $t){ ?>
            <li><?= $t ?></li>
            <?php } ?>

        </ul>

        <h4>Harga Tidak Termasuk</h4>
        <ul>
            <?php foreach($tidakTermasukHarga as $t){ ?>
            <li><?= $t ?></li>
            <?php } ?>
        </ul>

        <h4>Keunggulan</h4>
        <ul>
            <?php foreach($keunggulan as $t){ ?>
            <li><?= $t ?></li>
            <?php } ?>
        </ul>
    </div>
    <div class="hotel">
        <h2>Hotel</h2>
        <?php foreach($data['hotel'] as $h) : ?>
        <div class="box">
            <img src="/uploads/foto_hotel/<?= $h['foto_hotel'] ?>" alt="">
            <div class="desc-body">
                <div class="d-flex" style="align-items: center;">
                    <h3 class="my-0 me-3"><?= $h['nama_hotel'] ?></h3>
                    <div style="color: #FCCC29;">
                    <?php  if($h['bintang'] == 1) { ?>
                    <i class="fa-solid fa-star"></i>
                    <?php }else if($h['bintang'] == 2){?>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <?php }else if($h['bintang'] == 3){?>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <?php }else if($h['bintang'] == 4){?>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <?php }else if($h['bintang'] == 5){?>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <?php } ?>
                    </div>
                </div>
                <p><?= $h['lokasi'] ?></p>

                <p><?= $h['deskripsi'] ?></p>
            </div>
        </div>

        <?php endforeach; ?>
        <!-- <div class="box">
            <img src="/image/background.png" alt="">
            <div class="desc-body">
                <div class="d-flex" style="align-items: center;">
                    <h3>Shofwa Orchid</h3>
                    <div>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>

                <p>Awali liburan Anda dengan luar biasa dengan menginap di properti ini,
                    yang menawarkan Wi-Fi gratis di semua kamar. Terletak strategis di Ajyad,
                    memungkinkan Anda akses dan jarak yang dekat ke atraksi dan objek wisata
                    lokal. Jangan pulang dulu sebelum berkunjung ke Al-Masjid al-Haram yang
                    terkenal. Properti bintang-5 memiliki restoran untuk menjadikan pengalaman
                    menginap Anda lebih menyenangkan dan berkesan.</p>
            </div>
        </div> -->
    </div>
</div>
<?php endforeach; ?>

<div class="paket-lain">
    <h3>Paket Lain yang bisa anda liat</h3>

    <div class="container">

        <div class="box">
            <img src="image/brosur.jpg" alt="">
            <div class="desc-body ">
                <div class="d-flex mb-2" style="align-items: center;">
                    <p class="my-0 me-3"
                        style="padding: 10px; border-radius: 10px;background-color: #FF6600; color:#fff">Umrah</p>
                    <div style="color: #FCCC29;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <h2>Paket Umrah 9 Ramadhan</h2>
                <p>Rp. 32,000,000</p>
            </div>
            <a class="btn" href="#">Lihat detail</a>
        </div>
        <div class="box">
            <img src="image/brosur.jpg" alt="">
            <div class="desc-body ">
                <div class="d-flex mb-2" style="align-items: center;">
                    <p class="my-0 me-3"
                        style="padding: 10px; border-radius: 10px;background-color: #FF6600; color:#fff">Umrah</p>
                    <div style="color: #FCCC29;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <h2>Paket Umrah 9 Ramadhan</h2>
                <p>Rp. 32,000,000</p>
            </div>
            <a class="btn" href="#">Lihat detail</a>
        </div>
        <div class="box">
            <img src="image/brosur.jpg" alt="">
            <div class="desc-body ">
                <div class="d-flex mb-2" style="align-items: center;">
                    <p class="my-0 me-3"
                        style="padding: 10px; border-radius: 10px;background-color: #FF6600; color:#fff">Umrah</p>
                    <div style="color: #FCCC29;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <h2>Paket Umrah 9 Ramadhan</h2>
                <p>Rp. 32,000,000</p>
            </div>
            <a class="btn" href="#">Lihat detail</a>
        </div>
        <div class="box">
            <img src="image/brosur.jpg" alt="">
            <div class="desc-body ">
                <div class="d-flex mb-2" style="align-items: center;">
                    <p class="my-0 me-3"
                        style="padding: 10px; border-radius: 10px;background-color: #FF6600; color:#fff">Umrah</p>
                    <div style="color: #FCCC29;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <h2>Paket Umrah 9 Ramadhan</h2>
                <p>Rp. 32,000,000</p>
            </div>
            <a class="btn" href="#">Lihat detail</a>
        </div>

    </div>
</div>