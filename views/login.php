<?php

    use controllers\UsersController;
    use core\Alert;
    use core\form\Form;

    $user = new UsersController();
    // $user->loginUser();

    $model = $user->login();

?>

<main role="main">
    <div class="jumbotron">
        <div class="col-sm-8 mx-auto">
            <h1 class="text-center">Welcom Login Page</h1>
            <div class="text-center mt-3"><?php Alert::getAlert(); ?></div>
        </div>
    </div>
</main>

<div class="col-md-8 mx-auto">
    <?php
        $form = Form::begin('', 'post'); 
        echo $form->field($model, 'username'); 
        echo $form->field($model, 'password')->passwordField(); 
        echo $form->buttonField('Login', 'btn-outline-info btn-block');
        $form->end(); 
    ?>
    <span>
        If you don't have account than
        <a href="<?php echo BASE_URL ?>register">Register</a>
    </span>
</div>

<!-- 
<div class="col-md-8 mx-auto">
<form method="POST">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <input type="submit" name="login" value="Login" class="btn btn-outline-info btn-block">
</form>
<span>
    If you don't have account than
    <a href="<?php echo BASE_URL ?>register">Register</a>
</span> 
</div> -->