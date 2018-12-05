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

class Templates
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
     * Gets all templates.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTemplates($payload)
    {
        $qs = $this->Params->destructParams($payload, ['categoryId', 'equalizer', 'limit', 'offset']);
        $options = [
            'endpoint' => "$this->API_PREFIX/templates",
            'qs' => $qs
        ];

        return $this->Request->unauthorizedRequest($options);
    }

    /**
     * Gets templates categories.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTemplatesCategories($payload)
    {
        $qs = $this->Params->destructParams($payload, ['language']);
        $options = [
            'endpoint' => "$this->API_PREFIX/templates/categories",
            'qs' => $qs
        ];

        return $this->Request->unauthorizedRequest($options);
    }

    /**
     * Gets a specific template.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTemplate($payload)
    {
        $qs = $this->Params->destructParams($payload, ['language']);
        $templateId = $this->Params->destructURLParam($payload, 'templateId');
        $options = [
            'endpoint' => "$this->API_PREFIX/templates/$templateId",
            'qs' => $qs
        ];

        return $this->Request->unauthorizedRequest($options);
    }

    /**
     * Gets Color-Presets of the template.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTemplateColorPresets($payload)
    {
        $templateId = $this->Params->destructURLParam($payload, 'templateId');
        $options = [
            'endpoint' => "$this->API_PREFIX/templates/$templateId/color-presets"
        ];

        return $this->Request->unauthorizedRequest($options);
    }

    /**
     * Gets Pluggable-Screens of the template.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTemplatePluggableScreens($payload)
    {
        $templateId = $this->Params->destructURLParam($payload, 'templateId');
        $options = [
            'endpoint' => "$this->API_PREFIX/templates/$templateId/pluggable-screens"
        ];

        return $this->Request->unauthorizedRequest($options);
    }

    /**
     * Gets Recommended-Custom-Colors of the template.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTemplateRecommendedCustomColors($payload)
    {
        $templateId = $this->Params->destructURLParam($payload, 'templateId');
        $options = [
            'endpoint' => "$this->API_PREFIX/templates/$templateId/recommended-custom-colors"
        ];

        return $this->Request->unauthorizedRequest($options);
    }

    /**
     * Gets Template-Presets of the template.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTemplatePresets($payload)
    {
        $templateId = $this->Params->destructURLParam($payload, 'templateId');
        $options = [
            'endpoint' => "$this->API_PREFIX/templates/$templateId/template-presets"
        ];

        return $this->Request->unauthorizedRequest($options);
    }

    /**
     * Gets Theme of the template.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTemplateTheme($payload)
    {
        $templateId = $this->Params->destructURLParam($payload, 'templateId');
        $options = [
            'endpoint' => "$this->API_PREFIX/templates/$templateId/theme"
        ];

        return $this->Request->unauthorizedRequest($options);
    }

    /**
     * GEts Transitions of the template.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTemplateTransitions($payload)
    {
        $templateId = $this->Params->destructURLParam($payload, 'templateId');
        $options = [
            'endpoint' => "$this->API_PREFIX/templates/$templateId/transitions"
        ];

        return $this->Request->unauthorizedRequest($options);
    }
}
