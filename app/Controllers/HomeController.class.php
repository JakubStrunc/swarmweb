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
        $tplData['paragraph'] = $db->getParagraphs();

        return $tplData;
    }
}