<?php

require '../../vendor/autoload.php';

$template = \Renderforest\ApiClient::getTemplate(1445, 'en');

echo 'ID - ' . $template->getId() . PHP_EOL;
echo 'Description - ' . $template->getDescription() . PHP_EOL;
echo 'Duration - ' . $template->getDuration() . PHP_EOL;
echo 'Rend Count - ' . $template->getRendCount() . PHP_EOL;
echo 'Thumbnail - ' . $template->getThumbnail() . PHP_EOL;
echo 'Title - ' . $template->getTitle() . PHP_EOL;
echo 'Video URL - ' . $template->getVideoUrl() . PHP_EOL;
echo 'Is Video - ' . ($template->isVideo() ? 'Yes' : 'No') . PHP_EOL;

echo PHP_EOL;

echo 'Categories:' . PHP_EOL;

foreach ($template->getCategories() as $category) {
    echo '-- ID - ' . $category->getId() . PHP_EOL;
    echo '-- Parent ID - ' . $category->getParentId() . PHP_EOL;
    echo '-- Title - ' . $category->getTitle() . PHP_EOL;

    echo PHP_EOL;
}

echo PHP_EOL;

echo 'Durations:' . PHP_EOL;

foreach ($template->getDurations() as $duration) {
    echo '-- Template ID - ' . $duration->getTemplateId() . PHP_EOL;
    echo '-- Duration - ' . $duration->getDuration() . PHP_EOL;
    echo '-- Name - ' . $duration->getName() . PHP_EOL;
    echo '-- Link Name - ' . $duration->getLinkName() . PHP_EOL;
    echo '-- Video URL - ' . $duration->getVideoUrl() . PHP_EOL;

    echo PHP_EOL;
}

echo PHP_EOL;
