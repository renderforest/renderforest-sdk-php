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

    /**
     * @param $payload {Array}
     * @return mixed
     * @description Add Supports Ticket.
     */
    public function addSupportsTicket ($payload) {
        $Params = Params::getInstance();
        $body = $Params->destructParams($payload, ['message', 'mailType', 'subject']);

        $options = array(
            'method' => 'POST',
            'endpoint' => "$this->API_PREFIX/supports/ticket",
            'body' => $body
        );

        $Http = Http::getInstance();

        return $Http->authorizedRequest($options);
  }
}
