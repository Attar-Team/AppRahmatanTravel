<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
=======
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
>>>>>>> ae52f977d25ae8d223fd24091d6a679b34e28c8c

    <!-- Style CSS -->
    <link rel="stylesheet" href="/styleLogin.css" />

<<<<<<< HEAD
        <div class="d-inline-block" style=" width: 100%;">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div style="justify-content: space-between; margin: 0 60px;" class="collapse navbar-collapse " id="navbarSupportedContent">
                        <a class="navbar-brand" href="#"><img src="image/Logo (2).png" width="230px" alt=""></a>
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="about.html">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="gallery.html">Sign Up</a>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>

            <div class="login">
                <div class="header-login">
                    <h1>Welcome !</h1>
                    <p>Please Login to your account</p>
                </div>
                <form action="/login" method="POST">
                    <div class="body-login">
                        <div class="row">
                            <label for="">Email</label>
                            <div class="input-icon">
                                <input type="email" placeholder="example@email.com" name="email" value="<?php if (isset($_POST['email']))
                                                                                                            echo $_POST['email'] ?>" style="width: 100%;" />

                            </div>
                        </div>
                        <div class="row">
                            <label for="">Password</label>
                            <div class="input-icon">
                                <input type="password" placeholder="*******" name="password" id="password" />
                                <i class="bi bi-eye-slash" id="togglePassword"></i>
                            </div>
                        </div>

                    </div>
                    <div class="row-btn">
                        <a href="">Forgot your password?</a>
                        <button type="submit" class="btn-login">Login</button>
                    </div>
                </form>

                <?php
                if (isset($data['error'])) {
                    echo "<div class='alert alert-danger' role='alert'>
                                        " . $data['error'] . "
                                        </div>";
                }
                ?>



            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
=======
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
>>>>>>> ae52f977d25ae8d223fd24091d6a679b34e28c8c

    <!-- Form Login -->
    <div class="wrapper">
    <?php
    if(isset($data['success'])){ ?>
                      <div class="alert alert-success" role="alert">
                      <?= $data['success'] ?>
</div>
    <?php } ?>
      <form action="/login" method="POST">
        <h1>Login</h1>
        <div class="input-box">
          <input type="email" name="email" placeholder="Username" required />
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required />
        </div>
        <button type="submit" class="btn">Masuk</button>
        <div class="forgot">
          <label> <input type="checkbox" />Remember me</label>
          <a href="#">Forgot Password</a>
        </div>
        <div class="register-link">
          <p>Belum Punya Akun?<a href="/register"> Daftar</a></p>
        </div>
      </form>
     <?php if(isset($data['error'])){ ?>
      <div class="alert alert-danger" role="alert">
  <?= $data['error'] ?>
</div>
      <?php } ?>
    </div>
    <!-- Akhir Form Login -->
    <script src="/sweetalert.js"></script>


<?php 
session_start();
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
