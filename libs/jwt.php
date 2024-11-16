<?php

function createJWT($payload) {

    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

    $payload = json_encode($payload);

    $header = base64_encode($header);
    $header = str_replace(['+', '/', '='], ['-', '_', ''], $header);
    $payload = base64_encode($payload);
    $payload = str_replace(['+', '/', '='], ['-', '_', ''], $payload);

    $secret = '01note1Pax01'; 
    $signature = hash_hmac('sha256', $header . "." . $payload, $secret, true);
    $signature = base64_encode($signature);
    $signature = str_replace(['+', '/', '='], ['-', '_', ''], $signature);

    return $header . "." . $payload . "." . $signature;
}

function validateJWT($jwt) {
    $jwtParts = explode('.', $jwt);
    if (count($jwtParts) != 3) {
        return null;
    }

    list($header, $payload, $signature) = $jwtParts;

    $secret = '01note1Pax01';
    $validSignature = hash_hmac('sha256', $header . "." . $payload, $secret, true);
    $validSignature = base64_encode($validSignature);
    $validSignature = str_replace(['+', '/', '='], ['-', '_', ''], $validSignature);

    if ($signature !== $validSignature) {
        return null;
    }

    $payload = json_decode(base64_decode($payload));

    if ($payload->exp < time()) {
        return null;
    }

    return $payload;
}
