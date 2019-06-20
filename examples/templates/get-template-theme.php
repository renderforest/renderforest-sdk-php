<?php

require '../../vendor/autoload.php';

$templateTheme = \Renderforest\ApiClient::getTemplateTheme(701);

echo 'ID - ' . $templateTheme->getId() . PHP_EOL;
echo 'Theme Name - ' . $templateTheme->getThemeName() . PHP_EOL;
echo 'Variable Name - ' . $templateTheme->getVariableName() . PHP_EOL;
echo PHP_EOL;

echo 'Data: ' . PHP_EOL;
foreach ($templateTheme->getData() as $dataItem) {
    echo '-- ' . 'Image - ' . $dataItem->getImage() . PHP_EOL;
    echo '-- ' . 'Name - ' . $dataItem->getName() . PHP_EOL;
    echo '-- ' . 'Value - ' . $dataItem->getValue() . PHP_EOL;

    echo PHP_EOL;
}

echo PHP_EOL;
