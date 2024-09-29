<?php

// Load the private key from a file
$privateKeyFile = 'private.txt';
$privateKey = file_get_contents($privateKeyFile);

if ($privateKey === false) {
    die('Error reading private key file.');
}

// JWT payload
$payload = [
    'iss' => 'your_issuer', // Issuer
    'aud' => 'your_audience', // Audience
    'exp' => time() + 3600, // Expiration time (1 hour from now)
    'sub' => 'your_subject', // Subject
    'payload' => 'payload_example' // Custom payload data
];

// Function to base64 URL encode
function base64UrlEncode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

// Function to generate JWT
function generateJWT($payload, $privateKey) {
    // Encode Header
    $header = json_encode(['alg' => 'RS256', 'typ' => 'JWT']);
    $encodedHeader = base64UrlEncode($header);

    // Encode Payload
    $encodedPayload = base64UrlEncode(json_encode($payload));

    // Create Signature
    $data = $encodedHeader . '.' . $encodedPayload;
    $signature = '';

    // Create the signature using OpenSSL
    if (openssl_sign($data, $signature, $privateKey, OPENSSL_ALGO_SHA256)) {
        return $data . '.' . base64UrlEncode($signature);
    } else {
        throw new Exception('Unable to sign the data.');
    }
}

// Generate JWT
try {
    $jwt = generateJWT($payload, $privateKey);
    echo "Generated JWT: " . $jwt;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
