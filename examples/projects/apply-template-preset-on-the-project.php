<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectId = $renderforestClient->applyTemplatePresetOnProject(
    16297523,
    294
);

echo 'Project ID - ' . $projectId . PHP_EOL;
