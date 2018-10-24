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

class Supports
{
    private $API_PREFIX = '/api/v1';
    private $Params;
    private $Request;

    public function __construct()
    {
        $this->Params = new Renderforest\Params();
        $this->Request = Renderforest\Request\Http::getInstance();
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
            'endpoint' => "$this->API_PREFIX/supports/ticket",
            'json' => $body
        ];

        return $this->Request->authorizedRequest($options);
  }
}
