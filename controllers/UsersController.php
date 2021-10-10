<?php 

    namespace controllers;

    use core\Request;
    use core\Response;
    use core\Session;
    use models\LoginForm;
    use models\User;

    class UsersController
    {

        public Request $request;
        public function __construct()
        {
            $this->request = new Request();
        }

        public function register() {
            $user = new User();
            if($this->request->isPost()) {
                $user->loadData($this->request->getBody());
                if($user->validate() && $user->save()) {
                    // Session::setFlash('success', 'thanks for register');
                    Session::flashSession('success', 'Welcom You Are Member');
                    header('Location:login');
                    return;
                }
            }
            return $user;
        }
        
        public function login() {
            $loginForm = new LoginForm();
            if($this->request->isPost()) {
                $loginForm->loadData($this->request->getBody());
                if($loginForm->validate() && $loginForm->login()) {
                    // Session::setFlash('success', 'Welcom To Home Page');
                    Session::set('logged', true);
                    Session::set('username', $loginForm->username);
                    Session::flashSession('success', 'Welcom To Home Page');
                    header('Location:home');
                    return;
                }
            }
            return $loginForm;
        }

        public function profile() {
            $user = new User();
            return $user;
        }

        // public function createUser() {
        //     $data = [];
        //     $option = [
        //         'cost' => 12
        //     ];
        //     if(isset($_POST['register'])) {
        //         $data['fullname'] = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_SPECIAL_CHARS);
        //         $data['username'] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        //         $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, $option);
        //         if(User::createUser($data)) {
        //             Session::flashSession('success', 'You Are Member Now');
        //             Response::redirect('login');
        //         } else {
        //             Session::flashSession('warning', 'Faild To Register');
        //             Response::redirect('register');
        //         }
        //     }
        // }

        // public function loginUser() {
        //     if(isset($_POST['login'])) {
        //         $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        //         if(User::loginUser($username)) {
        //             $result = User::loginUser($username);
        //             if($result->username === $username) {
        //                 if(password_verify($_POST['password'], $result->password)) {
        //                     Session::set('logged', true);
        //                     Session::set('username', $result->username);
        //                     // Session::setFlash('success', "thanks to login !");
        //                     Session::flashSession('success', "Welcom $result->username");
        //                     header('Location:home');
        //                 } else {
        //                     Session::flashSession('danger', 'Password Incorrect');
        //                     header('Location:login');
        //                 }
        //             }
        //         } else {
        //             Session::flashSession('danger', 'Error In Your Informations');
        //             header('Location:login');
        //         }
        //     }
        // }

        public function logout() {
            session_unset();
            session_destroy();
            header('Location:login');
        }


    }

?>