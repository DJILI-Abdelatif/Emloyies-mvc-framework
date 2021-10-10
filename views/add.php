<?php

    use controllers\EmployesController;
    use core\Alert;
    use core\form\Form;

    // if(isset($_POST['submit'])) {
    //     $add = new EmployesController();
    //     $add->addEmploye();
    //     // $model = $add->registeremploye();    
    // }

    $employe = new EmployesController();
    $model = $employe->registeremploye();


?>

<main role="main">
    <div class="jumbotron">
        <div class="col-sm-8 mx-auto">
            <h1 class="text-center">Welcom Add Page</h1>
            <div class="text-center mt-3"><?php Alert::getAlert(); ?></div>
        </div>
    </div>
</main>

<div class="col-md-8 mx-auto">
    <?php 
        $form = Form::begin('', 'POST'); 
        echo $form->field($model, 'name'); 
        echo $form->field($model, 'email'); 
        echo $form->buttonField('Register', 'btn-outline-info btn-block');
        $form->end(); 
    ?>
</div>

<!-- <div class="col-md-8 mx-auto">
    <form action="add" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <button type="submit" name="submit" class="btn btn-info btn-block">send</button>
    </form>
</div> -->