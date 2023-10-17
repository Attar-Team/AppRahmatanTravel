<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex" style=" height: 100vh;">
        <img class="img-login" src="image/Mekkah 1.png" alt="">

        <div class="d-inline-block" style=" width: 100%;">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div style="justify-content: space-between; margin: 0 60px;" class="collapse navbar-collapse "
                        id="navbarSupportedContent">
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
                                <input type="email" placeholder="example@email.com" name="email"
                                    value="<?php if (isset($_POST['email']))
                                        echo $_POST['email'] ?>"
                                        style="width: 100%;" />

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
                                        ".$data['error']."
                                        </div>";
                                    }
                                    ?>
                


            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>