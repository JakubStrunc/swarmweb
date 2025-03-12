<?php
//////////////////////////////////////////////////////////////////
/////////////////  Globalni nastaveni aplikace ///////////////////
//////////////////////////////////////////////////////////////////

/** Klic defaultni webove stranky. */

//define("DB_SERVER","localhost");
//define("DB_NAME","swarm");
//define("DB_USER","root");
//define("DB_PASS","");
define("DB_SERVER","db");
define("DB_NAME","mydatabase");
define("DB_USER","user");
define("DB_PASS","password");
const DEFAULT_WEB_PAGE_KEY = "Home";

/** Dostupne webove stranky. */
const WEB_PAGES = array(//// Uvodni stranka ////
    "Home" => array(
        "title" => "Home",

        //// kontroler
        //"file_name" => "IntroductionController.class.php",
        "controller_class_name" => \web\Controllers\HomeController::class, // poskytne nazev tridy vcetne namespace

        // ClassBased sablona
        "view_class_name" => \web\Views\TemplateBasics::class,

        // TemplateBased sablona
        //"view_class_name" => \kivweb\Views\TemplateBased\TemplateBasics::class,
        "template_type" => \web\Views\TemplateBasics::PAGE_HOME,
    ),






);


