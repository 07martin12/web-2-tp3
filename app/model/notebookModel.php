<?php

require_once "app/config/config.php";

class notebookModel {
    private $db_connection;

    public function __construct() {
        $this->db_connection = new PDO(DNS, USER, PASSWORD);
    }

    private function loadNotebook() {
        $sql = "SELECT * FROM notebooks";
        $stmt = $this->db_connection->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchNotebook($idNotebook) {
        $dataNotebooks = $this->loadNotebook();
        $notebookCount = $dataNotebooks[count($dataNotebooks) - 1];
        return ($notebookCount["idNotebook"] >= $idNotebook);
    }

    public function getNotebook($idNotebook, $idUser) {
        $dataNotebooks = $this->loadNotebook();
        $notebook = [];

        foreach ($dataNotebooks as $dataNotebook) {
            if ($dataNotebook["idNotebook"] === $idNotebook && $dataNotebook["idUser"] === $idUser) {
                $notebook[] = [
                    "idNotebook" => $dataNotebook["idNotebook"],
                    "idUser" => $dataNotebook["idUser"],
                    "noteDate" => $dataNotebook["noteDate"],
                    "noteCount" => $dataNotebook["noteCount"]
                ];
            }
        }

        return $notebook;
    }

    public function getAllNotebooks($idUser) {
        $dataNotebooks = $this->loadNotebook();
        $notebooks = [];

        foreach ($dataNotebooks as $dataNotebook) {
            if ($dataNotebook["idUser"] === $idUser) {
                $notebooks[] = [
                    "idNotebook" => $dataNotebook["idNotebook"],
                    "idUser" => $dataNotebook["idUser"],
                    "noteDate" => $dataNotebook["noteDate"],
                    "noteCount" => $dataNotebook["noteCount"]
                ];
            }
        }
        return $notebooks;
    }

    public function createNotebook($noteDate, $idUser) {
        $sql = "INSERT INTO notebooks (noteDate, idUser) VALUES ('$noteDate', $idUser)";
        return $this->db_connection->exec($sql);
    }

    public function updateNotebook($idNotebook, $noteDate, $idUser) {
        $sql = "UPDATE notebooks SET noteDate = '$noteDate' WHERE idNotebook = $idNotebook AND idUser = $idUser";
        return $this->db_connection->exec($sql);
    }

    public function deleteNotebook($idNotebook, $idUser) {
        $sql = "DELETE FROM notebooks WHERE idNotebook = $idNotebook AND idUser = $idUser";
        return $this->db_connection->exec($sql);
    }
}
