<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectData = $renderforestClient->getProjectData(16165971);

$projectData->setMuteMusic(false);

$projectData
    ->getScreenByOrder(1)
    ->getAreaByOrder(1)
    ->setValue('https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4');

// add sound
$allSounds = $renderforestClient->getAllSounds(100);
$sound = $allSounds->getSoundById(1980240);
$projectData
    ->getSounds()
    ->add($sound);


// set styles
$projectDataStyles = new \Renderforest\ProjectData\ProjectDataStyles();
$projectDataStyles
    ->setTheme('1')
    ->setTransition('3');
$projectData->setStyles($projectDataStyles);

// set voice over
$projectDataVoiceOver = new \Renderforest\ProjectData\ProjectDataVoiceOver();
$projectDataVoiceOver->setPath('https://example.com/sample-low.mp3');
$projectData->setVoiceOver($projectDataVoiceOver);

$newScreen = new \Renderforest\ProjectData\Screen\Entity\Screen();

$newScreen
    ->setId(2125621)
    ->setCharacterBasedDuration(true)
    ->setCompositionName('191_man_Angry_2')
    ->setDuration(5)
    ->setExtraVideoSecond(0)
    ->setIconAdjustable(0)
    ->setGifPath('https://example.com/191_man_Angry_2_1.gif')
    ->setGifBigPath('https://example.com/191_man_Angry_2_1.gif')
    ->setGifThumbnailPath('https://example.com/191_man_Angry_2_n.jpg')
    ->setHidden(false)
    ->setMaxDuration(15)
    ->setOrder(1900)
    ->setPath('https://example.com/191_man_Angry_2_n.jpg')
    ->setTags('business, computer, chair, desk, laptop, occupation, office, worker, arms, boss, boy, businessman,chef, company, employer, professional')
    ->setType(1);


$projectData
    ->getScreens()
    ->add($newScreen);

$renderforestClient->updateProjectData(16165971, $projectData);
