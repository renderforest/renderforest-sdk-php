<?php

require '../../vendor/autoload.php';

$trialProject = \Renderforest\ApiClient::getTrialProject(701);

echo 'Template ID - ' . $trialProject->getTemplateId() . PHP_EOL;
echo 'Current Screen ID - ' . (is_null($trialProject->getCurrentScreenId()) ? 'NULL' : $trialProject->getCurrentScreenId()) . PHP_EOL;
echo 'Duration - ' . $trialProject->getDuration() . PHP_EOL;
echo 'FPS - ' . $trialProject->getFps() . PHP_EOL;
echo 'Is Equalizer - ' . ($trialProject->isEqualizer() ? 'True' : 'False') . PHP_EOL;
echo 'Is Extendable Screens - ' . ($trialProject->isExtendableScreens() ? 'True' : 'False') . PHP_EOL;
echo 'Is Lego - ' . ($trialProject->isLego() ? 'True' : 'False') . PHP_EOL;
echo 'Has Sfx - ' . ($trialProject->hasSfx() ? 'True' : 'False') . PHP_EOL;
echo 'Is Mute Sfx - ' . ($trialProject->isMuteSfx() ? 'True' : 'False') . PHP_EOL;

echo 'Project Colors: ' . PHP_EOL;
foreach ($trialProject->getProjectColors() as $projectColor) {
    echo '-- ' . $projectColor->getHexCode() . PHP_EOL;
}

echo 'Screens: ' . PHP_EOL;
foreach ($trialProject->getScreens() as $screen) {
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

echo 'Sounds: ' . PHP_EOL;
foreach ($trialProject->getSounds() as $sound) {
    echo '-- ' . 'Id - ' . $sound->getId() . PHP_EOL;
    echo '-- ' . 'Duration - ' . $sound->getDuration() . PHP_EOL;
    echo '-- ' . 'File Size - ' . $sound->getFileSize() . PHP_EOL;
    echo '-- ' . 'Path - ' . $sound->getPath() . PHP_EOL;
    echo '-- ' . 'Title - ' . $sound->getTitle() . PHP_EOL;
    echo '-- ' . 'User ID - ' . $sound->getUserId() . PHP_EOL;
    echo '-- ' . 'Voice Over - ' . ($sound->getVoiceOver() ? 'true' : 'false') . PHP_EOL;

    echo PHP_EOL;
}

echo PHP_EOL;
