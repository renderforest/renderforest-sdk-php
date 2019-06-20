<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$sounds = $renderforestClient->getAllSounds(15);

echo 'Count - ' . count($sounds) . PHP_EOL;
echo PHP_EOL;

foreach ($sounds as $sound) {
    if ($sound instanceof \Renderforest\Sound\Sound) {
        /** @var \Renderforest\Sound\Sound $sound */

        echo 'ID - ' . $sound->getId() . PHP_EOL;
        echo 'Duration - ' . $sound->getDuration() . PHP_EOL;
        echo 'Genre - ' . $sound->getGenre() . PHP_EOL;
        echo 'Low Quality - ' . $sound->getLowQuality() . PHP_EOL;
        echo 'Path - ' . $sound->getPath() . PHP_EOL;
        echo 'Title - ' . $sound->getTitle() . PHP_EOL;

    } elseif ($sound instanceof \Renderforest\Sound\UserSound) {
        /** @var \Renderforest\Sound\UserSound $sound */

        echo 'ID - ' . $sound->getId() . PHP_EOL;
        echo 'Duration - ' . $sound->getDuration() . PHP_EOL;
        echo 'File Size - ' . $sound->getFileSize() . PHP_EOL;
        echo 'Path - ' . $sound->getPath() . PHP_EOL;
        echo 'Title - ' . $sound->getTitle() . PHP_EOL;
        echo 'User ID - ' . $sound->getUserId() . PHP_EOL;
        echo 'Voice Over - ' . ($sound->isVoiceOver() ? 'true' : 'false') . PHP_EOL;
    }

    echo PHP_EOL;
}
