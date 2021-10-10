<?php

    use controllers\EmployesController;
    use core\Alert;
    use core\form\Form;


    $update = new EmployesController();
    // $employe = $update->getOneEmploye();

    $model = $update->getEmploye();
    $update->updateEmploye();
    
    // if(isset($_POST['submit'])) {
        // $employe = $update->updateEmploye();
    // }





    

?>

<main role="main">
    <div class="jumbotron">
        <div class="col-sm-8 mx-auto">
            <h1 class="text-center">Welcom Update Page</h1> 
            <div class="text-center mt-3"><?php Alert::getAlert(); ?></div>
        </div>
    </div>
</main>

<div class="col-md-8 mx-auto">
    <?php 
        $form = Form::begin('', 'POST'); 
        echo $form->inputField($model, 'id')->hiddenField(); 
        echo $form->field($model, 'name'); 
        echo $form->field($model, 'email');
        echo $form->buttonField('Update', 'btn-outline-info btn-block'); 
        $form->end(); 
    ?>
</div>


<!-- 
<div class="col-md-8 mx-auto">
<form method="post">
    <input type="hidden" name="id_employe" value="<?php echo isset($_POST['submit']) ? '' : $employe['id'] ?>" >
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo isset($_POST['submit']) ? '' : $employe['name'] ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo isset($_POST['submit']) ? '' : $employe['email'] ?>" required>
    </div>
    <button type="submit" name="submit" class="btn btn-info btn-block">send</button>
</form>
</div> -->