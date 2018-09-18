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

require_once(dirname(__FILE__) . '/../../classes/Project_data_class.php');

class Project_data
{
    private $API_PREFIX = '/api/v5';

    private $Http;
    private $Params;

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
     * @return Project_data_class
     * Get Project-data.
     */
    public function getProjectData($payload)
    {
        $projectId = $this->Params->destructURLParam($payload, 'projectId');

        $options = [
            'endpoint' => "$this->API_PREFIX/project-data/$projectId"
        ];

        $projectDataJson = $this->Http->authorizedRequest($options);

        return new Project_data_class($projectDataJson);
    }

    /**
     * @param array $payload
     * @return array|null
     * Update Project-data (partial update).
     */
    public function updateProjectDataPartial($payload)
    {
        $body = $this->Params->destructParams($payload, ['data']);
        $projectId = $this->Params->destructURLParam($payload, 'projectId');

        $options = [
            'method' => 'PATCH',
            'endpoint' => "$this->API_PREFIX/project-data/$projectId",
            'body' => $body
        ];

        return $this->Http->authorizedRequest($options);
    }
}
