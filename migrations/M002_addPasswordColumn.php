<?php

    namespace migrations;

    use database\Database;

    class M002_addPasswordColumn
    {

        public function up() {
            $db = new Database();
            $statment = $db->prepare("ALTER TABLE users ADD COLUMN IF NOT EXISTS password VARCHAR(255) NOT NULL");
            $statment->execute();
        }

        public function down() {
            $db = new Database();
            $statment = $db->prepare("ALTER TABLE users DROP COLUMN password");
            $statment->execute();
        }
    }

?>