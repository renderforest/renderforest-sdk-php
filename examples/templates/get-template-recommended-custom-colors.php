<?php

require '../../vendor/autoload.php';

$customColorCollectionGroup = \Renderforest\ApiClient::getTemplateRecommendedCustomColors(701);

/** @var \Renderforest\Template\CustomColor\Collection\CustomColorCollection $customColorCollection */
foreach ($customColorCollectionGroup as $customColorCollection) {
    /** @var \Renderforest\Template\CustomColor\CustomColor $customColor */
    foreach ($customColorCollection as $customColor) {
        echo 'ID - ' . $customColor->getId() . PHP_EOL;
        echo 'HEX Code - ' . $customColor->getHexCode() . PHP_EOL;
        echo 'Index - ' . $customColor->getIndex() . PHP_EOL;
        echo 'Description - ' . $customColor->getDescription() . PHP_EOL;
        echo 'Title - ' . $customColor->getTitle() . PHP_EOL;

        echo PHP_EOL;
    }

    echo PHP_EOL;
}
