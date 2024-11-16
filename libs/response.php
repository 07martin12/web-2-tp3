<?php

    class Response {
        public $user = null;

        public function send($statusCode, $data = null) {
            http_response_code($statusCode);

            if ($data !== null) {
                echo json_encode($data);
            }
        }
    }