<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectId = $renderforestClient->addProject(701);

echo 'New Project Successfully Created - ID: ' . $projectId . PHP_EOL;
