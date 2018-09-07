<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require_once(dirname(__FILE__) . '/../http/Http.php');

class Users
{
    private $API_PREFIX = '/api/v1';
    private $Http;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->Http = Http::getInstance();
    }

    /**
     * @return array|null
     * Get Current User.
     */
    public function getCurrentUser()
    {
        $options = [
            'endpoint' => "$this->API_PREFIX/users/current"
        ];

        return $this->Http->authorizedRequest($options);
    }
}
