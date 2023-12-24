<?php  date_default_timezone_set("Asia/Jakarta"); 
use Attar\App\Rahmatan\Travel\Util\FormatRupiah;?>
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
    <script>
        window.print();
    </script>
</head>

<?php foreach($data['detailPemesanan'] as $d): 
    $tgl_pemesanan = $d['tanggal_ditutup'];
    $date=date_create($tgl_pemesanan);
    $tenggat = date_format($date,"F j, Y H:i:s");
    $kurangBayar = $d['total_tagihan'] - $d['sudah_bayar'];
    ?>
<div class="d-flex mt-3 mb-5" style="justify-content: space-between;align-items: center;">
    <h2 class="">Tagihan</h2>

<img src="/image/Logo (2).png" alt="">
</div>

<h4>Detail Tagihan</h4>
<div class="my-2" style="border: 1px solid; width: 100%;height: 2px;"></div>

<div class="d-flex" style="justify-content: space-between;">
    <div>
        <p class="m-1"><b>Nomor Tagihan : </b><?= $d['pemesanan_id'] ?></p>
        <p class="m-1"><b>Tanggal Dibuat : </b> <?= date('F j, Y H:i:s') ?></p>
        <p class="m-1"><b>Jatuh Tempo :</b>  <?= $tenggat ?></p>
        <p class="m-1"><b>Status :</b>  <?= $d['status'] ?></p>
    </div>

    <div>
        <h5 class="m-1">PT. Rahmatan Travel</h5>
        <p class="m-1">rahmtan@travel.com</p>
        <p class="m-1">+62895366960593</p>
    </div>
</div>

<h4 class="mt-4">Detail Paket</h4>
<div class="my-2" style="border: 1px solid; width: 100%;height: 2px;"></div>

<div class="d-flex" style="justify-content: space-between;">
    <div>
        <p class="m-1"><b>Nama Paket</b></p>
        <p class="m-1"><?= $d['nama'] ?> (<?= $d['tanggal'] ?>)</p>
        <p class="m-1"><b>Keberangkatan</b></p>
        <p class="m-1"><?= $d['tanggal'] ?></p>
    </div>

    <div>
       
        <p class="m-1"><b>Hotel</b></p>
        <ul class="d-flex m-0 p-0" style="list-style: none; gap: 10px;">
            <li>Makkah</li>
            <li>Nama Hotel </li>
        </ul>
        <ul class="d-flex m-0 p-0" style="list-style: none; gap: 10px;">
        <li>Madinah</li>
            <li>Nama Hotel </li>
        </ul>
        <p class="m-1"><b>Penerbangan</b></p>
        <p><?= $d['maskapai'] ?></p>
    </div>
</div>



<h4 class="mt-0">Pesanan</h4>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Variant</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no =1;
    foreach($data['jamaah'] as $j) : ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $j['nama_customer'] ?></td>
      <td><?= $j['nama_jenis'] ?></td>
      <td><?= FormatRupiah::Rupiah($j['harga']) ?></td>
    </tr>
    <?php $no++;endforeach; ?>

    

  </tbody>
</table>

<div class="d-flex" style="justify-content: end;">
    <div style="width: 300px;">
    <ul class="d-flex p-0 m-2" style="gap: 10px;list-style: none; width: 100%">
            <li class="w-50">Sub Total</li>
            <li><?= FormatRupiah::Rupiah($d['total_tagihan']) ?></li>
        </ul>
        <ul class="d-flex p-0 m-2" style="gap: 10px;list-style: none; width: 100%">
            <li class="w-50">Total Pembayaran</li>
            <li><?= FormatRupiah::Rupiah($d['sudah_bayar']) ?></li>
        </ul>
        <ul class="d-flex p-0 m-2" style="gap: 10px;list-style: none; width: 100%">
            <li class="w-50">Sisa Pembayaran</li>
            <li><?= FormatRupiah::Rupiah($kurangBayar) ?></li>
        </ul>
    </div>
</div>
<?php  endforeach; ?>
<h4 class="mt-3">Metode Pembayaran :</h4>
<div class="shadow radius d-inline-block m-0 p-4">
    <h4>Bank Central Asia (BCA)</h4>
    <p>PT Rahmatan Travel</p>
    <p>23423423454</p>
</div>
<script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script src="/path/to/typeit/source"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/script.js"></script>
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>