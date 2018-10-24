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

class Sounds
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
     * Gets company sounds (limited).
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCompanySoundsLimited($payload)
    {
        $qs = $this->Params->destructParams($payload, ['duration']);
        $options = [
            'endpoint' => "$this->API_PREFIX/sounds",
            'qs' => $qs
        ];

        return $this->Request->unauthorizedRequest($options);
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
        $options = ['endpoint' => "$this->API_PREFIX/sounds",
            'qs' => $qs
        ];

        return $this->Request->authorizedRequest($options);
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
            'endpoint' => "$this->API_PREFIX/sounds/recommended",
            'qs' => $qs
        ];

        return $this->Request->unauthorizedRequest($options);
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
            'endpoint' => "$this->API_PREFIX/sounds/recommended",
            'qs' => $qs
        ];

        return $this->Request->authorizedRequest($options);
    }
}
