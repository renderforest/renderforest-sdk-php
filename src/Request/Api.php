<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

namespace Renderforest\Request;

use GuzzleHttp\Client;

use Renderforest\Auth\Auth;
use Renderforest\Singleton;

class Api
{
    use Singleton;

    private $CONFIG;

    private $signKey;
    private $clientId;

    /**
     * @var Auth
     */
    private $Auth;
    /**
     * @var Client
     */
    private $requestClient;

    /**
     * Api constructor.
     */
    private function __construct()
    {
        $this->CONFIG = include dirname(__FILE__) . '/../Config/Config.php';

        $this->signKey = NULL;
        $this->clientId = NULL;

        $this->Auth = Auth::getInstance();
        $this->requestClient = new Client();
    }

    /**
     * Recursively removes array entries which have given `$key`.
     * @param array $array
     * @param string $key
     * @return array
     */
    private function recursiveUnset(&$array, $key)
    {
        unset($array[$key]);
        foreach ($array as &$value) {
            if (is_array($value)) {
                $this->recursiveUnset($value, $key);
            }
        }

        return $array;
    }

    /**
     * Sets config based on given `$signKey` and `$clientId`.
     * @param string $signKey
     * @param number $clientId
     */
    public function setConfig($signKey, $clientId)
    {
        $this->signKey = $signKey;
        $this->clientId = $clientId;
    }

    /**
     * Appends query params.
     * Formats object parameters into GET request query string.
     * @param array $options
     * @return array
     */
    private function appendQueryParams($options)
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
     * Appends URI in given `$options` array.
     * @param array options
     * @return array
     */
    private function appendURI($options)
    {
        $endpoint = $options['endpoint'];
        $options['uri'] = $this->CONFIG['API_HOST'] . $endpoint;

        return $options;
    }

    /**
     * Prepares request.
     *  Appends query params in given `$options`.
     *  Appends URI on given `$options`.
     * @param array options
     * @return array
     */
    private function prepareRequest($options)
    {
        $appendedQueryParamsOptions = $this->appendQueryParams($options);
        $_options = $this->appendURI($appendedQueryParamsOptions);

        return $_options;
    }

    /**
     * Makes request with given `$options`.
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function request($options)
    {
        $requestMethod = isset($options['method']) ? $options['method'] : 'GET';
        $requestURI = isset($options['uri']) ? $options['uri'] : '';

        $response = $this->requestClient->request($requestMethod, $requestURI, $options);
        $responseContent = (array)json_decode($response->getBody()->getContents());

        return isset($responseContent) ? (array)$responseContent['data'] : NULL;
    }

    /**
     * Makes unauthorized request.
     *  Assigns default options.
     *  Prepares `$options`.
     * @param array $options
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function unauthorizedRequest($options)
    {
        $_options = array_replace_recursive($this->CONFIG['HTTP_DEFAULT_OPTIONS'], $options);
        $preparedOptions = $this->prepareRequest($_options);

        return $this->request($preparedOptions);
    }

    /**
     * Makes authorized request.
     *  Assigns default options.
     *  Clears `getAreas` entries before sending.
     *  Sets the authorization.
     * @param array $options
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function authorizedRequest($options)
    {
        $options = array_replace_recursive($this->CONFIG['HTTP_DEFAULT_OPTIONS'], $options);

        $preparedOptions = $this->prepareRequest($options);
        $cleanGetAreasOptions = $this->recursiveUnset($preparedOptions, 'getAreas');

        $optionsWithAuth = $this->Auth->setAuthorization($cleanGetAreasOptions, $this->signKey, $this->clientId);

        return $this->request($optionsWithAuth);
    }
}
