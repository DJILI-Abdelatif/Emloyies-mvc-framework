<?php

    use controllers\EmployesController;

    $delete = new EmployesController();

?>
<main role="main">
    <div class="jumbotron">
        <div class="col-sm-8 mx-auto">
            <h1 class="text-center">Welcom Delete Page</h1> 
            <p class="text-center mt-5"><div class="alert alert-info text-center"><?php $employe = $delete->deleteEmploye(); ?></div></p>
        </div>
    </div>
</main>