<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require 'vendor/autoload.php';

$payload = [
    'categoryId' => 3,
    'equalizer' => 'false',
    'limit' => 4,
    'offset' => 10
];
try {
    $templates = \Renderforest\Client::getTemplates($payload);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    var_dump($e); // handle the error
}

var_dump($templates); // handle the success
