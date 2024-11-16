<?php

require_once "app/config/config.php";

class noteModel {
    private $db_connection;

    public function __construct() {
        $this->db_connection = new PDO(DNS, USER, PASSWORD);
    }

    private function loadNote() {
        $sql = "SELECT * FROM notes";
        $stmt = $this->db_connection->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchNote($idNote) {
        $dataNotes = $this->loadNote(); 
        $noteCount = $dataNotes[count($dataNotes) - 1];
        return ($noteCount["idNote"] >= $idNote);
    }

    public function getNote($idNote, $arrIdNotebooks) {
        $dataNotes = $this->loadNote();
        $note = [];

        foreach ($arrIdNotebooks as $arrIdNotebook) {
            foreach ($dataNotes as $dataNote) {
                if ($dataNote["idNote"] === $idNote && $dataNote["idNotebook"] === $arrIdNotebook["idNotebook"]) {
                    $note[] = [
                        "idNote" => $dataNote["idNote"],
                        "idNotebook" => $dataNote["idNotebook"],
                        "title" => $dataNote["title"],
                        "note" => $dataNote["note"]
                    ];
                }
            }
        }

        return $note;
    }

    public function getAllNotes($arrIdNotebooks) {
        $dataNotes = $this->loadNote(); 
        $notes = [];

        foreach ($arrIdNotebooks as $arrIdNotebook) {
            foreach ($dataNotes as $dataNote) {
                if ($dataNote["idNotebook"] === $arrIdNotebook["idNotebook"]) {
                    $notes[] = [
                        "idNote" => $dataNote["idNote"],
                        "idNotebook" => $dataNote["idNotebook"],
                        "title" => $dataNote["title"],
                        "note" => $dataNote["note"]
                    ];
                }
            }
        }
        return $notes;
    }
    
    public function createNote($title, $noteContent, $idNotebook) {
        $sql = "INSERT INTO notes (title, note, idNotebook) VALUES ('$title', '$noteContent', $idNotebook)";
        return $this->db_connection->exec($sql);
    }

    public function updateNote($idNote, $title, $noteContent, $idNotebook) {
        $sql = "UPDATE notes SET title = '$title', note = '$noteContent', idNotebook = $idNotebook WHERE idNote = $idNote";
        return $this->db_connection->exec($sql);
    }

    public function deleteNote($idNote) {
        $sql = "DELETE FROM notes WHERE idNote = $idNote";
        return $this->db_connection->exec($sql);
    }
}
