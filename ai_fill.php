<?php
require 'vendor/autoload.php';
use OpenAI\Client;

$apiKey = trim(file_get_contents(__DIR__ . '/.env'));
$client = OpenAI::client($apiKey);

$prompt = "Create an invoice for Coconut Company for 30 coconut bags, priced at 500 GHS a bag, with a 21% VAT.";
$data = [
    "model" => "gpt-4o-mini",
    "messages" => [
        ["role" => "system", "content" => "Return structured JSON for invoice details."],
        ["role" => "user", "content" => $prompt]
    ],
    "response_format" => ["type" => "json_object"]
];

$ch = curl_init("https://api.openai.com/v1/chat/completions");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Authorization: Bearer $apiKey"
    ],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data)
]);
$response = curl_exec($ch);
curl_close($ch);

$json = json_decode($response, true);
if (!isset($json['choices'][0]['message']['content'])) {
    echo json_encode(["error" => "Unexpected API response", "raw" => $json]);
    exit;
}

// Output structured JSON (decoded once)
$assistantContent = $json['choices'][0]['message']['content'];

// Ensure it’s valid JSON before sending to frontend
$result = json_decode($assistantContent, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(["error" => "Model output not valid JSON", "raw" => $assistantContent]);
    exit;
}

// Final clean JSON output
echo json_encode($result, JSON_PRETTY_PRINT);


