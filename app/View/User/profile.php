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
<?php foreach($data['user'] as $u) : ?>
<div class="profile">
    <div class="container-profile">
    <div class="box-info rounded shadow p-5 d-flex" style="justify-content: center;flex-direction: column;align-items: center;">
       <img src="/assets/DSCF1999 (1).JPG" width="250px" class="rounded-circle shadow d-flex mb-5" style="justify-content: center;" alt="">
       <p><i class="fa-solid fa-user"></i> <?= $u['username'] ?></p>
       <p><i class="fa-solid fa-envelope"></i> <?= $u['email'] ?></p>
       <p><i class="fa-solid fa-circle-info"></i> <?= $u['level'] ?></p>
       
    </div>

    <?php endforeach; ?>

        <div class="box-profile">
        <H2>Profile</H2>
        <a href="/tambah-jamaah" class="btn btn-primary">Tambah</a>

        <table class="table table-striped">
        <thead>
    <tr>
      <th scope="col">NIK</th>
      <th scope="col">Nama</th>
      <th scope="col">No telepon</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data['profile'] as $p) : ?>
    <tr>
      <td><?= $p['NIK'] ?></td>
      <td><?= $p['nama_customer'] ?></td>
      <td><?= $p['no_telp'] ?></td>
      <td><?= $p['jenis_kelamin'] ?></td>
      <td>
        <a href="/edit-jamaah/<?= $p['NIK'] ?>" class="btn btn-warning">Edit</a>
        <a href="/admin/hapus-customer/<?= $p['NIK'] ?>/customer" onclick="return confirm('Apakah yakin dihapus')" class="btn btn-danger">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>  
</table>
    </div>

 
    </div>
</div>
<script src="/sweetalert.js"></script>


<?php 

  if(isset($_SESSION['flash'])){
?>
<script>
  Swal.fire({
  icon: "<?= $_SESSION['flash']['status'] ?>",
  title: "<?= $_SESSION['flash']['title'] ?>",
  text: "<?= $_SESSION['flash']['message'] ?>",
});
</script>
<?php 
unset($_SESSION['flash']);
} ?>
<script src="/script.js"></script>
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