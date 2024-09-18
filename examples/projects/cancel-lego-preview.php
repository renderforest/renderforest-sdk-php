<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectId = 12345; // Replace with your actual project ID
$queueIds = [67890, 67891]; // Replace with actual queue IDs

try {
    $result = $renderforestClient->cancelLegoPreview($projectId, $queueIds);
    echo "Cancel Lego Preview Result: " . print_r($result, true) . PHP_EOL;
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}