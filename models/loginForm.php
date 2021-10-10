<?php

    namespace models;

    use core\Model;
    use core\Session;

    class LoginForm extends Model
    {

        public string $username = '';
        public string $password = '';

        public function rules(): array
        {
            return [
                'username' => [self::RULE_REQUIRED],
                'password' => [self::RULE_REQUIRED]
            ];
        }

        public function labels()
        {
            return [
                'username' => 'User name',
                'password' => 'Password'
            ];
        }

        public function login() {
            $user = User::findOne(['username' => $this->username]);
            if(!$user) {
                $this->addErrors('username', 'user does not exists with this username');
                return false;
            }
            if(!password_verify($this->password, $user->password)) {
                $this->addErrors('password', 'password is incorrect');
                return false;
            }
            return true;
        }
    }

?>