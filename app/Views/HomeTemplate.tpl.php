<?php

global $tplData;

use web\Views\TemplateBasics;

require_once ("TemplateBasics.class.php");
$tmp = new TemplateBasics();

//$user = 1;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $tplData['title'] ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../swarmwebsite/app/Views/styles/navbar.css">

</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54" style="background-color: black">
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav" style="height: 100px; background-color: black">
        <div class="container">
            <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right"
                    type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <img src="../../../swarmwebsite/app/images/logo.png" style="width: auto;height: 80px;" width="150" height="150" alt="">
                <ul class="navbar-nav ms-auto text-uppercase">
                    <li class="nav-item"><a class="nav-link custom-hover" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link custom-hover" href="#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link custom-hover" href="media.html">Media</a></li>
                    <li class="nav-item"><a class="nav-link custom-hover" href="events.html">Events</a></li>
                    <li class="nav-item"><a class="nav-link custom-hover" href="#sponsor">sponsors</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="about" style="padding-bottom: 75px;padding-top: 100px;">

        <div class="container">
            <div class="row">
                <div class="col-md-6 align-baseline">
                    <h1 class="text-warning" style="padding-bottom: 30px">About Us</h1>
                    <p style="text-align: left;display: block;position: static;" class="text-white">send<br><br></p>
                </div>
                <div class="col-md-6">
                    <img src="../../../swarmwebsite/app/images/teamphoto2.png" style="width: 100%;display: flex;transform-origin: center;position: static;" alt="">
                </div>
            </div>
        </div>
    </section>
    <section style="background: var(--bs-background);">
        <h1 style="/*color: #eeeeee;*/padding-bottom: 30px;text-align: center;">Featured Images</h1>
        <div class="container">
            <div class="carousel slide" data-bs-ride="false" id="carousel-1" style="margin-right: 5%;margin-left: 5%;">
                <div class="carousel-inner">
                    <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/Featured/WPRA-Early-Season2024-86.jpg"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="assets/img/Featured/WPRA-Early-Season2024-27.jpg"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="assets/img/Featured/2024-Provincials-10.jpg"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="assets/img/Featured/2024-Worlds-287.jpg"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="assets/img/Featured/2024-Worlds-21.jpg"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="assets/img/Featured/2024-Worlds-186.jpg"></div>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev" style="background: linear-gradient(90deg, rgba(0,0,0,0.48), rgba(255,255,255,0));"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next" style="background: linear-gradient(-90deg, rgba(0,0,0,0.48) 0%, rgba(255,255,255,0));"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                <div class="carousel-indicators" style="background: rgba(255,255,255,0);"><button type="button" data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="1"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="2"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="3"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="4"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="5"></button></div>
            </div>
        </div>
    </section>
    <section style="padding: 50px 0;">
        <div class="container d-flex flex-column align-items-center" style="padding-bottom: 0;">
            <h1 class="text-warning" style="padding-bottom: 30px;">Our Sponsors</h1>
            <img src="../../../swarmwebsite/app/images/sponsor1.png" class="p-4" style="width: 50vh;" alt="">
            <p class="text-white p-2">We are actively looking for sponsors, contact us at
                <a href="mailto:random@gmail.com" class="text-warning">random@gmail.com</a>!
            </p>
        </div>
    </section>
    <footer id="sponsor" style="background: rgb(17,17,17);">
        <div class="container">
            <div class="row">
                <div class="col-md-4"><span class="copyright" style="color: var(--primary-text-color);">Copyright&nbsp;© TenTon Robotics 2024</span></div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="https://www.instagram.com/tntn.vex/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.youtube.com/@TNTN-vexu" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4"><span class="copyright" style="color: var(--primary-text-color);">Developed by Iain Griesdale</span></div>
            </div>
        </div>
    </footer>


</body>
</html>




