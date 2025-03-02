<?php

namespace web\Controllers;


use web\Models\MyDatabase;

class HomeController implements IController
{

    public function __construct() {

    }
    public function show(string $pageTitle):array
    {

        $tplData['title'] = "Home";
        $db = new MyDatabase();

        $tplData['about'] = $db->getAbout();
        $tplData['events'] = $db->getAllEvents();
        $tplData['photos'] = $db->getAllPhotos();
        $tplData['sponsors'] = $db->getAllSponsors();

        return $tplData;
    }
}