<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require_once(dirname(__FILE__) . '/../http/Http.php');

require_once(dirname(__FILE__) . '/../../util/Params.php');

class Supports
{
    private $API_PREFIX = '/api/v1';
    private $Params;
    private $Http;

    public function __construct()
    {
        $this->Http = Http::getInstance();
        $this->Params = Params::getInstance();
    }

    /**
     * @param array $payload
     * @return array|null
     * @description Add Supports Ticket.
     */
    public function addSupportsTicket ($payload) {
        $body = $this->Params->destructParams($payload, ['message', 'mailType', 'subject']);

        $options = [
            'method' => 'POST',
            'endpoint' => "$this->API_PREFIX/supports/ticket",
            'body' => $body
        ];

        return $this->Http->authorizedRequest($options);
  }
}
