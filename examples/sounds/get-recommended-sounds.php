<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$templateId = 701;
//Preferred sound duration
$duration = 60;

$sounds = $renderforestClient->getRecommendedSounds($templateId, $duration);

echo 'Count - ' . count($sounds) . PHP_EOL;
echo PHP_EOL;

foreach ($sounds as $sound) {
    echo 'ID - ' . $sound->getId() . PHP_EOL;
    echo 'Duration - ' . $sound->getDuration() . PHP_EOL;
    echo 'Title - ' . $sound->getTitle() . PHP_EOL;
    echo 'Path - ' . $sound->getPath() . PHP_EOL;
    echo 'Low Quality Path - ' . $sound->getLowQuality() . PHP_EOL;
    echo 'Genre - ' . $sound->getGenre() . PHP_EOL;

    echo PHP_EOL;
}
