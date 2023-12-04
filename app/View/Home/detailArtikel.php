<div class="header-image">
   <div class="tl fade-in">
   <h1>Detail Artikel</h1>
    <p>Travel Haji dan Umrah berizin resmi</p>
   </div>
</div>

<?php foreach($data['artikel'] as $a) : ?>
<div class="detail-artikel" style="text-align: center; margin: 100px;">
    <h2><?= $a['judul'] ?></h2>
    <img src="/uploads/foto_artikel/<?= $a['foto'] ?>" alt="">
    <p><?= $a['isi'] ?></p>
</div>
<?php endforeach ?>