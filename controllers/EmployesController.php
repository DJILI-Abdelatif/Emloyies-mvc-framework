<?php  

    namespace controllers;

    use core\Request;
    use core\Response;
    use core\Session;
    use models\Employe;
use models\SearchForm;

class EmployesController
    {
     
        public Request $request;
        public function __construct()
        {
            $this->request = new Request();
        }

        public function registeremploye() {
            $employe = new Employe();
            if($this->request->isPost()) {
                $employe->loadData($this->request->getBody());
                if($employe->validate() && $employe->save()) {
                    Session::flashSession('success', 'Employe Inserted');
                    header('Location:add');
                }
            }
            return $employe;
        }
  
        public function getEmploye() {
            $employe = new Employe();
            if($this->request->isPost()) {
                return $employe->findOne(['id' => $this->request->getId()]);
            }
            return $employe;
        }

        public function updateEmploye() {
            $employe = new Employe();
            if($this->request->isPost()) {
                $employe->loadData($this->request->getBody());
                if($employe->validate() && $employe->update($this->request->getId())) {
                    Session::flashSession('success', 'Updated Saved');
                    header('Location:home');
                }
            }
            return $employe;
        }

        public function getAllEmployes() {
            $employes = new Employe();
            return $employes->getAllEmployes();
        }

        public function findEmployes() {
            $employe = new Employe();
            if($this->request->isPost()) {
                return $employe->findEmployes(['name' => $this->request->getInputData()]);            
            }
            return $employe;
        }

        public function deleteEmploye() {
            $employe = new Employe();
            if($this->request->isPost()) {
                if($employe->deleteEmploye($this->request->getId())) {
                    echo "Employe Deleted";
                } else {
                    echo "Not Deleted";
                }
            }
            return $employe;
        }

        public function HomeEmployes() {
            $employes = new Employe();
            if($this->request->isPost()) {
                return $this->findEmployes(['name' => $this->request->getInputData()]);
            } else {
                return $this->getAllEmployes();
            }

        }
        
        // public function getAllEmployes() {
        //     return Employe::getAllEmployes();
        // }

        // public function addEmploye() {
        //     $data = [];
        //     if(isset($_POST['submit'])) {
        //         $data['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS); 
        //         $data['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); 
        //         if(Employe::addEmploye($data)) {
        //             Session::flashSession('success', 'Element Inserted');
        //             Response::redirect('home');
        //         } else {
        //             Session::flashSession('warning', 'Faild To Insert');
        //         }
        //     }
        // }
        
        // public function getOneEmploye() {
        //     if(isset($_POST['updateEmploye'])) {
        //         $id = filter_input(INPUT_POST, 'id_employe', FILTER_SANITIZE_NUMBER_INT); 
        //         return Employe::getOneEmploye($id); 
        //     }
        // }

        // public function updateEmploye() {
        //     $data = [];
        //     if(isset($_POST['submit'])) {
        //         $data['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS); 
        //         $data['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); 
        //         $data['id'] = filter_input(INPUT_POST, 'id_employe', FILTER_SANITIZE_NUMBER_INT); 
        //         if(Employe::updateEmploye($data)) {
        //             Session::flashSession('success', 'Element Updated');
        //             Response::redirect('home');
        //         } else {
        //             Session::flashSession('warning', 'Faild To Updated');
        //         }
        //     }
        // }

        // public function deleteEmploye() {
        //     if(isset($_POST['deleteEmploye'])) {
        //         $id = filter_input(INPUT_POST, 'id_employe', FILTER_SANITIZE_NUMBER_INT);
        //         if(Employe::deleteEmploye($id)) {
        //             echo 'Employe Deleted';
        //             Response::redirect('home');
        //         } else {
        //             echo 'Not Deleted';
        //         }
        //     }
        // }

        // public function findEmploye() {
        //     if(isset($_POST['findEmploye'])) {
        //         $data = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        //         return Employe::findEmploye($data); 
        //     }
        // }
    }

?>