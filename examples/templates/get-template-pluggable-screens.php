<?php

require '../../vendor/autoload.php';

$templatePluggableScreensGroupCollection = \Renderforest\ApiClient::getTemplatePluggableScreens(701);

/** @var \Renderforest\Template\PluggableScreensGroup\PluggableScreensGroup $templatePluggableScreensGroup */
foreach ($templatePluggableScreensGroupCollection as $templatePluggableScreensGroup) {
    echo '-- ' . 'ID - ' . $templatePluggableScreensGroup->getId() . PHP_EOL;
    echo '-- ' . 'Name - ' . $templatePluggableScreensGroup->getName() . PHP_EOL;
    echo '-- ' . 'Order - ' . $templatePluggableScreensGroup->getOrder() . PHP_EOL;
    echo PHP_EOL;

    /** @var \Renderforest\ProjectData\Screen\Entity\Screen $screen */
    foreach ($templatePluggableScreensGroup->getScreens() as $screen) {
        echo '-- ' . 'Id - ' . $screen->getId() . PHP_EOL;
        echo '-- ' . 'Is Character Based Duration - ' . $screen->isCharacterBasedDuration() . PHP_EOL;
        echo '-- ' . 'Duration - ' . $screen->getDuration() . PHP_EOL;
        echo '-- ' . 'Extra Video Second - ' . $screen->getExtraVideoSecond() . PHP_EOL;
        echo '-- ' . 'gifBigPath - ' . $screen->getGifBigPath() . PHP_EOL;
        echo '-- ' . 'gifPath - ' . $screen->getGifPath() . PHP_EOL;
        echo '-- ' . 'gifThumbnailPath - ' . $screen->getGifThumbnailPath() . PHP_EOL;
        echo '-- ' . 'hidden - ' . $screen->getHidden() . PHP_EOL;
        echo '-- ' . 'iconAdjustable - ' . $screen->getIconAdjustable() . PHP_EOL;
        echo '-- ' . 'isFull - ' . $screen->getIsFull() . PHP_EOL;
        echo '-- ' . 'Max Duration - ' . $screen->getMaxDuration() . PHP_EOL;
        echo '-- ' . 'order - ' . $screen->getOrder() . PHP_EOL;
        echo '-- ' . 'path - ' . $screen->getPath() . PHP_EOL;
        echo '-- ' . 'tags - ' . $screen->getTags() . PHP_EOL;
        echo '-- ' . 'title - ' . $screen->getTitle() . PHP_EOL;
        echo '-- ' . 'type - ' . $screen->getType() . PHP_EOL;

        echo '-- -- Areas:' . PHP_EOL;
        foreach ($screen->getAreas() as $area) {
            echo '-- -- ' . 'Id - ' . $area->getId() . PHP_EOL;
            echo '-- -- ' . 'Type - ' . $area->getType() . PHP_EOL;
            echo '-- -- ' . 'Cords - ' . implode(',', $area->getCords()) . PHP_EOL;
            echo '-- -- ' . 'Height - ' . $area->getHeight() . PHP_EOL;
            echo '-- -- ' . 'Width - ' . $area->getWidth() . PHP_EOL;
            echo '-- -- ' . 'Order - ' . $area->getOrder() . PHP_EOL;
            echo '-- -- ' . 'Word Count - ' . $area->getWordCount() . PHP_EOL;
            echo '-- -- ' . 'Title - ' . $area->getTitle() . PHP_EOL;
            echo '-- -- ' . 'Value - ' . $area->getValue() . PHP_EOL;

            if ($area instanceof \Renderforest\ProjectData\Screen\Area\Entity\TextArea) {
                /** @var \Renderforest\ProjectData\Screen\Area\Entity\TextArea $area */

                echo '-- -- ' . 'Removed - ' . ($area->getRemoved() ? 'True': 'False') . PHP_EOL;

            } elseif ($area instanceof \Renderforest\ProjectData\Screen\Area\Entity\ImageArea) {
                /** @var \Renderforest\ProjectData\Screen\Area\Entity\ImageArea $area */

                echo '-- -- ' . 'File Name - ' . $area->getValue() . PHP_EOL;
                echo '-- -- ' . 'Original Height - ' . $area->getOriginalHeight() . PHP_EOL;
                echo '-- -- ' . 'Original Width - ' . $area->getOriginalWidth() . PHP_EOL;
                echo '-- -- ' . 'Mime Type - ' . $area->getMimeType() . PHP_EOL;
                echo '-- -- ' . 'Webp Path - ' . $area->getWebpPath() . PHP_EOL;
                echo '-- -- ' . 'File Type - ' . $area->getFileType() . PHP_EOL;
                echo '-- -- ' . 'Thumbnail Path - ' . $area->getThumbnailPath() . PHP_EOL;

                $imageCropParams = $area->getImageCropParams();
            } elseif ($area instanceof \Renderforest\ProjectData\Screen\Area\Entity\VideoArea) {
                /** @var \Renderforest\ProjectData\Screen\Area\Entity\VideoArea $area */

                echo '-- -- ' . 'File Name - ' . $area->getValue() . PHP_EOL;
                echo '-- -- ' . 'Original Height - ' . $area->getOriginalHeight() . PHP_EOL;
                echo '-- -- ' . 'Original Width - ' . $area->getOriginalWidth() . PHP_EOL;
                echo '-- -- ' . 'Mime Type - ' . $area->getMimeType() . PHP_EOL;
                echo '-- -- ' . 'File Type - ' . $area->getFileType() . PHP_EOL;

                $videoCropParams = $area->getVideoCropParams();
            }

            echo PHP_EOL;
        }

        echo PHP_EOL;
    }
}

echo PHP_EOL;
