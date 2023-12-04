<div class="header-image">
   <div class="tl fade-in">
   <h1>Artikel</h1>
    <p>Travel Haji dan Umrah berizin resmi</p>
   </div>
</div>

<div class="artikel" style="margin: 150px;">
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