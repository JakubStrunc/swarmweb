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
        $this->getHTMLHeader($templateData['title']);

        //// vypis sablony obsahu
        // data pro sablonu nastavim globalni
        global $tplData;
        $tplData = $templateData;
        // nactu sablonu
        require_once($pageType);

        //// vypis pacicky
        //$this->getHTMLFooter();
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
                  rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    public function NavBar($user) {
        ?>

        <nav class="navbar navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    BeerPoint
                </a>

                <?php
                    if($user['id_prava'] == 1){
                        $this->getAdminNavBarItems($user['uzivatelske_jmeno']);
                    }
                    elseif ($user['id_prava'] == 3){
                        $this->getUserNavBarItems($user['uzivatelske_jmeno']);
                    }
                    elseif ($user['id_prava'] == 2){
                        $this->getSellerNavBarItems($user['uzivatelske_jmeno']);
                    }
                    else{
                        $this->getUnregisteredNavBarItems();
                    }
                ?>

            </div>
        </nav>


        <?php
    }


}

?>