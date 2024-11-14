<?php
require_once "config/config.php";

class noteModel {
    private $db_connection;
    private $getNote;

    public function __construct() {
        $this->db_connection = new PDO(DNS, USER, PASSWORD);
    }

    private function loadNote () {
        $this->getNote = $this->db_connection->prepare("SELECT * FROM notes");
        $this->getNote->execute();
        return $this->getNote->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchNote ($idNote) { //idNote no es null
        $dataNotes = $this->loadNote(); 
        $noteCount = $dataNotes [count($dataNotes)-1];
        return ($noteCount["idNote"] <= $idNote); 
    }

    public function getNote ($idNote) {
        $dataNotes = $this->loadNote(); 
        $note = [];

        foreach ($dataNotes as $dataNote) {
            if ($dataNote ["idNote"] === $idNote) {
                $note [] = [
                    "idNote" => $dataNote ["idNote"],
                    "idNotebook" => $dataNote ["idNotebook"],
                    "title" => $dataNote ["title"],
                    "note" => $dataNote ["note"]
                ];
            }
        }

        return $note;
    }

    public function getAllNotes ($idNotebook) { //idNotebook es un arreglo
        $dataNotes = $this->loadNote(); 
        $notes = [];

        for ($pos = 0; $pos<count($idNotebook); $pos++) {
            foreach ($dataNotes as $dataNote) {
                if ($dataNote ["idNotebook"] === $idNotebook [$pos]) {
                    $notes [] = [
                        "idNote" => $dataNote ["idNote"],
                        "idNotebook" => $dataNote ["idNotebook"],
                        "title" => $dataNote ["title"],
                        "note" => $dataNote ["note"]
                    ];
                }
            }
        }
        return $notes; 
    }
}