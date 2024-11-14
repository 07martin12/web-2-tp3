<?php
 // require_once("model/noteModel.php");

  class NoteApiController {
    private $noteModel;

    public function __construct() {
   //   $this->noteModel = new noteModel();

  }

  function getAllNote ($request) {
    echo "endpont activado";
  }

  /*
function get($req) {
      $tareas = $this->model->getTareas();
      return $this->view->response($tareas, 200);
}

public function getTarea($req) {
        $id = $req->params->id;
 …
}


  */

}