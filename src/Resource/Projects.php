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

class Projects
{
    private $CONFIG;

    private $Params;

    private $ApiRequest;

    /**
     * Projects constructor.
     * Initialize Api, Params libraries.
     */
    public function __construct()
    {
        $this->CONFIG = include dirname(__FILE__) . '/../Config/Config.php';

        $this->Params = new Params();

        $this->ApiRequest = Api::getInstance();
    }

    /**
     * Gets all projects.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProjects($payload)
    {
        $qs = $this->Params->destructParams($payload, ['limit', 'offset']);

        $options = [
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/projects",
            'qs' => $qs
        ];

        return $this->ApiRequest->authorizedRequest($options);
    }

    /**
     * Adds the project.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addProject($payload)
    {
        $body = $this->Params->destructParams($payload, ['templateId']);

        $options = [
            'method' => 'POST',
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/projects",
            'json' => $body
        ];

        return $this->ApiRequest->authorizedRequest($options);
    }

    /**
     * Gets the trial project
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTrialProject($payload)
    {
        $qs = $this->Params->destructParams($payload, ['templateId']);

        $options = [
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/projects/trial",
            'qs' => $qs
        ];

        return $this->ApiRequest->unauthorizedRequest($options);
    }

    /**
     * Gets a specific project
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProject($payload)
    {
        $projectId = $this->Params->destructURLParam($payload, 'projectId');

        $options = [
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/projects/$projectId"
        ];

        return $this->ApiRequest->authorizedRequest($options);
    }

    /**
     * Updates the project (partial update)
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateProjectPartial($payload)
    {
        $body = $this->Params->destructParams($payload, ['customTitle']);
        $projectId = $this->Params->destructURLParam($payload, 'projectId');

        $options = [
            'method' => 'PATCH',
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/projects/$projectId",
            'json' => $body
        ];

        return $this->ApiRequest->authorizedRequest($options);
    }

    /**
     * Deletes a specific project.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteProject($payload)
    {
        $projectId = $this->Params->destructURLParam($payload, 'projectId');

        $options = [
            'method' => 'DELETE',
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/projects/$projectId"
        ];

        return $this->ApiRequest->authorizedRequest($options);
    }

    /**
     * Applies template preset on the project.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function applyTemplatePresetOnProject($payload)
    {
        $body = $this->Params->destructParams($payload, ['presetId']);
        $projectId = $this->Params->destructURLParam($payload, 'projectId');

        $options = [
            'method' => 'POST',
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/projects/$projectId/apply-template-preset",
            'json' => $body
        ];

        return $this->ApiRequest->authorizedRequest($options);
    }

    /**
     * Duplicates the project.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function duplicateProject($payload)
    {
        $projectId = $this->Params->destructURLParam($payload, 'projectId');

        $options = [
            'method' => 'POST',
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/projects/$projectId/duplicate"
        ];

        return $this->ApiRequest->authorizedRequest($options);
    }

    /**
     * Renders the project.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function renderProject($payload)
    {
        $body = $this->Params->destructParams($payload, ['quality']);
        $projectId = $this->Params->destructURLParam($payload, 'projectId');

        $options = [
            'method' => 'POST',
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/projects/$projectId/render",
            'json' => $body
        ];

        return $this->ApiRequest->authorizedRequest($options);
    }
}
