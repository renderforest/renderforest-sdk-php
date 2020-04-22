<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectData = $renderforestClient->getProjectData(24392313);

// Set the screen which snapshot must be returned.
$projectData->setCurrentScreenId(0);
$snapshotUrl = $renderforestClient->getScreenSnapshot($projectData);

echo 'Screen Snapshot - ' . $snapshotUrl . PHP_EOL;