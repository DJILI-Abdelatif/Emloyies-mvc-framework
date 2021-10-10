<?php 

namespace core;

class Alert
{
    public function getAlert() {
        switch(isset($_COOKIE)){
            case isset($_COOKIE['success']):
                echo "<div class='alert alert-success'>". $_COOKIE['success'] ."</div>";
                break;
            case isset($_COOKIE['warning']):
                echo "<div class='alert alert-warning'>". $_COOKIE['warning'] ."</div>";
                break;
            case isset($_COOKIE['danger']):
                echo "<div class='alert alert-danger'>". $_COOKIE['danger'] ."</div>";
                break;
            case isset($_COOKIE['info']):
                echo "<div class='alert alert-info'>". $_COOKIE['info'] ."</div>";
                break;
            default:
                echo '';
                break;
        }
    }

}



?>