<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require 'vendor/autoload.php';

$options = ['signKey' => '<signKey>', 'clientId' => -1];

$renderforest = new \Renderforest\Client($options);;

$payload = [
    'projectId' => 7549843
];

function sample()
{
    global $renderforest;
    global $payload;

    $projectDataInstance = $renderforest->getProjectData($payload);

    // make some change
    $projectDataInstance->setMuteMusic(true);

    // get payload data
    $projectId = $projectDataInstance->getProjectId();
    $data = $projectDataInstance->getPatchObject();

    $payloadForUpdate = [
        'projectId' => $projectId,
        'data' => $data
    ];

    $result = $renderforest->updateProjectDataPartial($payloadForUpdate);

    $projectDataInstance->resetPatchObject();

    return $result;
}

try {
    var_dump(sample()); // handle the success
} catch (Exception $e) {
    var_dump($e); // handle the error
}
