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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</head>
<body>
<div class="header-user">
  <div class="header-title">
    <h4>Pemesanan</h4>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint distinctio qui sunt ipsa suscipit dolorem iusto quia. Eveniet tenetur aliquam quibusdam optio quas enim magni. Exercitationem dolorem vitae voluptas fuga.</p>
  </div>
  <div class="header-akun">
  <div class="btn-group dropstart">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Zarif <i class="fa-solid fa-user"></i>
                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li><a class="dropdown-item" href="/pemesanan-user">Pemesanan</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </div>
    <img src="/assets/DSCF1999 (1).JPG" width="50px" class="rounded-circle shadow" alt="">
  </div>
</div>

<div class="p-3 mx-5 rounded shadow" style="">
<table id="myTable" class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nama Paket</th>
      <th scope="col">Tanggal Pemesanan</th>
      <th scope="col">Status</th>
      <th scope="col">Total Tagihan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
    foreach($data['pemesanan'] as $p): ?>
    <tr>
      <td><?= $p['pemesanan_id'] ?></td>
      <td><?= $p['nama'] ?></td>
      <td><?= $p['tanggal_pemesanan'] ?></td>
      <td><?= $p['status'] ?></td>
      <td><?= $p['total_tagihan'] ?></td>
      <td>
        <a href="/detail-pemesanan/<?= $p['pemesanan_id'] ?>" class="btn btn-success">Detail & Bayar</a>
        <?php 
          if($p['status'] == "lunas"){
        ?>
 <a href="/nota-pembayaran/<?= $p['pemesanan_id'] ?>" target="_blank" class="btn btn-primary">Cetak Nota</a>
        <?php 
          }else if($p["status"] == "belum lunas"){
        ?>
        <a href="/cetak-tagihan/<?= $p['pemesanan_id'] ?>" target="_blank" class="btn btn-warning">Cetak Tagihan</a>
        <?php } ?>
      </td>
    </tr>
    <?php $no++; endforeach; ?>
  </tbody>
</table>
</div>


<script>
  let table = new DataTable('#myTable');
</script>

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