<?php 

    namespace core\form;

    use core\Model;
    use models\User;

    class Form 
    {
        
        public function begin(string $action, string $method) {
            echo sprintf('<form action="%s" method="%s" class="%s">', $action, $method);
            return new Form();
        }

        public function end() {
            echo "</form>";
        }

        public function field(Model $model, $attribute) {
            return new Field($model, $attribute);
        }

        public function inputField(Model $model, string $attribute) {
            return new InputField($model, $attribute);
        } 

        public function buttonField(string $attribute, string $class) {
            return new ButtonField($attribute, $class);
        } 

    }


?>