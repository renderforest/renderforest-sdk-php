<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$affectedRows = $renderforestClient->deleteSpecificProjectVideos(
    16296971,
    \Renderforest\Project\RenderQuality\Entity\RenderQuality::RENDER_QUALITY_360 // in case you want to delete all videos, simply don not pass anything as a second param
);

echo 'Affected Rows - ' . $affectedRows . PHP_EOL;
