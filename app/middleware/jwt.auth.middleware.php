<?php
    class JWTAuthMiddleware {
        public function run($req, $res) {

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                return; 
            }

            $authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? null;

            if (!$authHeader) {
                $res->send(401, ["error" => "Authorization header missing"]);
                die();
            }

            $authHeader = explode(' ', $authHeader);

            if (count($authHeader) != 2 || $authHeader[0] !== 'Bearer') {
                $res->send(401, ["error" => "Invalid token format"]);
                die();
            }

            $jwt = $authHeader[1];
            $userData = validateJWT($jwt);

            if (!$userData) {
                $res->send(401, ["error" => "Invalid or expired token"]);
                die();
            }

            $req->user = $userData;
        }
    }
