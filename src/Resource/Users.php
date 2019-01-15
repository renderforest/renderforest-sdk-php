<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

namespace Renderforest\Resource;

use Renderforest\Request\Api;

class Users
{
    private $CONFIG;

    private $ApiRequest;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->CONFIG = include dirname(__FILE__) . '/../Config/Config.php';
        $this->ApiRequest = Api::getInstance();
    }

    /**
     * Gets current user.
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCurrentUser()
    {
        $options = [
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/users/current"
        ];

        return $this->ApiRequest->authorizedRequest($options);
    }
}
