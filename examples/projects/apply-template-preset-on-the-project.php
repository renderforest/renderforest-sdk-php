<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectData = $renderforestClient->applyTemplatePresetOnProject(
    15990207,
    701,
    3
);

echo 'Project ID - ' . $projectId . PHP_EOL;
