<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$fonts = $renderforestClient->getTemplateAvailableFonts(701);

echo 'Count - ' . count($fonts) . PHP_EOL;
echo PHP_EOL;

foreach ($fonts as $font) {
    echo 'ID - ' . $font->getId() . PHP_EOL;
    echo 'Character Size - ' . $font->getCharacterSize() . PHP_EOL;
    echo 'Name - ' . $font->getName() . PHP_EOL;

    echo PHP_EOL;
}

var_dump($fonts->getFontById(1656));
