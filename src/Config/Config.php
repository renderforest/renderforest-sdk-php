<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

namespace Renderforest\Config;

$composerJson = json_decode(file_get_contents(dirname(__FILE__) . '/../../composer.json'), true);

return [
    'API_HOST' => 'https://api.renderforest.com',
    'API_PREFIX' => '/api/v1',
    'HTTP_DEFAULT_OPTIONS' => [
        'method' => 'GET',
        'headers' => [
            'Accept' => 'application/json',
            'User-Agent' => "renderforest/sdk-php/{$composerJson['version']}"
        ]
    ],
    'PROJECT_DATA_API_PREFIX' => '/api/v5',
    'WEB_HOST' => 'https://www.renderforest.com',
    'WEB_PREFIX' => '/api/v1'
];
