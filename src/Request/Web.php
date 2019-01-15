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

use Renderforest\Singleton;

class Web
{
    use Singleton;

    private $CONFIG;

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
        $this->requestClient = new Client();
    }

    /**
     * Appends URI in given `$options` array.
     * @param array options
     * @return array
     */
    private function appendURI($options)
    {
        $endpoint = $options['endpoint'];
        $options['uri'] = $this->CONFIG['WEB_HOST'] . $endpoint;

        return $options;
    }

    /**
     * Makes request with given `$options`.
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($options)
    {
        $_options = array_replace_recursive($this->CONFIG['HTTP_DEFAULT_OPTIONS'], $options);
        $optionsWithUri = $this->appendURI($_options);

        $requestMethod = isset($optionsWithUri['method']) ? $optionsWithUri['method'] : 'GET';
        $requestURI = isset($optionsWithUri['uri']) ? $optionsWithUri['uri'] : '';
        $response = $this->requestClient->request($requestMethod, $requestURI, $optionsWithUri);
        $responseContent = $response->getBody()->getContents();

        return isset($responseContent) ? $responseContent : NULL;
    }
}
