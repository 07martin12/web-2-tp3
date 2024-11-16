<?php

    require_once ("libs/router.php");
    require_once ("app/controller/noteApiController.php");
    require_once ("app/controller/notebookApiController.php");
    require_once ("app/controller/userApiController.php");
    require_once ("app/middleware/jwt.auth.middleware.php"); 

    $router = new Router();
    $router->addMiddleware(new JWTAuthMiddleware());

    $router->addRouter('notas/:user', 'GET', 'noteApiController', 'getAllNote'); 
    $router->addRouter('notas/:user/:idNote', 'GET', 'noteApiController', 'getNote'); 

    $router->addRouter('libretas/:user', 'GET', 'notebookApiController', 'getAllNotebook'); 
    $router->addRouter('libretas/:user/:idNotebook', 'GET', 'notebookApiController', 'getNotebook'); 

    $router->addRouter('usuarios', 'POST', 'userApiController', 'createUser'); 
    $router->addRouter('libretas/:user', 'POST', 'notebookApiController', 'createNotebook'); 
    $router->addRouter('notas/:user/:idNotebook', 'POST', 'noteApiController', 'createNote'); 

    $router->addRouter('usuarios/:id', 'PUT', 'userApiController', 'updateUser'); 
    $router->addRouter('libretas/:user/:idNotebook', 'PUT', 'notebookApiController', 'updateNotebook'); 
    $router->addRouter('notas/:user/:idNotebook/:idNote', 'PUT', 'noteApiController', 'updateNote'); 

    $router->addRouter('usuarios/:id', 'DELETE', 'userApiController', 'deleteUser'); 
    $router->addRouter('libretas/:user/:idNotebook', 'DELETE', 'notebookApiController', 'deleteNotebook'); 
    $router->addRouter('notas/:user/:idNotebook/:idNote', 'DELETE', 'noteApiController', 'deleteNote'); 

    $router->addRouter('usuarios/token', 'GET', 'userApiController', 'getToken'); 

    $router->router($_GET['resource'], $_SERVER['REQUEST_METHOD']);
