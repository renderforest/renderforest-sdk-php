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

class Sounds
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
     * Get Company Sounds (limited).
     */
    public function getCompanySoundsLimited($payload)
    {
        $qs = $this->Params->destructParams($payload, ['duration']);

        $options = [
            'endpoint' => "$this->API_PREFIX/sounds",
            'qs' => $qs
        ];

        return $this->Http->unauthorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Sounds.
     */
    public function getSounds($payload)
    {
        $qs = $this->Params->destructParams($payload, ['duration']);

        $options = ['endpoint' => "$this->API_PREFIX/sounds",
            'qs' => $qs
        ];

        return $this->Http->authorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Recommended Sounds (limited).
     */
    public function getRecommendedSoundsLimited($payload)
    {
        $qs = $this->Params->destructParams($payload, ['duration', 'templateId']);

        $options = [
            'endpoint' => "$this->API_PREFIX/sounds/recommended",
            'qs' => $qs
        ];

        return $this->Http->unauthorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Recommended Sounds.
     */
    public function getRecommendedSounds($payload)
    {
        $qs = $this->Params->destructParams($payload, ['duration', 'templateId']);

        $options = [
            'endpoint' => "$this->API_PREFIX/sounds/recommended",
            'qs' => $qs
        ];

        return $this->Http->authorizedRequest($options);
    }
}
