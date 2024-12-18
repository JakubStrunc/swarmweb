<?php

namespace web\Views;

interface IView {
    //public function printView($templateData): string;

    public function printOutput(array  $tplData);

}
