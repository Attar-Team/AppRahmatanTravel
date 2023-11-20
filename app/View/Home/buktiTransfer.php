<?php  date_default_timezone_set("Asia/Jakarta"); ?>
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

<body style="background-color: #E9EAEC;">

    <form action="/pemesanan" method="POST">


        <div class="urutan" id="urutan1">
            <div class="box">
                <p><span>1</span> Detail Pemesanan</p>
                <span class="line"></span>
                <p><span>2</span> Pembayaran</p>
                <span class="line"></span>
                <p class="order-active-p"><span class="order-active">3</span> Detail Pemesanan</p>
            </div>
        </div>

        <input type="hidden" value="<?= $data['idPemesanan'] ?>" id="keywoard">

        <div class="bukti-transfer">


            <div class="bukti-container">

                <div class="inp-uploads shadow">
                    <h4>Uploads bukti transfer</h4>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Jumlah Bayar</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Catatan</label>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
                <?php 
            foreach($data["pemesanan"] as $p ) :
                
                $tgl_pemesanan = $p['tanggal'];
                $date=date_create($tgl_pemesanan);
                date_add($date,date_interval_create_from_date_string("1 minutes"));
                $tenggat = date_format($date,"F j, Y H:i:s");
                ?>
                <div class="desc-harga shadow">
                    <p class="countdown" id="asd"
                        style="padding: 10px;border-radius: 10px;background-color: red;color: #fff;text-align: center;">
                    </p>


                    <ul>
                        <li>Tenggat bayar</li>
                        <li><?= $tenggat ?></li>
                    </ul>
                    <ul>
                        <li>Status</li>
                        <li><?= $p['status'] ?></li>
                    </ul>
                    <ul>
                        <li>Total bayar</li>
                        <li>Rp <?= $p['total_tagihan'] ?></li>
                    </ul>
                    <ul>
                        <li>Jumlah bayar</li>
                        <li>Rp <?= $p['jumlah_bayar'] ?></li>
                    </ul>

                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <style>
        .countdown {
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0% {
                background-color: #ff0000;
            }

            25% {
                background-color: #ff3333;
            }

            50% {

                background-color: #ff6666;
            }

            25% {
                background-color: #ff3333;
            }

            100% {

                background-color: #ff0000;
            }
        }
        </style>

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
            document.getElementById("asd").innerHTML = hours + "h " +
                minutes + "m " + seconds + "s ";

            // If the count down is over, write some text 
            if (distance < 0) {
                var xhr = new XMLHttpRequest();
                xhr.onload = function() {
                    console.log(xhr.responseText)
                    // $("#result").html(xhr.responseText);
                }

                xhr.open('GET', '/delete-pemesanan-invalid/' + $("#keywoard").val(), true);
                xhr.send();
                window.location='/';
                clearInterval(x);
                document.getElementById("asd").innerHTML = "EXPIRED";
            }
        }, 1000);
        </script>



        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- <script src="/script.js"></script> -->

        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
</body>

</html>