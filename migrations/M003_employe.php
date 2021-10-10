<?php

    namespace migrations;

    use database\Database;

    class M003_employe
    {

        public function up() {
            $db = new Database();
            $statment = $db->prepare("CREATE TABLE IF NOT EXISTS employes(
                id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
                name VARCHAR (20) NOT NULL,
                email VARCHAR (20) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
            )");
            $statment->execute();
        }

        public function down() {
            $db = new Database();
            $statment = $db->prepare("DROP TABLE employes");
            $statment->execute();
        }
    }


?>