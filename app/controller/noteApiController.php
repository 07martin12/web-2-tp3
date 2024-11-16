<?php
require_once("app/model/userModel.php");
require_once("app/model/notebookModel.php");
require_once("app/model/noteModel.php");
require_once ("app/view/json.view.php");

class NoteApiController {
    private $userModel;
    private $notebookModel;
    private $noteModel;
    private $view;

    public function __construct() {
        $this->userModel = new userModel();
        $this->notebookModel = new notebookModel();
        $this->noteModel = new noteModel();
        $this->view = new JSONView();
    }

    function getAllNote($request, $response) {
        $user = $request->params->user;
        $notes = [];
        if (isset($request->params->page)) {
            $page = intval($request->params->page);
        } else {
            $page = 1;
        }
    
        if (isset($request->params->limit)) {
            $limit = intval($request->params->limit);
        } else {
            $limit = 10;
        }
    
        if (isset($request->params->filterField)) {
            $filterField = $request->params->filterField;
        } else {
            $filterField = null;
        }
    
        if (isset($request->params->filterValue)) {
            $filterValue = $request->params->filterValue;
        } else {
            $filterValue = null;
        }
    
        if (isset($request->params->sortField)) {
            $sortField = $request->params->sortField;
        } else {
            $sortField = 'idNote';
        }
    
        if (isset($request->params->sortOrder)) {
            $sortOrder = $request->params->sortOrder;
        } else {
            $sortOrder = 'ASC';
        }
    
        if ($this->userModel->searchUser($user)) {
            $notebooks = $this->notebookModel->getAllNotebooks($this->userModel->getIdUser());
            $notes = $this->noteModel->getAllNotes($notebooks, $page, $limit, $filterField, $filterValue, $sortField, $sortOrder);
            return $this->view->response($notes);
        } else {
            return $this->view->response("Usuario $user no encontrado", 404);
        }
    }

    function getNote($request, $response) {
        $user = $request->params->user;
        $idNote = intval($request->params->idNote);

        if ($this->userModel->searchUser($user)) {
            $notebooks = $this->notebookModel->getAllNotebooks($this->userModel->getIdUser());

            if ($this->noteModel->searchNote($idNote)) {
                $note = $this->noteModel->getNote($idNote, $notebooks);

                if (!empty($note)) {
                    return $this->view->response($note);
                } else {
                    return $this->view->response("Nota $idNote sin contenido", 204);
                }
            } else {
                return $this->view->response("Nota $idNote no encontrada", 404);
            }
        } else {
            return $this->view->response("Usuario $user no encontrado", 404);
        }
    }

    function createNote($request, $response) {
        $user = $request->params->user;
        $idNotebook = intval($request->params->idNotebook);
        $body = json_decode($request->body);

        if ($this->userModel->searchUser($user)) {
            if ($this->notebookModel->searchNotebook($idNotebook)) {
                $this->noteModel->createNote($body->title, $body->note, $idNotebook);
                return $this->view->response("Nota creada con éxito", 201);
            } else {
                return $this->view->response("Libreta $idNotebook no encontrada", 404);
            }
        } else {
            return $this->view->response("Usuario $user no encontrado", 404);
        }
    }

    function updateNote($request, $response) {
        $user = $request->params->user;
        $idNote = intval($request->params->idNote);
        $idNotebook = intval($request->params->idNotebook);
        $body = json_decode($request->body);

        if ($this->userModel->searchUser($user)) {
            if ($this->noteModel->searchNote($idNote)) {
                $this->noteModel->updateNote($idNote, $body->title, $body->note, $idNotebook);
                return $this->view->response("Nota $idNote actualizada con éxito");
            } else {
                return $this->view->response("Nota $idNote no encontrada", 404);
            }
        } else {
            return $this->view->response("Usuario $user no encontrado", 404);
        }
    }

    function deleteNote($request, $response) {
        $user = $request->params->user;
        $idNote = intval($request->params->idNote);

        if ($this->userModel->searchUser($user)) {
            if ($this->noteModel->searchNote($idNote)) {
                $this->noteModel->deleteNote($idNote);
                return $this->view->response("Nota $idNote eliminada con éxito");
            } else {
                return $this->view->response("Nota $idNote no encontrada", 404);
            }
        } else {
            return $this->view->response("Usuario $user no encontrado", 404);
        }
    }
}
