<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

namespace Renderforest;

use Renderforest;

use Renderforest\Request\Api;

use Renderforest\Resource\ProjectData;
use Renderforest\Resource\Projects;
use Renderforest\Resource\Sounds;
use Renderforest\Resource\Supports;
use Renderforest\Resource\Templates;
use Renderforest\Resource\Users;

class Client
{
    private $ApiRequest;

    private $Project_data;
    private $Projects;
    private $Sounds;
    private $Supports;
    private $Users;

    /**
     * @var Resource\Projects
     */
    private static $staticProjects;
    /**
     * @var Resource\Sounds
     */
    private static $staticSounds;
    /**
     * @var Resource\Templates
     */
    private static $staticTemplates;

    /**
     * Renderforest constructor.
     * @param $options
     */
    public function __construct($options)
    {
        $this->ApiRequest = Api::getInstance();
        $this->ApiRequest->setConfig($options['signKey'], $options['clientId']);

        $this->Project_data = new ProjectData();
        $this->Projects = new Projects();
        $this->Sounds = new Sounds();
        $this->Supports = new Supports();
        $this->Users = new Users();
    }

    /**
     * Initialize static members of Renderforest class.
     * @t
     */
    public static function init()
    {

        self::$staticProjects = new Projects();
        self::$staticSounds = new Sounds();
        self::$staticTemplates = new Templates();
    }

    /**
     * Gets Project-data.
     * @param array $payload
     * @return Renderforest\ProjectData\ProjectData
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProjectData($payload)
    {
        return $this->Project_data->getProjectData($payload);
    }

    /**
     * Updates Project-data (partial update).
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateProjectDataPartial($payload)
    {
        return $this->Project_data->updateProjectDataPartial($payload);
    }

    /**
     * Gets all projects.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProjects($payload)
    {
        return $this->Projects->getProjects($payload);
    }

    /**
     * Adds the project.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addProject($payload)
    {
        return $this->Projects->addProject($payload);
    }

    /**
     * Gets a specific project.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProject($payload)
    {
        return $this->Projects->getProject($payload);
    }

    /**
     * Updates the project (partial update).
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateProjectPartial($payload)
    {
        return $this->Projects->updateProjectPartial($payload);
    }

    /**
     * Deletes a specific project.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteProject($payload)
    {
        return $this->Projects->deleteProject($payload);
    }

    /**
     * Deletes the rendered project videos based given on quality.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteProjectVideos($payload)
    {
        return $this->Projects->deleteProjectVideos($payload);
    }

    /**
     * Applies template preset on the project.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function applyTemplatePresetOnProject($payload)
    {
        return $this->Projects->applyTemplatePresetOnProject($payload);
    }

    /**
     * Duplicates the project.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function duplicateProject($payload)
    {
        return $this->Projects->duplicateProject($payload);
    }

    /**
     * Renders the project.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function renderProject($payload)
    {
        return $this->Projects->renderProject($payload);
    }

    /**
     * Gets sounds.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSounds($payload)
    {
        return $this->Sounds->getSounds($payload);
    }

    /**
     * Gets recommended sounds.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRecommendedSounds($payload)
    {
        return $this->Sounds->getRecommendedSounds($payload);
    }

    /**
     * Adds supports ticket.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addSupportsTicket($payload)
    {
        return $this->Supports->addSupportsTicket($payload);
    }

    /**
     * Gets current user.
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCurrentUser()
    {
        return $this->Users->getCurrentUser();
    }

    /**
     * Gets Trial Project.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTrialProject($payload)
    {
        return self::$staticProjects->getTrialProject($payload);
    }

    /**
     * Gets company sounds (limited).
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getCompanySoundsLimited($payload)
    {
        return self::$staticSounds->getRecommendedSoundsLimited($payload);
    }

    /**
     * Gets recommended sounds (limited).
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getRecommendedSoundsLimited($payload)
    {
        return self::$staticSounds->getRecommendedSoundsLimited($payload);
    }

    /**
     * Gets all templates.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplates($payload)
    {
        return self::$staticTemplates->getTemplates($payload);
    }

    /**
     * Gets templates categories.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplatesCategories($payload)
    {
        return self::$staticTemplates->getTemplatesCategories($payload);
    }

    /**
     * Gets a specific template.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplate($payload)
    {
        return self::$staticTemplates->getTemplate($payload);
    }

    /**
     * Gets Color-Presets of the template.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplateColorPresets($payload)
    {
        return self::$staticTemplates->getTemplateColorPresets($payload);
    }

    /**
     * Gets Pluggable-Screens of the template.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplatePluggableScreens($payload)
    {
        return self::$staticTemplates->getTemplatePluggableScreens($payload);
    }

    /**
     * Gets Recommended-Custom-Colors of the template.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplateRecommendedCustomColors($payload)
    {
        return self::$staticTemplates->getTemplateRecommendedCustomColors($payload);
    }

    /**
     * Gets Template-Presets of the template.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplatePresets($payload)
    {
        return self::$staticTemplates->getTemplatePresets($payload);
    }

    /**
     * Gets Template-SVG-Content of the template.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplateSVGContent($payload)
    {
        return self::$staticTemplates->getTemplateSVGContent($payload);
    }

    /**
     * Gets Template-Presets of the template.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplateTheme($payload)
    {
        return self::$staticTemplates->getTemplateTheme($payload);
    }

    /**
     * Gets Transitions of the template.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplateTransitions($payload)
    {
        return self::$staticTemplates->getTemplateTransitions($payload);
    }
}

Client::init();
