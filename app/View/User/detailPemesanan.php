<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rahmatan Travel</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <?php 
    use Attar\App\Rahmatan\Travel\Util\FormatRupiah; 
    foreach($data['detailPemesanan'] as $d) :
        $kurangBayar = $d['total_tagihan'] - $d['sudah_bayar'];
        ?>

    <div class="detail-pmsn-user">
        <div class="header-dtl">
            <h2>Detail Pemesanan</h2>
            <p class="countdown" id="asd"
                        style="padding: 10px;border-radius: 10px;background-color: red;color: #fff;text-align: center;display: inline-block;font-size: 25px;">
                    </p>
            <a href="/delete-pemesanan/<?= $d['pemesanan_id'] ?>" onclick="return confirm('apakah yakin mmbatalkan pesanan')" class="btn btn-danger">Batalkan pesanan</a>
        
        </div>
        <div class="container-pmsn">
            <div class="box">
                <img src="/uploads/foto_brosur/<?= $d['foto_brosur'] ?>" width="200px" alt="">
                <h2><?= $d['nama'] ?></h2>

                <ul style="display: flex; list-style: none; justify-content: space-between; padding: 0;">
                    <li>Keberangkatan</li>
                    <li><?= $d['tanggal'] ?></li>
                </ul>

                <ul style="display: flex; list-style: none; justify-content: space-between; padding: 0;">
                    <li>Menu</li>
                    <li><?= $d['menu'] ?></li>
                </ul>
                <ul style="display: flex; list-style: none; justify-content: space-between; padding: 0;">
                    <li>Lama Hari</li>
                    <li><?= $d['lama_hari'] ?></li>
                </ul>
                <ul style="display: flex; list-style: none; justify-content: space-between; padding: 0;">
                    <li>Minim DP</li>
                    <li><?= FormatRupiah::Rupiah($d['minim_dp']) ?></li>
                </ul>
            </div>

            <div class="boxs">
                <div class="kamar-tidur">
                    <h4>Kamar Tidur</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Variasi</th>
                                <th scope="col">Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($data['jamaah'] as $j) : ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td>
                                    [<?= $j['nama_jenis'] ?>]
                                    <br>
                                    Rp <?= FormatRupiah::Rupiah($j['harga']) ?>
                                </td>
                                <td><?= $j['nama_customer'] ?></td>
                            </tr>
                            <?php $no++; endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="box-pemesanan">
                    <h4>Detail Pemesanan</h4>
                    <ul style="display: flex; list-style: none; justify-content: space-between; padding: 0;">
                        <li>Tenggat Pembayaran</li>
                        <li><?= $d['tanggal_ditutup'] ?></li>
                    </ul>
                    <ul style="display: flex; list-style: none; justify-content: space-between; padding: 0;">
                        <li>Jenis Pembayaran</li>
                        <li><?= $d['jenis_pembayaran'] ?></li>
                    </ul>
                    <ul style="display: flex; list-style: none; justify-content: space-between; padding: 0;">
                <li>Status</li>
                <li><?= $d['status'] ?></li>
                
            </ul>
            <ul style="display: flex; list-style: none; justify-content: space-between; padding: 0;">
                <li>Tanggal Pemesanan</li>
                <li><?= $d['tanggal_pemesanan'] ?></li>
            </ul>
            <ul style="display: flex; list-style: none; justify-content: space-between; padding: 0;">
                <li>Catatan</li>
                <li><?= $d['catatan_pemesanan'] ?></li>
            </ul>
                </div>
            </div>

            <div class="boxs">
            <div class="box-struk-pms mb-3">
                <ul style="display: flex; list-style: none; justify-content: space-between; padding: 0;">
                <li>Total</li>
                <li><?= FormatRupiah::Rupiah($d['total_tagihan']) ?></li>
            </ul>  
            <ul style="display: flex; list-style: none; justify-content: space-between; padding: 0;">
                <li>Sudah Bayar</li>
                <li><?= FormatRupiah::Rupiah($d['sudah_bayar']) ?></li>
            </ul> 
            <ul style="display: flex; list-style: none; justify-content: space-between; padding: 0;">
                <li>Kurang Bayar</li>
                <li><?php if($kurangBayar >= 0){
                    echo FormatRupiah::Rupiah($kurangBayar);
                }else{
                    echo'Sudah Lunas';
                } 
                
                ?></li>
            </ul> 

            <div class="d-flex" style="gap: 20px;">
            <?php if($d['status'] == "belum lunas") { ?>
                <a href="/cetak-tagihan/<?= $d['pemesanan_id'] ?>" target="_blank" class="btn btn-warning w-100">Cetak Tagihan</a>
                <a href="/tambah-cicilan/<?= $d['pemesanan_id'] ?>"  class="btn btn-info w-100">Bayar Cicilan</a>
                <?php }else if( $d['status'] == 'lunas') { ?>
                <a href="/nota-pembayaran/<?= $d['pemesanan_id'] ?>" target="_blank" class="btn btn-primary w-100">Cetak Nota</a>
                <?php } ?>
                
            </div>
                </div>
                <div class="box-dtl-pms">
                <div class="d-flex mb-2" style="justify-content: space-between;align-items: center;">
                <h4>Riwayat Pembayaran</h4>
                <!-- <a href="" class="btn btn-info">Bayar Cicilan</a> -->
                </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jumlah bayar</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data['riwayatPembayaran'] as $p) : ?>
                            <tr>
                                <th scope="row"><?= $p['tanggal'] ?></th>
                                <td><?= FormatRupiah::Rupiah($p['jumlah_bayar']) ?></td>
                                <td><?= $p['status_verivikasi'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

              
            </div>
        </div>
    </div>

    <?php
  $tgl_pemesanan = $d['tanggal_ditutup'];
  $date=date_create($tgl_pemesanan);
  $tenggat = date_format($date,"F j, Y H:i:s");
endforeach; ?>
    <script>
        var countDownDate = <?php echo strtotime($tenggat) ?> * 1000;
        var now = <?php echo time() ?> * 1000;

        // Update the count down every 1 second
        var x = setInterval(function() {

            now = now + 1000;

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("asd").innerHTML ="Tenggat Pelunasan "+ days+ " Hari " + hours + " Jam " +
                minutes + " Menit " + seconds + " Detik ";

            // If the count down is over, write some text 
            if (distance < 0) {
                // var xhr = new XMLHttpRequest();
                // xhr.onload = function() {
                //     console.log(xhr.responseText)
                //     // $("#result").html(xhr.responseText);
                // }

                // xhr.open('GET', '/delete-pemesanan-invalid/' + $("#keywoard").val(), true);
                // xhr.send();
                // window.location='/';
                clearInterval(x);
                document.getElementById("asd").innerHTML = "EXPIRED";
            }
        }, 1000);
        </script>
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
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script src="/path/to/typeit/source"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/script.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>