<?php

require '../../vendor/autoload.php';

$templateTransitions = \Renderforest\ApiClient::getTemplateTransitions(701);

echo 'ID - ' . $templateTransitions->getId() . PHP_EOL;
echo 'Theme Name - ' . $templateTransitions->getTransitionName() . PHP_EOL;
echo 'Variable Name - ' . $templateTransitions->getVariableName() . PHP_EOL;
echo PHP_EOL;

echo 'Data: ' . PHP_EOL;
foreach ($templateTransitions->getData() as $dataItem) {
    echo '-- ' . 'Image - ' . $dataItem->getImage() . PHP_EOL;
    echo '-- ' . 'Name - ' . $dataItem->getName() . PHP_EOL;
    echo '-- ' . 'Value - ' . $dataItem->getValue() . PHP_EOL;

    echo PHP_EOL;
}

echo PHP_EOL;
