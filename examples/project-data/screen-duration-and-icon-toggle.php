<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectData = $renderforestClient->getProjectData(16165971);

$screenDuration = $projectData
    ->getScreenByOrder(0)
    ->calculateScreenDuration();

$maxPossibleDuration = $projectData
    ->getScreenByOrder(0)
    ->getMaxPossibleDuration();

$projectData
    ->getScreenByOrder(0)
    ->setDuration(8);

$projectData
    ->getScreenByOrder(0)
    ->toggleIconPosition();

$renderforestClient->updateProjectData(16165971, $projectData);

echo 'Screen Duration - ' . $screenDuration . PHP_EOL;
echo 'Max Possible Duration - ' . $maxPossibleDuration . PHP_EOL;
