<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$queueId = $renderforestClient->renderProject(
    16970309,
    \Renderforest\Project\RenderQuality\Entity\RenderQuality::RENDER_QUALITY_360,
    'https://example.com/watermark.png'
);

echo 'Queue ID - ' . $queueId . PHP_EOL;
