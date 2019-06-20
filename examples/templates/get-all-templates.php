<?php

require '../../vendor/autoload.php';

$templates = \Renderforest\ApiClient::getAllTemplates();

echo 'Count - ' . count($templates) . PHP_EOL;
echo PHP_EOL;

foreach ($templates as $template) {
    echo 'ID - ' . $template->getId() . PHP_EOL;
    echo 'Description - ' . $template->getDescription() . PHP_EOL;
    echo 'Thumbnail - ' . $template->getThumbnail() . PHP_EOL;
    echo 'Title - ' . $template->getTitle() . PHP_EOL;
    echo 'Video URL - ' . $template->getVideoUrl() . PHP_EOL;
    echo 'Is Video - ' . ($template->isVideo() ? 'Yes' : 'No') . PHP_EOL;

    echo PHP_EOL;
}
