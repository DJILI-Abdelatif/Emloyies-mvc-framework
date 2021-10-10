<?php

    namespace migrations;

    use database\Database;

    class M001_initial
    {

        public function up() {
            $db = new Database();
            $statment = $db->prepare("CREATE TABLE IF NOT EXISTS users(
                id INT AUTO_INCREMENT PRIMARY KEY,
                fullname VARCHAR (255) NOT NULL,
                username VARCHAR (255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )");
            $statment->execute();
        }
        
        public function down() {
            $db = new Database();
            $sql = "DROP TABLE users";
            $statment = $db->prepare($sql);
            $statment->execute();
        }

    }



?>