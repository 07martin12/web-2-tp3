<?php
        require_once("app/controller/noteApiController.php");
        require_once ("libs/router.php");

        $ruter = new Router ();

        $ruter->addRouter('notas/', 'GET', 'noteApiController', 'getAllNote');
        $ruter->addRouter('notas/cocina', 'GET', 'noteApiController', 'getAllNote');
        $ruter->addRouter('notas/salud', 'GET', 'noteApiController', 'getAllNote');
        $ruter->addRouter('notas/tecnologia', 'GET', 'noteApiController', 'getAllNote');
        $ruter->addRouter('notas/entretenimiento', 'GET', 'noteApiController', 'getAllNote');
        $ruter->addRouter('notas/educacion', 'GET', 'noteApiController', 'getAllNote');
        
        $ruter->addRouter('notas/:id', 'GET', 'noteApiController', 'get');

        $ruter->router($_GET["resource"], $_SERVER['REQUEST_METHOD']);

        //$router->setDefaultRoute('/default', 'GET', 'DefaultController', 'index');
    //página 404 



        //require_once 'app/middlewares/jwt.auth.middleware.php';
        
        //$router->addMiddleware(new JWTAuthMiddleware());

   //     $router->addRoute('tareas/:id'  ,            'DELETE',  'TaskApiController',   'delete');
     //   $router->addRoute('tareas'  ,                'POST',    'TaskApiController',   'create');
       // $router->addRoute('tareas/:id'  ,            'PUT',     'TaskApiController',   'update');
        //$router->addRoute('tareas/:id/finalizada'  , 'PUT',     'TaskApiController',   'setFinalize');

        //$router->addRoute('usuarios/token'    ,            'GET',     'UserApiController',   'getToken');

