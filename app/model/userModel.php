<?php
    require_once "app/config/config.php";

    class userModel {
        private $db_connection;
        private $getUser;
        private $idUser;

        public function __construct() {
            $this->db_connection = new PDO(DNS, USER, PASSWORD);
        }
        
        private function loadUser () {
            $this->getUser = $this->db_connection->prepare("SELECT * FROM users");
            $this->getUser->execute();
            return $this->getUser->fetchAll(PDO::FETCH_ASSOC);
        }

        public function searchUser ($user) { 
            $dataUser = $this->loadUser(); 
            //numero total de usuarios
            $userCount = $dataUser [count($dataUser)-1];

            // Buscar el idUser correspondiente al nombre de usuario
            $idUser = $this ->searchUserName($user);   
        
            // Si encontramos un idUser por nombre, comparamos con el último idUser
            if (!empty ($idUser)) {
                
                return ($userCount["idUser"] >= $idUser);  
            } else {
                 // Si no es un nombre es un idUser y lo comparamos con el ultimo valor de la columna
                $this ->idUser = intval ($user);
                return ($userCount["idUser"] >=  intval ($user));  
            }
        }

        public function searchUserName ($userName) { 
            $dataUsers = $this->loadUser(); 
            
            // Buscar el idUser correspondiente al nombre
            foreach ($dataUsers as $dataUser) {
                if ($dataUser ["name"] === $userName) {
                    $this ->idUser = $dataUser ["idUser"];
                    
                    return $dataUser ["idUser"];
                }
            }
            return null;
        }

        public function getIdUser () {
            return  $this ->idUser;  
        }

        public function passwordVerify($userName,$userPassword) {
            $dataUsers = $this->loadUser();
            $successfulLogin = false;
            
            foreach ($dataUsers as $dataUser) {
                if (($dataUser["name"] === $userName) && (password_verify($userPassword, $dataUser["password"]))) {
                    $successfulLogin = true; 
                    break;
                }
            }

            return $successfulLogin;
        }
}