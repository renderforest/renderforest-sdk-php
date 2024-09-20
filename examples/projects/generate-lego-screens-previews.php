<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(

    // "your_api_key",
    // "your_client_id"
);

$projectId = 88172301;
$params = [
    'quality' => 0,
    'screenIds' => [99938256],
];

try {
    $result = $renderforestClient->generateLegoScreensPreviews($projectId, $params);
    echo "Result: " . print_r($result, true) . PHP_EOL;
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}