<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectId = 88172301; // Replace with your actual project ID
$params = [
    'quality' => 720,
];

try {
    $previewUrls = $renderforestClient->getProjectPreviewUrls($projectId, $params);
    echo "Project Preview URLs: " . PHP_EOL;
    print_r($previewUrls);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}