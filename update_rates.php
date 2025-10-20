<?php

// Config
$apiKey = 'a54de0ce6e694c158f1f2ce2e333e1dd'; // Replace with your Open Exchange Rates key
// https://openexchangerates.org/api/latest.json?app_id=a54de0ce6e694c158f1f2ce2e333e1dd
$apiUrl = "https://openexchangerates.org/api/latest.json?app_id={$apiKey}&base=USD&symbols=USD,GHS,EUR,GBP"; // Customize symbols
$ratesFile = __DIR__ . '/rates.json';
$logFile = __DIR__ . '/rates_update.log';

// Function to log messages
function logMessage($message, $file)
{
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($file, "[{$timestamp}] {$message}\n", FILE_APPEND | LOCK_EX);
}

// Fetch and save rates
function fetchAndSaveRates($url, $file, $logFile)
{
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => 'User-Agent: Mozilla/5.0 (compatible; Rates Updater)',
            'timeout' => 10
        ]
    ]);

    $response = @file_get_contents($url, false, $context);
    if ($response === false) {
        logMessage('Error: Failed to fetch rates (network/API issue).', $logFile);
        return false;
    }

    $data = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE || !isset($data['rates'])) {
        logMessage('Error: Invalid JSON response from API.', $logFile);
        return false;
    }

    // Save to JSON file (pretty-printed)
    $jsonOutput = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    if (file_put_contents($file, $jsonOutput, LOCK_EX) === false) {
        logMessage('Error: Failed to write to rates.json.', $logFile);
        return false;
    }

    $timestamp = isset($data['timestamp']) ? date('Y-m-d H:i:s', $data['timestamp']) : 'Unknown';
    logMessage("Rates saved successfully. Timestamp: {$timestamp}", $logFile);
    return true;
}

// Run the update
logMessage('Starting rates update...', $logFile);
if (fetchAndSaveRates($apiUrl, $ratesFile, $logFile)) {
    echo "Update successful.\n"; // For CLI output
} else {
    echo "Update failed. Check {$logFile}.\n";
    exit(1); // Non-zero exit for cron error handling
}
