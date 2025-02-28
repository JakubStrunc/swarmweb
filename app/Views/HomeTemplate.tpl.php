<?php

global $tplData;

use web\Views\TemplateBasics;

require_once ("TemplateBasics.class.php");
$tmp = new TemplateBasics();

//$user = 1;

?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title><?php echo $tplData['title'] ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <link rel="stylesheet" href="../../../swarmwebsite/app/Views/styles/navbar.css">
    <link rel="stylesheet" href="../../../swarmwebsite/app/Views/styles/timeline.css">
    <link rel="stylesheet" href="../../../swarmwebsite/app/Views/styles/sponsors.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

</head>

<body id="page-top" data-bs-offset="54" style="background-color: black">

<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-scroll" id="mainNav" style="transition: background-color 1s ease;">
        <div class="container">
            <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <img src="../../../swarmwebsite/app/images/Logo.png" style="width: auto;height: 80px;" width="150" height="150" alt="">
                <ul class="navbar-nav ms-auto text-uppercase">
                    <li class="nav-item"><a class="nav-link custom-hover" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link custom-hover" href="#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link custom-hover" href="media.html">Media</a></li>
                    <li class="nav-item"><a class="nav-link custom-hover" href="events.html">Events</a></li>
                    <li class="nav-item"><a class="nav-link custom-hover" href="#sponsor">Sponsors</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Section: Design Block -->
    <section>
        <div id="intro" class="bg-image" style="background-image: url('../../../swarmwebsite/app/images/teamphoto2.png'); height: 100vh;">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.2);">
                <div class="container d-flex justify-content-center align-items-center h-100">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <!-- Removed the "Studio" text here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
</header>

<!--<h1> working</h1>-->
<?php //var_dump($tplData['about']);?>

<section class="about m-lg-5">
        <h1 class="text-warning container">About our team</h1>
        <section class="section-one m-lg-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-left">
                        <p class="text-white"><?php echo $tplData['about'][0]['text'];?></p>
                    </div>
                    <div class="col-lg-6">
                        <img src="<?php echo $tplData['about'][0]['photo'];?>" class="img-fluid" alt="Image">
                    </div>
                </div>
            </div>
        </section>

        <section class="section-two m-lg-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <img src="<?php echo $tplData['about'][1]['photo'];?>" class="img-fluid" alt="Second Image">
                    </div>
                    <div class="col-lg-6 text-right">
                        <p class="text-white"><?php echo $tplData['about'][1]['text'];?></p>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section>
        <div class="container py-5">
            <div class="main-timeline-2">
                <?php foreach ($tplData['events'] as $index => $event): ?>
                    <div class="timeline-2 <?= $index % 2 == 0 ? 'right-2' : 'left-2' ?>" data-aos="fade-up">
                        <div class="card"" style="background-color: black; border-color: #FFC328">
                        <img src="<?php echo $event['photo'] ?>" class="card-img-top"
                             alt="Responsive image">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4 text-warning"><?php echo $event['name'] ?></h4>
                            <p class=" text-white mb-4"><i class="far fa-clock" aria-hidden="true"></i> <?php echo $event['date'] ?></p>
                            <p class="mb-0 text-white"><?php echo $event['description'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section data-aos="fade-up">
        <h1 class="text-warning" style="padding-bottom: 30px; text-align: center;">Featured Images</h1>
        <div class="container">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">

                <!-- ✅ Light Mode Carousel Indicators -->
                <div class="carousel-indicators">
                    <?php foreach ($tplData['photos'] as $index => $photo): ?>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="<?php echo $index ?>"
                                class="<?php echo $index === 0 ? 'active' : '' ?>"
                                aria-label="Slide <?php echo $index + 1 ?>">
                        </button>
                    <?php endforeach; ?>
                </div>

                <!-- ✅ Light Mode Carousel Inner Items -->
                <div class="carousel-inner">
                    <?php foreach ($tplData['photos'] as $index => $photo): ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : '' ?>" data-bs-interval="<?php echo ($index === 0) ? 10000 : 2000 ?>">
                            <img src="<?php echo $photo['path'] ?>" class="d-block w-100" alt="Slide <?php echo $index + 1 ?>">
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- ✅ Previous & Next Controls -->
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

    <section class="sponsors m-lg-5" style="padding: 75px 0" data-aos="fade-up">
        <div class="container d-flex flex-column align-items-center" style="padding-bottom: 0;">
            <h1 class="text-warning"  style="padding-bottom: 30px;">Our Sponsors</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <img src="../../../swarmwebsite/app/images/sponsors/Nav_Canadalogo.png" class="img-fluid" alt="Sponsor 2">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <img src="../../../swarmwebsite/app/images/sponsors/Schneiderlogo.png" class="img-fluid" alt="Sponsor 3">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <img src="../../../swarmwebsite/app/images/sponsors/EnerSvslogo.png" class="img-fluid" alt="Sponsor 1">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <img src="../../../swarmwebsite/app/images/sponsors/Tri-ShoreYachtServiceslogo.png" class="img-fluid" alt="Sponsor 4">
                </div>
            </div>
            <div class="container d-flex flex-column align-items-center p-lg-5" style="padding-bottom: 0;">
                <p class="text-white">We are actively looking for sponsors, contact us at
                    <a href="mailto:random@gmail.com" class="text-warning">random@gmail.com</a>!
                </p>
            </div>
        </div>
    </section>


    <footer>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-4 text-start">
                    <span class="copyright text-warning">Copyright&nbsp;© SWARM 2025</span>
                </div>
                <div class="col-md-4 text-end">
                    <!-- ✅ Clickable Button for Sign-In Modal -->
                    <button type="button" class="btn btn-link text-warning p-0" data-bs-toggle="modal" data-bs-target="#signInModal">
                        Developed by SWARM TEAM
                    </button>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="../../../swarmwebsite/app/JavaScript/navbar.js"></script>

    <script>
        AOS.init({
            duration: 1000,  // Animation duration in milliseconds
            offset: 200,     // Offset from the viewport to trigger animation
            once: true       // Whether animation should happen only once or every time you scroll
        });
    </script>
</body>
</html>




