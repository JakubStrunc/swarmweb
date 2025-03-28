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
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="app/Views/styles/navbar.css">
    <link rel="stylesheet" href="app/Views/styles/timeline.css">
    <link rel="stylesheet" href="app/Views/styles/sponsors.css">
    <link rel="stylesheet" href="app/Views/styles/main-page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

</head>

<body id="page-top" data-bs-offset="54" style="background-color: black">
<div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signInModalLabel">Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="modal-footer">
                <!-- Prihlasit btn -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="button" id="signin" class="btn btn-warning" value="Sign in">
            </div>
        </div>
    </div>
</div>
<!-- Edit paragraph Modal -->
<div class="modal fade" id="editParagraphModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editProductModalLabel">Paragraph editor</h1>

            </div>
            <div class="container row g-3 mt-3 mb-3">
                <!-- Popis produktu txt pole -->
                <div class="col-12">
                    <label for="productDescription" class="form-label">Paragraph 1</label>
                    <label for="editParagraphDescription1"></label><textarea class="form-control bg-dark text-light" name="decription" id="editParagraphDescription1" rows="5"></textarea>
                </div>
                <!-- Fotka produktu upload -->
                <div class="col-md-5">
                    <label for="paragraphImage" class="form-label">Photo of Paragraph 1</label>
                    <input type="file" class="form-control bg-dark text-light" name="fileToUpload1" id="editfileToUpload1">
                </div>

                <div class="col-12">
                    <label for="productDescription" class="form-label">Paragraph 2</label>
                    <label for="editParagraphDescription2"></label><textarea class="form-control bg-dark text-light" name="decription" id="editParagraphDescription2" rows="5"></textarea>
                </div>
                <!-- Fotka produktu upload -->
                <div class="col-md-5">
                    <label for="paragraphImage" class="form-label">Photo of Paragraph 2</label>
                    <input type="file" class="form-control bg-dark text-light" name="fileToUpload2" id="editfileToUpload2">
                </div>
            </div>
            <!-- Footer btns -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="saveParagraphsChanges" class="btn btn-warning">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
            </div>
            <div class="modal-body">
                <form id="addEventForm">
                    <div class="mb-3">
                        <label for="newEventName" class="form-label">Event Name</label>
                        <input type="text" class="form-control" id="newEventName">
                    </div>
                    <div class="mb-3">
                        <label for="newEventDescription" class="form-label">Event Description</label>
                        <textarea class="form-control" id="newEventDescription"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="newEventDate" class="form-label">Event Date</label>
                        <input type="date" class="form-control" id="newEventDate">
                    </div>
                    <div class="mb-3">
                        <label for="newEventPhoto" class="form-label">Event Photo</label>
                        <input type="file" class="form-control bg-dark text-light" id="newEventPhoto">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="saveNewEvent" class="btn btn-warning">Save New Event</button>
            </div>
        </div>
    </div>
</div>

