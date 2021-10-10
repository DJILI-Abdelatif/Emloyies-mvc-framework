<?php

    include_once './autoload.php';
    include_once './views/includes/header.php';
    
    use controllers\HomeController;
    use core\Response;

    $home = new HomeController();
    $pages = ['home', 'add', 'update', 'delete', 'logout', 'profile'];
    if(isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
        if(isset($_GET['page'])) {
            if(in_array($_GET['page'], $pages)) {
                $page = $_GET['page'];
                $home->index($page);
            } else {
                Response::setStatusCode(403);
                include_once 'views/includes/404.php';
            }
        } else {
            $home->index('home');
        }
        include_once './views/includes/footer.php';
    } else if(isset($_GET['page']) && $_GET['page'] === 'register') {
        $home->index('register');
    } else {
        $home->index('login');
    }