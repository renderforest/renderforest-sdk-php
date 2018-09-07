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

    /**
     * @return mixed
     * Get Current User.
     */
    public function getCurrentUser()
    {
        $Http = Http::getInstance();
        $options = array(
            'endpoint' => "$this->API_PREFIX/users/current"
        );

        return $Http->authorizedRequest($options);
    }
}
