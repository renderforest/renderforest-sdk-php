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

class ProjectData
{
    private $API_PREFIX = '/api/v5';

    private $Params;
    private $Request;

    /**
     * Projects constructor.
     * Initialize Http, Params libraries.
     */
    public function __construct()
    {
        $this->Params = new Renderforest\Params();
        $this->Request = Renderforest\Request\Http::getInstance();
    }

    /**
     * Gets the project data.
     * @param $payload
     * @return Renderforest\ProjectData
     * @throws \GuzzleHttp\Exception\GuzzleException Get Project-data.
     */
    public function getProjectData($payload)
    {
        $projectId = $this->Params->destructURLParam($payload, 'projectId');
        $options = [
            'endpoint' => "$this->API_PREFIX/project-data/$projectId"
        ];

        $projectDataJson = $this->Request->authorizedRequest($options);

        return new Renderforest\ProjectData\ProjectData($projectDataJson);
    }

    /**
     * Updates the project data (partial update).
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateProjectDataPartial($payload)
    {
        $body = $this->Params->destructParams($payload, ['data']);
        $projectId = $this->Params->destructURLParam($payload, 'projectId');
        $options = [
            'method' => 'PATCH',
            'endpoint' => "$this->API_PREFIX/project-data/$projectId",
            'json' => $body
        ];

        return $this->Request->authorizedRequest($options);
    }
}
