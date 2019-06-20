<?php

namespace Renderforest\Template\CategoryExtended;

use Renderforest\Base\EntityBase;

/**
 * Class CategoryExtended
 * @package Renderforest\Template\CategoryExtended
 */
class CategoryExtended extends EntityBase
{
    const KEY_ID = 'id';
    const KEY_PROJECT_ID = 'projectId';
    const KEY_TITLE = 'title';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_PROJECT_ID,
        self::KEY_TITLE,
    ];

    /** @var int */
    protected $id;

    /** @var int */
    protected $projectId;

    /** @var string */
    protected $title;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    private function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     */
    private function setProjectId(int $projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    private function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @param array $categoryArrayData
     */
    public function exchangeArray(array $categoryArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $categoryArrayData)) {
                // throw exception
            }
        }

        $categoryId = $categoryArrayData[self::KEY_ID];
        $categoryProjectId = $categoryArrayData[self::KEY_PROJECT_ID];
        $categoryTitle = $categoryArrayData[self::KEY_TITLE];

        $this->setId($categoryId);
        $this->setProjectId($categoryProjectId);
        $this->setTitle($categoryTitle);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_ID => $this->getId(),
            self::KEY_PROJECT_ID => $this->getProjectId(),
            self::KEY_TITLE => $this->getTitle(),
        ];

        return $arrayCopy;
    }
}
