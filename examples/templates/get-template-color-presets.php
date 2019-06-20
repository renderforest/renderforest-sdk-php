<?php

require '../../vendor/autoload.php';

$templateColorPresets = \Renderforest\ApiClient::getTemplateColorPresets(701);

echo 'Count - ' . count($templateColorPresets) . PHP_EOL;
echo PHP_EOL;

foreach ($templateColorPresets as $templateColorPreset) {
    foreach ($templateColorPreset->getColorHexCodes() as $index => $colorHexCode) {
        echo 'Color ' . $index . ' - ' . $colorHexCode . PHP_EOL;
        echo PHP_EOL;
    }

    echo PHP_EOL;
}
