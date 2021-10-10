<?php 

    namespace models;

    use core\DbModel;
    use core\Model;
    use database\Database;
    use PDO;

    class User extends DbModel
    {
        public string $fullname = '';
        public string $username = '';
        public string $password = '';
        public string $confirmPassword = '';

        public function tabelName(): string
        {
            return 'users';
        }

        public function attributes(): array
        {
            return ['fullname', 'username', 'password'];
        }

        public function labels(): array
        {
            return [
                'fullname' => 'Full name',
                'username' => 'User name',
                'password' => 'Password',
                'confirmPassword' => 'Confirm password'
            ];
        }
      
        public function rules(): array
        {
            return [
                'fullname' => [self::RULE_REQUIRED],
                'username' => [self::RULE_REQUIRED],
                // 'email'    => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
                'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 4], [self::RULE_MAX, 'max' => 10]],
                'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
            ];
        }
        
        public function save() {
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            return parent::save();
        }

        // public function createUser(array $data) {
        //     $sql = "INSERT INTO 
        //                 users(fullname, username, password) 
        //             VALUES(
        //                 :fullname,
        //                 :username,
        //                 :password
        //             )";
        //     $statment = Database::prepare($sql);
        //     $statment->bindParam(':fullname', $data['fullname']);
        //     $statment->bindParam(':username', $data['username']);
        //     $statment->bindParam(':password', $data['password']);
        //     if($statment->execute()) return true;
        //     return false;
        // }

        // public function loginUser(string $username) {
        //     $sql = "SELECT * FROM users WHERE username = :username";
        //     $statment = Database::prepare($sql);
        //     $statment->bindParam(':username', $username);
        //     if($statment->execute()) return $statment->fetch(PDO::FETCH_OBJ); 
        // }

    }

?>