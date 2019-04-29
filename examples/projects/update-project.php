<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectId = $renderforestClient->updateProject(
    16296675,
    'new custom title',
    \Renderforest\Project\Project::PRIVACY_PRIVATE
);

echo 'Project Successfully Updated - ID: ' . $projectId . PHP_EOL;
