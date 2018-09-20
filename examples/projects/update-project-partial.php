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
    'projectId' => 5000658,
    'customTitle' => 'mock-customTitle'
];

try {
    $updateProject = $renderforest->updateProjectPartial($payload);
} catch (Exception $e) {
    var_dump($e); // handle the error
}

var_dump($updateProject); // handle the success
