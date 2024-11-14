<?php
    require_once "config/config.php";

    class userModel {
        private $db_connection;
        private $getUser;

        public function __construct() {
            $this->db_connection = new PDO(DNS, USER, PASSWORD);
        }
        
        private function loadUser () {
            $this->getUser = $this->db_connection->prepare("SELECT idUser, name FROM users");
            $this->getUser->execute();
            return $this->getUser->fetchAll(PDO::FETCH_ASSOC);
        }

        public function searchUser ($idUser) { //idUser no es null
            $dataUser = $this->loadUser(); 
            $userCount = $dataUser [count($dataUser)-1];
            return ($userCount["idUser"] <= $idUser);  
        }

        public function searchUserName ($userName) { //userName no es null
            $dataUsers = $this->loadUser(); 
            $idUserName = null;
            
            foreach ($dataUsers as $dataUser) {
                if ($dataUser ["name"] === $userName) {
                    $idUserName = $dataUser ["name"];
                    break;
                }
            }
            return $idUserName;
        }
}