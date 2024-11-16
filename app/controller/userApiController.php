<?php

require_once ("app/model/userModel.php");
require_once ("app/view/json.view.php");
require_once ("libs/jwt.php");

class UserApiController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new JSONView();
    }

    public function getToken() {
    $auth_header = $_SERVER['HTTP_AUTHORIZATION'];
    $auth_header = explode(' ', $auth_header);

    if (count($auth_header) != 2) {
        return $this->view->response("Incorrect Credentials", 400);
    }

    if ($auth_header[0] != 'Basic') {
        return $this->view->response("Incorrect Credentials", 400);
    }

        $user_pass = base64_decode($auth_header[1]);
        $user_pass = explode(':', $user_pass);

    if (!$this->model->passwordVerify ($user_pass [0], $user_pass[1])) {
        return $this->view->response("Incorrect Credentials", 400);
    }

    $token = createJWT(array(
        'name' => $user_pass[0],
        'role' => 'admin',
        'iat' => time(),
        'exp' => time() + 300,
        'Saludo' => 'Hola',
    ));

        return $this->view->response($token);
    }
}
