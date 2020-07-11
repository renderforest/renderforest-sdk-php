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
    const KEY_PARENT_ID = 'parentId';
    const KEY_TITLE = 'title';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_PARENT_ID,
        self::KEY_TITLE,
    ];

    /** @var int */
    protected $id;

    /** @var int */
    protected $parentId;

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
    public function getParentId(): int
    {
        return $this->parentId;
    }

    /**
     * @param int $parentId
     */
    private function setParentId(int $parentId)
    {
        $this->parentId = $parentId;
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
        $categoryParentId = $categoryArrayData[self::KEY_PARENT_ID];
        $categoryTitle = $categoryArrayData[self::KEY_TITLE];

        $this->setId($categoryId);
        $this->setParentId($categoryParentId);
        $this->setTitle($categoryTitle);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_PARENT_ID => $this->getParentId(),
            self::KEY_TITLE => $this->getTitle(),
        ];
    }
}
