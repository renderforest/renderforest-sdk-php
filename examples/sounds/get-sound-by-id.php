<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$soundId = 1980240;

$sound = $renderforestClient->getSoundById($soundId);

echo 'ID - ' . $sound->getId() . PHP_EOL;
echo 'Duration - ' . $sound->getDuration() . PHP_EOL;
echo 'Title - ' . $sound->getTitle() . PHP_EOL;
echo 'Path - ' . $sound->getPath() . PHP_EOL;
echo 'Low Quality Path - ' . $sound->getLowQuality() . PHP_EOL;
echo 'Genre - ' . $sound->getGenre() . PHP_EOL;
