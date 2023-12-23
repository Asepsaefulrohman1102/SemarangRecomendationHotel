<?php
session_start();
//script koneksi
$koneksi = new mysqli("localhost", "root", "", "hotelrekomendasi");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Semarang Wonderfull</title>
    <!--<meta content="width=device-width, initial-scale=1.0" name="viewport">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="/img/logo-black-1.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .first-col {
            border-radius: 10px 0 0 10px;
            border: 1px solid black;
        }

        .last-col {
            border-radius: 0 10px 10px 0;
            border: 1px solid black;
        }

        .col {
            border: 1px solid black;
        }

        .card-container {
            display: flex;
        }

        .card-img-container {
            flex: 0 0 150px;
            margin-right: 20px;
        }

        .card-img-container img {
            width: 100%;
            height: auto;
        }

        .card-container {
            display: flex;
            align-items: center;
            /* Untuk membuat konten berada di tengah secara vertikal */
        }

        .card-title {
            margin-right: 10px;
            /* Jarak antara judul dan gambar */
        }

        .card-img {
            max-width: 25px;
            /* Sesuaikan lebar gambar sesuai kebutuhan */
            margin-bottom: 10px;
        }

        /* silang */
        .text-promosi {
    color: #808080; /* Warna abu */
    font-family: Poppins;
    margin-left: 5px;
    text-decoration: line-through;
    text-decoration-color: #FF0000; /* Warna merah untuk garis melintang */
        }

    /* star rating */
    /* Media query untuk perangkat seluler */
    @media (max-width: 767px) {
        .card-container {
            text-align: center; /* Pusatkan kontennya */
        }

        .stars-and-rating {
            display: flex;
            align-items: center;
        }

        .card-img {
            margin-bottom: 5px; /* Sesuaikan margin sesuai kebutuhan */
        }
    }
  
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex align-items-center"><img class="img-fluid" src="img/logo-black-1.png" alt=""> </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
                <a href="index.html" class="nav-item nav-link ">Home</a>
                <a href="akomodasi.php" class="nav-item nav-link ">Akomodasi</a>
                <a href="promosi.php" class="nav-item nav-link active">Promosi</a>
                <a href="contact.html" class="nav-item nav-link">Contact Us</a>
            </div>
        </div>
        <a href="" class="btn btn-primary px-3 d-none d-lg-block">Book Now</a>
    </nav>

    <!-- Navbar End -->

    <div class="container">
        <h1 class="text-akomodasi rounded-2" style="padding: 10px; font-family: Poppins; margin-top: 20px;">Promosi</h1>
    </div>

    <div class="col-xl wow fadeInUp" data-wow-delay="0.1s">
        <?php
        $ambil = $koneksi->query("SELECT * FROM hotel");
        ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <div class="container-xxl border rounded-2 shadow wow fadeInUp" style="margin-top: 10px;">
                <div class="d-flex card-container">
                    <div class="card-img-container">
                        <img src="img/hotel/<?php echo $pecah['gambar']; ?>" class="img-fluid" alt="Gambar" style="min-width: 150px; max-width: 150px; min-height: 150px; max-height: 150px; ">
                    </div>
                    
                    <div class="card-body">
                        <div class="card-container">
                            <h5 name="namahotel" class="card-title"><?php echo $pecah['namahotel']; ?></h5>

                            <div class="d-flex card-container">
                                <?php
                                $kategori_hotel = $pecah['kategori_hotel'];
                                $gambar_kategori = 'iconly-bold-star.svg'; // Ganti dengan nama file gambar yang sesuai dengan kategori_hotel Anda

                                // Perulangan sebanyak nilai kategori_hotel
                                for ($i = 0; $i < $kategori_hotel; $i++) {
                                    echo '<img name="star" src="img/icon/'.$gambar_kategori.'" alt="" class="card-img" style="height: 40px;">';
                                }
                                ?>

                                <div style="position: relative; display: inline-block; margin-left:10px;">
                                    <img loading="lazy" src="img/icon/rate-1.png" style="height:50px" />
                                    <span name="rating" style="position: absolute; top: 50%; left: 35%; transform: translate(-50%, -50%); font-size: 20px; color: rgb(0, 0, 0); font-weight: bold;"><?php echo $pecah['rating']; ?></span>
                                </div>
                            </div>
                        </div>
                        <img src="img/icon/iconly-bold-location.svg" alt=""><span name="alamat" class="card-text" style="color: #00A3FF; font-family:Poppins; margin-left: 5px;"><?php echo $pecah['alamat']; ?></span>

                        <?php
                        $fasilitas = explode(',', $pecah['fasilitas']);
                        echo '<div class="row">';
                        $count = 0;
                        foreach ($fasilitas as $fasilitas_item) {
                            if ($count < 3) {
                                echo '<h5 name="fasilitas" class="border border-dark border-1 round-2 col-sm-2 text-dark order-1" style="width: max-content; margin:10px; padding: 5px; text-align: center;">' . trim($fasilitas_item) . '</h5>';
                            } else {
                                echo '<h5 name="fasilitas" class="border border-dark border-1 round-2 col-sm-2 text-dark order-1" style="width: max-content; margin:10px; padding: 5px; text-align: center;">+1</h5>';
                                break; // Exit the loop after displaying "+1"
                            }
                            $count++;
                        }
                        echo '</div>';
                        ?>

                        <p name="deskripsi" class="card-text"><?php echo $pecah['deskripsi']; ?></p>

                        <div class="text-right" style="text-align: right;">
                            <div>
                                <span>Rp. </span>
                                <span name="harga" class="text-promosi"><?php echo $pecah['harga']; ?></span>
                            </div>
                            <h5 name="hargapromosi" class="card-title">Rp. <?php echo $pecah['harga_promosi']; ?></h5>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Availability
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a name="linkwebsite" class="dropdown-item" href="<?php echo $pecah['link_web']; ?>">
                                            <?php echo $pecah['namahotel']; ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    


    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <img class="img-fluid me-3" src="img/logo-black-1.png" alt="">
                    <div class="d-flex pt-2">
                        <a class="btn btn-square me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Info</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Jl Imam Bonjol</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+62 1234567890</p>
                    <p><i class="fa fa-envelope me-3"></i>semarangid@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Sitemap</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2330464176193!2d110.40663071052633!3d-6.981803118340982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b4ec52229d7%3A0xc791d6abc9236c7!2sUniversitas%20Dian%20Nuswantoro!5e0!3m2!1sid!2sid!4v1703303986010!5m2!1sid!2sid" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        &copy; <a href="#">Wonderfull Semarang</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>