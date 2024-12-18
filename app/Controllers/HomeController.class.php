<?php

namespace web\Controllers;


class HomeController implements IController
{

    public function __construct() {

    }
    public function show(string $pageTitle):array
    {

        $tplData['title'] = "Home";

        return $tplData;
    }
}