<!--<header>-->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-scroll" id="mainNav" style="transition: background-color 1s ease;">
        <div class="container">
            <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <img src="app/Views/images/Logo.png" style="width: auto;height: 10vh;" alt="">
                <ul class="navbar-nav ms-auto text-uppercase">
                    <li class="nav-item"><a class="nav-link custom-hover" style="font-size: 1.3rem" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link custom-hover" style="font-size: 1.3rem" href="events.html">Events</a></li>
                    <li class="nav-item"><a class="nav-link custom-hover" style="font-size: 1.3rem" href="#sponsor">Sponsors</a></li>

                    <?php if($tplData['userlogged']){ ?>
                        <li class="nav-item">
                            <button id="signout" class="btn btn-danger" style="font-size: 1.3rem;">Sign Out</button></li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>


    <!-- Navbar -->

    <!-- Section: Design Block -->
    <section>
        <div  class="bg-image main-img" style="background-image: url('app/Views/images/team_photo.JPG'); height: 100vh; background-size: cover; background-position: center top 75%; background-repeat: no-repeat">
            <div class="container d-flex justify-content-start  align-items-center h-100">
                <div class="row">
                    <div class="col-md-6 position-relative" style="position: absolute;">
                        <!-- ✅ Team Name Image (Moved Down 25%) -->
                        <img src="app/Views/images/team_name.png"
                             style="width: 40vw; height: auto;"
                             alt="Team Name">

                        <!-- ✅ Social Media Buttons -->
                        <div class="d-flex mt-3 gap-3" style="margin-left: 15%">
                            <a href="https://www.youtube.com" target="_blank" class="btn-lg rounded-circle d-flex align-items-center justify-content-center social-btn">
                                <i class="bi-instagram" style="font-size: 2vw;"></i>
                            </a>
                            <a href="https://www.youtube.com" target="_blank" class="btn-lg rounded-circle d-flex align-items-center justify-content-center social-btn">
                                <i class="bi-youtube" style="font-size: 2vw;"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
<!--</header>-->
<!---->
<!--<h1> working</h1>-->

<?php error_reporting(E_ALL);
ini_set('display_errors', 1);?>

<section class="about m-lg-5">
    <div class="container d-flex">
        <h1 class="text-warning mb-0 me-2">About our team</h1>
        <button id="edit-paragraphs-btn" name="edit-paragraphs-btn" class="btn btn-link text-warning fw-bold edit-paragraphs-btn" data-bs-toggle="modal" data-bs-target="#editParagraphModal">
                <i class="bi-wrench" style="font-size: 1.5rem"></i>
        </button>
    </div>
        <section class="section-one m-lg-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-left">
                        <p class="text-white" style="font-size: 1.3rem"> <?php echo $tplData['about'][0]['text'];?></p>
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
                        <p class="text-white" style="font-size: 1.3rem"><?php echo $tplData['about'][1]['text'];?></p>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section>
        <div class="d-flex justify-content-center mb-4">
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addEventModal">
                <i class=" bi-plus"></i>
            </button>
        </div>

        <div class="container py-5">
            <div class="main-timeline-2">
                <?php foreach ($tplData['events'] as $index => $event){ ?>
                    <div class="timeline-2 <?php echo $index % 2 == 0 ? 'right-2' : 'left-2' ;?>" data-aos="fade-up">
                        <div class="card"" style="background-color: black; border-color: #FFC328">
                            <img src="<?php echo $event['photo'] ?>" class="card-img-top"
                                 alt="Responsive image">
                            <div class="card-body p-4">
                                <div class="container d-flex">
                                    <h4 class="fw-bold mb-4 text-warning"><?php echo $event['name'] ?></h4>
                                    <button id="edit-paragraphs-btn" name="edit-paragraphs-btn" class="btn btn-link text-warning fw-bold edit-paragraphs-btn" data-bs-toggle="modal" data-bs-target="#editParagraphModal">
                                        <i class="bi-wrench" style="font-size: 1.1rem"></i>
                                    </button>
                                </div>
                                <p class=" text-white mb-4"><i class="far fa-clock" aria-hidden="true"></i> <?php echo $event['date'] ?></p>
                                <p class="mb-0 text-white"><?php echo $event['description'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
                <?php foreach ($tplData['sponsors'] as $index => $photo): ?>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <img src="<?php echo $photo['path']; ?>" class="img-fluid" alt="Sponsor 2">
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="container d-flex flex-column align-items-center p-lg-5" style="padding-bottom: 0;">
                <p class="text-white" style="font-size: 1.3rem">We are actively looking for sponsors, contact us at
                    <a href="mailto:random@gmail.com" class="text-warning">random@gmail.com</a>!
                </p>
            </div>
        </div>
    </section>


    <footer class="mb-3">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="app/JavaScript/navbar.js"></script>
    <script src="app/JavaScript/Admin.js"></script>
    <script src="app/JavaScript/Alert.js"></script>
    <script src="app/JavaScript/Editor.js"></script>

    <script>
        AOS.init({
            duration: 1000,  // Animation duration in milliseconds
            offset: 200,     // Offset from the viewport to trigger animation
            once: true       // Whether animation should happen only once or every time you scroll
        });
    </script>
</body>
</html>




