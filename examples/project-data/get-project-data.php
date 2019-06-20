<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectData = $renderforestClient->getProjectData(16296971);

echo 'Template ID - ' . $projectData->getTemplateId() . PHP_EOL;
echo 'Current Screen ID - ' . (is_null($projectData->getCurrentScreenId()) ? 'NULL' : $projectData->getCurrentScreenId()) . PHP_EOL;
echo 'Duration - ' . $projectData->getDuration() . PHP_EOL;
echo 'FPS - ' . $projectData->getFps() . PHP_EOL;
echo 'Is Equalizer - ' . ($projectData->isEqualizer() ? 'True' : 'False') . PHP_EOL;
echo 'Is Extendable Screens - ' . ($projectData->isExtendableScreens() ? 'True' : 'False') . PHP_EOL;
echo 'Is Lego - ' . ($projectData->isLego() ? 'True' : 'False') . PHP_EOL;
echo 'Is Mute Music - ' . ($projectData->isMuteMusic() ? 'True' : 'False') . PHP_EOL;

echo 'Project Colors: ' . PHP_EOL;
foreach ($projectData->getProjectColors() as $projectColor) {
    echo '-- ' . $projectColor->getHexCode() . PHP_EOL;
}

echo 'Screens: ' . PHP_EOL;
foreach ($projectData->getScreens() as $screen) {
    echo '-- ' . 'Id - ' . $screen->getId() . PHP_EOL;
    echo '-- ' . 'Is Character Based Duration - ' . $screen->isCharacterBasedDuration() . PHP_EOL;
    echo '-- ' . 'Duration - ' . $screen->getDuration() . PHP_EOL;
    echo '-- ' . 'Extra Video Second - ' . $screen->getExtraVideoSecond() . PHP_EOL;
    echo '-- ' . 'Gif Big Path - ' . (is_null($screen->getGifBigPath()) ? 'null' : $screen->getGifBigPath()) . PHP_EOL;
    echo '-- ' . 'Gif Path - ' . (is_null($screen->getGifPath()) ? 'null' : $screen->getGifPath()) . PHP_EOL;
    echo '-- ' . 'Gif Thumbnail Path - ' . (is_null($screen->getGifThumbnailPath()) ? 'null' : $screen->getGifThumbnailPath()) . PHP_EOL;
    echo '-- ' . 'hidden - ' . ($screen->getHidden() ? 'true' : 'false') . PHP_EOL;
    echo '-- ' . 'iconAdjustable - ' . $screen->getIconAdjustable() . PHP_EOL;
    echo '-- ' . 'isFull - ' . $screen->getIsFull() . PHP_EOL;
    echo '-- ' . 'Max Duration - ' . $screen->getMaxDuration() . PHP_EOL;
    echo '-- ' . 'Order - ' . $screen->getOrder() . PHP_EOL;
    echo '-- ' . 'Path - ' . $screen->getPath() . PHP_EOL;
    echo '-- ' . 'Tags - ' . (is_null($screen->getTags()) ? 'null' : $screen->getTags()) . PHP_EOL;
    echo '-- ' . 'Title - ' . (is_null($screen->getTitle()) ? 'null' : $screen->getTitle()) . PHP_EOL;
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
            if (is_null($area->getFont())) {
                echo '-- -- ' . 'Font - null' . PHP_EOL;
            } else {
                echo '-- -- ' . 'Font Scale - ' . $area->getFont()->getScale() . PHP_EOL;
            }

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
foreach ($projectData->getSounds() as $sound) {

    if ($sound instanceof \Renderforest\Sound\Sound) {
        /** @var \Renderforest\Sound\Sound $sound */

        echo 'ID - ' . $sound->getId() . PHP_EOL;
        echo 'Duration - ' . $sound->getDuration() . PHP_EOL;
        echo 'Genre - ' . $sound->getGenre() . PHP_EOL;
        echo 'Low Quality - ' . $sound->getLowQuality() . PHP_EOL;
        echo 'Path - ' . $sound->getPath() . PHP_EOL;
        echo 'Title - ' . $sound->getTitle() . PHP_EOL;

    } elseif ($sound instanceof \Renderforest\Sound\UserSound) {
        /** @var \Renderforest\Sound\UserSound $sound */

        echo 'ID - ' . $sound->getId() . PHP_EOL;
        echo 'Duration - ' . $sound->getDuration() . PHP_EOL;
        echo 'File Size - ' . $sound->getFileSize() . PHP_EOL;
        echo 'Path - ' . $sound->getPath() . PHP_EOL;
        echo 'Title - ' . $sound->getTitle() . PHP_EOL;
        echo 'User ID - ' . $sound->getUserId() . PHP_EOL;
        echo 'Voice Over - ' . ($sound->isVoiceOver() ? 'true' : 'false') . PHP_EOL;
    }

    echo PHP_EOL;
}

if (false === is_null($projectData->getStyles())) {
    echo 'Styles: ' . PHP_EOL;
    echo '-- Theme - ' . $projectData->getStyles()->getTheme() . PHP_EOL;
    echo '-- Transition - ' . $projectData->getStyles()->getTransition() . PHP_EOL;

    echo PHP_EOL;
}

if (false === is_null($projectData->getVoiceOver())) {
    echo 'Voice Over: ' . PHP_EOL;
    echo '-- Path - ' . $projectData->getVoiceOver()->getPath() . PHP_EOL;

    echo PHP_EOL;
}

if (false === is_null($projectData->getFonts())) {
    echo 'Fonts: ' . PHP_EOL;

    echo '-- Defaults: ' . PHP_EOL;
    /** @var \Renderforest\ProjectData\ProjectDataFont\ProjectDataFont $defaultFont */
    foreach ($projectData->getFonts()->getDefaults() as $defaultFont) {
        echo '-- -- ID - ' . $defaultFont->getId() . PHP_EOL;
        echo '-- -- Name - ' . $defaultFont->getName() . PHP_EOL;
        echo '-- -- Character Size - ' . $defaultFont->getCharacterSize() . PHP_EOL;

        echo PHP_EOL;
    }

    echo '-- Selected: ' . PHP_EOL;
    /** @var \Renderforest\ProjectData\ProjectDataFont\ProjectDataFont $selectedFont */
    foreach ($projectData->getFonts()->getSelected() as $selectedFont) {
        echo '-- -- ID - ' . $selectedFont->getId() . PHP_EOL;
        echo '-- -- Name - ' . $selectedFont->getName() . PHP_EOL;
        echo '-- -- Character Size - ' . $selectedFont->getCharacterSize() . PHP_EOL;

        echo PHP_EOL;
    }
}

echo PHP_EOL;