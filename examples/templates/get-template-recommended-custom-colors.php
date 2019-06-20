<?php

require '../../vendor/autoload.php';

$customColors = \Renderforest\ApiClient::getTemplateRecommendedCustomColors(701);

foreach ($customColors as $customColor) {
    echo 'ID - ' . $customColor->getId() . PHP_EOL;
    echo 'HEX Code - ' . $customColor->getHexCode() . PHP_EOL;
    echo 'Index - ' . $customColor->getIndex() . PHP_EOL;
    echo 'Description - ' . $customColor->getDescription() . PHP_EOL;
    echo 'Title - ' . $customColor->getTitle() . PHP_EOL;

    echo PHP_EOL;
}
