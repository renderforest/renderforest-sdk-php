<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require_once(dirname(__FILE__) . '/http/Http.php');

require_once(dirname(__FILE__) . '/resources/Project_data.php');
require_once(dirname(__FILE__) . '/resources/Projects.php');
require_once(dirname(__FILE__) . '/resources/Sounds.php');
require_once(dirname(__FILE__) . '/resources/Supports.php');
require_once(dirname(__FILE__) . '/resources/Templates.php');
require_once(dirname(__FILE__) . '/resources/Users.php');

class Renderforest {
    private $Http;
    private $Project_data;
    private $Projects;
    private $Sounds;
    private $Supports;
    private $Templates;
    private $Users;

    /**
     * Renderforest constructor.
     * @param $options
     */
    public function __construct($options)
    {
        $this->Http = Http::getInstance();
        $this->Project_data = new Project_data();
        $this->Projects = new Projects();
        $this->Sounds = new Sounds();
        $this->Supports = new Supports();
        $this->Templates = new Templates();
        $this->Users = new Users();

        $this->Http->setConfig($options['signKey'], $options['clientId']);
    }

    /**
     * @param array $payload
     * @return Project_data_class
     * Get Project-data.
     */
    public function getProjectData ($payload) {
      return $this->Project_data->getProjectData($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Update Project-data (partial update)
     */
    public function updateProjectDataPartial ($payload) {
      return $this->Project_data->updateProjectDataPartial($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get All Projects.
     */
    public function getProjects ($payload) {
      return $this->Projects->getProjects($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Add Project.
     */
    public function addProject ($payload) {
      return $this->Projects->addProject($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Trial Project.
     */
     public function getTrialProject ($payload) {
       return $this->Projects->getTrialProject($payload);
     }

    /**
     * @param array $payload
     * @return array|null
     * Get a Specific Project.
     */
    public function getProject ($payload) {
      return $this->Projects->getProject($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Update the Project (partial update).
     */
    public function updateProjectPartial ($payload) {
      return $this->Projects->updateProjectPartial($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Delete a Specific Project.
     */
    public function deleteProject ($payload) {
      return $this->Projects->deleteProject($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Apply Template Preset on the Project.
     */
    public function applyTemplatePresetOnProject ($payload) {
      return $this->Projects->applyTemplatePresetOnProject($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Duplicate the project.
     */
    public function duplicateProject ($payload) {
      return $this->Projects->duplicateProject($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Render the Project.
     */
    public function renderProject ($payload) {
      return $this->Projects->renderProject($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Sounds.
     */
    public function getSounds ($payload) {
      return $this->Sounds->getSounds($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Recommended Sounds.
     */
    public function getRecommendedSounds ($payload) {
      return $this->Sounds->getRecommendedSounds($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Add Supports Ticket.
     */
    public function addSupportsTicket ($payload) {
      return $this->Supports->addSupportsTicket($payload);
    }

    /**
     * @return array|null
     * Gets current user.
     */
    public function getCurrentUser () {
      return $this->Users->getCurrentUser();
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Company Sounds (limited).
     */
    public function getCompanySoundsLimited ($payload) {
      return $this->Sounds->getCompanySoundsLimited($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Recommended Sounds (limited).
     */
    public function getRecommendedSoundsLimited ($payload) {
      return $this->Sounds->getRecommendedSoundsLimited($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get All Templates.
     */
    public function getTemplates ($payload) {
      return $this->Templates->getTemplates($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Templates Categories.
     */
    public function getTemplatesCategories ($payload) {
      return $this->Templates->getTemplatesCategories($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get a Specific Template.
     */
    public function getTemplate ($payload) {
      return $this->Templates->getTemplate($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Color-Presets of the Template.
     */
    public function getTemplateColorPresets ($payload) {
      return $this->Templates->getTemplateColorPresets($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Pluggable-Screens of the Template.
     */
    public function getTemplatePluggableScreens ($payload) {
      return $this->Templates->getTemplatePluggableScreens($payload);
    }

    /**
     * @param $payload
     * @return array|null
     * Get Recommended-Custom-Colors of the Template.
     */
    public function getTemplateRecommendedCustomColors ($payload) {
      return $this->Templates->getTemplateRecommendedCustomColors($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Template-Presets of the Template.
     */
    public function getTemplatePresets ($payload) {
      return $this->Templates->getTemplatePresets($payload);
    }

    /**
     * @param array $payload
     * @return array|null
     * Get Template-Presets of the Template.
     */
    public function getTemplateTheme ($payload) {
      return $this->Templates->getTemplateTheme($payload);
    }
}
