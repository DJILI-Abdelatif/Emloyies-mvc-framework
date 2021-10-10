<?php 

    namespace core\form;

    use core\Model;

    class InputField extends Field
    {

        public Model $model;
        public string $attribute;

        public function __construct(Model $model, string $attribute)
        {
            $this->model = $model;
            $this->attribute = $attribute;
        }

        public function __toString()
        {
            return sprintf('<input type="%s" name="%s" value="%s">',
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute}
            );
        }
    }


?>