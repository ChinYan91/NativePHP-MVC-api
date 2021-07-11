<?php

class Router {
    function __construct(){}

    static function get($slug, $action){
        $parsed_url = parse_url($_SERVER['REQUEST_URI']);//Parse Uri
        $parsed_url = $parsed_url['path'];

        if($parsed_url == $slug){
            $action();
        }
    }

    static function post($slug, $action){
        $parsed_url = parse_url($_SERVER['REQUEST_URI']);//Parse Uri
        $parsed_url = $parsed_url['path'];

        if($parsed_url == $slug){
            $action();
        }
    }
}
?>