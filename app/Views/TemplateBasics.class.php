<?php
namespace web\Views;


/**
 * Trida vypisujici HTML hlavicku a paticku stranky.
 */
class TemplateBasics implements IView{
//class TemplateBasics{




    const PAGE_HOME = "HomeTemplate.tpl.php";



    public function printOutput(array $templateData, string $pageType = self::PAGE_HOME)
    {
        //// vypis hlavicky
        //$this->getHTMLHeader($templateData['title']);

        //// vypis sablony obsahu
        // data pro sablonu nastavim globalni
        global $tplData;
        $tplData = $templateData;

        //$this->NavBar();
        // nactu sablonu
        require_once($pageType);

        //// vypis pacicky
        $this->getHTMLFooter();
    }
    /**
     *  Vrati vrsek stranky az po oblast, ve ktere se vypisuje obsah stranky.
     *  @param string $pageTitle    Nazev stranky.
     */
    public function getHTMLHeader(string $pageTitle) {
        ?>

        <!doctype html>
        <html lang="cs">
        <head>
            <meta charset="utf-8">
            <title><?php echo $pageTitle; ?></title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
                  rel="stylesheet" crossorigin="anonymous">

            <link rel="stylesheet" href="/app/Views/styles/navbar.css">

        </head>




        <?php
    }


    /**
     *  Vrati paticku stranky.
     */
    public function getHTMLFooter(){
        ?>
        <footer class="bg-dark text-white text-center py-3">
            <div class="container">
                <div class="mt-3">
                    <p>&copy; KIV/WEB; Jakub Štrunc; © 2024</p>
                </div>
            </div>
        </footer>


        <?php
    }
    public function NavBar() {
        ?>

        <body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
            <nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark" id="mainNav" style="color: rgb(225,225,225);background: rgb(17, 17, 17);height: 100px;">
                <div class="container"><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive"><img src="assets/img/icons/IMG_3484.png" style="width: 200px;height: auto;padding-top: 10px;" width="150" height="150">
                        <ul class="navbar-nav ms-auto text-uppercase">
                            <li class="nav-item"><a class="nav-link text-white" href="#about">About</a></li>
                            <li class="nav-item"><a class="nav-link text-white" href="#team"">Team</a></li>
                            <li class="nav-item"><a class="nav-link text-white" href="media.html"">Media</a></li>
                            <li class="nav-item"><a class="nav-link text-white" href="events.html">Events</a></li>
                            <li class="nav-item"><a class="nav-link text-white" href="#sponsor">sponsors</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </body>


        <?php
    }


}

?>