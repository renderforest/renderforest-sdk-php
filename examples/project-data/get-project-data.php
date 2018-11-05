<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require 'vendor/autoload.php';

$renderforest = new \Renderforest\Client(['signKey' => '<signKey>', 'clientId' => -1]);

$payload = [
    'projectId' => 7549843
];
try {
    $projectDataInstance = $renderforest->getProjectData($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    var_dump($e); // handle the error
}

echo 'Project id: ';
var_dump($projectDataInstance->getProjectId());
echo 'Template id: ';
var_dump($projectDataInstance->getTemplateId());
echo 'Is equalizer: ';
var_dump($projectDataInstance->isEqualizer());
echo 'Is lego: ';
var_dump($projectDataInstance->isLego());
echo 'Title: ';
var_dump($projectDataInstance->getTitle());
echo 'Mute music: ';
var_dump($projectDataInstance->getMuteMusic());
echo 'Sounds: ';
var_dump($projectDataInstance->getSounds());
echo 'Styles: ';
var_dump($projectDataInstance->getStyles());
echo 'VoiceOver: ';
var_dump($projectDataInstance->getVoiceOver());
echo 'Project colors: ';
var_dump($projectDataInstance->getProjectColors());
echo 'Screens: ';
var_dump($projectDataInstance->getScreens());

$screens = $projectDataInstance->getScreens();
echo 'Areas: ';
var_dump($screens[1]['getAreas']());
