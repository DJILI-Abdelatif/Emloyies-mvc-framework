<?php

    use controllers\UsersController;

    $user = new UsersController();

    $user->profile();

?>
<main role="main">
    <div class="jumbotron">
        <div class="col-sm-8 mx-auto">
            <h1 class="text-center">Welcom Profile Page</h1>
            <p class="text-center"><i class="fa fa-user"></i><?php echo ' '.$_SESSION['username'] ?></p>
        </div>
    </div>
</main>