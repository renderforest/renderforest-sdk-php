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

class Sounds
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
     * Gets company sounds (limited).
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCompanySoundsLimited($payload)
    {
        $qs = $this->Params->destructParams($payload, ['duration']);
        $options = [
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/sounds",
            'qs' => $qs
        ];

        return $this->ApiRequest->unauthorizedRequest($options);
    }

    /**
     * Gets sounds.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSounds($payload)
    {
        $qs = $this->Params->destructParams($payload, ['duration']);
        $options = ['endpoint' => "{$this->CONFIG['API_PREFIX']}/sounds",
            'qs' => $qs
        ];

        return $this->ApiRequest->authorizedRequest($options);
    }

    /**
     * Gets recommended sounds (limited).
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRecommendedSoundsLimited($payload)
    {
        $qs = $this->Params->destructParams($payload, ['duration', 'templateId']);
        $options = [
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/sounds/recommended",
            'qs' => $qs
        ];

        return $this->ApiRequest->unauthorizedRequest($options);
    }

    /**
     * Gets recommended sounds.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRecommendedSounds($payload)
    {
        $qs = $this->Params->destructParams($payload, ['duration', 'templateId']);
        $options = [
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/sounds/recommended",
            'qs' => $qs
        ];

        return $this->ApiRequest->authorizedRequest($options);
    }
}
