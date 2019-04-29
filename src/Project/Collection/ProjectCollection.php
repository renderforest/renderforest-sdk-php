<?php

namespace Renderforest\Project\Collection;

use Renderforest\Project\Project;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * Class ProjectCollection
 *
 * @package Renderforest\Project\Collection
 */
class ProjectCollection implements ArraySerializableInterface, \Countable
{
    /**
     * @var Project[]
     */
    private $projects;

    /**
     * @var Project[]
     */
    private $projectsAssocArray;

    /**
     * ProjectCollection constructor.
     */
    public function __construct()
    {
        $this->projects = [];
        $this->projectsAssocArray = [];
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->projects);
    }

    /**
     * @return Project[]
     */
    public function getItems(): array
    {
        return $this->projects;
    }

    /**
     * @param Project $project
     * @return ProjectCollection
     */
    private function add($project): ProjectCollection
    {
        $this->projects[] = $project;
        $this->projectsAssocArray[$project->getId()] = $project;

        return $this;
    }

    /**
     * @param string $projectCollectionJson
     */
    public function exchangeJson(string $projectCollectionJson)
    {
        $projectCollectionArrayData = json_decode($projectCollectionJson, true);

        $projectCollectionArrayData = $projectCollectionArrayData['data'];

        $this->exchangeArray($projectCollectionArrayData);
    }

    /**
     * @param array $projectCollectionArrayData
     */
    public function exchangeArray(array $projectCollectionArrayData)
    {
        foreach ($projectCollectionArrayData as $projectArrayData) {
            $project = new Project();
            $project->exchangeArray($projectArrayData);

            $this->add($project);
        }
    }

    /**
     * @return array|void
     * @throws \Exception
     */
    public function getArrayCopy()
    {
        throw new \Exception('Not Implemented');
    }

    /**
     * @param int $projectId
     *
     * @return Project
     */
    public function getProjectById(int $projectId): Project
    {
        if (false === array_key_exists($projectId, $this->projectsAssocArray)) {
            // throw not found exception
        }

        return $this->projectsAssocArray[$projectId];
    }
}
