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
    'projectId' => 5000658
];
try {
    $duplicateProject = $renderforest->duplicateProject($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    var_dump($e); // handle the error
}

var_dump($duplicateProject); // handle the success
