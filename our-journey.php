<?php
include 'actions/koneksi.php';
$query_artikel = mysqli_query($koneksi, "SELECT * FROM artikel");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <title>Motor Enthusiast Club</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light  fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Motor Enthusiast Club</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#artikel">Artikel</a>
                    <a class="nav-item nav-link" href="#event">Event</a>
                    <a class="nav-item nav-link" href="#galeri-foto">Galery Foto</a>
                    <a class="nav-item nav-link" href="#client">Client Kami</a>
                    <div class="nav-item dropdown">
                        <a class="btn btn-info tombol nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                            Login
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="sign-in.php">Sign In</a>
                            <a class="dropdown-item" href="sign-up.php">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- akhir Navbar -->

    <!-- container -->
    <div class="container" style="margin-top: 100px;">
        <!-- artikel -->
        <div id="artikel"></div>
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h2 style="font-weight: 500; font-size: 52px;">ARTIKEL</h2>
            </div>

            <?php foreach ($query_artikel as $artikel) : ?>
                <div class="col-md-4 mt-3">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/<?= $artikel['gambar'] ?>" class="card-img-top" height="300">
                        <div class="card-body">
                            <h5 class="card-title"><?= $artikel['judul'] ?></h5>
                            <p class="card-text"><?= substr($artikel['konten'], 0, 150) . (strlen($artikel['konten']) > 100 ? '...' : '') ?></p>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <!-- event -->
        <div id="event"></div>
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h2 style="font-weight: 500; font-size: 52px;">EVENT</h2>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card" style="width: 18rem;">
                    <img src="assets/img/motor1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Judul Artikel 3</h5>
                        <p class="card-text">Isi konten artikel 3.</p>
                        <a href="#" class="btn btn-primary">Selengkapnya..</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- galeri foto -->
        <div id="galeri-foto"></div>
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h2 style="font-weight: 500; font-size: 52px;">GALERI FOTO</h2>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="card" style="width: 18rem;">
                <img src="assets/img/motor1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Judul Artikel 3</h5>
                    <p class="card-text">Isi konten artikel 3.</p>
                    <a href="#" class="btn btn-primary">Selengkapnya..</a>
                </div>
            </div>
        </div>

        <!-- client -->
        <div id="client"></div>
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h2 style="font-weight: 500; font-size: 52px;">CLIENT KAMI</h2>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="card" style="width: 18rem;">
                <img src="assets/img/motor1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Judul Artikel 3</h5>
                    <p class="card-text">Isi konten artikel 3.</p>
                    <a href="#" class="btn btn-primary">Selengkapnya..</a>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir container -->


    <footer id="footer">
        <hr>
        <div class="footer">
            <div class=" container">
                <div class="row">
                    <div class="col-lg-4 col-md-2 footer-contact">
                        <h3>Motor Enthusiast Club</h3>
                        <p>
                            Suka Ramai<br>
                            Medan Area, 20216<br>
                            Sumatera Utara, Indonesia <br><br>
                            <strong>Phone:</strong> +62 12-3456-789<br>
                            <strong>Email:</strong> motorenthusiast@gmail.com<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Motor Enthusiast</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>