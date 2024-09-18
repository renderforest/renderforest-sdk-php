<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectId = 12345; // Replace with your actual project ID
$params = [
    'quality' => 0,
    'screenIds' => [1, 2, 3], // Replace with actual screen IDs
];

try {
    $previewUrl = $renderforestClient->generateLegoScreensPreviews($projectId, $params);
    echo "Preview URL: " . $previewUrl . PHP_EOL;
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}