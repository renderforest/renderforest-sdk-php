<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$affectedRows = $renderforestClient->deleteProject(15747948);

echo 'Affected Rows - ' . $affectedRows . PHP_EOL;
