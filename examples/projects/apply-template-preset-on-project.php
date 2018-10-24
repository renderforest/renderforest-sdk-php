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
    'projectId' => 5000658,
    'presetId' => 55
];

try {
    $applyTemplatePresetOnProject = $renderforest->applyTemplatePresetOnProject($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    var_dump($e); // handle the error
}

var_dump($applyTemplatePresetOnProject); // handle the success
