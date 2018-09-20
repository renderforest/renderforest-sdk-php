<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require_once(dirname(__FILE__) . '/../../src/lib/Renderforest.php');

$options = ['signKey' => '<signKey>', 'clientId' => -1];

$renderforest = new Renderforest($options);

$payload = [
    'templateId' => 701,
    'duration' => 5
];

try {
    $recommendedSounds = $renderforest->getRecommendedSounds($payload);
} catch (Exception $e) {
    var_dump($e); // handle the error
}

var_dump($recommendedSounds); // handle the success
