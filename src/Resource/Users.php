<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

namespace Renderforest\Resource;

use Renderforest;

class Users
{
    private $API_PREFIX = '/api/v1';
    private $Request;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->Request = Renderforest\Request\Http::getInstance();
    }

    /**
     * Gets current user.
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCurrentUser()
    {
        $options = [
            'endpoint' => "$this->API_PREFIX/users/current"
        ];

        return $this->Request->authorizedRequest($options);
    }
}
