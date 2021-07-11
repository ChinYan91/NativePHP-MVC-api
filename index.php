<?php
require_once "routes/score.route.php";
require_once "utilities/database.class.php";

class Application{
    function __construct(){
        $this->init();
    }

    function init(){
        $database = New Database();
        $scoreRoutes = New ScoreRoute();
    }
}

$server = new Application();