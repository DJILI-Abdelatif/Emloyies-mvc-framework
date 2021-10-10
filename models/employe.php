<?php

    namespace models;

    use core\DbModel;
    use core\Model;
    use database\Database;

    class Employe extends DbModel
    {

        public int $id = 0;
        public string $name = '';
        public string $email = '';

        public function tabelName(): string
        {
            return 'employes';
        }
        
        public function attributes(): array
        {
            return ['name', 'email'];
        }
        
        public function rules(): array
        {
            return [
                'name' => [self::RULE_REQUIRED],
                'email' => [self::RULE_REQUIRED, self::RULE_EMAIL]
            ];
        }
        
        public function labels()
        {
            return [
                'name' => 'Employe Name',
                'email' => 'Employe Email'
            ];
        }
        
        public function save()
        {
            return parent::save();
        }

        public function update($id)
        {
            return parent::update($id);
        }

        public function getAllEmployes()
        {
            return parent::getAll();
        }

        public function findEmployes($where)
        {
            return parent::findData($where);
        }

        public function deleteEmploye($id) {
            return parent::delete($id);
        }



        
        // public function getAllEmployes() {
        //     $sql = "SELECT * FROM employes";
        //     $statment = Database::prepare($sql);
        //     $statment->execute();
        //     return $statment->fetchAll();
        // }
        
        // public function addEmploye(array $data) {
        //     $sql = "INSERT INTO 
        //                 employes(name, email, created_at)
        //             VALUES (
        //                 :name,
        //                 :email,
        //                 now())";
        //     $statment = Database::prepare($sql);
        //     $statment->bindParam(':name', $data['name']);
        //     $statment->bindParam(':email', $data['email']);
        //     if($statment->execute()) return true;
        //     return false;
        // }

        // public function getOneEmploye($id) {
        //     $sql = "SELECT * FROM employes WHERE id = ?";
        //     $statment = Database::prepare($sql);
        //     $statment->bindParam(1, $id);
        //     if($statment->execute()) return $statment->fetch();
        //     return false;
        // }

        // public function updateEmploye(array $data) {
        //     $sql = "UPDATE 
        //                 Employes 
        //             SET 
        //                 name = :name,
        //                 email = :email
        //             WHERE
        //                 id = :id";
        //     $statment = Database::prepare($sql);
        //     $statment->bindParam(':name', $data['name']);
        //     $statment->bindParam(':email', $data['email']);
        //     $statment->bindParam(':id', $data['id']);
        //     if($statment->execute()) return true;
        //     return false;
        // }

        // public function deleteEmploye(int $id) {
        //     $sql = "DELETE FROM employes WHERE id = ?";
        //     $statment = Database::prepare($sql);
        //     $statment->bindParam(1, $id);
        //     if($statment->execute()) return true;
        //     return false;
        // }

        // public function findEmploye(string $data) {
        //     $sql = "SELECT * FROM employes WHERE name LIKE ? OR email LIKE ?";
        //     $statment = Database::prepare($sql);
        //     if($statment->execute(array("%$data%", "%$data%"))) return $statment->fetchAll();
        //     return false;
        // }
    }

?>