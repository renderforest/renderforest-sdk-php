<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

namespace Renderforest;

use Renderforest\Request\Http;
use Renderforest\Resource;

class Client {
    private $Request;
    private $Project_data;
    private $Projects;
    private $Sounds;
    private $Supports;
    private $Users;

    private static $staticProjects;
    private static $staticSounds;
    private static $staticTemplates;

    /**
     * Renderforest constructor.
     * @param $options
     */
    public function __construct($options)
    {
        $this->Request = Http::getInstance();
        $this->Project_data = new Resource\ProjectData();
        $this->Projects = new Resource\Projects();
        $this->Sounds = new Resource\Sounds();
        $this->Supports = new Resource\Supports();
        $this->Users = new Resource\Users();

        $this->Request->setConfig($options['signKey'], $options['clientId']);
    }

    /**
     * Initialize static members of Renderforest class.
     */
    public static function init () {
        self::$staticProjects = new Resource\Projects();
        self::$staticSounds = new Resource\Sounds();
        self::$staticTemplates = new Resource\Templates();
    }

    /**
     * Gets Project-data.
     * @param array $payload
     * @return ProjectData
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProjectData ($payload) {
      return $this->Project_data->getProjectData($payload);
    }

    /**
     * Updates Project-data (partial update).
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateProjectDataPartial ($payload) {
      return $this->Project_data->updateProjectDataPartial($payload);
    }

    /**
     * Gets all projects.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProjects ($payload) {
      return $this->Projects->getProjects($payload);
    }

    /**
     * Adds the project.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addProject ($payload) {
      return $this->Projects->addProject($payload);
    }

    /**
     * Gets a specific project.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProject ($payload) {
      return $this->Projects->getProject($payload);
    }

    /**
     * Updates the project (partial update).
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateProjectPartial ($payload) {
      return $this->Projects->updateProjectPartial($payload);
    }

    /**
     * Deletes a specific project.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteProject ($payload) {
        return $this->Projects->deleteProject($payload);
    }

    /**
     * Applies template preset on the project.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function applyTemplatePresetOnProject ($payload) {
      return $this->Projects->applyTemplatePresetOnProject($payload);
    }

    /**
     * Duplicates the project.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function duplicateProject ($payload) {
      return $this->Projects->duplicateProject($payload);
    }

    /**
     * Renders the project.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function renderProject ($payload) {
      return $this->Projects->renderProject($payload);
    }

    /**
     * Gets sounds.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSounds ($payload) {
      return $this->Sounds->getSounds($payload);
    }

    /**
     * Gets recommended sounds.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRecommendedSounds ($payload) {
      return $this->Sounds->getRecommendedSounds($payload);
    }

    /**
     * Adds supports ticket.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addSupportsTicket ($payload) {
      return $this->Supports->addSupportsTicket($payload);
    }

    /**
     * Gets current user.
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCurrentUser () {
      return $this->Users->getCurrentUser();
    }

    /**
     * Gets Trial Project.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTrialProject ($payload) {
        return self::$staticProjects->getTrialProject($payload);
    }

    /**
     * Gets company sounds (limited).
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getCompanySoundsLimited ($payload) {
      return self::$staticSounds->getRecommendedSoundsLimited($payload);
    }

    /**
     * Gets recommended sounds (limited).
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getRecommendedSoundsLimited ($payload) {
      return self::$staticSounds->getRecommendedSoundsLimited($payload);
    }

    /**
     * Gets all templates.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplates ($payload) {
      return self::$staticTemplates->getTemplates($payload);
    }

    /**
     * Gets templates categories.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplatesCategories ($payload) {
      return self::$staticTemplates->getTemplatesCategories($payload);
    }

    /**
     * Gets a specific template.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplate ($payload) {
      return self::$staticTemplates->getTemplate($payload);
    }

    /**
     * Gets Color-Presets of the template.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplateColorPresets ($payload) {
      return self::$staticTemplates->getTemplateColorPresets($payload);
    }

    /**
     * Gets Pluggable-Screens of the template.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplatePluggableScreens ($payload) {
      return self::$staticTemplates->getTemplatePluggableScreens($payload);
    }

    /**
     * Gets Recommended-Custom-Colors of the template.
     * @param $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplateRecommendedCustomColors ($payload) {
      return self::$staticTemplates->getTemplateRecommendedCustomColors($payload);
    }

    /**
     * Gets Template-Presets of the template.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplatePresets ($payload) {
      return self::$staticTemplates->getTemplatePresets($payload);
    }

    /**
     * Gets Template-Presets of the template.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplateTheme ($payload) {
      return self::$staticTemplates->getTemplateTheme($payload);
    }

    /**
     * Gets Transitions of the template.
     * @param array $payload
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getTemplateTransitions ($payload) {
      return self::$staticTemplates->getTempalateTransitions($payload);
    }
}
Client::init();
