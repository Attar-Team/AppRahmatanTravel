<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="/styleLogin.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="/image/Logo 1.png" alt="Rahmatan Travel" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" id="navhome" aria-current="page" href="/">Home</a>
            <a class="nav-link" href="/login">Login</a>
            <a class="nav-link" href="/register">Register</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Form Login -->
    <div class="wrapper">
    <?php
    if(isset($data['error'])){ ?>
                      <div class="alert alert-danger" role="alert">
                      <?= $data['error'] ?>
</div>
    <?php } ?>

      <form action="/register" method="POST">
        <h1>Register</h1>
        <div class="input-box">
          <label class="input-user" for="nama-lengkap">Nama Lengkap</label>
          <input id="nama-lengkap" type="text" name="nama" placeholder="Masukkan Nama Lengkap Anda" required />
        </div>
        <div class="input-box">
          <label class="input-user" for="email">E-mail</label>
          <input id="email" type="text" name="email" placeholder="Masukkan E-mail Anda" required />
        </div>
        <div class="input-box">
          <label class="input-user" for="email">Hoby</label>
          <input id="email" type="text" name="hoby" placeholder="Masukkan E-mail Anda" required />
        </div>
        <div class="input-box">
          <label class="input-password" for="Password">Password</label>
          <input id="Password" type="password" name="password" placeholder="Password" required />
        </div>
        <button type="submit" class="btn">Daftar</button>
        <div class="register-link">
          <p>Punya Akun ?<a href="/login">Login</a></p>
        </div>
      </form>
    </div>
    <!-- Akhir Form Login -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
