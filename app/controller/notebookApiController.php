<?php
require_once("app/model/userModel.php");
require_once("app/model/notebookModel.php");
require_once("app/model/noteModel.php");
require_once("app/view/json.view.php");

class NotebookApiController {
    private $userModel;
    private $notebookModel;
    private $view;

    public function __construct() {
        $this->userModel = new userModel();
        $this->notebookModel = new notebookModel();
        $this->view = new JSONView();
    }

    function getAllNotebook($request, $response) {
        $user = $request->params->user;

        if ($this->userModel->searchUser($user)) {
            $notebooks = $this->notebookModel->getAllNotebooks($this->userModel->getIdUser());
            return $this->view->response($notebooks);
        } else {
            return $this->view->response("Usuario $user no encontrado", 404);
        }
    }

    function getNotebook($request, $response) {
        $user = $request->params->user;
        $idNotebook = intval($request->params->idNotebook);

        if ($this->userModel->searchUser($user)) {
            if ($this->notebookModel->searchNotebook($idNotebook)) {
                $notebook = $this->notebookModel->getNotebook($idNotebook, $this->userModel->getIdUser());
                return $this->view->response($notebook);
            } else {
                return $this->view->response("Libreta $idNotebook no encontrada", 404);
            }
        } else {
            return $this->view->response("Usuario $user no encontrado", 404);
        }
    }

    function createNotebook($request, $response) {
        $user = $request->params->user;
        $body = json_decode($request->body);

        if ($this->userModel->searchUser($user)) {
            $this->notebookModel->createNotebook($body->noteDate, $this->userModel->getIdUser());
            return $this->view->response("Libreta creada con éxito", 201);
        } else {
            return $this->view->response("Usuario $user no encontrado", 404);
        }
    }

    function updateNotebook($request, $response) {
        $user = $request->params->user;
        $idNotebook = intval($request->params->idNotebook);
        $body = json_decode($request->body);

        if ($this->userModel->searchUser($user)) {
            if ($this->notebookModel->searchNotebook($idNotebook)) {
                $this->notebookModel->updateNotebook($idNotebook, $body->noteDate, $this->userModel->getIdUser());
                return $this->view->response("Libreta $idNotebook actualizada con éxito");
            } else {
                return $this->view->response("Libreta $idNotebook no encontrada", 404);
            }
        } else {
            return $this->view->response("Usuario $user no encontrado", 404);
        }
    }

    function deleteNotebook($request, $response) {
        $user = $request->params->user;
        $idNotebook = intval($request->params->idNotebook);

        if ($this->userModel->searchUser($user)) {
            if ($this->notebookModel->searchNotebook($idNotebook)) {
                $this->notebookModel->deleteNotebook($idNotebook, $this->userModel->getIdUser());
                return $this->view->response("Libreta $idNotebook eliminada con éxito");
            } else {
                return $this->view->response("Libreta $idNotebook no encontrada", 404);
            }
        } else {
            return $this->view->response("Usuario $user no encontrado", 404);
        }
    }
}
