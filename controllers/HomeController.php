<?php

    namespace controllers;

    class HomeController 
    {
        public function index($view) {
            include_once "views/$view.php";
        }
    }

?>