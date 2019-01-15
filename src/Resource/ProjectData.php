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

use Renderforest\Params;

use Renderforest\Request\Api;

class ProjectData
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
     * Gets the project data.
     * @param $payload
     * @return Renderforest\ProjectData\ProjectData
     * @throws \GuzzleHttp\Exception\GuzzleException Get Project-data.
     */
    public function getProjectData($payload)
    {
        $projectId = $this->Params->destructURLParam($payload, 'projectId');
        $options = [
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/project-data/$projectId"
        ];

        $projectDataJson = $this->ApiRequest->authorizedRequest($options);

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
            'endpoint' => "{$this->CONFIG['API_PREFIX']}/project-data/$projectId",
            'json' => $body
        ];

        return $this->ApiRequest->authorizedRequest($options);
    }
}
