<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

namespace Renderforest\Resource;

use Renderforest\Params;

use Renderforest\Request\Api;

class Supports
{
    private $CONFIG;

    private $Params;

    private $ApiRequest;

    public function __construct()
    {
        $this->CONFIG = include dirname(__FILE__) . '/../Config/Config.php';

        $this->Params = new Params();

        $this->ApiRequest = Api::getInstance();
    }

    /**
     * Adds supports ticket.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addSupportsTicket ($payload) {
        $body = $this->Params->destructParams($payload, ['message', 'mailType', 'subject']);
        $options = [
            'method' => 'POST',
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/supports/ticket",
            'json' => $body
        ];

        return $this->ApiRequest->authorizedRequest($options);
  }
}
