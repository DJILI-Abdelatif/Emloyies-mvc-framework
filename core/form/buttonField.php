<?php 

    namespace core\form;

    class ButtonField extends Field
    {

        public string $attribute;
        public string $class;

        public function __construct(string $attribute, string $class = '')
        {
            $this->attribute = $attribute;
            $this->class = $class;
        }

        public function __toString()
        {
            return sprintf('
                <button type="submit" name="submit" class="btn %s">%s</button>',
                $this->class,
                $this->attribute
            );
        }

    }

?>