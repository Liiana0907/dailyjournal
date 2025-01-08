<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en" id="htmlPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

  <!-- Icon Start -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <!-- Icon End -->

  <style>
    html {
      scroll-behavior: smooth;
    }

    .icon-dark-mode {
      color: #000;
      /* Warna untuk mode light */
      transition: color 0.3s;
    }

    [data-bs-theme="dark"] .icon-dark-mode {
      color: whitesmoke;
      /* Warna untuk mode dark*/
    }

    .checkbox {
      opacity: 0;
      position: absolute;
      display: none !important;
    }

    .checkbox-label {
      background-color: #111;
      width: 50px;
      height: 26px;
      border-radius: 50px;
      position: relative;
      padding: 5px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 10px;
    }

    .bi-moon {
      color: whitesmoke;
    }

    .bi-brightness-high {
      color: rgb(255, 75, 75);
    }

    .checkbox-label .ball {
      background-color: #fff;
      width: 22px;
      height: 22px;
      position: absolute;
      left: 2px;
      top: 2px;
      border-radius: 50%;
      transition: transform 0.2s liniear;
    }

    .checkbox:checked+.checkbox-label .ball {
      transform: translateX(24px);
    }

    #checkbox {
      display: none;
    }
    
  </style>
</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#"><i>My Daily Journal</i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
          <li class="nav-item">
            <a class="navLinka nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="navLinka nav-link" href="#article">Article</a>
          </li>
          <li class="nav-item">
            <a class="navLinka nav-link" href="#gallery">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="navLinka nav-link" href="#Schedule">Schedule</a>
          </li>
          <li class="nav-item">
            <a class="navLinka nav-link" href="#profile">About Me</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php" target="_blank">Login</a>
          </li>
          <li class="nav-item">
            <input type="checkbox" class="checkbox" id="checkbox" />
            <label for="checkbox" class="checkbox-label">
              <i class="bi bi-moon"></i>
              <i class="bi bi-brightness-high"></i>
              <span class="ball"></span>
            </label>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Hero Start -->
  <section id="hero" class="text-center p-5 bg-info-subtle text-sm-start">
    <div class="container">
      <div class="d-sm-flex flex-sm-row-reverse align-items-center">
        <img class="img-fluid" src="assets/background.jpg" alt="" width="460" />
        <div>
          <h1 class="fw-bold display-4">Welcome to</h1>
          <h1 class="fw-bold display-4">My Daily Journal</h1>
          <h5 class="lead display-7">
            Temukan catatan harianmu dan rekam perjalanan serta pencapaian
            setiap hari. Nikmati fitur yang membantu kamu mengelola, meninjau,
            dan merayakan setiap momen berharga dalam hidup. Mulailah hari ini
            dengan menulis dan ciptakan kenangan untuk masa
          </h5>
          <h6 class="text-sm-start">
            <span id="tanggal"></span>
            <span id="jam"></span>
          </h6>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero End -->

  <!-- Article Start -->
  <section id="article" class="text-center p-5">
    <div class="container">
      <h1 class="fw-bold display-4 pb-3">Article</h1>
      <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
        <?php
        $sql = "SELECT * FROM article ORDER BY tanggal DESC";
        $hasil = $conn->query($sql);

        while ($row = $hasil->fetch_assoc()) {
          
          ?>
          <div class="col">
            <div class="card h-100">
              <img src="assets/<?= $row["gambar"] ?>" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title"><?= $row["judul"] ?></h5>
                <p class="card-text">
                  <?= $row["isi"] ?>
                </p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">
                  <?= $row["tanggal"] ?>
                </small>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </section>
  <!-- Article End -->

  <!-- Gallery Start -->
  <section id="gallery" class="text-center p-5 bg-info-subtle">
    <div class="container">
      <h1 class="fw-bold display-4 pb-3">Gallery</h1>
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <?php
          $sql = "SELECT * FROM gallery ORDER BY tanggal DESC";
          $hasil = $conn->query($sql);
          $isActive = true;

          while ($row = $hasil->fetch_assoc()) {
            $activeClass = $isActive ? 'active' : '';
            $isActive = false;
            ?>
            <div class="carousel-item <?= $activeClass ?>">
              <img src="assets/<?= $row["gambar"] ?>" class="d-block w-100" alt="<?= $row['judul'] ?>" />
            </div>
            <?php
          }
          ?>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>
  <!-- Gallery End -->

  <!-- SCHEDULE START -->
  <section id="Schedule" class="text-center p-5">
    <div class="container">
      <h1 class="fw-bold display-4 pb-5">Schedule</h1>
      <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
        <div class="col d-flex justify-content-center">
          <div class="card border-primary" style="width: 18rem;">
            <div class="card-header text-bg-primary">
              Senin
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <h5 class="card-title p-2">12:30-15:00</h5>
                <p class="card-text">Probabilitas dan statistika</p>
                <p class="card-text">Ruang H.4.8</p>
              </li>
              <li class="list-group-item">
                <h5 class="card-title p-2">15:30-18:00</h5>
                <p class="card-text">Sistem Operasi</p>
                <p class="card-text">Ruang H.4.9</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="col d-flex justify-content-center">
          <div class="card border-success" style="width: 18rem;">
            <div class="card-header text-bg-success">
              Selasa
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <h5 class="card-title p-2">09:30-12:00</h5>
                <p class="card-text">Rekayasa Perangkat Lunak</p>
                <p class="card-text">Ruang H.4.10</p>
              </li>
              <li class="list-group-item">
                <h5 class="card-title p-2">15:30-18:00</h5>
                <p class="card-text">Penambangan Data</p>
                <p class="card-text">Ruang H.3.1</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="col d-flex justify-content-center">
          <div class="card border-danger" style="width: 18rem;">
            <div class="card-header text-bg-danger ">
              Rabu
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <h5 class="card-title p-2">09:30-12:00</h5>
                <p class="card-text">Kriptografi</p>
                <p class="card-text">Ruang H.4.5</p>
              </li>
              <li class="list-group-item">
                <h5 class="card-title p-2">14:20-15-50</h5>
                <p class="card-text">Logika Informatika</p>
                <p class="card-text">Ruang H.4.6</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="col d-flex justify-content-center">
          <div class="card border-warning" style="width: 18rem;">
            <div class="card-header text-bg-warning">
              Kamis
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <h5 class="card-title p-2">09:30-12:00</h5>
                <p class="card-text">Logika Informatika</p>
                <p class="card-text">Ruang H.4.10</p>
              </li>
              <li class="list-group-item">
                <h5 class="card-title p-2">14:10-15:50</h5>
                <p class="card-text">Basis Data</p>
                <p class="card-text">Ruang H.5.2</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="col d-flex justify-content-center">
          <div class="card border-info" style="width: 18rem;">
            <div class="card-header text-bg-info">
              Jumat
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <h5 class="card-title p-2">10:20-12:00</h5>
                <p class="card-text">Pemrograman Berbasis WEB</p>
                <p class="card-text">Ruang D.2.J</p>
              </li>
              <li class="list-group-item">
                <h5 class="card-title p-2">14:10-15:50</h5>
                <p class="card-text">Basis Data</p>
                <p class="card-text">Ruang D.3.4</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="col d-flex justify-content-center">
          <div class="card border-secondary" style="width: 18rem;">
            <div class="card-header text-bg-secondary">
              Sabtu
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <h5 class="card-title p-2">10:20-12:00</h5>
                <p class="card-text">Basis Data</p>
                <p class="card-text">Ruang H.3.4</p>
              </li>
              <li class="list-group-item">
                <h5 class="card-title p-2">12:30-15:00</h5>
                <p class="card-text">Dasar Pemrograman</p>
                <p class="card-text">Ruang H.3.1</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="col d-flex justify-content-center">
          <div class="card border-dark-subtle" style="width: 18rem;">
            <div class="card-header text-bg-dark-subtle">
              Minggu
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <h5 class="card-title p-2">10:20-12:00</h5>
                <p class="card-text">Basis Data</p>
                <p class="card-text">Ruang H.3.4</p>
              </li>
              <li class="list-group-item">
                <h5 class="card-title p-2">12:30-15:00</h5>
                <p class="card-text">Dasar Pemrograman</p>
                <p class="card-text">Ruang H.3.1</p>
              </li>
            </ul>
          </div>
        </div>
  </section>
  <!-- SCHEDULE END -->

  <!-- ABOUT ME START -->
  <section id="profile" class=" profile-container bg-info-subtle shadow-sm rounded p-5 mt-4">
    <div class="container">
      <div class=" flex-md-row text-center justify-content-center">
        <div class="fw-bold display-4 pb-5 ">Profile Mahasiswa</div>
        <div class="d-lg-flex flex-md-row align-items-center justify-content-evenly">
          <img src="assets/profile.jpg" alt="default" class="img-fluid rounded-circle" width="300" />
          <div class="profile-details p-2">
            <h2 class="fw-bold text-center">Tri Yuliana</h2>
            <h6 class="text-muted text-center mb-4">Mahasiswa Teknik Informatika</h6>
            <div class="card p-3 shadow-sm">
              <table class="table table-borderless text-start">
                <tbody>
                  <tr>
                    <td><strong>NIM</strong></td>
                    <td>: A11.2023.15145</td>
                  </tr>
                  <tr>
                    <td><strong>Program Studi</strong></td>
                    <td>: Teknik Informatika</td>
                  </tr>
                  <tr>
                    <td><strong>Email</strong></td>
                    <td>: 111202315145@mhs.dinus.ac.id</td>
                  </tr>
                  <tr>
                    <td><strong>Telepon</strong></td>
                    <td>: +62 857 2617 0059</td>
                  </tr>
                  <tr>
                    <td><strong>Alamat</strong></td>
                    <td>: Jl Woltermonginsidi, Pedurungan, Kota Semarang</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!--ABOUT ME END-->

  <!-- FOOTER START -->
  <footer class="text-center p-2">
    <div class="text-center mt-4">
      <a href="https://www.instagram.com/udinusofficial"><i class="bi bi-instagram h2 p-2 icon-dark-mode"></i></a>
      <a href="https://twitter.com/udinusofficial"><i class="bi bi-twitter-x h2 p-2 icon-dark-mode"></i></a>
      <a href="https://wa.me/+6285726170059"><i class="bi bi-whatsapp h2 p-2 icon-dark-mode"></i></a>
    </div>
    <div class="text-center mb-4 mt-1">
      <h6>Tri Yuliana © 2025</h6>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
  </footer>
  <!-- FOOTER END -->

  <!-- JAVASCRIPT START -->
  <script type="text/javascript">
    window.setTimeout("tampilWaktu()", 1000);

    function tampilWaktu() {
      var waktu = new Date();
      var bulan = waktu.getMonth() + 1;

      setTimeout("tampilWaktu()", 1000);
      document.getElementById("tanggal").innerHTML =
        waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();

      document.getElementById("jam").innerHTML =
        waktu.getHours() +
        ":" +
        waktu.getMinutes() +
        ":" +
        waktu.getSeconds();
    }
  </script>

  <script>
    const html = document.getElementById("htmlPage");
    const checkbox = document.getElementById("checkbox");
    checkbox.addEventListener("change", () => {
      if (checkbox.checked) {
        html.setAttribute("data-bs-theme", "dark");
      } else {
        html.setAttribute("data-bs-theme", "light");
      }
    });
  </script>
  <!-- JAVASCRIPT -->
</body>

</html>