
<?php

    class Request {

    }


/*

    class Request {
        public $body = null; # { nombre: 'Saludar', descripcion: 'Saludar a todos' }
        public $params = null; # /api/tareas/:id
        public $query = null; # ?soloFinalizadas=true

        public function __construct() {
            try {
                # file_get_contents('php://input') lee el body de la request
                $this->body = json_decode(file_get_contents('php://input'));
            }
            catch (Exception $e) {
                $this->body = null;
            }
            $this->query = (object) $_GET;
        }
    }


    
  private function _requestStatus($code){
      $status = array(
        200 => "OK",
        404 => "Not found",
        500 => "Internal Server Error"
      );
      return (isset($status[$code]))? $status[$code] : $status[500];
    }
*/