<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require_once '../auth/Auth.php';
require_once '../../../vendor/autoload.php';

class Http
{
    private $signKey;
    private $clientId;
    private $HOST;
    private $DEFAULT_OPTIONS;

    /**
     * Http constructor.
     */
    public function __construct()
    {
        $this->signKey = NULL;
        $this->clientId = NULL;
        $this->HOST = 'https://api.renderforest.com';

        /**
         * Get SDK version from composer.json file and set it in `User-Agent`.
         */
        $ComposerJson = json_decode(file_get_contents('/path/to/composer.json'), true);
        $sdkVersion = $ComposerJson['version'];
        $this->DEFAULT_OPTIONS = array(
            'headers' => array(
                'Accept' => 'application/json',
                'User-Agent' => "renderforest/sdk-php/$sdkVersion}"
            )
        );
    }

    /**
     * @param $signKey {string}
     * @param $clientId {number}
     * Set config.
     */
    public function setConfig($signKey, $clientId)
    {
        $this->signKey = $signKey;
        $this->clientId = $clientId;
    }

    /**
     * @param $options {Object}
     * Append query params.
     * Format object parameters into GET request query string.
     */
    public function appendQueryParams($options)
    {
        if ($options['method'] === 'GET' && isset($options['qs']) && sizeof(get_object_vars($options['qs']))) {
            $queryString = $options['qs'];
            $queryParams = parse_url($queryString);

            $options['endpoint'] = $options['endpoint'] . $queryParams;
        }
    }

    /**
     * @param {Object} options
     * Append URI.
     */
    public function appendURI($options)
    {
        $endpoint = $options['endpoint'];
        $options['uri'] = $this->HOST . $endpoint;
    }

    /**
     * @param {Object} options
     * Prepare request.
     */
    public function prepareRequest($options)
    {
        $this->appendQueryParams($options);
        $this->appendURI($options);
    }

    /**
     * @param $options {Object}
     * @return \GuzzleHttp\Promise\PromiseInterface
     * Request.
     */
    public function request($options)
    {
        $Request = new \GuzzleHttp\Client();
        $requestMethod = isset($options['method']) ? $options['method'] : 'GET';

        return $Request->requestAsync($requestMethod, $options['uri'], $options)
            ->then(function ($response) {
                return isset($response) ? $response['data'] : NULL;
            });
    }

    /**
     * @param $options {Object}
     * @return \GuzzleHttp\Promise\PromiseInterface
     * Unauthorized request.
     */
    public function unauthorizedRequest($options)
    {
        $_options = array_replace_recursive($this->DEFAULT_OPTIONS, (array)$options);
        $this->prepareRequest($_options);

        return $this->request($_options);
    }

    /**
     * @param $options {Object}
     * @return \GuzzleHttp\Promise\PromiseInterface
     * Authorized request.
     */
    public function authorizedRequest($options)
    {
        $Auth = new Auth();
        $_options = array_replace_recursive($this->DEFAULT_OPTIONS, (array)$options);

        $this->prepareRequest($_options);
        $authorizedRequestOptions = $Auth->setAuthorization($_options, $this->signKey, $this->clientId);

        return $this->request($authorizedRequestOptions);
    }
}
