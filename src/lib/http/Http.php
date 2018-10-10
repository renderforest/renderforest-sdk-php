<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require_once(dirname(__FILE__) . '/../Singleton.php');

require_once(dirname(__FILE__) . '/../../../vendor/autoload.php');

require_once(dirname(__FILE__) . '/../auth/Auth.php');

class Http
{
    use Singleton;

    private $signKey;
    private $clientId;

    private $HOST;
    private $DEFAULT_OPTIONS;

    private $Auth;
    private $requestClient;

    /**
     * Http constructor.
     */
    private function __construct()
    {
        $this->signKey = NULL;
        $this->clientId = NULL;
        $this->HOST = 'https://api.renderforest.com';

        /**
         * Get SDK version from composer.json file and set it in `User-Agent`.
         */
        $ComposerJson = json_decode(file_get_contents(dirname(__FILE__) . '/../../../composer.json'), true);
        $sdkVersion = $ComposerJson['version'];
        $this->DEFAULT_OPTIONS = [
            'method' => 'GET',
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => "renderforest/sdk-php/$sdkVersion"
            ]
        ];

        $this->Auth = Auth::getInstance();
        $this->requestClient = new \GuzzleHttp\Client();
    }

    /**
     * @param array $array
     * @param string $key
     * @return array
     * Removes array entries which have given `key`.
     */
    private function recursiveUnset(&$array, $key)
    {
        unset($array[$key]);
        foreach ($array as &$value) {
            if (is_array($value)) {
                $this->recursive_unset($value, $key);
            }
        }

        return $array;
    }

    /**
     * @param string $signKey
     * @param number $clientId
     * Set config.
     */
    public function setConfig($signKey, $clientId)
    {
        $this->signKey = $signKey;
        $this->clientId = $clientId;
    }

    /**
     * @param array $options
     * @return array
     * Append query params.
     * Format object parameters into GET request query string.
     */
    public function appendQueryParams($options)
    {
        if (
            isset($options['method']) &&
            $options['method'] === 'GET' &&
            isset($options['qs']) &&
            sizeof($options['qs'])
        ) {
            $queryParams = '?' . http_build_query($options['qs']);
            $options['endpoint'] .= $queryParams;
        }

        return $options;
    }

    /**
     * @param array options
     * @return array
     * Append URI in given `$options` array.
     */
    public function appendURI($options)
    {
        $endpoint = $options['endpoint'];
        $options['uri'] = $this->HOST . $endpoint;

        return $options;
    }

    /**
     * @param array options
     * Prepare request.
     * @return array
     * Appends query params and URI to given `$options` array.
     */
    public function prepareRequest($options)
    {
        $preparedRequest = $this->appendQueryParams($options);
        $_options = $this->appendURI($preparedRequest);

        return $_options;
    }

    /**
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * Make request.
     */
    public function request($options)
    {
        $requestMethod = isset($options['method']) ? $options['method'] : 'GET';
        $requestURI = isset($options['uri']) ? $options['uri'] : '';

        if (isset($options['body'])) {
            $options['json'] = $options['body'];
            unset($options['body']);
        }

        try {
            $response = $this->requestClient->request($requestMethod, $requestURI, $options);
            $responseContent = (array)json_decode($response->getBody()->getContents());
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo $e;
        }

        return isset($responseContent) ? (array)$responseContent['data'] : NULL;
    }

    /**
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * Makes unauthorized request.
     */
    public function unauthorizedRequest($options)
    {
        $_options = array_replace_recursive($this->DEFAULT_OPTIONS, $options);
        $preparedOptions = $this->prepareRequest($_options);

        return $this->request($preparedOptions);
    }

    /**
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * Makes authorized request.
     */
    public function authorizedRequest($options)
    {
        $options = array_replace_recursive($this->DEFAULT_OPTIONS, $options);

        $preparedOptions = $this->prepareRequest($options);
        $cleanGetAreasOptions = $this->recursiveUnset($preparedOptions, 'getAreas');

        $optionsWithAuth = $this->Auth->setAuthorization($cleanGetAreasOptions, $this->signKey, $this->clientId);

        return $this->request($optionsWithAuth);
    }
}
