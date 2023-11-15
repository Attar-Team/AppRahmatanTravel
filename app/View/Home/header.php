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

<body style="background-color: #E7E7DF;">
    <nav style="position: fixed;top: 0;right: 0; left: 0;z-index: 6;transition: .3s;" class="navbar navbar-expand-lg">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="justify-content: space-between; margin: 0 60px;" class="collapse navbar-collapse "
                id="navbarSupportedContent">
                <a class="navbar-brand" href="#"><img src="/image/Logo (2).png" width="200px" alt=""></a>
                <ul class="navbar-nav mb-lg-0">
                    <li class="nav-item px-2 me-2">
                        <a class="nav-link active-nav" style="color: #000;" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item px-2 me-2">
                        <a class="nav-link" style="color: #000;" aria-current="page" href="/about">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color: #000;" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Paket Travel
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/paket-umrah">Umrah</a></li>
                            <li><a class="dropdown-item" href="#">Haji</a></li>
                            <li><a class="dropdown-item" href="#">Wisata Halal</a></li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item px-2 me-2">
                        <a class="nav-link" style="color: #000;" aria-current="page" href="gallery.html">Paket
                            Travel</a>
                    </li> -->
                    <li class="nav-item px-2 me-3">
                        <a class="nav-link" style="color: #000;" aria-current="page" href="contact.html">Galery</a>
                    </li>
                    <?php
                    session_start();
                        if(!isset($_SESSION['status_login'])){

                    ?>

                    <li class="nav-item px-2 me-1" style="border: 1px solid; border-radius: 10px;">
                        <a class="nav-link" style="color: #000;" aria-current="page" href="/login">Log In</a>
                    </li>
                    <li class="nav-item px-2 me-1" style="background-color: #000; border-radius: 10px;">
                        <a class="nav-link" style="color: #fff;" aria-current="page" href="contact.html">Sign Up</a>
                    </li>
                    <?php }else{ ?>
                    <div class="btn-group dropstart">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Zarif <i class="fa-solid fa-user"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li><a class="dropdown-item" href="#">Pemesanan</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </div>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>