<?php

    namespace core;

    use database\Database;

    abstract class DbModel extends Model
    {

        abstract public function tabelName(): string;

        abstract public function attributes(): array;
        
        public static function prepare($sql) {
            return Database::prepare($sql);
        }
        
        public function save() {
            $tableName = $this->tabelName();
            $attributes = $this->attributes();
            $params = array_map(fn($attr) => ":$attr", $attributes);
            $statment = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).") 
                VALUES(".implode(',', $params).")");
            foreach($attributes as $attribute) {
                $statment->bindValue(":$attribute", $this->{$attribute});
            }
            $statment->execute();
            return true;
        }

        public function findOne($where) {
            $tableName = static::tabelName();
            $attribute = array_keys($where);
            $sql = implode(' AND ', array_map(fn($attr) => "$attr = :$attr", $attribute));
            $statment = self::prepare("SELECT * FROM $tableName WHERE $sql");
            foreach($where as $key => $value) {
                $statment->bindValue(":$key", $value);
            }
            $statment->execute();
            return $statment->fetchObject(static::class);
        }

        public function update($id) {
            $tableName = $this->tabelName();
            $attributes = $this->attributes();
            $params = array_map(fn($attr) => "$attr = :$attr", $attributes);
            $statment = self::prepare("UPDATE $tableName SET ".implode(',', $params)." WHERE id = :id");
            foreach($attributes as $attribute) {
                $statment->bindValue(":$attribute", $this->{$attribute});
            }
            $statment->bindValue(":id", $id);
            $statment->execute();
            return true;
        }       

        public function getAll() {
            $tableName = $this->tabelName();
            $statment = self::prepare("SELECT * FROM $tableName");
            $statment->execute();
            return $statment->fetchAll();
        }

        public function findData($where) {
            $tableName = $this->tabelName();
            $attribute = array_keys($where);
            $sql = implode('OR', array_map(fn($attr) => "$attr = :$attr", $attribute));
            // $sql = array_map(fn($attr) => "$attr LIKE %$attr%", $attribute);
            $statment = self::prepare("SELECT * FROM $tableName WHERE $sql");
            foreach($where as $key => $value) {
                $statment->bindValue(":$key", $value);
            }
            $statment->execute();
            return $statment->fetchAll();
        }

        public function delete($id) {
            $tableName = $this->tabelName();
            $statment = self::prepare("DELETE FROM $tableName WHERE id = :id");
            $statment->bindValue(":id", $id);
            return $statment->execute() ? true : false;
        }
        
    }

?>