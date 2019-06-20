<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$templateCategories = $renderforestClient->getTemplatesCategories('ru');

echo 'Count - ' . count($templateCategories) . PHP_EOL;
echo PHP_EOL;

foreach ($templateCategories as $templateCategory) {
    echo 'ID - ' . $templateCategory->getId() . PHP_EOL;
    echo 'Parent ID - ' . $templateCategory->getParentId() . PHP_EOL;
    echo 'Title - ' . $templateCategory->getTitle() . PHP_EOL;

    foreach ($templateCategory->getSubCategoriesCollection()->getItems() as $templateSubCategory) {
        echo '-- ' . 'ID - ' . $templateSubCategory->getId() . PHP_EOL;
        echo '-- ' . 'Parent ID - ' . $templateSubCategory->getParentId() . PHP_EOL;
        echo '-- ' . 'Title - ' . $templateSubCategory->getTitle() . PHP_EOL;
    }

    echo PHP_EOL;
}
