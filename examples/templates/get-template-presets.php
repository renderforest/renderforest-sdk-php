<?php

require '../../vendor/autoload.php';

$templatePresets = \Renderforest\ApiClient::getTemplatePresets(701);

echo 'Count - ' . count($templatePresets) . PHP_EOL;
echo PHP_EOL;

foreach ($templatePresets as $templatePreset) {
    echo 'ID - ' . $templatePreset->getId() . PHP_EOL;
    echo 'Template ID - ' . $templatePreset->getTemplateId() . PHP_EOL;
    echo 'Project ID - ' . $templatePreset->getProjectId() . PHP_EOL;
    echo 'Description - ' . $templatePreset->getDescription() . PHP_EOL;
    echo 'Order - ' . $templatePreset->getOrder() . PHP_EOL;
    echo 'Is Public - ' . $templatePreset->isPublic() . PHP_EOL;
    echo 'Thumbnail - ' . $templatePreset->getThumbnail() . PHP_EOL;
    echo 'Title - ' . $templatePreset->getTitle() . PHP_EOL;
    echo 'Video Url - ' . $templatePreset->getVideoUrl() . PHP_EOL;
    echo 'Created At - ' . $templatePreset->getCreatedAt() . PHP_EOL;
    echo 'Updated At - ' . $templatePreset->getUpdatedAt() . PHP_EOL;

    echo PHP_EOL;
}
