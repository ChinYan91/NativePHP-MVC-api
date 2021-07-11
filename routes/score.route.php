<?php 
require_once "utilities/router.class.php";
require_once "controllers/score.controller.php";

class ScoreRoute{
    function __construct(){
        Router::get("/", function(){ ScoreController::migration(); });
        Router::get("/tableStructure", function(){ ScoreController::tableStructure(); });
        Router::post("/insert", function(){ ScoreController::insert(); }); # Task 1a, 1b
        Router::get("/selectOne", function(){ ScoreController::selectOne(); }); # For inspection only
        Router::post("/update", function(){ ScoreController::update(); }); #Task 1c
        Router::post("/delete", function(){ ScoreController::delete(); }); #Task 1d
    }
}