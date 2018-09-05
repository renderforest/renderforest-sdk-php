<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require_once 'Auth_util.php';

class Auth
{
    use Singleton;

    /**
     * @param $options
     * @param $signKey
     * @param $clientId
     * @return array - New options object is returned.
     * Sets authorization.
     *  Sets nonce, clientid, timestamp, authorization headers.
     */
    public function setAuthorization($options, $signKey, $clientId)
    {
        $Auth_util = Auth_util::getInstance();

        $opts = $options ? $options : [];
        $headers = isset($opts['headers']) ? $opts['headers'] : [];
        $headers['nonce'] = $Auth_util->generateNonce();
        $headers['clientid'] = $clientId;
        $headers['timestamp'] = $Auth_util->dateNow();
        $parsedUrl = parse_url(isset($opts['uri']) ? $opts['uri'] : '');
        $path = $parsedUrl['path'];
        $query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';
        $headers['authorization'] = $Auth_util->generateHash([
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
