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

class Projects
{
    private $API_PREFIX = '/api/v1';

    private $Params;
    private $Http;

    /**
     * Projects constructor.
     * Initialize Http, Params libraries.
     */
    public function __construct()
    {
        $this->Http = Http::getInstance();
        $this->Params = Params::getInstance();
    }

    /**
     * @param array $payload
     * @return array|null
     * Get All Projects.
     * TODO: Fix getProjects (there is authorization problem).
     */
    public function getProjects($payload)
    {
        $qs = $this->Params->destructParams($payload, ['limit', 'offset']);

        $options = [
            'endpoint' => "$this->API_PREFIX/projects",
            'qs' => $qs
        ];

        return $this->Http->authorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Add Project.
     */
    public function addProject($payload)
    {
        $body = $this->Params->destructParams($payload, ['templateId']);

        $options = [
            'method' => 'POST',
            'endpoint' => "$this->API_PREFIX/projects",
            'body' => $body
        ];

        return $this->Http->authorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Trial Project.
     */
    public function getTrialProject($payload)
    {
        $qs = $this->Params->destructParams($payload, ['templateId']);

        $options = [
            'endpoint' => "$this->API_PREFIX/projects/trial",
            'qs' => $qs
        ];

        return $this->Http->unauthorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get a Specific Project.
     */
    public function getProject($payload)
    {
        $projectId = $this->Params->destructURLParam($payload, 'projectId');

        $options = [
            'endpoint' => "$this->API_PREFIX/projects/$projectId"
        ];

        return $this->Http->authorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Update the Project (partial update).
     */
    public function updateProjectPartial($payload)
    {
        $body = $this->Params->destructParams($payload, ['customTitle']);
        $projectId = $this->Params->destructURLParam($payload, 'projectId');

        $options = [
            'method' => 'PATCH',
            'endpoint' => "$this->API_PREFIX/projects/$projectId",
            'body' => $body
        ];

        return $this->Http->authorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Delete a Specific Project.
     */
    public function deleteProject($payload)
    {
        $projectId = $this->Params->destructURLParam($payload, 'projectId');

        $options = [
            'method' => 'DELETE',
            'endpoint' => "$this->API_PREFIX/projects/$projectId"
        ];

        return $this->Http->authorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Apply Template Preset on the Project.
     */
    public function applyTemplatePresetOnProject($payload)
    {
        $body = $this->Params->destructParams($payload, ['presetId']);
        $projectId = $this->Params->destructURLParam(payload, 'projectId');

        $options = [
            'method' => 'POST',
            'endpoint' => "$this->API_PREFIX/projects/$projectId/apply-template-preset",
            'body' => $body
        ];

        return $this->Http->authorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Duplicate the Project.
     */
    public function duplicateProject($payload)
    {
        $projectId = $this->Params->destructURLParam($payload, 'projectId');

        $options = [
            'method' => 'POST',
            'endpoint' => "$this->API_PREFIX/projects/$projectId/duplicate"
        ];

        return $this->Http->authorizedRequest($options);
    }

    /**
     * @param array $payload
     * @return array|null
     * Render the Project.
     */
    public function renderProject($payload)
    {
        $body = $this->Params->destructParams($payload, ['quality']);
        $projectId = $this->Params->destructURLParam($payload, 'projectId');

        $options = [
            'method' => 'POST',
            'endpoint' => "$this->API_PREFIX/projects/$projectId/render",
            'body' => $body
        ];

        return $this->Http->authorizedRequest($options);
    }
}
