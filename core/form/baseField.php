<?php 

    namespace core\form;

    use core\Model;

    abstract class BaseField 
    {

        public Model $model;
        public string $attribute;

        public function __construct(Model $model, string $attribute)
        {
            $this->model = $model;
            $this->attribute = $attribute;
        }

        abstract public function renderInput(): string;

        public function getLabel() {
            return $this->model->labels()[$this->attribute];
        }

        public function __toString()
        {
            return sprintf('
                <div class="form-group">
                    <label>%s</label>
                        %s
                    <div class="%s">
                        %s
                    </div>
                </div>',
                $this->getLabel(),
                $this->renderInput(),
                $this->model->hasError($this->attribute) ? 'invalid-feedback' : '',
                $this->model->getFirstError($this->attribute)
            );
        }
    }

?>