<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require_once(dirname(__FILE__) . '/../../src/lib/Renderforest.php');

$payload = [
    'templateId' => 701,
    'duration' => 5
];

try {
    $currentUser = Renderforest::getRecommendedSoundsLimited($payload);
} catch (Exception $e) {
    var_dump($e); // handle the error
}

var_dump($currentUser); // handle the success
