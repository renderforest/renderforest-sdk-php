<?php

require '../../vendor/autoload.php';

$template = \Renderforest\ApiClient::getTemplate(701, 'ru');

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
    echo '-- Project ID - ' . $category->getProjectId() . PHP_EOL;
    echo '-- Title - ' . $category->getTitle() . PHP_EOL;

    echo PHP_EOL;
}

echo PHP_EOL;
