<?php
    require_once 'libs/request.php';
    require_once 'libs/response.php';

    class Route {
        private $url;
        private $verb;
        private $controller;
        private $method;
        private $params;

        public function __construct($url, $verb, $controller, $method){
            $this->url = $url;
            $this->verb = $verb;
            $this->controller = $controller;
            $this->method = $method;
            $this->params = [];
        }

        public function match($url, $verb) {

            if($this->verb != $verb){
                return false;
            }
            
            $partsURL = explode("/", trim($url,'/')); //url solicitada
            $partsRoute = explode("/", trim($this->url,'/')); //url definida

            //comparo las longitudes de ambos arreglos
            if(count($partsRoute) != count($partsURL)){
                return false;
            }

                     //array       //clave => valor
            foreach ($partsRoute as $key => $part) {
                if($part[0] != ":"){ //evaluar si se paso un parametro en la url
                    if($part != $partsURL[$key]) { //url definida no coincide con url solicitada
                        return false;
                    } 
                } else {
                    //extraer parametro de la url
                    $this->params[''.substr($part,1)] = $partsURL[$key];
                }
            }
            return true; 
        }

        public function run($request, $response){
            //es el nombre de la clase que será instanciada
            $controller = $this->controller;  
            //es el nombre del metodo que será invocado
            $method = $this->method;

            //se le asigna una nueva propiedad al objeto request que es convertida a objeto.
            $request->params = (object) $this->params;

            //se crea la clase y se descarta cuando se invoca el metodo 
            (new $controller ()) -> $method ($request, $response);
        }
        
    }   

    class Router {
        private $routeTable = [];
        private $defaultRoute;
        private $request;
        private $response;
        
        public function __construct() {
            $this->defaultRoute = null;
           $this->request = new Request();
            $this->response = new Response();
        }

        public function addRouter ($url, $verb, $controller, $method) {
            $this->routeTable[] = new Route($url, $verb, $controller, $method);
        }

        public function router ($url, $verb) {
            foreach ($this->routeTable as $route) {
                //validar url solicitada 
                if($route->match($url, $verb)){
                    //ejecutar consulta
                    $route->run($this->request, $this->response);
                    return;
                }
            }

            //no hay coincidencia, configurar ruta por defecto. 
            if ($this->defaultRoute != null) {
                //$this->defaultRoute->run($this->request, $this->response);
            }
        }
    }

/*

class Router {

    public function addMiddleware($middleware) {
        $this->middlewares[] = $middleware;
    }

    public function setDefaultRoute($controller, $method) {
        $this->defaultRoute = new Route("", "", $controller, $method);
    }
}
*/