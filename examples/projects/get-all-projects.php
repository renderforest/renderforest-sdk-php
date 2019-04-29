<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projects = $renderforestClient->getAllProjects();

echo 'Count - ' . count($projects) . PHP_EOL;
echo PHP_EOL;

foreach ($projects as $project) {
    echo 'ID - ' . $project->getId() . PHP_EOL;
    echo 'Template ID - ' . $project->getTemplateId() . PHP_EOL;
    echo 'Title - ' . $project->getTitle() . PHP_EOL;
    echo 'Custom Title - ' . (is_null($project->getCustomTitle()) ? 'NULL' : $project->getCustomTitle()) . PHP_EOL;
    echo 'Status - ' . $project->getStatus() . PHP_EOL;
    echo 'Created At - ' . $project->getCreatedAt() . PHP_EOL;
    echo 'Updated At - ' . $project->getUpdatedAt() . PHP_EOL;
    echo 'Privacy - ' . $project->getPrivacy() . PHP_EOL;

    echo 'Rendered Qualities Order: <br>';
    foreach ($project->getRenderedQualitiesOrder() as $renderedQualityName) {
        echo '-- ' . $renderedQualityName . PHP_EOL;
    }

    echo 'Rendered Qualities: <br>';
    foreach ($project->getRenderQualityCollection()->getItems() as $renderQuality) {
        echo '-- ' . $renderQuality->getName() . ' - ' . (is_null($renderQuality->getValue()) ? 'NULL' : $renderQuality->getValue()) . PHP_EOL;
    }

    echo 'Template Thumbnail - ' . (is_null($project->getTemplateThumbnail()) ? 'NULL' : $project->getTemplateThumbnail()) . PHP_EOL;
    echo 'Project Thumbnail - ' . (is_null($project->getProjectThumbnail()) ? 'NULL' : $project->getProjectThumbnail()) . PHP_EOL;

    $rendering = $project->getRendering();
    if (false === is_null($rendering)) {
        echo 'Rendering: <br>';
        echo '-- ' . 'Render Queue Id - ' . $rendering->getRenderQueueId() . PHP_EOL;
        echo '-- ' . 'Render Queue State - ' . $rendering->getRenderQueueState() . PHP_EOL;
        echo '-- ' . 'Render Queue Quality - ' . $rendering->getRenderQueueQuality() . PHP_EOL;
        echo '-- ' . 'Render Queue Avg Time - ' . $rendering->getRenderQueueAvgTime() . PHP_EOL;
    }

    echo PHP_EOL;
}
