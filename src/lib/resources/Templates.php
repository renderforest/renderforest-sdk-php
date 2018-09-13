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

class Templates
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
     * Get All Templates.
     */
    public function getTemplates($payload)
    {
        $qs = $this->Params->destructParams($payload, ['categoryId', 'equalizer', 'limit', 'offset']);

        $options = [
            'endpoint' => "$this->API_PREFIX/templates",
            'qs' => $qs
        ];

        return $this->Http->unauthorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Templates Categories.
     */
    public function getTemplatesCategories($payload)
    {
        $qs = $this->Params->destructParams($payload, ['language']);

        $options = [
            'endpoint' => "$this->API_PREFIX/templates/categories",
            'qs' => $qs
        ];

        return $this->Http->unauthorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get a Specific Template.
     */
    public function getTemplate($payload)
    {
        $qs = $this->Params->destructParams($payload, ['language']);
        $templateId = $this->Params->destructURLParam($payload, 'templateId');

        $options = [
            'endpoint' => "$this->API_PREFIX/templates/$templateId",
            'qs' => $qs
        ];

        return $this->Http->unauthorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Color-Presets of the Template.
     */
    public function getTemplateColorPresets($payload)
    {
        $templateId = $this->Params->destructURLParam($payload, 'templateId');

        $options = [
            'endpoint' => "$this->API_PREFIX/templates/$templateId/color-presets"
        ];

        return $this->Http->unauthorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Pluggable-Screens of the Template.
     */
    public function getTemplatePluggableScreens($payload)
    {
        $templateId = $this->Params->destructURLParam($payload, 'templateId');

        $options = [
            'endpoint' => "$this->API_PREFIX/templates/$templateId/pluggable-screens"
        ];

        return $this->Http->unauthorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Recommended-Custom-Colors of the Template.
     */
    public function getTemplateRecommendedCustomColors($payload)
    {
        $templateId = $this->Params->destructURLParam($payload, 'templateId');

        $options = [
            'endpoint' => "$this->API_PREFIX/templates/$templateId/recommended-custom-colors"
        ];

        return $this->Http->unauthorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Template-Presets of the Template.
     */
    public function getTemplatePresets($payload)
    {
        $templateId = $this->Params->destructURLParam($payload, 'templateId');

        $options = [
            'endpoint' => "$this->API_PREFIX/templates/$templateId/template-presets"
        ];

        return $this->Http->unauthorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Theme of the Template.
     */
    public function getTemplateTheme($payload)
    {
        $templateId = $this->Params->destructURLParam($payload, 'templateId');

        $options = [
            'endpoint' => "$this->API_PREFIX/templates/$templateId/theme"
        ];

        return $this->Http->unauthorizedRequest($options);
    }
}
