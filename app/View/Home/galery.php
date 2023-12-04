<div class="header-image">
   <div class="tl fade-in">
   <h1>Galery</h1>
    <p>Travel Haji dan Umrah berizin resmi</p>
   </div>
</div>

<div class="galery">

    <?php foreach($data['galery'] as $g) : ?>
        <div class="imagee">

            <img src="/uploads/foto_galery/<?= $g['foto'] ?>" alt="">
            <h4><?= $g['judul'] ?></h4>
        </div>
<?php endforeach; ?>
   
</div>