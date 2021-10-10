<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <meta name="description" content="mvc framework php">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="mvc php,framework mvc, php mvc">
        <title>mvc4</title>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>public/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>public/css/bootstrap.css">
	    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>public/css/font-awesome.min.css">
    </head>
    <body>
    <div class="container my-3">
    <?php 
        if(isset($_SESSION['logged'])){
    ?>
    <nav class="navbar navbar-expand-md navbar-light bg-light rounded my-3">        
        <a class="navbar-brand" href="home">Employes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-nav" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="app-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] === 'home' ? 'active' : ''; ?>"><a class="nav-link" href="home">Home</a></li>
                <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] === 'add' ? 'active' : ''; ?>"><a class="nav-link" href="add">Add Employe</a></li>
                <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] === 'profile' ? 'active' : ''; ?>"><a class="nav-link" href="profile">Profile</a></li>
                <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] === 'logout' ? 'active' : ''; ?>"><a class="nav-link" href="logout">Logout</a></li>
            </ul>
        </div>
    </nav>
    <?php } ?>