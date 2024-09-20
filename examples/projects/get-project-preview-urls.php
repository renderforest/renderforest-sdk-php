<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    "fbcc4dc6a09e47ffdb3852311116b6fb",
    "735823"
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