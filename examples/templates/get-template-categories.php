<?php

require '../../vendor/autoload.php';

$templateCategories = \Renderforest\ApiClient::getTemplateCategories('en');

echo 'Count - ' . count($templateCategories) . PHP_EOL;
echo PHP_EOL;

foreach ($templateCategories as $templateCategory) {
    echo 'ID - ' . $templateCategory->getId() . PHP_EOL;
    echo 'Parent ID - ' . $templateCategory->getParentId() . PHP_EOL;
    echo 'Title - ' . $templateCategory->getTitle() . PHP_EOL;

    foreach ($templateCategory->getSubCategoriesCollection() as $templateSubCategory) {
        echo '-- ' . 'ID - ' . $templateSubCategory->getId() . PHP_EOL;
        echo '-- ' . 'Title - ' . $templateSubCategory->getTitle() . PHP_EOL;
    }

    echo PHP_EOL;
}
