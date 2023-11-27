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
<div class="profile">
    <div class="container-profile">
    <div class="box-info rounded shadow p-5 d-flex" style="justify-content: center;flex-direction: column;align-items: center;">
       <img src="/assets/DSCF1999 (1).JPG" width="250px" class="rounded-circle shadow d-flex mb-5" style="justify-content: center;" alt="">
       <p><i class="fa-solid fa-user"></i> Adza Zarif Nur Iskandar</p>
       <p><i class="fa-solid fa-envelope"></i> adzazarif@gmail.com</p>
       <p><i class="fa-solid fa-circle-info"></i> Customer</p>
       
    </div>

    
    <div class="box-info p-3" >
       <div class="d-flex gap-2">
        <div class="d-flex border p-2 shadow" style="align-items: center; gap: 15px;">
          <div class="rounded p-3" style="background-color: red;">
          <i style="font-size: 40px;color: #fff;" class="fa-solid fa-user"></i>
          </div>
          <div>
            <p class="m-0">Pemasukan</p>
            <h3 class="m-0"><?= $data['jumlah_pemasukan'] ?></h3>
          </div>
        </div>

        <div class="d-flex border p-2 shadow" style="align-items: center; gap: 15px;">
          <div class="rounded p-3" style="background-color: red;">
          <i style="font-size: 40px;color: #fff;" class="fa-solid fa-user"></i>
          </div>
          <div>
            <p class="m-0">Jumlah Pelanggan</p>
            <h3 class="m-0"><?= $data['jumlah_pelanggan'] ?></h3>
          </div>
        </div>
       </div>
       <?php foreach($data['profile'] as $p) : ?>
       <div class="shadow p-4 mt-3">
        <h3>Biodata</h3>
        <ul class="d-flex p-0 gap-3" style="list-style: none;justify-content: start ; width:300px">
          <li>Kode Referel : </li>
          <li><?= $p['kode_referal'] ?></li>
        </ul>
        <ul class="d-flex p-0 gap-3" style="list-style: none;justify-content: start ; width:300px">
          <li>Nama : </li>
          <li><?= $p['nama'] ?></li>
        </ul>

        <ul class="d-flex p-0 gap-3" style="list-style: none;justify-content: start ; width:300px">
          <li>Alamat : </li>
          <li><?= $p['alamat'] ?></li>
        </ul>

        <ul class="d-flex p-0 gap-3" style="list-style: none;justify-content: start ; width:300px">
          <li>Jenis Kelamin : </li>
          <li><?= $p['jenis_kelamin'] ?></li>
        </ul>

        <ul class="d-flex p-0 gap-3" style="list-style: none;justify-content: start ; width:300px">
          <li>No Telepon : </li>
          <li><?= $p['notelp'] ?></li>
        </ul>

       </div>
    </div>

    <?php endforeach; ?>

 
    </div>
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