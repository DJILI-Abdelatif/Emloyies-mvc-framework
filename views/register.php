<?php

    use controllers\UsersController;
    use core\Alert;
    use core\form\Form;

    $user = new UsersController();
    // $user->createUser();

    $model = $user->register();

?>

<main role="main">
    <div class="jumbotron">
        <div class="col-sm-8 mx-auto">
            <h1 class="text-center">Welcom Register Page</h1> 
            <div class="text-center mt-3"><?php Alert::getAlert(); ?></div>
        </div>
    </div>
</main>

<div class="col-md-8 mx-auto">
    <?php 
        $form = Form::begin('', 'post'); 
        echo $form->field($model, 'fullname'); 
        echo $form->field($model, 'username'); 
        echo $form->field($model, 'password')->passwordField(); 
        echo $form->field($model, 'confirmPassword')->passwordField(); 
        echo $form->buttonField('Register', 'btn-outline-info btn-block'); 
        Form::end(); 
    ?>
    <span>
        If you have account than 
        <a href="<?php echo BASE_URL ?>login">Login</a>
    </span> 
</div>

<!-- <div class="col-md-8 mx-auto">
<form method="POST">
    <div class="form-group">
        <label for="fullname">Fullname</label>
        <input type="text" 
                class="form-control <?php echo $item->hasError('fullname') ? 'is-invalid' : ''; ?>" 
                name="fullname" placeholder="Your Fullname">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control <?php echo $item->hasError('username') ? 'is-invalid' : ''; ?>" name="username" placeholder="Your Username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control <?php echo $item->hasError('password') ? 'is-invalid' : ''; ?>" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="password">Confirm Password</label>
        <input type="password" class="form-control <?php echo $item->hasError('confirmPassword') ? 'is-invalid' : ''; ?>" name="confirmPassword" placeholder="Confirm Password">
    </div>
    <input type="submit" name="register" value="Register" class="btn btn-outline-info btn-block">
</form> -->
<!-- <span>
    If you have account than 
    <a href="<?php echo BASE_URL ?>login">Login</a>
</span>  -->
</div>