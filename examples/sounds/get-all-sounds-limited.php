<?php

require '../../vendor/autoload.php';

$sounds = \Renderforest\ApiClient::getAllSoundsLimited(15);

echo 'Count - ' . count($sounds) . PHP_EOL;
echo PHP_EOL;

foreach ($sounds as $sound) {
    echo 'ID - ' . $sound->getId() . PHP_EOL;
    echo 'Duration - ' . $sound->getDuration() . PHP_EOL;
    echo 'Genre - ' . $sound->getGenre() . PHP_EOL;
    echo 'Low Quality - ' . $sound->getLowQuality() . PHP_EOL;
    echo 'Path - ' . $sound->getPath() . PHP_EOL;
    echo 'Title - ' . $sound->getTitle() . PHP_EOL;

    echo PHP_EOL;
}
