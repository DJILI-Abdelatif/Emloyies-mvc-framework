<?php 

    namespace core;

    use database\Database;

    abstract class Model
    {
        public const RULE_REQUIRED = 'required';
        public const RULE_EMAIL = 'email';
        public const RULE_MIN = 'min';
        public const RULE_MAX = 'max';
        public const RULE_MATCH = 'match';
        public const RULE_UNIQUE = 'unique';
        
        public function loadData(array $data) {
            foreach($data as $attribute => $value) {
                if(property_exists($this, $attribute)) {
                    $this->{$attribute} = $value;
                }
            }
        }

        abstract public function rules(): array;

        public function labels() {
            return [];
        }

        public function getLabel($attribute) {
            return $this->labels()[$attribute] ?? $attribute;
        }

        public $errors = [];

        public function validate() {
            foreach($this->rules() as $attribute => $rules) {
                $value = $this->{$attribute};
                foreach($rules as $rule) {
                    $ruleName = $rule;
                    if(!is_string($ruleName)) {
                        $ruleName = $rule[0];
                    }
                    if($ruleName === self::RULE_REQUIRED && !$value) {
                        $this->addErrorsForRule($attribute, self::RULE_REQUIRED);
                    }
                    if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $this->addErrorsForRule($attribute, self::RULE_EMAIL);
                    }
                    if($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                        $this->addErrorsForRule($attribute, self::RULE_MIN, $rule);
                    }
                    if($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                        $this->addErrorsForRule($attribute, self::RULE_MAX, $rule);
                    }
                    if($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                        $rule['match'] = $this->getLabel($rule['match']);
                        $this->addErrorsForRule($attribute, self::RULE_MATCH, $rule);
                    }
                    if($ruleName === self::RULE_UNIQUE) {
                        $className = $rule['class'];
                        $uniqueAttr = $rule['attribute'] ?? $attribute;
                        $tableName = $className::tableName();
                        $stamtent = Database::prepare("SELECT * FROM $tableName WHERE $uniqueAttr = :attr");
                        $stamtent->bindValue(':attr', $value);
                        $stamtent->execute();
                        $record = $stamtent->fetchObject();
                        if($record) {
                            $this->addErrorsForRule($attribute, self::RULE_UNIQUE, ['field' => $this->getLabel($attribute)]);
                        }
                    }
                }    
            }
            return empty($this->errors);
        }
        
        public function addErrorsForRule(string $attribute, string $rule, $params = []) {
            $message = $this->messageError()[$rule] ?? '';
            foreach($params as $key => $value) {
                $message = str_replace("{{$key}}", $value, $message);
            }
            $this->errors[$attribute][] = $message;
        }

        public function addErrors(string $attribute, string $message) {
            $this->errors[$attribute][] = $message;
        }

        public function messageError() {
            return [
                self::RULE_REQUIRED => 'this field is required',
                self::RULE_EMAIL => 'this field must be valide email address',
                self::RULE_MIN => 'min length of this field must be {min}',
                self::RULE_MAX => 'max length of this field must be {max}',
                self::RULE_MATCH => 'this field must be the same as {match}',
                self::RULE_UNIQUE => 'record with this {field} already exists',
            ];
        }

        public function hasError($attribute) {
            return $this->errors[$attribute] ?? false;
        }

        public function getFirstError($attribute) {
            return $this->errors[$attribute][0] ?? '';
        }

    }

?>