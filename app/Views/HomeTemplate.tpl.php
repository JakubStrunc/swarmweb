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

<h1> working</h1>
<?php var_dump($tplData['paragraphs']);?>

<section class="about m-lg-5">
        <h1 class="text-warning container">About our team</h1>
        <section class="section-one m-lg-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-left">
                        <p class="text-white"><?php echo $tplData['paragraphs'][0]['paragraph'];?></p>
                    </div>
                    <div class="col-lg-6">
                        <img src=<?php echo $tplData['paragraphs'][0]['img'];?> class="img-fluid" alt="Image">
                    </div>
                </div>
            </div>
        </section>

        <section class="section-two m-lg-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <img src=<?php echo $tplData['paragraphs'][1]['img'];?> class="img-fluid" alt="Second Image">
                    </div>
                    <div class="col-lg-6 text-right">
                        <p class="text-white"><?php echo $tplData['paragraphs'][1]['paragraph'];?></p>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section>
        <div class="container py-5">
            <div class="main-timeline-2">
                <div class="timeline-2 right-2" data-aos="fade-up">
                    <div class="card"" style="background-color: black; border-color: #FFC328">
                        <img src="../../../swarmwebsite/app/images/teamphoto2.png" class="card-img-top"
                             alt="Responsive image">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4 text-warning">Duis aute irure dolor</h4>
                            <p class=" text-white mb-4"><i class="far fa-clock" aria-hidden="true"></i> 2016</p>
                            <p class="mb-0 text-white">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
                                aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                                sequi nesciunt.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline-2 left-2" data-aos="fade-up">
                    <div class="card">
                        <img src="../../../swarmwebsite/app/images/teamphoto2.png" class="card-img-top"
                             alt="Responsive image">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4">Sed ut nihil unde omnis</h4>
                            <p class="text-muted mb-4"><i class="far fa-clock" aria-hidden="true"></i> 2015</p>
                            <p class="mb-0">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure
                                reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui
                                dolorem eum fugiat quo voluptas nulla pariatur?</p>
                        </div>
                    </div>
                </div>
                <div class="timeline-2 right-2" data-aos="fade-up">
                    <div class="card">
                        <img src="../../../swarmwebsite/app/images/teamphoto2.png" class="card-img-top"
                             alt="Responsive image">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4"> Quis autem vel eum voluptate</h4>
                            <p class="text-muted mb-4"><i class="far fa-clock" aria-hidden="true"></i> 2014</p>
                            <p class="mb-0">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                                occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi,
                                id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline-2 left-2" data-aos="fade-up">
                    <div class="card">
                        <img src="../../../swarmwebsite/app/images/teamphoto2.png" class="card-img-top"
                             alt="Responsive image">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4">Mussum ipsum cacilds</h4>
                            <p class="text-muted mb-4"><i class="far fa-clock" aria-hidden="true"></i> 2013</p>
                            <p class="mb-0">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
                                saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum
                                hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut
                                perferendis doloribus asperiores repellat.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline-2 right-2" data-aos="fade-up">
                    <div class="card">
                        <img src="../../../swarmwebsite/app/images/teamphoto2.png" class="card-img-top"
                             alt="Responsive image">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4">Ut enim ad minim veniam</h4>
                            <p class="text-muted mb-4"><i class="far fa-clock" aria-hidden="true"></i> 2017</p>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section data-aos="fade-up">
        <h1 class="text-warning" style="padding-bottom: 30px; text-align: center;">Featured Images</h1>
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../../../swarmwebsite/app/images/teamphoto2.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../../swarmwebsite/app/images/teamphoto1.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../../swarmwebsite/app/images/teamphoto2.png" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>

                </a>
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
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright text-warning">Copyright&nbsp;© SWARM 2025</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item">
                            <a href="notdonelink" target="_blank" class="social-icon">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="notdonelink" target="_blank" class="social-icon">
                                <i class="fa fa-youtube-play"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 text-end">
                    <span class="copyright text-warning">Developed by SWARM TEAM</span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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




