<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require_once(dirname(dirname(__FILE__)) . '/Singleton.php');

require_once(dirname(__FILE__) . '/Auth_util.php');

class Auth
{
    use Singleton;

    private $Auth_util;

    /**
     * Auth constructor.
     */
    public function __construct()
    {
        $this->Auth_util = Auth_util::getInstance();
    }

    /**
     * @param array $options
     * @param string $signKey
     * @param number $clientId
     * @return array - New options object is returned.
     * Sets authorization.
     *  Sets nonce, clientid, timestamp, authorization headers.
     */
    public function setAuthorization($options, $signKey, $clientId)
    {
        $opts = $options ? $options : [];
        $headers = isset($opts['headers']) ? $opts['headers'] : [];
        $headers['nonce'] = $this->Auth_util->generateNonce();
        $headers['clientid'] = $clientId;
        $headers['timestamp'] = $this->Auth_util->dateNow();
        $parsedUrl = parse_url(isset($opts['uri']) ? $opts['uri'] : '');
        $path = $parsedUrl['path'] . '?' . $parsedUrl['query'];
        $query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';

        $headers['authorization'] = $this->Auth_util->generateHash([
            'clientId' => $clientId,
            'path' => $path ? $path : '',
            'qs' => $query ? $query : '',
            'body' => isset($opts['body']) ? json_encode($opts['body']) : '{}',
            'nonce' => $headers['nonce'],
            'timestamp' => $headers['timestamp']
        ], $signKey);
        $opts['headers'] = $headers;

        return $opts;
    }
}
