<?php

require '../../vendor/autoload.php';

$renderforestClient = new \Renderforest\ApiClient(
    'your-api-key',
    'your-client-id'
);

$projectData = $renderforestClient->getProjectData(16165971);

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

$renderforestClient->updateProjectData(16165971, $projectData);
