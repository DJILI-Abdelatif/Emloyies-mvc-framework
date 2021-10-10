<?php


    include_once './autoload.php';

    use database\Database;

    $migration = new Database();
    $migration->applyMigrations();