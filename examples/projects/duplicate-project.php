<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$newProjectId = $renderforestClient->duplicateProject(16296675);

echo 'New Project ID - ' . $newProjectId . PHP_EOL;
