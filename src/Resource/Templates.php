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
use Renderforest\Request\Web;

class Templates
{
    private $CONFIG;

    private $Params;

    private $ApiRequest;
    private $WebRequest;

    public function __construct()
    {
        $this->CONFIG = include dirname(__FILE__) . '/../Config/Config.php';

        $this->Params = new Params();

        $this->ApiRequest = Api::getInstance();
        $this->WebRequest = Web::getInstance();
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
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/templates",
            'qs' => $qs
        ];

        return $this->ApiRequest->unauthorizedRequest($options);
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
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/templates/categories",
            'qs' => $qs
        ];

        return $this->ApiRequest->unauthorizedRequest($options);
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
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/templates/$templateId",
            'qs' => $qs
        ];

        return $this->ApiRequest->unauthorizedRequest($options);
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
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/templates/$templateId/color-presets"
        ];

        return $this->ApiRequest->unauthorizedRequest($options);
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
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/templates/$templateId/pluggable-screens"
        ];

        return $this->ApiRequest->unauthorizedRequest($options);
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
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/templates/$templateId/recommended-custom-colors"
        ];

        return $this->ApiRequest->unauthorizedRequest($options);
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
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/templates/$templateId/template-presets"
        ];

        return $this->ApiRequest->unauthorizedRequest($options);
    }

    /**
     * Gets Template-SVG-Content of the Template.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTemplateSVGContent($payload) {
        $templateId = $this->Params->destructURLParam($payload, 'templateId');
        $options = [
            'endpoint' => "{$this->CONFIG['WEB_PREFIX']}/templates/termplatesvg/$templateId"
        ];

        return $this->WebRequest->request($options);
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
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/templates/$templateId/theme"
        ];

        return $this->ApiRequest->unauthorizedRequest($options);
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
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/templates/$templateId/transitions"
        ];

        return $this->ApiRequest->unauthorizedRequest($options);
    }
}
