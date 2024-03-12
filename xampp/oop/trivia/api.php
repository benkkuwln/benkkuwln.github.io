<?php
header('Content-Type: application/json');

$apiUrl = 'https://opentdb.com/api.php?amount=1&category=15&difficulty=easy&type=boolean';

// Set a user-agent header to mimic a browser request
$options = [
    'http' => [
        'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36",
    ],
];

$context = stream_context_create($options);

// Fetch a question from the Opentdb
$response = file_get_contents($apiUrl, false, $context);

if ($response === false) {
    echo json_encode(["error" => "Failed to fetch question"]);
} else {
    // Try to decode the response as JSON
    $decodedResponse = json_decode($response, true);

    if (is_array($decodedResponse) && isset($decodedResponse['results']) && is_array($decodedResponse['results']) && count($decodedResponse['results']) > 0) {
        echo json_encode($decodedResponse['results'][0]);
    } else {
        echo json_encode(["error" => "Invalid or empty JSON response from the API"]);
    }
}
?>