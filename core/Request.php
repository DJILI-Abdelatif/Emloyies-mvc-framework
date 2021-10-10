<?php 

    namespace core;

    class Request
    {

        public function getMethod() {
            return strtolower($_SERVER['REQUEST_METHOD']);
        }

        public function isPost() {
           return $this->getMethod() === 'post';
        }   
        
        public function isGet() {
            return $this->getMethod() === 'get';
        }   

        public function getBody() {
            $body = [];
            if($this->getMethod() === 'get') {
                foreach($_GET as $key => $value) {
                    $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
            if($this->getMethod() === 'post') {
                foreach($_POST as $key => $value) {
                    $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
            return $body;
        }

        public function getId() {
            if($this->getMethod() === 'post') {
                return isset($_POST['id']) 
                && is_numeric($_POST['id']) 
                ? intval($_POST['id']) : 0;
            }
        }

        public function getInputData() {
            if($this->getMethod() === 'post') {
                return isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
            }
        }
    }

?>