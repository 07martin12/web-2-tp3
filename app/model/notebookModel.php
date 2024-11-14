<?php
    require_once "config/config.php";

    class notebookModel {
        private $db_connection;
        private $getNotebook;

        public function __construct() {
            $this->db_connection = new PDO(DNS, USER, PASSWORD);
        }
        
        private function loadNotebook () {
            $this->getNotebook = $this->db_connection->prepare("SELECT * FROM notebooks");
            $this->getNotebook->execute();
            return $this->getNotebook->fetchAll(PDO::FETCH_ASSOC);
        }

        public function searchNotebook ($idNotebook) { //idNotebook no es null
            $dataNotebooks = $this->loadNotebook(); 
            $notebookCount = $dataNotebooks [count($dataNotebooks)-1];
            return ($notebookCount["idNote"] <= $idNotebook); 
        }
    
        public function getNotebook ($idNotebook) {
            $dataNotebooks = $this->loadNotebook(); 
            $notebook = [];
    
            foreach ($dataNotebooks as $dataNotebook) {
                if ($dataNotebook ["idNotebook"] === $idNotebook) {
                    $notebook [] = [
                        "idNotebook" => $dataNotebook ["idNotebook"],
                        "idUser" => $dataNotebook ["idUser"],
                        "noteDate" => $dataNotebook ["noteDate"],
                        "noteCount" => $dataNotebook ["noteCount"]
                    ];
                }
            }
    
            return $notebook;
        }
    
        public function getAllNotebooks ($idUser) {
        $dataNotebooks = $this->loadNotebook(); 
        $notebooks = [];
        $pos = 0;

        foreach ($dataNotebooks as $dataNotebook) {
            if ($dataNotebook ["idUser"] === $idUser) {
                $notebooks [$pos] = $dataNotebooks ["idUser"]; 
                $pos++;
            }
        }
        return $notebooks;
    }
}  