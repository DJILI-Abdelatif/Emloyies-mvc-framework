<?php

    namespace database;

    use migrations\M001_initial;
    use migrations\M002_addPasswordColumn;
    use migrations\M003_employe;
    use PDO;
    use PDOException;

    class Database
    {

        public static string $host = 'localhost';
        public static string $dbname = 'mvc4';
        public static string $username = 'root';
        public static string $password = '';
        public static array $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ];


        public function connect()
        {
            try {
                $connect = new PDO("mysql: host=localhost; dbname=mvc4",
                    self::$username, self::$password, self::$options);
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connect;
            } 
            catch(PDOException $e) {
                echo 'Faild To Connect: '. $e->getMessage();
            }
        }

        public function prepare($sql) {
            return Database::connect()->prepare($sql);
        }

        public function applyMigrations() {
            $this->createMigrationTable();
            $apliedMigrations = $this->getApliedMigration();
            $newMigrations = [];
            $files = scandir("migrations");
            $toAplyMigrations = array_diff($files, $apliedMigrations);

            foreach($toAplyMigrations as $migration) {
                if($migration === '.' || $migration === '..') {
                    continue;
                }

                require_once 'migrations/'.$migration;
                $className = pathinfo($migration, PATHINFO_FILENAME);

                $instance1 = new M001_initial();
                $instance2 = new M002_addPasswordColumn();
                $instance3 = new M003_employe();
                $instance1->up();
                $instance2->up();
                $instance3->up();
                $newMigrations[] = $migration;

            }
        
            if(!empty($newMigrations)) {
                $this->saveMigrations($newMigrations);
            } else {
                echo "all migrations are applied";
            }

        }

        public function createMigrationTable() {
            $statment = $this->prepare("CREATE TABLE IF NOT EXISTS migrations(
                id INT AUTO_INCREMENT PRIMARY KEY,
                migration VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
            )");
            $statment->execute();
        }

        public function getApliedMigration() {
            $statment = $this->prepare("SELECT migration FROM migrations");
            $statment->execute();
            return $statment->fetchAll(PDO::FETCH_COLUMN);
        }

        public function saveMigrations(array $migrations) {
            $str = implode(",", array_map(fn($m) => "('$m')", $migrations));
            $statment = $this->prepare("INSERT INTO migrations (migration) VALUES $str");
            $statment->execute();
        }

    }

?>